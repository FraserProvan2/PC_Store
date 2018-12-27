<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;

use App\Part_lists as Build;
use App\Parts;

class BuildPcController extends Controller
{
    
    /**
     * Build a PC main method
     * @return view index
     */
    public function index(){

        //gets current list data
        $current_list_id = session('current_part_list');
        $data['list_data'] = Build::where('id', $current_list_id)->first();

        if(Auth::user()){
            $user_id = Auth::user()->id;
            $users_lists_object = Build::where('user_id', $user_id)->get();
            $data['users_lists']  = $this->convert_object($users_lists_object);
        }
        
        return view('public.build.build-index', $data);
    }

    /**
     * Loads part list
     * @return view part list
     */
    public function load(){

        //gets current list id from session
        $list_id = session('current_part_list');

        //gets part list data using id
        $list_data = Build::where('id', $list_id)->first();     
        $data['list_data'] = $list_data;

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

        return view('public.build.part-list', $data);
    }

    /**
     * Create a new build
     * @param request list name
     * @return function load part list
     */
    public function create(Request $request){
        
        //inputs
        $build_name = $request['build-name'];

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
            'name'=>$build_name,
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

        //part data for compatability check
        $current_list_id = session('current_part_list');
        $data['list_data'] = Build::where('id', $current_list_id)->first();
        $cpu_data = Parts::where('id', $data['list_data']['cpu_id'])->first();
        $mobo_data = Parts::where('id', $data['list_data']['mobo_id'])->first();

        //if compatiblity is on
        if(!Session::has('compat_filter') || session('compat_filter') == 'on'){
            
            //if part is cpi or mobo
            if($part == 'cpu' || $part == 'motherboard'){

                //if mobo socket is set
                if(isset($mobo_data['socket'])){

                    //only show compatable
                    $part_data_object = Parts::where('type', $part)->where('stock', ">", 0)->where('socket', $mobo_data['socket'])->get();
                } 
                //if cpu socket is set
                else if(isset($cpu_data['socket'])){

                    //only show compatable
                    $part_data_object = Parts::where('type', $part)->where('stock', ">", 0)->where('socket', $cpu_data['socket'])->get();
                } 

            } else {
                //otherwise get all part data
                $part_data_object = Parts::where('type', $part)->where('stock', ">", 0)->get();
            }

        } else {
            //gets all part data
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

        //gets current list data
        $current_list_id = session('current_part_list');
        
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
        Build::where('id', $current_list_id)->update([
            $type.'_id' => $id,
        ]);

        Session::flash('message', 'Part List Updated!');

        return $this->load();               
    }

    public function check_compatible(){
     
        //gets current list id from session
        $list_id = session('current_part_list');

        //gets part list data using id
        $list_data = Build::where('id', $list_id)->first();     

        //part information
        $cpu_data = Parts::where('id', $list_data['cpu_id'])->first();
        $mobo_data = Parts::where('id', $list_data['mobo_id'])->first();

        //get socket types
        $cpu_socket = $cpu_data['socket'];
        $mobo_socket = $mobo_data['socket'];

        //checks if mobo and cpu have same socket type
        if(isset($cpu_data) && isset($mobo_socket) && $cpu_socket != $mobo_socket){
            Session::flash('error', 'Motherboard and CPU are different socket types!');
        }
    }

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

        //gets current list data
        $current_list_id = session('current_part_list');

        //gets part type using ID
        $part_data_object = Parts::where('id', $id)->first();
        $part_type = $part_data_object['type'];

        //clarfies type
        if($part_type == "motherboard"){
            $part_type = "mobo";
        } 

        //updates part type to NULL using type and id
        Build::where('id', $current_list_id)->update([
            $part_type.'_id' => NULL,
        ]);

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

        //if the signed in users id matches the list id

        //if user id owns the part list
        if(Auth::user()->id == $build_data['user_id']){

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

        //gets current list data
        $current_list_id = session('current_part_list');
        $data['list_data'] = Build::where('id', $current_list_id)->first();
    
        if($type == 'gpu' && $data['list_data']['add_card'] < 3){

            //adds card int
            Build::where('id', $current_list_id)->update([
                'add_card' => $data['list_data']['add_card']+1,
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

        //gets current list data
        $current_list_id = session('current_part_list');
        $data['list_data'] = Build::where('id', $current_list_id)->first();

        //current add card value
        $curr_add_card = $data['list_data']['add_card'];

        //gpu type (up to 3 extra gpus)
        if($type == 'gpu' && $curr_add_card  <= 3 && $curr_add_card > 0){

            //adds card int
            Build::where('id', $current_list_id)->update([
                'add_card' => $curr_add_card-1,
            ]);

            Session::flash('message', 'GPU removed!');
        }

        return $this->load();    
    }

}
