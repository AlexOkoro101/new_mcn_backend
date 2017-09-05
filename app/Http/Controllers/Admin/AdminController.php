<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\PageView;
use App\Support;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
	public function __construct()
	{
	    $this->middleware('admin', ['except' => ['showLogin', 'authenticate', 'logout']]);
    }

    public function index()
    {
        $dayOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        $now = Carbon::now();

        $users = User::all();

        $visits = PageView::all();
        $visit = count($visits);

        $dayOfWeekVisits = array(
            "Sunday" => 0,
            "Monday" => 0,
            "Tuesday" => 0,
            "Wednesday" => 0,
            "Thursday" => 0,
            "Friday" => 0,
            "Saturday" => 0,
        );

        $dayOfWeekVisits[$dayOfWeek[$now->dayOfWeek]] += 1;

        $orders = Order::all();
        $purchase = 0;
        foreach ($orders as $p) {
            $purchase += $p->amount;
        }

        $recentOrders = Order::orderBy('created_at', 'desc')->get()->take(5);
        $recentSupports = Support::orderBy('created_at', 'desc')->get()->take(5);

        $dayOfWeekData = array(
            "Sunday" => [],
            "Monday" => [],
            "Tuesday" => [],
            "Wednesday" => [],
            "Thursday" => [],
            "Friday" => [],
            "Saturday" => [],
        );

        $i = 1;

        $mtnWeek = array(
            "Sunday" => [],
            "Monday" => [],
            "Tuesday" => [],
            "Wednesday" => [],
            "Thursday" => [],
            "Friday" => [],
            "Saturday" => [],
        );

        $gloWeek = array(
            "Sunday" => [],
            "Monday" => [],
            "Tuesday" => [],
            "Wednesday" => [],
            "Thursday" => [],
            "Friday" => [],
            "Saturday" => [],
        );

        $airtelWeek = array(
            "Sunday" => [],
            "Monday" => [],
            "Tuesday" => [],
            "Wednesday" => [],
            "Thursday" => [],
            "Friday" => [],
            "Saturday" => [],
        );

        $etisalatWeek = array(
            "Sunday" => [],
            "Monday" => [],
            "Tuesday" => [],
            "Wednesday" => [],
            "Thursday" => [],
            "Friday" => [],
            "Saturday" => [],
        );

        if($orders){
            /*
                First group orders into days of the week
             */
            foreach($orders as $order) {
                $dayOfWeekData[$dayOfWeek[$order->created_at->dayOfWeek]][] = $order;
            }

            /*
                Regrouping of orders into each network type in a particular day
                here we have MTN orders for each day, Glo orders for each day and on...
             */
            foreach($dayOfWeekData as $key => $dow) {

                foreach ($dow as $order) {

                    foreach(unserialize($order->cart)->items as $k => $inner) {

                        if ($inner['network'] == "MTN") {
                            $mtnWeek[$key][] = $inner;
                        }

                        if ($inner['network'] == "AIRTEL") {
                            $airtelWeek[$key][] = $inner;
                        }

                        if ($inner['network'] == "GLO") {
                            $gloWeek[$key][] = $inner;
                        }

                        if ($inner['network'] == "ETISALAT") {
                            $etisalatWeek[$key][] = $inner;
                        }
                    }
                }
            }

            /*
                Get total amount for each day irrespective of network
             */
            $dailyTotals = [
                "Sunday" => [0,0],
                "Monday" => [0,0],
                "Tuesday" => [0,0],
                "Wednesday" => [0,0],
                "Thursday" => [0,0],
                "Friday" => [0,0],
                "Saturday" => [0,0],
            ];

            foreach($dayOfWeekData as $i => $j) {
                foreach ($j as $l => $m) {
                    $dailyTotals[$i][0] += $m->amount;
                }
            }


            /*
                Get total quantity of data for each day irrespective of network
             */
            foreach($dayOfWeekData as $i => $j) {
                foreach ($j as $l => $m) {
                    foreach(unserialize($m->cart)->items as $k => $inner) {
                        if ($inner['network'] == "AIRTEL") {
                            $dailyTotals[$i][1] += intval(substr($inner['quantity'], 0, -2));
                        }
                    }
                }
            }

            /*
                Obtain corresponding sales as shown in the variable names below
             */
            $todaySales = 0;
            $yesterdaySales = 0;
            $yesterdayOrders = 0;
            $thisWeekSales = 0;
            $thisWeekOrders = 0;
            $thisMonthSales = 0;
            $thisYearSales = 0;

            foreach ($orders as $order){
                //dd($order->created_at->weekOfYear);
                if ($order->created_at->dayOfYear == $now->dayOfYear){
                    $todaySales += $order->amount;
                }

                if ($order->created_at->weekOfYear == $now->weekOfYear){
                    $thisWeekSales += $order->amount;
                    $thisWeekOrders += 1;
                }

                if ($order->created_at->month == $now->month){
                    $thisMonthSales += $order->amount;
                }

                if ($order->created_at->year == $now->year){
                    $thisYearSales += $order->amount;
                }

                if ($order->created_at->dayOfYear == $now->dayOfYear - 1){
                    $yesterdayOrders += 1;
                    $yesterdaySales += $order->amount;
                }
            }
        }

        return view('admin.dashboard', compact('users', 'visit', 'orders', 'recentOrders', 'recentSupports', 'purchase', 'mtnWeek', 'gloWeek', 'airtelWeek', 'etisalatWeek', 'dailyTotals', 'todaySales', 'thisWeekSales', 'thisMonthSales', 'thisYearSales', 'thisWeekOrders', 'yesterdayOrders', 'yesterdaySales'));
    }

    public function showLogin()
    {
        return view('admin.login');
    }

	/**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required'
    	]);

    	$email = $request->email;
    	$password = $request->password;
    	$remember = $request->remember;

        if (Auth::attempt(['email' => $email, 'password' => $password, 'role_id' => 2], $remember)) {
            // Authentication passed...
            $user = Auth::user();
            Auth::login($user);
            return redirect()->route('admin_home');
        }

        return redirect()->back()->with('failure', 'Login failed contact support');
    }

	/**
	* Log the user out of the application.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
    public function logout(Request $request)
    {
		$this->guard()->logout();

		$request->session()->flush();

		$request->session()->regenerate();

		return redirect()->route('admin_login');
    	
    }

}
