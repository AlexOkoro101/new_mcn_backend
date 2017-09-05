<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Data;
use App\Testimonial;
use App\Http\Requests;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
    {    
        $testimonies = Testimonial::all();
        return view('data.index');
    }

    public function showNetwork($network)
    {
        $testimonies = Testimonial::all();
    	$network = strtoupper($network);
    	$dataPlans = Data::where('network', '=' , $network)->get();
    	return view('data.'.strtolower($network), compact('dataPlans','testimonies'));
    }

    public function removeOne(Request $request, $id)
    {
    	$toRemove = $request->session()->get('cart');
        $toRemove->totalPrice = $toRemove->totalPrice - $toRemove->items[$id]['price'];
        $toRemove->totalQty = $toRemove->totalQty - $toRemove->items[$id]['qty'];
    	unset($toRemove->items[$id]);
    	if (Session::has('cart') && count($toRemove->items)==0) {
    		$request->session()->flush();
    		return redirect()->back()->with('Success', 'All cleared check links below');
    	}
    	return redirect()->back()->with('Success', 'Successfully Removed');
    }

    public function removeAll(Request $request)
    {
    	$request->session()->flush();
    	return redirect()->back()->with('Success', 'All cleared check links below');
    }

    public function getAddToCart(Request $request, $id)
	{
        $phone = 'phone'.$request->dataId;
        
        $rules = [
                $phone => 'required|digits:11',
            ];

        $customMessages = [
            $phone.'.required' => 'Enter phone number to load data',
            $phone.'.digits' => 'Phone must be 11 digits',
            'message.required'  => 'c\'mon, you want to contact me without saying anything?',
         ];

        $this->validate($request, $rules, $customMessages);

		$netData = Data::find($id);
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
        $loadPhone = $request->$phone;
		$cart->add($netData, $netData->id, $loadPhone);
		$request->session()->put('cart', $cart);
        return response()->json([
            'success' => 'Item has been succesfully added to cart',
            'details' => $netData->network." ".$netData->quantity." ".$netData->price,
            'load_phone' => $loadPhone,
            'totalQty' => $cart->totalQty,
        ]);
		//return redirect('/data/data-cart');
	}

	public function getCart()
	{
		if (!Session::has('cart')) {
			return view('data.data-cart');
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		return view('data.data-cart', ['data' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
	}

}
