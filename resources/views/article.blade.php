@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
@endsection

@section('content')
	Title: {{ $article->title }}
	<br>
	Content: {{ $article->content }}
@endsection

@section('js')
    <!-- Link scripts here -->
@endsection