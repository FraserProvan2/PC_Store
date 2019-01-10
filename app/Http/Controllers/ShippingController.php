<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Shipping page main method
     * @return view index
     */
    public function index(){

        return view('public.shipping');
    }
}
