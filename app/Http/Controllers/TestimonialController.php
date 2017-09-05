<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonies = Testimonial::paginate(10);
        
        return view('testimonial.create', compact('testimonies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        if(!auth()->user()){
            return redirect()->back()->with('message', 'You must be logged in to send testimonial');
        }

        $this->validate($request,[
            'name'=>'required|max:100',
            'email'=>'required',
            'location'=>'required',
            'webspec'=>'required',
            'message'=>'required|max:2000'
        ]);
        
         $testimonial= new Testimonial;
         $testimonial->name=$request->name;
         $testimonial->email=$request->email;
         $testimonial->location=$request->location;
         $testimonial->message=$request->message;
         $testimonial->webspec=$request->webspec;

         auth()->user()->testimonials()->save($testimonial);

        return redirect()->back()->with('message','Your message has been delivered,We will get back to you !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
