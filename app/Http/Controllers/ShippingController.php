<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreShippingDetails;

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
    public function store_address(StoreShippingDetails $request){
        
        //validates form input
        $validated = $request->validated();

        //saves shipping details to session
        session(['shipping_details' => [
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email_address' => $validated['email_address'],
            'number' => $validated['number'],
            'address' => $validated['address'],
            'country' => $validated['country'],
            'city' => $validated['city'],
            'postcode' => $validated['postcode'],
            'shipping_method' => $validated['shipping_method']
            ]
        ]);

        return redirect()->route('payment');
    }
}
