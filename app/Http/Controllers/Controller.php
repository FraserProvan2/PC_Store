<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Homepage main method
     * @return view index
     */
    public function index(){

        return view('public.index');
    }

    /**
     * Changes object into array
     * @param  object 
     * @return array
     */
    public function convert_object($object){

        $array = json_decode(json_encode($object, true), true);
        return $array;
    }

    public function get_cart_total(){

        $cart = Session::get('cart');
        
        $cart_total = 0;

        if(isset($cart)){
            foreach($cart as $item){
                $cart_total += $item['price'];
            }
        }

        if(!$cart){
            $cart = [0];
        }

        return $cart_total;
    }
}
