<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Orders;
use App\User;

use DB;

class OrdersController extends Controller
{
    /**
     * view active orders
     * @return view active orders
     */
    public function orders(){

        //subheading
        $data['type'] = 'Active';

        $data['orders'] = DB::table('orders')
            ->select('orders.*', 'users.name')
            ->where('orders.status', '!=', 'complete')
            ->Join('users', 'orders.user_id', '=', 'users.id')
            ->paginate(10);

        return view('admin.orders', $data);
    }

    /**
     * view completed orders
     * @return view completed orders
     */
    public function completed_orders(){

        //subheading
        $data['type'] = 'Completed';

        $data['orders'] = DB::table('orders')
            ->select('orders.*', 'users.name')
            ->where('orders.status', 'complete')
            ->Join('users', 'orders.user_id', '=', 'users.id')
            ->paginate(10);

        return view('admin.orders', $data);
    }

    /**
     * view order by id
     * @param id order
     * @return view order data
     */
    public function view($id){

        $data['order_data'] = Orders::where('id', $id)->first();
        $data['cart_data'] = json_decode($data['order_data']->cart);
        $data['user_data'] = User::where('id', $data['order_data']->user_id)->first();
        $data['shipping'] = json_decode($data['order_data']->shipping);

        return view('admin.view_order', $data);
    }
}
