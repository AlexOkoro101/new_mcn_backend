<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support;
use App\Thread;
use Illuminate\Http\Request;

class SupportController extends Controller
{
	public function __construct()
	{
		return $this->middleware('admin');
	}

    public function index()
    {
    	$supports = Support::all();
    	return view('admin.support', compact('supports'));
    }

    public function edit($id)
    {
    	$support = Support::findOrFail($id);
    	$replies = Thread::where('support_id', $id)->get();
    	return view('admin.view-support', compact('support', 'replies'));
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

    public function delete($id)
    {
    	$support = Support::findOrFail($id);
    	$support->delete();
    }

    public function close(Request $request)
    {
    	$support = Support::find($request->support_id);
    	$support->status = 0;
    	$support->update();
    	return redirect()->back()-with('success', 'Ticket successfuly closed');
    }
}
