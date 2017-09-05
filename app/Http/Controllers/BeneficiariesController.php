<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beneficiaries;

class BeneficiariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beneficiaries = Beneficiaries::where('user_id', auth()->user()->id)->get();
         return view('beneficiaries.create');
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
            return redirect()->back()->with('message', 'You must be logged in to send have beneficiaries');
        }

         $this->validate($request,[
            'name'=>'required|max:400',
            'phone'=>'required|max:11',
            'network'=>'required'
        ]);
        
         $beneficiaries= new Beneficiaries;
         $beneficiaries->name=$request->name;
         $beneficiaries->phone=$request->phone;
         $beneficiaries->network=$request->network;
         
         auth()->user()->Beneficiaries()->save($beneficiaries);
        
          return redirect()->back()->with('message','A new beneficiary has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Beneficiaries::find($id);
        return view('beneficiaries.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $k = Beneficiaries::find($id);
        return view('beneficiaries.edit',compact('k'));
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
         $this->validate($request,[
            'name'=>'required|max:400',
            'phone'=>'required|max:11',
            'network'=>'required'
        ]);
        
         $beneficiaries= Beneficiaries::find($id);
         $beneficiaries->name=$request->name;
         $beneficiaries->phone=$request->phone;
         $beneficiaries->network=$request->network;
         
         $beneficiaries->update();
         
         return redirect()->back()->with('message','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $k= Beneficiaries::find($id);
        $k->delete();
       return redirect()->back()->with('message','Successfully Deleted');
    }
}
