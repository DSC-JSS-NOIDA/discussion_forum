@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
@endsection

@section('content')
	Title: {{ $article->title }}
	<br>
	@if($article->avg_rating==-1)
		Be the first to Rate this article
	@else
		Rating: {{ $article->avg_rating }}
	@endif
	<br>
	Content: {{ $article->content }}
	<br>
	Comments:
	@if(!count($comments))
		Be the first to review
	@else
		@foreach($comments as $comment)
			{{ $comment->content }}
			<b>by
			{{ $comment->username }}
			</b><br>
		@endforeach
	@endif
	<br>
	<!--if(Auth::check() && -->@if($article->user_id==$user_id)
		<a clas=="btn" href="/editor/{{ $article->article_id }}">Edit</a>
	@endif
@endsection

@section('js')
    <!-- Link scripts here -->
@endsection