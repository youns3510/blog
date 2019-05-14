<?php

namespace App\Http\Controllers;

use App\Tag;
use Session;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;



class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tag.index')->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        Tag::create([
            'name' => $request->name,
        ]);
        Session::flash('success', 'Tag Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Tag $Tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $Tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Tag $Tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $Tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Tag $Tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        $ta=Tag::findOrFail($tag->id);
        $ta->name=$request->name;
        $ta->save();
        Session::flash('success', 'Tag Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Tag $Tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {

        $tag->delete();
        Session::flash('success', 'Tag deleted Successfully');
        return redirect()->back();
    }
    public function trash()
    {
        $tags = Tag::onlyTrashed()->get();
        return view('admin.tag.trash')->with('tags', $tags);
    }

    public function hdelete($id) //hard delete //delete forever
    {
        $tag = Tag::withTrashed()->where('id', $id)->first();
        $tag->forceDelete();
        Session::flash('success', 'Tag deleted Successfully');
        return redirect()->back();
    }
   
    public function cat_restore($id)
    {
        $tag = Tag::withTrashed()->where('id', $id)->first();
        $tag->restore();
        Session::flash('success', 'Tag restored Successfully');

        return redirect()->back();
    }
}