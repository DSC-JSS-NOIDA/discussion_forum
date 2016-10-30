@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
@endsection

@section('content')
	Title: {{ $article->title }}
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
@endsection

@section('js')
    <!-- Link scripts here -->
@endsection