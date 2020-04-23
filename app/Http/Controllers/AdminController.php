<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;
use App\Comment;
class AdminController extends Controller
{
    //
    public function index(){
        $users=User::count();
        $categories=Category::count();
        $posts=Post::count();
        $comments=Comment::count();
    return view('admin.index',compact('users','posts','categories','comments'));
    }
}
