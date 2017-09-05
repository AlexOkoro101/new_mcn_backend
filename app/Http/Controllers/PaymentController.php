<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Paystack;

class PaymentController extends Controller
{
    /**
     * Redirect the User to Paid Invoice Page
     * @return  Url
     */
    public function paid(Request $request)
    {
        if (Session::has('paymentDetails')) {
            $paymentDetails = Session::get('paymentDetails');
            $invoice = Order::where('payment_id', '=', $paymentDetails['data']['id'])->get()->first();
            $orderID = $invoice->id;
            $name = $invoice->name;
            $amount = $invoice->amount;
            $date = $invoice->created_at->toDayDateTimeString();
            $phone = $invoice->phone;
            $cart = unserialize($invoice->cart);
            $data = $cart->items;
            $request->session()->forget('cart');
            $request->session()->forget('paymentDetails');
            return view('invoice.paid', compact('orderID', 'name', 'amount', 'date', 'phone', 'cart', 'data'));
        }
        
        return redirect('/data/data-cart');
    }

    /**
     * Redirect the User to Unpaid Invoice Page
     * @return Url
     */
    public function deposit(Request $request)
    {
        $str = 'abcdefghijklmnopqrstuvwxyz';
        $shuffled = str_shuffle($str);
        $num = rand();

        $orderID = substr($num,5).substr($shuffled, 10);

        $oldOrder = Deposit::where('deposit_id', '=', $orderID)->first();

        while ($oldOrder !== null) {
            $num = rand();
            $shuffled = str_shuffle($str);
            $orderID = substr($num,5).substr($shuffled, 10);
        }

        $cart = Session::get('cart');
        $data = $cart->items;

        $newOrder = new Deposit();
        $newOrder->deposit_id = $orderID;
        $newOrder->cart = serialize($cart);
        auth()->user()->deposits()->save($newOrder);

        $phone = $request->phone;
        $name = auth()->user()->name;
        $amount = substr($request->amount, 0, -2);
        $date = Carbon::now()->toDayDateTimeString();

        $request->session()->flush();

        return view('invoice.unpaid', compact('orderID', 'name', 'amount', 'data', 'cart', 'phone', 'date'));
    }

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback(Request $request)
    {
        $paymentDetails = Paystack::getPaymentData();

        $order = new Order();
        $order->name = auth()->user()->name;
        $order->amount = substr($paymentDetails['data']['amount'], 0, -2);
        $order->payment_id = $paymentDetails['data']['id'];
        $order->payment_reference = $paymentDetails['data']['reference'];
        $order->payment_date = $paymentDetails['data']['transaction_date'];
        $order->cart = serialize(Session::get('cart'));
        $order->pay_details = serialize($paymentDetails);
        $order->email = auth()->user()->email;
        auth()->user()->orders()->save($order);

        $request->session()->put('paymentDetails', $paymentDetails);

        return redirect('/checkout/success');
    }
}