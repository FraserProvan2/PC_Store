<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuildPcController extends Controller
{
    /**
     * Build a PC main method
     * @return view index
     */
    public function index(){

        return view('public.build-pc');
    }

    /**
     * select CPU for part list
     * @return view cpu list
     */
    public function select_cpu(){

        $data['part_title'] = 'Central Processing Unit';

        return view('public.choose-part', $data);
    }
}
