<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branding;
use Mail;

class BrandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('branding.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('branding.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'name'=>'required|max:400',
            'email'=>'required',
            'webspec'=>'required',
            'description'=>'required|max:2000'
        ]);
        
         $branding= new Branding;
         $branding->name=$request->name;
         $branding->email=$request->email;
         $branding->webspec=$request->webspec;
         $branding->description=$request->description;

         $branding->save();

          Mail::send('emails.confirmation', ['branding' => '$branding'], function($message)use ($branding)
                 {
                    $message->to($branding->email,$branding->name)->cc('admin@emighty.ng')->subject('Welcome!');
                });


        return redirect()->back()->with('message','Your Branding quote has been delivered,We will get back to you !!!');
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
