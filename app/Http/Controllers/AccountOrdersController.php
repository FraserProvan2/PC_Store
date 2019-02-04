<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Orders;

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

        $data['orders'] = Orders::where('user_id',  $user_id)->orderBy('id', 'desc')->get();

        $data['user_data'] = $user_info;

        return view('public.account.orders', $data);
    }

    /**
     * view an order
     * @param orderID
     * @return view order
     */
    public function view_order($id){

        $orders = Orders::where('id', $id)->first();

        //checks user is the auther
        if($orders->user_id != Auth::user()->id && Auth::user()->is_admin != 1){
            return $this->index();
        }

        $data['page'] = 'view';
        $data['cart'] = $this->convert_object(json_decode($orders->cart));
        $data['shipping'] = json_decode($orders->shipping);
        $data['order_data'] = $orders;

        return view('public.checkout.order-view', $data);
    }
}
