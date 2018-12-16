<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BuildList;
use App\Part_cpu as Cpu;

class BuildPcController extends Controller
{
    
    /**
     * Build a PC main method
     * @return view index
     */
    public function index(){

        //gets current list data
        $current_list_id = session('current_part_list');
        $data['list_data'] = BuildList::where('id', $current_list_id)->first();


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
        $list_data = BuildList::where('id', $list_id)->first();     
        $data['list_data'] = $list_data;

        //part information
        $data['cpu_data'] = Cpu::where('id', $list_data['cpu_id'])->first();

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
    public function view_cpu(){

        //gets all cpu data
        $data['cpu_data'] = $cpu = Cpu::all();

        return view('public.build.select-cpu', $data);
    }

    /**
     * adds CPU to part list
     * @return function index w/ message
     */
    public function add_cpu(Request $request){
    
        //gets current list data
        $current_list_id = session('current_part_list');

        //updates CPU
        BuildList::where('id', $current_list_id)->update([
                'cpu_id' => $request['cpu_id'],
        ]);

        //success message
        $data['message'] = "CPU Added!";

        return $this->load()->with($data); 
    }

    /**
     * removes CPU from part list
     * @return function index w/ message
     */
    public function remove_cpu(Request $request){

        //gets current list data
        $current_list_id = session('current_part_list');

        //removes cpu id from current part list
        BuildList::where('id', $current_list_id)->update([
            'cpu_id' => NULL,
        ]);

        //success message
        $data['message'] = "CPU Removed!";

        return $this->load()->with($data);
    }
}
