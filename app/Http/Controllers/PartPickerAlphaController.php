<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cpu;
use App\Motherboard as Mobo;

class PartPickerAlphaController extends Controller
{
    public function index(){

        $data['cpu_all'] =  Cpu::all();
        $data['motherboard_all'] =  Mobo::all();

        return view('pc_list_alpha', $data);
    }
    
}
