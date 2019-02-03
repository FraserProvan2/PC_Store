<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Orders;

class OrdersController extends Controller
{
    //
    public function orders(){

        $data['orders'] = Orders::where('status', '!=', 'complete')->orderBy('id', 'DESC')->paginate(10);

        return view('admin.orders', $data);
    }

    public function completed_orders(){

        $data['orders'] = Orders::where('status', 'complete')->orderBy('id', 'DESC')->paginate(10);

        return view('admin.orders', $data);
    }
}
