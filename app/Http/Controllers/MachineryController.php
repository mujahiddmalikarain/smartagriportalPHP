<?php

namespace App\Http\Controllers;

use App\machinery;
use Illuminate\Http\Request;
use App\resources;
use Auth;

class MachineryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = resources::where('res_type','Machinery')->where('user_id',Auth::user()->id)->get();
        return view('private_vendor.machinery')->with('resources',$resources);
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
        $newResource->res_type = "Machinery";
        $newResource->save();

        return back()->with('success','Machinery Successfully Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\machinery  $machinery
     * @return \Illuminate\Http\Response
     */
    public function show(machinery $machinery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\machinery  $machinery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $machinery = resources::find($id);
        return view('private_vendor.edit_machinery')->with('machinery',$machinery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\machinery  $machinery
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

        return back()->with('success','Machinery Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\machinery  $machinery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $machinery = resources::find($id);
        $machinery->delete();
        return back()->with('success','Machinery Deleted!');
    }
}
