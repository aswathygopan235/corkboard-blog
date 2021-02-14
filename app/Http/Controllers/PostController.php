<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index(){
       return view('posts.index');
   }

   public function store(Request $request){
       $this->validate($request, [
           'body'=>'required',
       ]);
        // Post::create([
        //     'user_id'=>auth()->user()->id(),
        //     'body'=>$request->body,
        // ]);
        auth()->user()->posts()->create();
   }
}
