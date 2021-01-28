<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\govorg;
use App\private_org;
use App\fourm;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $type = Auth::user()->utype;
        if(Auth::user()->status=="Active")
        {
            if($type=="admin")
            {
                $users = User::all();
                return view('admin.index')->with('users',$users);
            }
            else if($type=="Private Vendor")
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
            else if($type=="Government Vendor")
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
            else if($type=="Farmer")
            {  
                $posts = DB::table('users')
                ->join('fourm', 'users.id', '=', 'fourm.user_id')
                ->select('users.name','fourm.description','fourm.file', 'fourm.created_at','fourm.user_id','fourm.id')
                ->get();
                return view('farmer.index')->with('posts',$posts);
            }
            else
            {
                return "Have a nice day!";
            }
        }
        else
        {
            return view('home')->with('success','This User is blocked by Admin');
        }
        //return view('home');
    }
   
}
