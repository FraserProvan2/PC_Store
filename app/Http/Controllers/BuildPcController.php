<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BuildList;

class BuildPcController extends Controller
{

    public function __construct()
    {
       
    }
    
    /**
     * Build a PC main method
     * @return view index
     */
    public function index(){

        return view('public.build.build-index');
    }

    /**
     * Loads part list
     * @return view part list
     */
    public function load(){

        //gets current list id from session
        $list_id = session('current_part_list');

        //gets part list data using id
        $list_data = BuildList::where('id', $list_id)->first();     
        $data['list_data'] = $list_data;

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

        //saves new build list
        $newbuild = new BuildList(['name'=>$build_name]);
        $newbuild->save();

        //gets newly created part list
        $newbuild_list = BuildList::orderBy('id', 'DESC')->first();
        $data['list_data'] = $newbuild_list;

        //adds part list to session
        session(['current_part_list' => $newbuild_list['id']]);

        return $this->load();
    }

    /**
     * select CPU for part list
     * @return view cpu list
     */
    public function select_cpu(){

        $data['part_title'] = 'Central Processing Unit';

        return view('public.build.choose-part', $data);
    }
}
