<?php

namespace App\Http\Controllers;

use App\loan;
use Illuminate\Http\Request;
use Auth;
use App\tender;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = loan::where('user_id',Auth::user()->id)->get();
        $tenders = tender::where('user_id',Auth::user()->id)->get();
        return view('gov_vendor.financial')->with('loans',$loans)->with('tenders',$tenders);
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
            $path = $request->file('loan_file')->storeAs('public/loan_files',$fileNameToStore);
        
        } else {
            $fileNameToStore = 'no_file';
        }

        $newLoan = new loan;
        $newLoan->file = $fileNameToStore; 
        $newLoan->about = $request->input('title'); 
        $newLoan->description = $request->input('description');  
        $newLoan->last_date = $request->input('date'); 
        $newLoan->type = $request->input('type');
        $newLoan->user_id = Auth::user()->id;
        $newLoan->save();

        return back()->with('success','New Loan details added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loan = loan::find($id);
        return view('gov_vendor.edit_loan')->with('loan',$loan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\loan  $loan
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

        $newLoan = loan::find($id);
        if(isset($fileNameToStore)){
            $newLoan->file = $fileNameToStore; 
        }
        if($request->input('title')){
            $newLoan->about = $request->input('title'); 
        }
        if($request->input('description')){
            $newLoan->description = $request->input('description');  
        }
        if($request->input('date')){
            $newLoan->last_date = $request->input('date'); 
        }
        if($request->input('type')){
            $newLoan->type = $request->input('type');
        }
        
        $newLoan->save();

        return back()->with('success','Loan details Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loan = loan::find($id);
        $loan->delete();
        return back()->with('success','Loan Deleted!');
    }
}
