<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('index')
            ->with('setting', Setting::first())
            ->with('categories', Category::take(5)->get())
            ->with('first_post', Post::OrderBy('created_at', 'desc')->first())
            ->with('second_post', Post::OrderBy('created_at', 'desc')->skip(1)->first())
            ->with('third_post', Post::OrderBy('created_at', 'desc')->skip(2)->first())
            ->with('first_category', Category::OrderBy('created_at')->first())
            ->with('second_category', Category::OrderBy('created_at')->skip(1)->first())
            ->with('third_category', Category::OrderBy('created_at')->skip(2)->first());
    }
    public function singlePost($slug)
    { 
        // current post
        $post=Post::where('slug',$slug)->first();
        // next post
        $next_id=Post::where('id','>',$post->id)->min('id');
        $next=Post::find($next_id);
        // previous post
        $prev_id=Post::where('id','<',$post->id)->max('id');
        $prev=Post::find($prev_id);

        return view('pages.single')
        ->with('title',$post->title)
        ->with('post',$post)
        ->with('next',$next)
        ->with('prev',$prev)
        ->with('setting',Setting::first())//for footer
        ->with('categories',Category::take(5)->get()) //for header
        ->with('tags',Tag::all());//for sidebar
    }

     public function category($id)
    {
        $category = Category::find($id);
        return view('pages.category')
        ->with('title',$category->name)
        ->with('category',$category)
        ->with('setting',Setting::first())//for footer
        ->with('categories',Category::take(5)->get()) //for header
        ->with('tags',Tag::all());//for sidebar
    }
    public function tag($id)
    {
        $tag = Tag::find($id);
        return view('pages.tag')
        ->with('title',$tag->name)
        ->with('tag',$tag)
        ->with('setting',Setting::first())//for footer
        ->with('categories',Category::take(5)->get()) //for header
        ->with('tags',Tag::all());//for sidebar
    }
}
