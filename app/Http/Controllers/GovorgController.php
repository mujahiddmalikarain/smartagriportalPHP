<?php

namespace App\Http\Controllers;

use App\govorg;
use Illuminate\Http\Request;
use Auth;
use App\User;
class GovorgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gov = govorg::where('user_id',Auth::user()->id)->first();
        if($gov)
        {
            return view('gov_vendor.index')->with('gov',$gov);
        }
        else
        {
            return view('gov_vendor.index');
        }
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
         //Handle File Upload
         if ($request->hasFile('oicon')) {
            //Get Filename with Ext
            $fileNameWithExt = $request->file('oicon')->getClientOriginalName();
            //Get just Filename
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
            //Get just extension
            $extension = $request->file('oicon')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('oicon')->storeAs('public/go_icons',$fileNameToStore);
        
        }
    
        
        $check = govorg::where('user_id',Auth::user()->id)->first();
        $user = User::find(Auth::user()->id);
        if($check)
        {
            
            if ($request->hasFile('oicon')) {
                Storage::delete('public/go_icons/'.$check->icon);
                $check->icon = $fileNameToStore;
            }
            if($request->input('name'))
            {
                $user->name=$request->input('name');
            }
            if($request->input('email'))
            {
                $user->email=$request->input('email');
            }
            if($request->input('ph'))
            {
                $check->ph=$request->input('ph');
            }
            if($request->input('country'))
            {
                $check->country=$request->input('country');
            }
            if($request->input('msg'))
            {
                $check->message=$request->input('msg');
            }
           
            $check->save();
        }
        else
        {
            $gov = new govorg;
            if($request->input('name'))
            {
                $user->name=$request->input('name');
            }
            if($request->input('email'))
            {
                $user->email=$request->input('email');
            }
            if($request->input('ph'))
            {
                $gov->ph=$request->input('ph');
            }
            if($request->input('country'))
            {
                $gov->country=$request->input('country');
            }
            if($request->input('msg'))
            {
                $gov->message=$request->input('msg');
            }
            if($request->hasFile('oicon'))
            {
                $gov->icon=$fileNameToStore;
            }
            $gov->user_id=Auth::user()->id;
            $gov->save();
        }
        $user->save();
        return back()->with('success','Profile Updated'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\govorg  $govorg
     * @return \Illuminate\Http\Response
     */
    public function show(govorg $govorg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\govorg  $govorg
     * @return \Illuminate\Http\Response
     */
    public function edit(govorg $govorg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\govorg  $govorg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, govorg $govorg)
    {
        if ($request->hasFile('icon')) {
            //Get Filename with Ext
            $fileNameWithExt = $request->file('icon')->getClientOriginalName();
            //Get just Filename
            $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME );
            //Get just extension
            $extension = $request->file('icon')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('icon')->storeAs('public/go_icons',$fileNameToStore);
        
        }
    

        $check = govorg::find($id)->first();
        $user = User::find(Auth::user()->id);
        if($check)
        {
            
            if ($request->hasFile('icon')) {
                Storage::delete('public/go_icons/'.$check->icon);
                $check->icon = $fileNameToStore;
            }
            if($request->input('name'))
            {
                $user->name=$request->input('name');
            }
            if($request->input('email'))
            {
                $user->email=$request->input('email');
            }
            if($request->input('ph'))
            {
                $check->ph=$request->input('ph');
            }
            if($request->input('msg'))
            {
                $check->msg=$request->input('msg');
            }
            $check->save();
        }
        else
        {
            $gov = new govorg;
            if($request->input('name'))
            {
                $user->name=$request->input('name');
            }
            if($request->input('email'))
            {
                $user->email=$request->input('email');
            }
            if($request->input('ph'))
            {
                $gov->ph=$request->input('ph');
            }
            if($request->input('msg'))
            {
                $gov->msg=$request->input('msg');
            }
            if($request->hasFile('icon'))
            {
                $gov->icon=$fileNameToStore;
            }
            $gov->save();
        }
    
        return back()->with('success','Profile Updated'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\govorg  $govorg
     * @return \Illuminate\Http\Response
     */
    public function destroy(govorg $govorg)
    {
        //
    }
}
