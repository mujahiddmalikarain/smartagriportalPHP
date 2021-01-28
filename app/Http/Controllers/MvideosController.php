<?php

namespace App\Http\Controllers;

use App\mvideos;
use Illuminate\Http\Request;

class MvideosController extends Controller
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
            'mvname' => 'required',
            'mvdescription' => 'required'
        ]);

        if($request->input('mvurl')||$request->hasFile('mvfile'))
        {
            //Handle File Upload
            if ($request->hasFile('mvfile')) {
                //Get Filename with Ext
                $fileNameWithExt = $request->file('mvfile')->getClientOriginalName();
                //Get just Filename
                $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
                //Get just extension
                $extension = $request->file('mvfile')->getClientOriginalExtension();
                //File to store
                $fileNameToStore = $fileName.'_'.time().'.'.$extension;
                //Upload Image
                $path = $request->file('mvfile')->storeAs('public/mvideos',$fileNameToStore);
            
            } else {
                $fileNameToStore = 'no_file';
            }
            
            
            $newMvideo = new mvideos;
            $newMvideo->name = $request->input('mvname');
            $newMvideo->file = $fileNameToStore; 
            $newMvideo->description = $request->input('mvdescription'); 
            if($request->input('mvurl'))
            {
                $newMvideo->url = $request->input('mvurl'); 
            } 
            $newMvideo->save();

            return back()->with('success','Video Added!');
        }
        else
        {
            return back()->with('success','Url or video file is missing!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mvideos  $mvideos
     * @return \Illuminate\Http\Response
     */
    public function show(mvideos $mvideos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mvideos  $mvideos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mvideo = mvideos::find($id);
        return view('admin.edit_mvideo')->with('mvideo',$mvideo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mvideos  $mvideos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('mvfile')) {
            //Get Filename with Ext
            $fileNameWithExt = $request->file('mvfile')->getClientOriginalName();
            //Get just Filename
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
            //Get just extension
            $extension = $request->file('mvfile')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('mvfile')->storeAs('public/mvideos',$fileNameToStore);
        
        } 
        
        $newMvideo = mvideos::find($id);
        if($request->input('mvname')){
            $newMvideo->name = $request->input('mvname');
        }
        if(isset($fileNameToStore)){
            $newMvideo->file = $fileNameToStore; 
        }
        if($request->input('mvdescription')){
            $newMvideo->description = $request->input('mvdescription'); 
        }
        if($request->input('mvurl'))
        {
            $newMvideo->url = $request->input('mvurl'); 
        } 
        $newMvideo->save();

        return back()->with('success','Video Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mvideos  $mvideos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mvideo = mvideos::find($id);
        $mvideo->delete();
        return back()->with('success','Video Deleted!');
    }
}
