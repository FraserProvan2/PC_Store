<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect, Session;

class ShippingController extends Controller
{
    /**
     * Shipping page main method
     * @return view index
     */
    public function index(){

        //return to cart if no cart items
        if(empty(session::get('cart')) > 0){
            return redirect()->route('cart');
        }

        //gets cart total
        $data['cart_total'] = $this->get_cart_total();
        $data['shipping_details'] = session::get('shipping_details');

        return view('public.checkout.shipping', $data);
    }

    /**
     * Stores shipping details to session
     * @param Request shipping detials input
     * @return view index
     */
    public function store_address(Request $request){

        //saves shipping details to session
        session(['shipping_details' => [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email_address' => $request->email_address,
            'number' => $request->number,
            'address' => $request->address,
            'country' => $request->country,
            'city' => $request->city,
            'postcode' => $request->postcode,
            'shipping_method' => $request->shipping_method
            ]
        ]);

        return redirect()->route('payment');
    }
}
