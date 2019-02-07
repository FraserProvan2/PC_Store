<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session, Auth;

use App\Part_lists as Build;
use App\Parts;

class BuildPcController extends Controller
{
    
    /**
     * Build a PC main method
     * @return view index
     */
    public function index(){

        //gets current build data
        $data['list_data'] = $this->get_current_build();



        if(Auth::user()){
            $user_id = Auth::user()->id;
            $users_lists_object = Build::where('user_id', $user_id)->where('purchased', 0)->orderBy('id', 'DESC')->get();
            $data['users_lists']  = $this->convert_object($users_lists_object);
        }
        
        return view('public.build.build-index', $data);
    }

    /**
     * Loads part list
     * @return view part list
     */
    public function load(){

        //gets current build data
        $data['list_data'] = $this->get_current_build();

        //checks user is the auther
        if(Auth::user() && Auth::user()->is_admin != 1){
            if($data['list_data']['user_id'] != Auth::user()->id){
                return $this->index();
            }
        }

        //part information
        $data['case_data'] = Parts::where('id', $data['list_data']['case_id'])->first();
        $data['cooler_data'] = Parts::where('id', $data['list_data']['cooler_id'])->first();
        $data['cpu_data'] = Parts::where('id', $data['list_data']['cpu_id'])->first();
        $data['gpu_data'] = Parts::where('id', $data['list_data']['gpu_id'])->first();
        $data['mobo_data'] = Parts::where('id', $data['list_data']['mobo_id'])->first();
        $data['powersupply_data'] = Parts::where('id', $data['list_data']['powersupply_id'])->first();
        $data['ram_data'] = Parts::where('id', $data['list_data']['ram_id'])->first();
        $data['storage_data'] = Parts::where('id', $data['list_data']['storage_id'])->first();
 
        //checks compatability
        $this->check_compatible();
        
        //checks if all parts are filled out
        if(isset($data['case_data']) && isset($data['cooler_data']) &&
           isset($data['cpu_data']) && isset($data['gpu_data']) &&
           isset($data['mobo_data']) && isset($data['powersupply_data']) &&
           isset($data['ram_data']) && isset($data['storage_data'])) 
        {
            $data['list_checked'] = true; 
        }

        return view('public.build.part-list', $data);
    }

    /**
     * Gets current build data from the session
     * @return Array current build list
     */
    public function get_current_build(){

        //gets id from session
        $current_list_id = session('current_part_list');

        //uses ID to fetch build data
        $build_data = Build::where('id', $current_list_id)->first();

        return $build_data;
    }

    /**
     * Create a new build
     * @param request list name
     * @return function load part list
     */
    public function create(Request $request){
        
        //validates data
        $validatedData = $request->validate([
            'build_name' => 'required',
        ]);

        //if user signed in add user_id to list
        if(Auth::user()){
            $user = Auth::user('id');
            $user_id = $user['id'];
        }
        //else add NULL instead
        else {
            $user_id = NULL;
        }

        //saves new build list
        $newbuild = new Build([
            'name'=>$validatedData['build_name'],
            'user_id'=>$user_id
        ]);
        $newbuild->save();

        //gets newly created part list
        $newbuild_list = Build::orderBy('id', 'DESC')->first();
        $data['list_data'] = $newbuild_list;

        //adds part list to session
        session(['current_part_list' => $newbuild_list['id']]);

        return $this->load();
    }

    /**
     * Lists parts
     * @param part part type
     * @return function load list of parts
     */
    public function list_part($part){

        //gets current build data
        $data['list_data'] = $this->get_current_build();

        if(Auth::user()){
            if($data['list_data']['user_id'] != Auth::user()->id){
                return $this->index();
            }
        }

        //part data for compatability check
        $cpu_data = Parts::where('id', $data['list_data']['cpu_id'])->first();
        $mobo_data = Parts::where('id', $data['list_data']['mobo_id'])->first();

        //if part is cpi or mobo
        if($part == 'cpu' || $part == 'motherboard'){

            //if compatiblity is on
            if(!Session::has('compat_filter') || session('compat_filter') == 'on'){
                
                //if mobo socket is set -> only show compatable
                if(isset($mobo_data['socket'])){
                    $part_data_object = Parts::where('type', $part)->where('stock', ">", 0)->where('socket', $mobo_data['socket'])->get();
                } 
                //if cpu socket is set -> only show compatable
                else if(isset($cpu_data['socket'])){
                    $part_data_object = Parts::where('type', $part)->where('stock', ">", 0)->where('socket', $cpu_data['socket'])->get();
                } 
            }
        } 

        //if $part_data_object not set, just get all part info
        if(!isset($part_data_object)){
            $part_data_object = Parts::where('type', $part)->where('stock', ">", 0)->get();
        }
                  
        $data['part_data'] = $this->convert_object($part_data_object);

        return view('public.build.parts', $data);
    }

