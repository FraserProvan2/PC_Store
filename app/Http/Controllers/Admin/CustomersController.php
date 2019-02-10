<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

use DB;

class CustomersController extends Controller
{
    /**
     * view all customers
     * @return view customers
     */
    public function index(){

        //gets customers
        $data['customers'] = DB::table('users')->paginate(15);

        return view('admin.customers', $data);
    }

    /**
     * view customer
     * @param id custoemr id
     * @return view customer
     */
    public function view($id){

        //gets customers and order history
        $data['customer'] = User::where('id', $id)->first();
        $data['customers_orders'] = DB::table('orders')->where('user_id', $id)->paginate(15);

        return view('admin.view_customer', $data);
    }
}
