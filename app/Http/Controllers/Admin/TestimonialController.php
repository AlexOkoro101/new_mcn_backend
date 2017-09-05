<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
    	$als = Testimonial::all();

    	return view('admin.testimonies', compact('als'));
    }

    public function approve(Request $request, $id)
    {
    	$al = Testimonial::find($id);

    	if ($request->approval === "on") {
    		$al->approval = 1;
    		$al->update();
    		return response()->json(['on' => "1",]);
    	} else {
    		$al->approval = 0;
	    	$al->update();
	    	return response()->json(['off' => "0",]);
    	}

    }
}
