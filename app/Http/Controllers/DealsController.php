<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DealsController extends Controller
{
    public function create()
    {
        return view('deals');
    }
}
