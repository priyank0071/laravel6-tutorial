<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
class ArticlesController extends Controller
{


    public function index()
    {
$articles = Article::latest()->get();
return view('articles.index',[
    'articles' => $articles 
]);
    }

    public function show($articleid)
    {
$article = Article::find($articleid);
return view('articles.show',[
    'article' => $article 
]);
    }
}
