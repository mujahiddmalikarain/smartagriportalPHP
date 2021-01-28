<?php

namespace App\Http\Controllers;

use App\fourm;
use Illuminate\Http\Request;
use Auth;
class FourmController extends Controller
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
            'description' => 'required'
        ]);
        //Handle File Upload
        if ($request->hasFile('ffile')) {
            //Get Filename with Ext
            $fileNameWithExt = $request->file('ffile')->getClientOriginalName();
            //Get just Filename
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
            //Get just extension
            $extension = $request->file('ffile')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('ffile')->storeAs('public/fourm',$fileNameToStore);
        
        } else {
            $fileNameToStore = 'no_file';
        }
        
        $newFourm = new fourm;
        $newFourm->file = $fileNameToStore; 
        $newFourm->description = $request->input('description'); 
        $newFourm->user_id = Auth::user()->id;
        $newFourm->save();

        return back()->with('success','Post Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\fourm  $fourm
     * @return \Illuminate\Http\Response
     */
    public function show(fourm $fourm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fourm  $fourm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = fourm::find($id);
        return view('farmer.edit_post')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fourm  $fourm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('ffile')) {
            //Get Filename with Ext
            $fileNameWithExt = $request->file('ffile')->getClientOriginalName();
            //Get just Filename
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
            //Get just extension
            $extension = $request->file('ffile')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('ffile')->storeAs('public/fourm',$fileNameToStore);
        
        } 
        $newFourm = fourm::find($id);
        if(isset($fileNameToStore)){
            $newFourm->file = $fileNameToStore; 
        }
       if($request->input('description')){
        $newFourm->description = $request->input('description'); 
       }
        
        $newFourm->save();

        return back()->with('success','Post Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fourm  $fourm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fourm = fourm::find($id);
        $fourm->delete();
        return back()->with('success','Post Deleted!');
    }
}
