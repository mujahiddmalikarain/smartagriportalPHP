<?php

namespace App\Http\Controllers;

use App\soilHealth;
use Illuminate\Http\Request;

class SoilHealthController extends Controller
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
            'soil_type' => 'required',
            'nutrinal' => 'required',
            'dring_quality' => 'required',
            'intake_rate' => 'required',
            'field_capacity' => 'required',
            'suitable_crops' => 'required',
            'composition' => 'required'
        ]);
        

        $newSHealth = new soilHealth;
        $newSHealth->soil_type = $request->input('soil_type'); 
        $newSHealth->nutrients = $request->input('nutrinal');  
        $newSHealth->dring_quality = $request->input('dring_quality'); 
        $newSHealth->intake_rate = $request->input('intake_rate');
        $newSHealth->field_capacity = $request->input('field_capacity');
        $newSHealth->suitable_crops = $request->input('suitable_crops');
        $newSHealth->composition = $request->input('composition');
        $newSHealth->save();

        return back()->with('success','Soil Health Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\soilHealth  $soilHealth
     * @return \Illuminate\Http\Response
     */
    public function show(soilHealth $soilHealth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\soilHealth  $soilHealth
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $soil_health = soilHealth::find($id);
        return view('admin.edit_soil_health')->with('soil_health',$soil_health);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\soilHealth  $soilHealth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newSHealth = soilHealth::find($id);
        if($request->input('soil_type')){
            $newSHealth->soil_type = $request->input('soil_type'); 
        }
        if($request->input('nutrinal')){
            $newSHealth->nutrients = $request->input('nutrinal');  
        }
        if($request->input('dring_quality')){
            $newSHealth->dring_quality = $request->input('dring_quality'); 
        }
        if($request->input('intake_rate')){
            $newSHealth->intake_rate = $request->input('intake_rate');
        }
        if($request->input('field_capacity')){
            $newSHealth->field_capacity = $request->input('field_capacity');   
        }
        if($request->input('suitable_crops')){
            $newSHealth->suitable_crops = $request->input('suitable_crops');
        }
        if($request->input('composition')){
            $newSHealth->composition = $request->input('composition');
        }
        
        $newSHealth->save();

        return back()->with('success','Soil Health Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\soilHealth  $soilHealth
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sh = soilHealth::find($id);
        $sh->delete();
        return back()->with('success','Soil Health Deleted!');
    }
}
