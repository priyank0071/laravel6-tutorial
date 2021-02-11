@extends('layout');
@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
@endsection
@section('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h1>Update  Article</h1>
				 </div>
			<form action="/articles/{{$article->id}}" method="POST">
                @csrf
                @method('PUT')
               <strong>Title : </strong>
                <input class="input" type="text" placeholder="Title" name="title" value="{{ $article->title}}">
                <br>
                <br>
                <strong>Excerpt : </strong>
                <textarea class="textarea" placeholder="Excerpt" name="excerpt">{{ $article->excerpt}}</textarea>
                <br>
                <strong>Body : </strong>
                <textarea class="textarea" placeholder="Body" name="body">{{ $article->body}}</textarea>
                <br>
                <button class="button is-info" type="submit">Update</button>
    
            </form>
		</div>
		
	</div>
</div>
@endsection