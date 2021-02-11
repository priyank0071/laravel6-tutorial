<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($post)
    {
    $posts = [
    'my-first-post' => 'Hello This is my first post',
    'my-second-post' => 'Welcome to my second post',
    ];
    if(!array_key_exists($post, $posts))
    {
        abort('404', 'Sorry ! The post was not found' );
    }

    return view('post',[
        'post' =>   $posts[$post] ?? 'Nothing Here Yet'
    ]);
    }
}