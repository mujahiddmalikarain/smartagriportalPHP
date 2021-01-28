<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gov_org;
class GovVendorController extends Controller
{
    public function index()
    {
        
    }
    public function home()
    {
        return view('gov_vendor.index');
    }
    public function update(Request $request,$id)
    {
        // $this->validate($request,[
        //     'name' => 'required',
        // ]);

       
    }
}
