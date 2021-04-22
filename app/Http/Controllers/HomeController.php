<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\MainModule;
use App\User;
use Illuminate\Http\Request;

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
        // $categories = Category::orderBy('id', 'DESC')->limit('3')->get();
        // $posts = Post::orderBy('id', 'DESC')->where('post_type', 'post')->limit('3')->get();
        // $pages = Post::orderBy('id', 'DESC')->where('post_type', 'page')->limit('3')->get();
        $posts = Post::all();
        $users = User::all();
        $module = MainModule::all();
        $category = Category::all();
        $mostpopular = Post::get()->sortByDesc('views')->take(6);


        return view('admin.dashboard', compact('posts','users','module','category','mostpopular'));
    }
}
