<?php

namespace App\Http\Controllers;

use App\Beneficiaries;
use App\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Image;

class UserController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	    $this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index()
	{   
		$beneficiaries = Beneficiaries::where('user_id', auth()->user()->id)->get();
	    return view('user.account', compact('beneficiaries'));
	}

	public function personal()
	{	
		$user = auth()->user();
		return view('user.personal', compact('user'));
	}

	public function beneficiaries()
	{    
		$beneficiaries = Beneficiaries::where('user_id', auth()->user()->id)->get();
		return view('user.beneficiaries', compact('beneficiaries'));
	}

	/***public function beneficiariesUpdate(Request $request)
	{
		$user = auth()->user();
		$user->beneficiaries;
		$user->save();

		return view('user.beneficiariesupdate');
	}**/

	public function preferences()
	{
		return view('user.preferences');
	}

	public function update(Request $request)
	{
		$user = auth()->user();

		$this->validate($request, [
		    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		    'name' => 'required|min:3',
		    'phone'=> 'required|size:11',
		    'email' => 'required|email'
		]);

		$user->name = $request->name;
		$user->email = $request->email;
		$user->phone = $request->phone;
		
		if ($request->file('image')){
			$filename = $user->id."/".$request->file('image')->getClientOriginalname();
			$filename_thumb = $user->id."/"."thumb".$request->file('image')->getClientOriginalname();

			//$image_thumb = Image::make($request->file('image'))->resize(100, null)->stream();

			$image = Image::make($request->file('image'))->resize(300, null, function ($c) {
    			$c->aspectRatio();
    			//$c->upsize();
			});

			$image_thumb = Image::make($request->file('image'))->resize(64, null, function ($c) {
    			$c->aspectRatio();
    			//$c->upsize();
			});

			$uploaded = Storage::disk('local')->put($filename, $image->encode('jpg'));
			$upload_thumb = Storage::disk('local')->put($filename_thumb, $image_thumb->encode('jpg'));

			$user->image = $filename;


		}

		$user->update();

		if ($user->update()) {
			return back()->with('success','Account successfully updated');
		}

		return back()->with('failure','Error!, Account not updated');
	}

	public function passForm()
	{
		$user = auth()->user();
		return view('user.password', compact('user'));
	}

	public function passUpdate(Request $request)
	{

    	$this->validate($request, [
			'old_password' => 'required',
			'password' => 'required|min:4|confirmed',
			'password_confirmation' => 'required|min:4'
			]);

        $user = auth()->user();

        if (Hash::check(Input::get('old_password'), $user['password']) && Input::get('password_confirmation')) {
        	
        	$user->password = bcrypt(Input::get('password'));
        	$user->update();

        	return redirect('/account/pass')->with('success', 'Password Changed');
        } else {
        	return redirect('/account/pass')->with('failure', 'Password not changed!!');
        }
	}

}
