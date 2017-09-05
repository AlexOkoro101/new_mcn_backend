<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function privacy()
    {
    	return view('privacy');
    }

    public function terms()
    {
    	return view('terms');
    }

    public function careers()
    {
    	return view('careers');
    }

    public function contact()
    {
    	return view('contact');
    }

   public function about()
    {
    	return view('about');
    }

     public function testing()
    {
        return view('testin');
    }

    public function testing2()
    {
        return view('testing');
    }


}
