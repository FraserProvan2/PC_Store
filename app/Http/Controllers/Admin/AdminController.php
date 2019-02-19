<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Orders;
use Carbon\Carbon;

use DB;

class AdminController extends Controller
{
    /**
     * admins dashboard (home)
     * @return view dashboard
     */
    public function index(){

        //gets date - 30 days
        $date = Carbon::today()->subDays(30);

        //returns dashboard with data
        return view('admin.dashboard', [
            'order_graph' => $this->get_recent_orders(),
            'total_income' => DB::table('orders')->where('created_at', '>=', $date)->sum('price'),
            'total_orders' => Orders::where('created_at', '>=', $date)->get(),
            'total_users' => User::where('is_admin', NULL)->get(),
        ]);
    }

    /**
     * gets graph data for last 30 days orders
     * @return String last 30 days of orders
     */
    function get_recent_orders(){
        
        //delcares
        $last_30_days = [];
        $day = 30;

        //while for last 40 days
        while($day > 0){
            
            //gets orders for day of counter ($day)
            $order = Orders::where('created_at', '<', today()->subDays($day-1))->
                             where('created_at', '>', today()->subDays($day))->get();
            
            //pushs current day to array
            array_push($last_30_days, count($order));
            
            //remove 1 from counter
            $day--;
        }

        //returns orders in string format
        return '[' . implode(",", $last_30_days) . ']';
        //output format: "[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2,1,0]";
    }
}
