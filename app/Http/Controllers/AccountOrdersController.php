<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;

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

        //current user
        $user_id = Auth::user()->id;

        //checks user id agaisnt users table
        $user_info_preconvert = User::where('id', $user_id)->first();
        $user_info = $this->convert_object($user_info_preconvert);

        $data['user_data'] = $user_info;

        return view('public.account.orders', $data);
    }
}
