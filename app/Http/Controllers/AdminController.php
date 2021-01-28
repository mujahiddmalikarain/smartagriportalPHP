<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\booklet;
use App\mvideos;
use App\crops;
use App\as_stories;
use App\soilHealth;

class AdminController extends Controller
{
    public function home()
    {
        $users = User::all();
        return view('admin.index')->with('users',$users);
    }

    public function changeUserStatus(Request $request)
    {
        $user = User::find($request->input('id'));
        if($user->status=="Active")
        {
            $user->status = "Ban";
        }
        else
        {  
            $user->status = "Active";
        }
        $user->save();
        $users= User::all();
        return view('admin.index')->with('users',$users);
    }

    public function materials()
    {
        $booklets = booklet::all();
        $mvideos = mvideos::all();
        return view('admin.material')->with('booklets',$booklets)->with('mvideos',$mvideos);
    }

    public function crops()
    {
        $crops = crops::all();
        return view('admin.crops')->with('crops',$crops);
    }
    
    public function as_stories()
    {
        $as_stories = as_stories::all();
        return view('admin.as_stories')->with('as_stories',$as_stories);
    }

    public function soilHealth()
    {
        $soil_healths = soilHealth::all();
        return view('admin.soil_health')->with('soil_healths',$soil_healths);
    }
}
