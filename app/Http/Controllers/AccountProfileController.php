<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

use Auth, Validator;
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

        //current user
        $user_id = Auth::user()->id;

        //checks user id agaisnt users table
        $user_info_preconvert = User::where('id', $user_id)->first();
        $user_info = $this->convert_object($user_info_preconvert);

        $data['user_data'] = $user_info;

        return view('public.account.profile', $data);
    }

    /**
     * Updates Users email & name
     * @return function profile index w/ message
     */
    public function update_details(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);

        if($validator->fails()) {
            return redirect('account')->withErrors($validator);
        }
        
        //inputs
        $name = $request['name'];
        $email = $request['email'];

        //current user
        $user_id = Auth::user()->id;

        //checks user id agaisnt users table
        $user_info_preconvert = User::where('id', $user_id)->first();
        $user_info = $this->convert_object($user_info_preconvert);

        //checks email agaisnt users table
        $check_email_preconvert = User::where('email', $email)->first();
        $check_email = $this->convert_object($check_email_preconvert);
        
        //if email exists and is not the current accounts ID
        if($check_email && $check_email['id'] != $user_info['id']){
            
            $data['error_details'] = "Email already registered!";
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

            $data['message_details'] = "Your Details have been Updated!";
        }

        return $this->index()->with($data);
    }

    /**
     * Updates Users Password
     * @return function profile index w/ message
     */
    public function update_password(Request $request){

        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

        if($validator->fails()) {
            return redirect('account')->withErrors($validator);
        }

        //inputs
        $pass = $request['password'];
        $pass_confirm = $request['password_confirmation'];

        //if passwords dont match
        if($pass != $pass_confirm){

            $data['error_details'] = "Passwords dont match!";
        }
        //if password is less than 6 characters
        else if(strlen($pass) < 6){

            $data['error_details'] = "Password is too short!";
        }
        //update password
        else {

            //current user
            $user_id = Auth::user()->id;

            //hashes and stores password
            User::where('id', $user_id)
            ->update([
                'password' => Hash::make($pass)
            ]);

            $data['message_password'] = "Your password has been updated!";
        }
        
        return $this->index()->with($data);
    }
}
