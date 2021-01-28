<?php

namespace App\Http\Controllers;

use App\as_stories;
use Illuminate\Http\Request;

class AsStoriesController extends Controller
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
            'title' => 'required',
            'description' => 'required',
        ]);
        
        $newSStory = new as_stories;
        $newSStory->title = $request->input('title'); 
        $newSStory->description = $request->input('description');  
        $newSStory->save();

        return back()->with('success','Success Story Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\as_stories  $as_stories
     * @return \Illuminate\Http\Response
     */
    public function show(as_stories $as_stories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\as_stories  $as_stories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $as_story = as_stories::find($id);
        return view('admin.edit_as_story')->with('as_story',$as_story);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\as_stories  $as_stories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newSStory = as_stories::find($id);
        if($request->input('title')){
            $newSStory->title = $request->input('title'); 
        }
        if($request->input('description')){
            $newSStory->description = $request->input('description');  
        }
        $newSStory->save();

        return back()->with('success','Success Story Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\as_stories  $as_stories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $as_story = as_stories::find($id);
        $as_story->delete();
        return back()->with('success','Success Story Deleted!');
    }
}
