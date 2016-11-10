@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
@endsection

@section('content')

@include('category')

 	{{ $category['category_name'] }}
 	<br>
 	@if(!count($articles))
 		No articles Published under this category yet
    @else
    	@foreach($articles as $article)
    		{{ ++$i }}
    		<a href="/article/{{$article->article_id}}">
    			 Title: {{ $article->title }}
    			 Content: {!! substr($article->content,0,100) !!}
    		</a>
    		<br>
    	@endforeach

    	{{ $articles->links() }}
    @endif    
@endsection

@section('js')
    <!-- Link scripts here -->
@endsection