<?php

namespace App\Http\Controllers;

use App\Category;
use Session;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\SoftDeletes;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
        Category::create([
            'name' => $request->name,
        ]);
        Session::flash('success', 'Category Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        $cat=Category::findOrFail($category->id);
        $cat->name=$request->name;
        $cat->save();
        Session::flash('success', 'Category Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        $category->delete();
        Session::flash('success', 'Category deleted Successfully');
        return redirect()->back();
    }
    public function trash()
    {
        $categories = Category::onlyTrashed()->get();
        return view('admin.category.trash')->with('categories', $categories);
    }

    public function hdelete($id) //hard delete //delete forever
    {
        $category = Category::withTrashed()->where('id', $id)->first();
        $category->forceDelete();
        Session::flash('success', 'Category deleted Successfully');
        return redirect()->back();
    }
   
    public function cat_restore($id)
    {
        $category = Category::withTrashed()->where('id', $id)->first();
        $category->restore();
        Session::flash('success', 'Category restored Successfully');

        return redirect()->back();
    }
}
