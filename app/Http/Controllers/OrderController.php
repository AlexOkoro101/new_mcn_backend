<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function __construct()
    {
        if (request()->path() == 'checkout' && !auth()->check()) {
            Session::put('oldUrl', request()->path());
        }
        $this->middleware('auth');
    }

    public function checkout(Request $request)
    {
    	if (Session::has('cart')) {
    		$cart = Session::get('cart');
        	$email = auth()->user()->email;
        	$totalQty = $cart->totalQty;
        	$totalPrice = $cart->totalPrice;
            //dd($email);
        	return view('checkout', compact('cart', 'email', 'totalQty', 'totalPrice'));
        } else {
            return redirect('/');
        }
    }
}
