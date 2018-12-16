<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Auth;

use App\User;

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
    public function update_details(Request $request){
        
        //inputs
        $name = $request['name'];
        $email = $request['email'];

        //checks email agaisnt users table
        $check_email_preconvert = User::where('email', $email)->get();
        $check_email = $this->convert_object($check_email_preconvert);
        
        //if email exists
        if($check_email){
            
            $data['error'] = "Email already registered";
        } 
        //else update
        else {
            
            //current user
            $user_id = Auth::user()->id;

            //update
            User::where('id', $user_id)
                ->update([
                    'name' => $name,
                    'email' => $email
                ]);

            $data['message'] = "Your Details have been Updated";
        }

        return view('public.account.profile', $data);
    }

    /**
     * Updates Users Password
     * @return view profile w/ message
     */
    public function update_password(Request $request){
        
        //
    }
}
