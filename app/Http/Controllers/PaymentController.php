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
        if(!Session::has('shipping_details')){
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
        
        $cart = Session::get('cart'); 
        $shipping_details = session::get('shipping_details');

        // $request->number;
        // $request->name;
        // $request->expiry;
        // $request->cvc;
        
        echo "<pre>";

        echo "Cart" . "<br>";
        print_r($cart);
        echo "<hr>";

        echo "Shipping Info" . "<br>";
        print_r($shipping_details);
        echo "<hr>";

        echo "Payment Info" . "<br>";
        echo $request->number . "<br>";
        echo $request->name . "<br>";
        echo $request->expiry . "<br>";
        echo $request->cvc . "<br>";
        die;
    }
}
