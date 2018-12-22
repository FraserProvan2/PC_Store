<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
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
        $data['cpu_data'] = Parts::where('id', $data['list_data']['cpu_id'])->first();

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

        //gets part data for selected part
        $part_data_object = Parts::where('type', $part)
                                  ->where('stock', ">", 0)
                                  ->get();

        $data['part_data'] = $this->convert_object($part_data_object);

        return view('public.build.list-part', $data);
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
        $type = $part_data['type'];

        //adds part to part list using part ID and type
        Build::where('id', $current_list_id)->update([
            $type.'_id' => $id,
        ]);

        return $this->load();               
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

        //updates part type to NULL using type and id
        Build::where('id', $current_list_id)->update([
            $part_type.'_id' => NULL,
        ]);

        return $this->load();  
    }

}
