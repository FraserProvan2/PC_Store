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
     * Places order
     * @param request payment data
     * @return view payment success view or order failed view
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
                    $this->reduce_stock('component', $item['part_id']);
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
                'shipping' => json_encode($shipping_details, true),
                'price' => $total,
                'status' => 'in-progress'
            ]);
            $order->save();

            echo 'order placed page here';
        } 
        //else payment failed
        else {

        }
    }

    /**
     * reduces stock of items after order
     * @param type,data build or component, data for part (id)
     * @return view payment success view or order failed view
     */
    public function reduce_stock($type, $data){
        if($type == 'build'){

            //case
            $case = Parts::where('id', $data->case_id)->first();
            Parts::where('id', $data->case_id)->update(['stock' => $case->stock - 1]);

            //cooler
            $cooler = Parts::where('id', $data->cooler_id)->first();
            Parts::where('id', $data->cooler_id)->update(['stock' => $cooler->stock - 1]);

            //cpu
            $cpu = Parts::where('id', $data->cpu_id)->first();
            Parts::where('id', $data->cpu_id)->update(['stock' => $cpu->stock - 1]);
            
            //motherboard
            $mobo = Parts::where('id', $data->mobo_id)->first();
            Parts::where('id', $data->mobo_id)->update(['stock' => $mobo->stock - 1]);
                        
            //supply
            $psu = Parts::where('id', $data->powersupply_id)->first();
            Parts::where('id', $data->powersupply_id)->update(['stock' => $psu->stock - 1]);
      
            //ram
            $ram = Parts::where('id', $data->ram_id)->first();
            Parts::where('id', $data->ram_id)->update(['stock' => $ram->stock - 1]);

            //storage
            $storage = Parts::where('id', $data->storage_id)->first();
            Parts::where('id', $data->storage_id)->update(['stock' => $storage->stock - 1]);

            //gpu
            $gpu_amount = $data->add_card + 1; //all cards in build
            $gpu = Parts::where('id', $data->gpu_id)->first();
            Parts::where('id', $data->gpu_id)->update(['stock' => $gpu->stock - $gpu_amount]);
        }
        elseif($type == 'component'){

            //component
            $part_data = Parts::where('id', $data)->first();
            Parts::where('id', $data)->update(['stock' => $part_data->stock - 1]);
        }
    }

    /**
     * Makes payment
     */
    public function make_payment(){
        return true;
    }

}
