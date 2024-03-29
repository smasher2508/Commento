<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Photo;

class AdminMediaController extends Controller
{
    //
    public function index(){
        $photos=Photo::all();
        return view('admin.media.index',compact('photos'));
    }
    public function create(){
        return view('admin.media.create');
    }
    public function store(Request $request){
        $file=$request->file('file'); 
        $name=$file->getClientOriginalName();
        $file->move('images',$name);
        Photo::create(['file'=>$name]);
    }
    public function destroy($id)
    {
        $photo=Photo::findOrFail($id);
        unlink(public_path().'/images/'.$photo->file);
        $photo->delete();
        Session::flash('deleted_photo','Successfully Deleted :)');
        return redirect('/admin/media');
    }
}

