<?php

namespace App\Http\Controllers;
use App\Setting;
use App\Post;
use App\User;
use App\Category;
use App\Tag;
use Auth;

class DashboardController extends Controller
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
        $user=Auth::user();
        return view('pages.dashboard')
        ->with('user',$user)
        ->with('setting',Setting::first())
        ->with('post_count',Post::all()->count())
        ->with('user_count',User::all()->count())
        ->with('category_count',Category::all()->count())
        ->with('tag_count',Tag::all()->count());
    }
}
