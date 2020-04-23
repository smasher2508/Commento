<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

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
    {   $posts=Post::paginate(1);
        $categories=Category::all();
        return view('home',compact('posts','categories'));
    }
    public function postbycategory($id){
        $posts=Post::where('category_id',$id)->paginate(1);
        $categories=Category::all();
        return view('home',compact('posts','categories'));
    }
}
