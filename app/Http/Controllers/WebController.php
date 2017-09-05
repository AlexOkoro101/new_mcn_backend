<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ConfirmationEmail;
use App\Web;
use Mail;


class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('web.create');
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
        
         $web= new Web;
         $web->name=$request->name;
         $web->email=$request->email;
         $web->webspec=$request->webspec;
         $web->description=$request->description;
         $web->save();
         Mail::send('emails.confirmation', ['web' => $web], function($message)use ($web)
                 {
                    $message->to($web->email,$web->name)->cc('adminr@mighty.ng')->subject('Welcome!');
                });

        return redirect()->back()->with('message','Your Web quote has been delivered,We will get back to you !!!');
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

    public function corporate(){ return view('web.corporate'); }
    public function schools(){ return view('web.schools'); }
    public function blogs(){ return view('web.blogs'); }
    public function shopping(){ return view('web.shopping'); }
}
