<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanRentalController extends Controller
{
    /**
     * LAN Rental main method
     * @return view index
     */
    public function index(){

        return view('public.lan-rent');
    }
}
