<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Session;
use DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        if (count($categories) == 0) {
            Session::flash('info', 'You must add some categories before attempting any post');
            return view('admin.category.create');
        } else  if (count($tags) == 0) {
            Session::flash('info', 'You must add some tags before attempting any post');
            return view('admin.tag.create');
        } else {
            return view('admin.post.create')->with('categories', $categories)->with('tags', $tags);
        }
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
            'title' => 'required|string',
            'featured' => 'required|image',
            'category_id' => 'required|integer',
            'content' => 'required|string',
            'tags_id' => 'required|array'
        ]);

        $featured = $request->featured;
        $featured_new_name = time() . $featured->getClientOriginalName();
        $featured->move('uploads/post', $featured_new_name);

        $post=Post::create([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'featured' => '/uploads/post/' . $featured_new_name,
            'category_id' => $request->category_id,
            'content' => $request->content
        ]);
        //dd($request->tags_id);
$post->tags()->attach($request->tags_id);
$post->save();
        //  dd($request->content);
        Session::flash('success', 'The Post Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags=$post->tags;
       // dd($tags);
//$tags=DB::select('SELECT DISTINCT ID FROM tags'); 
$ta=array();
foreach($tags as $tag){
    $ta[]=$tag->id;
}

$tags_id=implode(',',$ta);

        return view('admin.post.edit')
        ->with('post', $post)
        ->with('categories', Category::all())
        ->with('tags', Tag::all())
        ->with('post_tags_id',$tags_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'category_id' => 'required|integer',
            'content' => 'required|string',
            'tags_id' => 'required|array'
        ]);
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->category_id = $request->category_id;
        $post->content = $request->content;

        if ($request->hasFile('featured')) {
            $featured = $request->featured;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('uploads/post', $featured_new_name);
            $post->featured = '/uploads/post/' . $featured_new_name;
        }
        $post->tags()->sync($request->tags_id);
        $post->save();

        Session::flash('success', 'The Post updated Successfully');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */

    public function destroy(Post $post)
    {
        $post->delete();
        Session::flash('success', 'Post trashed Successfully');
        return redirect()->back();
    }
    public function hdelete($id) //hard delete //delete forever
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        Session::flash('success', 'Post deleted Successfully');
        return redirect()->back();
    }
    public function trash()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.post.trash')->with('posts', $posts);
    }

    public function post_restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        Session::flash('success', 'Post restored Successfully');

        return redirect()->back();
    }
}
