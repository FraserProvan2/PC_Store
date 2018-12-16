<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountProfileController extends Controller
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
     * Profile main method
     * @return view index
     */
    public function index(){

        $data['token'] = session('_token');

        return view('public.account.profile', $data);
    }

    /**
     * Updates Users email & name
     * @return view profile w/ message
     */
    public function update_details(){
        
        //
    }

    /**
     * Updates Users Password
     * @return view profile w/ message
     */
    public function update_password(){
        
        //
    }
}
