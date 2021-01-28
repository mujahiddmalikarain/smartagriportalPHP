<?php

namespace App\Http\Controllers;

use App\pesticide;
use Illuminate\Http\Request;
use App\resources;
use Auth;

class PesticideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = resources::where('res_type','Pesticide')->where('user_id',Auth::user()->id)->get();
        return view('private_vendor.pesticide')->with('resources',$resources);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'exp_date' => 'required',
            'price' => 'required'
        ]);

        $newResource = new resources;
        $newResource->name = $request->input('name'); 
        $newResource->description = $request->input('description');  
        $newResource->status = $request->input('status'); 
        $newResource->exp_date = $request->input('exp_date');
        $newResource->price = $request->input('price');
        $newResource->user_id = Auth::user()->id;
        $newResource->res_type = "Pesticide";
        $newResource->save();

        return back()->with('success','Pesticide Successfully Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pesticide  $pesticide
     * @return \Illuminate\Http\Response
     */
    public function show(pesticide $pesticide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pesticide  $pesticide
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesticide = resources::find($id);
        return view('private_vendor.edit_pesticide')->with('pesticide',$pesticide);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pesticide  $pesticide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newResource = resources::find($id);
        if($request->input('name')){
            $newResource->name = $request->input('name'); 
        }
        if($request->input('description')){
            $newResource->description = $request->input('description'); 
        }
        if($request->input('status')){
            $newResource->status = $request->input('status'); 
        }
        if($request->input('exp_date')){
            $newResource->exp_date = $request->input('exp_date');
        }
        if($request->input('price')){
            $newResource->price = $request->input('price');
        }
        if($request->input('status')){
            $newResource->status = $request->input('status');
        }
        $newResource->save();

        return back()->with('success','Pesticide Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pesticide  $pesticide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesticide = resources::find($id);
        $pesticide->delete();
        return back()->with('success','Pesticide Deleted!');
    }
}
