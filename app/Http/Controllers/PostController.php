<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post(Post $post){
        return view('post')->with(["posts"=>$post->getPaginateByLimit(10)]);
    }
    
    public function post_store(Request $request, Post $post){
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/post');
    }
}
