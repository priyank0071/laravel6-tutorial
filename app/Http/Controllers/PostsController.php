<?php

namespace App\Http\Controllers;
use DB;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($slug)
    {
       
       //$post = .\DB::table('posts')->where('slug', $slug)->first(); // this line is not working to me
      //$post = DB::table('posts')->where('slug', $slug)->first(); 
        $post = Post::where('slug', $slug)->firstOrFail();   
      //dd($post);
  
    if(!$post)
    {
        abort('404');
    }

    return view('post',[
        'post' =>   $post
    ]);
    }
}