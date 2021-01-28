<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\private_org;
use App\govorg;
use App\tender;
use App\loan;
use App\training;
use App\booklet;
use App\mvideos;
use App\as_stories;
use App\soilHealth;

use App\resources;
use App\fourm;
use DB;
class FarmerController extends Controller
{
    public function home()
    {
        $posts = DB::table('users')
        ->join('fourm', 'users.id', '=', 'fourm.user_id')
        ->select('users.name','fourm.description','fourm.file', 'fourm.created_at')
        ->get();
        return view('farmer.index')->with('posts',$posts);
    }
    public function private()
    {
        $orgs = DB::table('private_org')
        ->join('users', 'users.id', '=', 'private_org.user_id')
        ->select('users.name','private_org.id','private_org.ph', 'private_org.message','private_org.created_at','private_org.icon')
        ->get();
        //$orgs = private_org::all();
        return view('farmer.private')->with('orgs',$orgs);
    }
    public function public()
    {
        $orgs = DB::table('gov_org')
        ->join('users', 'users.id', '=', 'gov_org.user_id')
        ->select('users.name','gov_org.id','gov_org.ph', 'gov_org.message','gov_org.created_at','gov_org.icon')
        ->get();
        //$orgs = govorg::all();

        $loans = loan::all();
        $tenders = tender::all();
        $trainings = training::all();
        return view('farmer.public')->with('orgs',$orgs)->with('loans',$loans)->with('tenders',$tenders)->with('trainings',$trainings);

    }
    public function booklets()
    {
        $booklets = booklet::all();
        return view('farmer.booklets')->with('booklets',$booklets);
    }
    public function mvideos()
    {
        $mvideos = mvideos::all();
        return view('farmer.mvideos')->with('mvideos',$mvideos);
    }
    public function sstories()
    {
        $as_stories = as_stories::all();
        return view('farmer.sstories')->with('as_stories',$as_stories);
    }
    public function soilreport()
    {
        $soil_healths = soilHealth::all();
        return view('farmer.soilreport')->with('soil_healths',$soil_healths);
    }
    public function private_details($id)
    {
        $org = private_org::find($id);
        if($org)
        {
            $seeds = resources::where('res_type','Seed')->where('user_id',$org->user_id)->get();
            $fertilizers = resources::where('res_type','Fertilizer')->where('user_id',$org->user_id)->get();
            $machineries = resources::where('res_type','Machinery')->where('user_id',$org->user_id)->get();
            $pesticides = resources::where('res_type','Pesticide')->where('user_id',$org->user_id)->get();
            return view('farmer.private_details')->with('seeds',$seeds)->with('fertilizers',$fertilizers)->with('machineries',$machineries)->with('pesticides',$pesticides);
        }
       else
       {
           return "Invalid";
       }
    }
    public function weather()
    {
        return view('farmer.weather');
    }
    
}
