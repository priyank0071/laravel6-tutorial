<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Article;

class ArticlesController extends Controller
{


    public function index()
    {
//die(request('tag'));
        if(request('tag'))
        {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
            //return $articles;
        }
        else{
            $articles = Article::latest()->get();
        }

return view('articles.index',[
    'articles' => $articles 
]);
    }

    public function show(Article $article)
    {
//$article = Article::findOrFail($articleid);
//return $article;
return view('articles.show',[
    'article' => $article 
]);
    }

    public function create()
    {

        $tag = Tag::all();
        return view('articles.create',
    [
        'tags' => $tag
    ]);
    }

    public function store()
    {
        $this->validatedArticle();
        $article = new Article(request(['title','excerpt', 'body']));
        $article->user_id = 1;
        $article->save();
if(request()->has('tags'))
{
    $article->tags()->attach(request('tags'));
}
        
//Article::create($this->validatedArticle());
return redirect('/articles');

    }
    public function edit(Article $article)
    {
        
        return view('articles.edit', compact('article'));
    }
    public function update(Article $article)
    {
        $article->update($this->validatedArticle());
return redirect($article->path());

    }
    public function destroy()
    {

    }

    protected function validatedArticle()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}
