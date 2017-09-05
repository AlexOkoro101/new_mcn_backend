<?php

namespace App\Http\Controllers\Admin;

use App\Deposit;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
    	$orders = Order::all();

        $totMtn = 0;
        $totEtisalat = 0;
        $totAirtel = 0;
        $totGlo = 0;
    	foreach ($orders as $order) {
    		foreach(unserialize($order->cart)->items as $k => $inner) {
                if ($inner["network"] == "MTN") {
                    $totMtn += $inner["price"];
                }

                if ($inner["network"] == "ETISALAT") {
                    $totEtisalat += $inner["price"];
                }

                if ($inner["network"] == "AIRTEL") {
                    $totAirtel += $inner["price"];
                }

                if ($inner["network"] == "GLO") {
                    $totGlo += $inner["price"];
                }
            }
    	}
    	return view('admin.data', compact('orders', 'totMtn', 'totEtisalat', 'totAirtel', 'totGlo'));
    }
}
