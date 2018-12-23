<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Homepage main method
     * @return view index
     */
    public function index(){

        return view('public.index');
    }

    /**
     * Changes object into array
     * @param  object 
     * @return array
     */
    public function convert_object($object){

        $array = json_decode(json_encode($object, true), true);
        return $array;
    }

    
}
