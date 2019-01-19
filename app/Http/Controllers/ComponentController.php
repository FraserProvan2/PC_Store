<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Parts;

class ComponentController extends Controller
{
    /**
     * Loasd index
     * @return view of componeents
     */
    public function index(){

        $data['parts'] = Parts::where('type', '!=', 'storage')->get();
        
        return view('public.components.component-index', $data);
    }

    /**
     * filters components
     * @param type of part
     * @return view with filtered parts
     */
    public function filter($type){

        $data['parts'] = Parts::where('type', $type)->get();
        
        return view('public.components.component-index', $data);
    }
}
