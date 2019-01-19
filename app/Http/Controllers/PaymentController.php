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

        //return to shipping if no shipping details
        if(!Session::has('shipping_details') || empty(session::get('cart')) > 0){
            return redirect()->route('shipping');
        }

        //gets shipping details for shipping method
        $shipping_details = session::get('shipping_details');

        //gets cart total
        $total = $this->get_cart_total();

        //adds express price if seleted
        if($shipping_details['shipping_method'] == 'express'){
            $total += 25;
        }
        
        $data['cart_total'] = $total;

        return view('public.checkout.payment', $data);
    }

    /**
     * Pays and saves order
     * 
     */
    public function place_order(Request $request){

        //shipping details
        $shipping_details = session::get('shipping_details');
        
        // //card details input
        // $request->number;
        // $request->name;
        // $request->expiry;
        // $request->cvc;

        //cart data
        $cart = Session::get('cart'); 
        
        foreach ($cart as $item){

            //builds
            if($item->type == 'build'){

                // [1] => Array
                // (
                //     [type] => build
                //     [price] => 768
                //     [partlist_id] => 55
                //     [partlist_name] => new build
                // )
            }

            //components
            elseif($item->type == 'component'){

            }
        }
    }

}
