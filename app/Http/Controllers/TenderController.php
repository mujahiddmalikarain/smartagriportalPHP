<?php

namespace App\Http\Controllers;

use App\tender;
use Illuminate\Http\Request;
use Auth;
class TenderController extends Controller
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
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'type' => 'required'
        ]);
         //Handle File Upload
         if ($request->hasFile('loan_file')) {
            //Get Filename with Ext
            $fileNameWithExt = $request->file('loan_file')->getClientOriginalName();
            //Get just Filename
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
            //Get just extension
            $extension = $request->file('loan_file')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('loan_file')->storeAs('public/tender_files',$fileNameToStore);
        
        } else {
            $fileNameToStore = 'no_file';
        }

        $newLoan = new tender;
        $newLoan->file = $fileNameToStore; 
        $newLoan->about = $request->input('title'); 
        $newLoan->description = $request->input('description');  
        $newLoan->last_date = $request->input('date'); 
        $newLoan->type = $request->input('type');
        $newLoan->user_id = Auth::user()->id;
        $newLoan->save();

        return back()->with('success','New Tender details added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function show(tender $tender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tender = tender::find($id);
        return view('gov_vendor.edit_tender')->with('tender',$tender);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Handle File Upload
        if ($request->hasFile('loan_file')) {
            //Get Filename with Ext
            $fileNameWithExt = $request->file('loan_file')->getClientOriginalName();
            //Get just Filename
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
            //Get just extension
            $extension = $request->file('loan_file')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('loan_file')->storeAs('public/loan_files',$fileNameToStore);
        
        } 

        $tender = tender::find($id);
        if(isset($fileNameToStore)){
            $tender->file = $fileNameToStore; 
        }
        if($request->input('title')){
            $tender->about = $request->input('title'); 
        }
        if($request->input('description')){
            $tender->description = $request->input('description');  
        }
        if($request->input('date')){
            $tender->last_date = $request->input('date'); 
        }
        if($request->input('type')){
            $tender->type = $request->input('type');
        }
        
        $tender->save();

        return back()->with('success','Tender details Updated!');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tender = tender::find($id);
        $tender->delete();
        return back()->with('success','Tender Deleted!');
    }
}
