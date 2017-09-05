<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PageView;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $dayOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    protected $now = "";

    public function __construct()
    {
        $this->middleware('admin');
        $this->now = Carbon::now();
    }

    public function index()
    {
    	$users = User::all();
    	$roles = Role::all();
        $usersArray = [];

        foreach ($users as $user){
            if ($user->isOnline()) {
                $usersArray[] = $user->first_name." ".$user->email." "."Is Online";
            } else {
                $usersArray[] = $user->first_name." ".$user->email." "."Is NOT Online";
            }
        }

    	return view('admin.users',compact('users', 'roles', 'usersArray'));
    }

    public function edit(Request $request, $id)
    {
    	$user = User::find($id);
    	$user->role_id = $request->role;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->phone = $request->phone;

    	if ($request->status === "on") {
    		$user->status = 0;
    	} else {
    		$user->status = 1;
    	}

    	$user->update();

    	return response()->json([
    		'done' => 'User Successfully Added',
    	]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|digits:11|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $newUser = User::create([
            'role_id' => 1,
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        
        $newUser->save();

        return redirect('/admin/users')->with('success', 'User Successfully Added');
    }

    public function delete(Request $request, $id)
    {
        $delUser = User::find($id);
        $delUser->delete();
        $users = User::all();
        $roles = Role::all();

        return redirect('/admin/users')->with('success', 'User Successfully Deleted');
    }

    public function new()
    {
        $newUserExpires = Carbon::now()->subHours(24);

        $users = User::all();

        // Array to store new users for each day, to output in bar graph
        $newReg = array(
            "Sunday" => 0,
            "Monday" => 0,
            "Tuesday" => 0,
            "Wednesday" => 0,
            "Thursday" => 0,
            "Friday" => 0,
            "Saturday" => 0,
        );

        // getting all users who registered within 24 hours or in a day
        $newUsers = [];
        foreach ($users as $user) {
            if ($user->created_at->gt($newUserExpires)){
                $newUsers[] = $user;
            }

            if ($user->created_at->dayOfYear == $this->now->dayOfYear){
                $newReg[$this->dayOfWeek[$this->now->dayOfWeek]]++;
            } 
        }

        return view('admin.users_new', compact('newUsers', 'newReg'));
    }

    public function logged()
    {
        $users = User::all();
        $roles = Role::all();
        $usersArray = [];
        $online = 0;
        $offline = 0;
        foreach ($users as $user){
            if ($user->isOnline()) {
                $usersArray[] = [$user->first_name." ".$user->email, "Online"];
                $online++;
            } else {
                $usersArray[] = [$user->first_name." ".$user->email, "Offline"];
                $offline++;
            }
        }

        return view('admin.users_logged', compact('usersArray', 'online', 'offline'));
    }

    public function page(Request $request)
    {
        $pageViews = PageView::all();
        return view('admin.page_views', compact('pageViews'));
    }

}
