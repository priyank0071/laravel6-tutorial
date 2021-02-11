@extends('layout');
@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
@endsection
@section('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h1>New Article</h1>
				 </div>
			<form action="/articles" method="post">
                @csrf
               <strong>Title : </strong>
                <input class="input @error('title') is-danger @enderror" type="text" placeholder="Title" name="title" value={{ old('title')}}>
                @error('title')                 
              
                <p class="help is-danger">{{ $errors->first('title')}}</p>

                @enderror
              <br>
              <br>
                <strong>Excerpt : </strong>
                <textarea class="textarea {{ $errors->has('excerpt') ? 'is-danger' : ''}}" placeholder="Excerpt" name="excerpt" >{{ old('excerpt')}}</textarea>
                @if($errors->has('excerpt'))                  
              
                <p class="help is-danger">{{ $errors->first('excerpt')}}</p>

                @endif
                <br>
                <strong>Body : </strong>
                <textarea class="textarea {{ $errors->has('body') ? 'is-danger' : ''}}" placeholder="Body" name="body">{{ old('body')}}</textarea>
                @if($errors->has('body'))                  
              
                <p class="help is-danger">{{ $errors->first('body')}}</p>

                @endif
                <br>
                <button class="button is-info" type="submit">Submit</button>
    
            </form>
		</div>
		
	</div>
</div>
@endsection