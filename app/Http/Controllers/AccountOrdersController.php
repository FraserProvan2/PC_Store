<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountOrdersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Orders main method
     * @return view index
     */
    public function index(){

        return view('public.account.orders');
    }
}
