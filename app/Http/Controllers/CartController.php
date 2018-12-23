<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Redirect;

use App\Part_lists as Build;

class CartController extends Controller
{
    /**
     * Adds part list to cart
     * @param request cart item details
     * @return redirect to build list
     */
    public function add_partlist(Request $request){

        //hidden inputs of list data
        $partlist_id = $request['partlist_id'];
        $price = $request['price'];

        //prepare cart item
        $cart_item = [
            'price' => $price,'partlist_id' => $partlist_id
        ];

        //push to session array
        Session::push('cart', $cart_item);

        Session::flash('message', 'Added to Cart!');

        return redirect('/build/load');
    }
}
