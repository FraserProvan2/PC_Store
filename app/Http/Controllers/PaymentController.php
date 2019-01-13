<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

class PaymentController extends Controller
{
    /**
     * Payment main method
     * @return view index
     */
    public function index(){

        return view('public.checkout.payment');
    }

    /**
     * Pays and saves order
     * 
     */
    public function place_order(Request $request){
     
        $cart = Session::get('cart'); 
        $shipping_details = session::get('shipping_details');

        $request->number;
        $request->name;
        $request->expiry;
        $request->cvc;
    }
}
