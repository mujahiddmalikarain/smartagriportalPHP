<?php

namespace App\Http\Controllers;

use App\crops;
use Illuminate\Http\Request;

class CropsController extends Controller
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
            'about_soil' => 'required',
            'about_climate' => 'required',
            'products' => 'required',
            'diseases' => 'required'
        ]);
        

        $newCrop = new crops;
        $newCrop->name = $request->input('name'); 
        $newCrop->description = $request->input('description');  
        $newCrop->about_soil = $request->input('about_soil'); 
        $newCrop->about_climate = $request->input('about_climate');
        $newCrop->products = $request->input('products');
        $newCrop->diseases = $request->input('diseases');
        $newCrop->save();

        return back()->with('success','Crop Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\crops  $crops
     * @return \Illuminate\Http\Response
     */
    public function show(crops $crops)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\crops  $crops
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crop=crops::find($id);
        return view('admin.edit_crops')->with('crop',$crop);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\crops  $crops
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newCrop = crops::find($id);
        if($request->input('name')){
            $newCrop->name = $request->input('name'); 
            
        }
        if($request->input('description')){
            $newCrop->description = $request->input('description');  
            
        }
        if($request->input('about_soil')){
            $newCrop->about_soil = $request->input('about_soil'); 
            
        }
        if($request->input('about_climate')){
            $newCrop->about_climate = $request->input('about_climate');
            
        }
        if($request->input('products')){
            $newCrop->products = $request->input('products');
            
        }
        if($request->input('diseases')){
            $newCrop->diseases = $request->input('diseases');
        }
        
        $newCrop->save();

        return back()->with('success','Crop Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\crops  $crops
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crop = crops::find($id);
        $crop->delete();
        return back()->with('success','Crop Deleted!');
    }
}
