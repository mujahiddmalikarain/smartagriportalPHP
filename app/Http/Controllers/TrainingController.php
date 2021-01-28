<?php

namespace App\Http\Controllers;

use App\training;
use Illuminate\Http\Request;
use Auth;
class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = training::all();
        return view('gov_vendor.training')->with('trainings',$trainings);
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
            'tname' => 'required',
            'description' => 'required',
            'edate' => 'required',
            'cost' => 'required',
            'tags' => 'required',
        ]);
        //Handle File Upload
        if ($request->hasFile('image')) {
            //Get Filename with Ext
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //Get just Filename
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
            //Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('image')->storeAs('public/tranings',$fileNameToStore);
        
        } else {
            $fileNameToStore = 'no_file';
        }
        
        $newTrainingname = $request->input('tname');
        $newTraining = new training;
        $newTraining->name = $newTrainingname;
        $newTraining->image = $fileNameToStore; 
        $newTraining->date = $request->input('edate');   
        $newTraining->description = $request->input('description');   
        $newTraining->cost = $request->input('cost');   
        $newTraining->tags = $request->input('tags');   
        $newTraining->tags = Auth::user()->id;
        $newTraining->save();

        return back()->with('success','Training Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(training $training)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $training = training::find($id);
        return view('gov_vendor.edit_training')->with('training',$training);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Handle File Upload
        if ($request->hasFile('image')) {
            //Get Filename with Ext
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //Get just Filename
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
            //Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('image')->storeAs('public/tranings',$fileNameToStore);
        
        }
        
        $newTraining = training::find($id);
        if($request->input('tname')){
            $newTraining->name = $request->input('tname');
        } 
        if(isset($fileNameToStore)){
            $newTraining->image = $fileNameToStore; 
        } 
        if($request->input('edate')){
            $newTraining->date = $request->input('edate'); 
        }   
        if($request->input('description')){
            $newTraining->description = $request->input('description');  
        }  
        if($request->input('cost')){
            $newTraining->cost = $request->input('cost'); 
        }   
        if($request->input('tags')){
            $newTraining->tags = $request->input('tags');
        }    
        $newTraining->save();

        return back()->with('success','Training Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = training::find($id);
        $training->delete();
        return back()->with('success','Training Deleted!');
    }
}
