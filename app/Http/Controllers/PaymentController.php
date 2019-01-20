<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session, Auth;

use App\Part_lists as Build;
use App\Parts;
use App\Orders;

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

        //gets required data for order
        $shipping_details = session::get('shipping_details'); //shipping data
        $cart = session('cart'); //cart data
        $user = Auth::user('id'); //user data
        $user_id = $user['id']; //users id
        $total = 0; //declares total
        
        //proccess payment
        $payment = $this->make_payment();

        //if payment successful
        if($payment == true){

            //processes cart items
            foreach ($cart as $key => $item){
                if($item['type'] == 'build'){

                    //gets cart item build data
                    $current_build = Build::where('id', $item['partlist_id'])->first();

                    //reduces stock & adds price to total
                    $this->reduce_stock('build', $current_build);
                    $total += $item['price'];
                }
                elseif($item['type'] == 'component'){

                    //reduces stock & adds price to total
                    $this->reduce_stock('component', $item['id']);
                    $total += $item['price'];
                }
            }

            //if express shipping add 25
            if($shipping_details['shipping_method'] == 'express'){
                $total += 25;
            }

            //places order
            $order = new Orders([
                'user_id'=> $user_id,
                'cart'=> json_encode($cart, true),
                'ship_method' => $shipping_details['shipping_method'],
                'price' => $total,
                'status' => 'in-progress'
            ]);
            $order->save();

        } 
        //else payment failed
        else {

        }
    }

    public function reduce_stock($type, $data){
        if($type == 'build'){

        }
        elseif($type == 'component'){

        }
    }

    public function make_payment(){
        return true;
    }

}
