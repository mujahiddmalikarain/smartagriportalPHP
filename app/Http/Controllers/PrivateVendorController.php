<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\private_org;
use Auth;
use App\User;

class PrivateVendorController extends Controller
{
    public function index()
    {
        $gov = private_org::where('user_id',Auth::user()->id)->first();
        if($gov)
        {
            return view('private_vendor.index')->with('gov',$gov);
        }
        else
        {
            return view('private_vendor.index');
        }
        
    }
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
            $path = $request->file('oicon')->storeAs('public/po_icons',$fileNameToStore);
        
        }
    
        
        $check = private_org::where('user_id',Auth::user()->id)->first();
        $user = User::find(Auth::user()->id);
        if($check)
        {
            
            if ($request->hasFile('oicon')) {
                //Storage::delete('public/po_icons/'.$check->icon);
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
            $user->save();
            $check->save();
        }
        else
        {
            $gov = new private_org;
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
            $user->save();
            $gov->save();
        }
    
        return back()->with('success','Profile Updated'); 
    }
}
