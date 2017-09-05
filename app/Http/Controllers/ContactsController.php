<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;
use Mail;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
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
            'description'=>'required|max:2000'
        ]);
        
         $contacts= new Contacts;
         $contacts->name=$request->name;
         $contacts->email=$request->email;
         $contacts->description=$request->description;

         $contacts->save();

           Mail::send('emails.confirmation', ['contacts' => '$contacts'], function($message)use ($contacts)
                 {
                    $message->to($contacts->email,$contacts->name)->cc('admin@mighty.ng')->subject('Welcome !');
                });



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
