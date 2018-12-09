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
}
