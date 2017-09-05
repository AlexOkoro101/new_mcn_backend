<?php

namespace App\Http\Controllers;

use App\Support;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SupportController extends Controller
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

    public function index()
	{
		return view('user.support');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'min:4',
			'email' => 'required|email',
			'subject' => 'required|max:50',
			'message' => 'required|max:4000',
			'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		$sup_id_counter = 0;
		$sup = Support::orderBy('created_at', 'desc')->first();

		if ($sup == null) {
		    $sup_id_counter = 1;
		} else { 
		    $sup_id_counter = $sup->id++;
		}

		$user = auth()->user();
		$filename = "";
		if ($request->file('image')){
			$filename = $sup_id_counter."/".$request->file('image')->getClientOriginalname();
            $image = Image::make($request->file('image'))->resize(300, null, function ($c) {
                $c->aspectRatio();
            });

            $uploaded = Storage::disk('support')->put($filename, $image->encode('jpg'));
		}

		$support = Support::create([
			'user_id' => $user->id,
			'name' => $request->name,
			'email' => $request->email,
			'subject' => $request->subject,
			'message' => $request->message,
			'image' => $filename,
			]);

		if ($support){
			return redirect()->back()->with('success', 'Support ticket opened');
		}

		return redirect()->back()->with('failure', 'Error! check your form submission');
	}
	
	public function show()
	{
		$supports = Support::where('user_id', auth()->user()->id)->get();
		return view('user.ticket', compact('supports'));
	}

	public function view($user_id, $id)
	{
		if (intval($user_id) !== auth()->user()->id) {
			return redirect()->back();
		}
		$support = Support::find($id);
		$replies = Thread::where('support_id', $id)->get();
		return view('user.view-ticket', compact('support', 'replies'));
	}

	public function reply(Request $request)
	{
		$thread = new Thread();
		$thread->user_id = auth()->user()->id;
		$thread->support_id = $request->support_id;
		$thread->message = $request->message;
		$thread->save();

		return redirect()->back();
	}
}
