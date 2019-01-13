<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

class ShippingController extends Controller
{
    /**
     * Shipping page main method
     * @return view index
     */
    public function index(){

        return view('public.checkout.shipping');
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
