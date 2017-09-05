<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Testimonial;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function index()
    {
        
    	$testimonies = Testimonial::all();
        return view('home', compact('testimonies'));
    }
}
