<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cpu;
use App\Motherboard as Mobo;
use App\Part_list;

class PartPickerAlphaController extends Controller
{
    public function index(){

        $data['cpu_all'] =  Cpu::all();
        $data['motherboard_all'] =  Mobo::all();

        return view('pc_list_alpha', $data);
    }

    public function save_list(Request $request){

        //inputs
        $name = $request->input('list_name');
        $cpu = $request->input('cpu_id');
        $mobo = $request->input('mobo_id');

        //insert
        DB::insert('INSERT INTO part_list(name, cpu_id, mobo_id) VALUES(?, ?, ?)', 
        [$name, $cpu, $mobo]);
 
        return redirect()->to('/');
    }

    public function view_list($id){
    }
    
}