    /**
     * Adds part to build
     * @param id part id
     * @return function loads part list
     */
    public function add_part($id){
        
        //gets current build data
        $current_list = $this->get_current_build();
        
        //gets data for part using ID
        $part_data_object = Parts::where('id', $id)->first();
        $part_data = $this->convert_object($part_data_object);

        //finds type
        if($part_data['type'] == "motherboard"){
            $type = "mobo";
        } else {
            $type = $part_data['type'];
        }

        //adds part to part list using part ID and type
        Build::where('id', $current_list['id'])->update([
            $type.'_id' => $id,
        ]);

        Session::flash('message', 'Part List Updated!');

        return $this->load();               
    }

    /**
     * Checks compatability of part list
     * @return flash error if check failed
     */
    public function check_compatible(){ 
        
        //gets current build data
        $current_list = $this->get_current_build();

        //part information
        $cpu_data = Parts::where('id', $current_list['cpu_id'])->first();
        $mobo_data = Parts::where('id', $current_list['mobo_id'])->first();

        //get socket types
        $cpu_socket = $cpu_data['socket'];
        $mobo_socket = $mobo_data['socket'];

        //checks if mobo and cpu have same socket type
        if(isset($cpu_data) && isset($mobo_socket) && $cpu_socket != $mobo_socket){
            Session::flash('error', 'Motherboard and CPU are different socket types!');
        }
    }

    /**
     * Turns filter on/off
     * @param boolean on/off
     * @return back returns user to previous view
     */
    public function filter($param){

        if($param == 'on'){
            session(['compat_filter' => 'on']);
        } 
        else if ($param == 'off'){
            session(['compat_filter' => 'off']);
        }
        
        return back();
    }

    /**
     * Remove part from build
     * @param id part id
     * @return function loads part list
     */
    public function remove_part($id){

        //gets current build data
        $current_list = $this->get_current_build();

        //gets part type using ID
        $part_data_object = Parts::where('id', $id)->first();
        $part_type = $part_data_object['type'];

        //clarfies type
        if($part_type == "motherboard"){
            $part_type = "mobo";
        } 

        //updates part type to NULL using type and id
        Build::where('id', $current_list['id'])->update([
            $part_type.'_id' => NULL,
        ]);

        //if GPU removed gpu amount reduced to 1
        if($part_type == "gpu"){
            Build::where('id', $current_list['id'])->update([
                'add_card' => 0,
            ]);
        }

        Session::flash('message', 'Part Removed!');

        return $this->load();  
    }

    /**
     * view part list
     * @param id build id
     * @return function build index or list 
     */
    public function view($id){

        //gets build data
        $build_data = Build::where('id', $id)->first();

        //if user id owns the part list
        if(isset(Auth::user()->id) && Auth::user()->id == $build_data['user_id'] || isset(Auth::user()->id) && Auth::user()->is_admin == 1){

            //put build id to session
            session(['current_part_list' => $id]);

            //return part list
            return $this->load(); 

        } else {

            //return build index
            return $this->index(); 
        }
    }

    /**
     * Deletes build
     * @param request,id list id
     * @return function loads build index
     */
    public function delete(Request $request, $id){
        
        //gets build data
        $build_data = Build::where('id', $id)->first();

        //if the signed in users id matches the list id
        if(Auth::user()->id == $build_data['user_id']){

            //if the deleted build id is the same as session
            if(session('current_part_list') == $id){

                //forget build id in session
                $request->session()->forget("current_part_list");
            }
            
            //delete by ID
            Build::where('id', $id)->delete();
        }

        Session::flash('message', 'Build Deleted!');

        return $this->index();
    }

    /**
     * adds extra part
     * @param type
     * @return function load
     */
    public function add_extra($type){

        //gets current build data
        $current_build = $this->get_current_build();
    
        if($type == 'gpu' && $current_build['add_card'] < 3){

            //adds card int
            Build::where('id', $current_build['id'])->update([
                'add_card' => $current_build['add_card']+1,
            ]);

            Session::flash('message', 'GPU Updated!');
        }

        return $this->load();    
    }

    /**
     * reduce qty of extra part
     * @param type
     * @return load function
     */
    public function reduce_extra($type){

        //gets current build data
        $current_build = $this->get_current_build();

        //current add card value
        $curr_add_card = $current_build['add_card'];

        //gpu type (up to 3 extra gpus)
        if($type == 'gpu' && $curr_add_card  <= 3 && $curr_add_card > 0){

            //adds card int
            Build::where('id', $current_build['id'])->update([
                'add_card' => $curr_add_card-1,
            ]);

            Session::flash('message', 'GPU removed!');
        }

        return $this->load();    
    }

    /**
     * Update name of the build
     * @param request
     * @return load function
     */
    public function change_name(Request $request){

        //gets current build data
        $current_build = $this->get_current_build();

        //validates data
        $validatedData = $request->validate([
            'new_title' => 'required',
        ]);

        //updates partlist name
        Build::where('id', $current_build['id'])->update([
            'name' => $validatedData['new_title']
        ]);

        Session::flash('message', 'Name Updated!');
        
        return $this->load();   
    }

}
