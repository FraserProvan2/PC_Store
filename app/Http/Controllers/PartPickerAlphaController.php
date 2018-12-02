<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cpu;
use App\Motherboard as Mobo;
use App\Part_list;

class PartPickerAlphaController extends Controller
{
    /**
     * Changes object into array
     * @param  object 
     * @return array
     */
    public function index(){

        //parts
        $data['cpu_all'] =  Cpu::all();
        $data['motherboard_all'] =  Mobo::all();
        
        //part lists
        $data['part_list_data'] =  Part_list::all();

        return view('pc_list_alpha', $data);
    }

    /**
     * View part list
     * @param  list_id $id
     * @return redirect
     */
    public function view_list($id){
        
        //from parent index
        $data['cpu_all'] =  Cpu::all();
        $data['motherboard_all'] =  Mobo::all();
        $data['part_list_data'] = Part_list::all();

        //gets part list using the ID
        $pre_part_list = Part_List::where('id',$id)->first();
        $viewed_list = $this->convert_object($pre_part_list);

        //uses ID to get the part data
        $cpu_by_id = DB::table('cpu')->where('id', $viewed_list['cpu_id'])->first();
        $mobo_by_id = DB::table('motherboard')->where('id', $viewed_list['mobo_id'])->first();

        //puts part in data array
        $data['part_list'] = $viewed_list;
        $data['part_cpu'] = $this->convert_object($cpu_by_id);
        $data['part_mobo'] = $this->convert_object($mobo_by_id);
        
        return view('pc_list_alpha', $data);
    }

    /**
     * Saves part list
     * @param  input $request
     * @return redirect
     */
    public function save_list(Request $request){

        //inputs
        $name = $request->input('list_name');
        $cpu = $request->input('cpu_id');
        $mobo = $request->input('mobo_id');

        //insert
        DB::insert('INSERT INTO part_list(name, cpu_id, mobo_id) VALUES(?, ?, ?)', 
        [$name, $cpu, $mobo]);
 
        return back();
    }

    /**
     * Deletes part list
     * @param  input $id
     * @return redirect
     */
    public function delete_list($id){

        Part_List::destroy([$id]);
 
        return redirect()->to('/');
    }

}
