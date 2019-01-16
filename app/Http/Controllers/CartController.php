<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Redirect;

use App\Part_lists as Build;

class CartController extends Controller
{
    /**
     * View cart
     * @return view cart 
     */
    public function view(){

        //gets cart total
        $data['cart_total'] = $this->get_cart_total();

        return view('public.checkout.cart', $data);
    }

    /**
     * Adds part list to cart
     * @param request cart item details
     * @return redirect to build list
     */
    public function add_partlist(Request $request){

        //hidden inputs of list data
        $partlist_id = $request['partlist_id'];
        $partlist_name = $request['partlist_name'];
        $price = $request['price'];
        
        //prepare cart item
        $cart_item = [
            'type' => 'build',
            'price' => $price,
            'partlist_id' => $partlist_id, 
            'partlist_name' => $partlist_name
        ];

        //push to session array
        Session::push('cart', $cart_item);

        Session::flash('message', 'Added to Cart!');

        return redirect('/build/load');
    }

    /**
     * Removes items from cart
     * @param Request,id for session specified key
     * @return redirect back
     */
    public function remove(Request $request, $id){

        //cart items array
        $cart_items = $request->session()->get('cart');

        //if cart exists
        if(isset($cart_items)){
            
            //unset specified id
            unset($cart_items[$id]);
            
            $updated_cart = [];
            foreach($cart_items as $item){
                //updates cart array
                array_push($updated_cart, $item);
            }

            //forgets cart session
            $request->session()->forget("cart");

            //puts updated cart array into session
            Session::put('cart', $updated_cart);
            
            return back();
        }
    }

}
