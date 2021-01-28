<?php

namespace App\Http\Controllers;

use App\booklet;
use Illuminate\Http\Request;

class BookletController extends Controller
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
            'bookletfile' => 'required'
        ]);
        //Handle File Upload
        if ($request->hasFile('bookletfile')) {
            //Get Filename with Ext
            $fileNameWithExt = $request->file('bookletfile')->getClientOriginalName();
            //Get just Filename
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
            //Get just extension
            $extension = $request->file('bookletfile')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('bookletfile')->storeAs('public/booklets',$fileNameToStore);
        
        } else {
            $fileNameToStore = 'no_file';
        }
        
        $newBookletname = $request->input('name');

        $newBooklet = new booklet;
        $newBooklet->name = $newBookletname;
        $newBooklet->file = $fileNameToStore; 
        $newBooklet->description = $request->input('description');   
        $newBooklet->save();

        return back()->with('success','Booklet Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\booklet  $booklet
     * @return \Illuminate\Http\Response
     */
    public function show(booklet $booklet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\booklet  $booklet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booklet = booklet::find($id);
        return view('admin.edit_booklet')->with('booklet',$booklet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\booklet  $booklet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Handle File Upload
        if ($request->hasFile('bookletfile')) {
            //Get Filename with Ext
            $fileNameWithExt = $request->file('bookletfile')->getClientOriginalName();
            //Get just Filename
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
            //Get just extension
            $extension = $request->file('bookletfile')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('bookletfile')->storeAs('public/booklets',$fileNameToStore);
        
        } 
        

        $newBooklet = booklet::find($id);

        if($request->input('name')){
            $newBooklet->name =  $newBookletname = $request->input('name');
        }
        if(isset($fileNameToStore)){
            $newBooklet->file = $fileNameToStore; 
        }
        if($request->input('description')){
            $newBooklet->description = $request->input('description'); 
        }

        $newBooklet->save();

        return back()->with('success','Booklet Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\booklet  $booklet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booklet = booklet::find($id);
        $booklet->delete();
        return back()->with('success','Booklet Deleted!');
    }
}
