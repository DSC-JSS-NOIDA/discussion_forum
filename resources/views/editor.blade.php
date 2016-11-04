@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
@endsection

@section('content')
    Edit Article
        <form action="/update" method="post">
            <label class="title">Title</label>&nbsp;
            <input type="text" class="title" value="{{ $article[0]->title  }}" name="title" required="" />
            <textarea name="content" id="editor1" rows="10" cols="80">
			    {{ $article[0]->content }}
            </textarea>
            <input type="number" name="article_id" value="{{$article[0]->article_id}}" hidden="">
            {{ csrf_field() }}
            <input type="submit" name="submit" class="btn" value="PUBLISH"/>
        </form>
@endsection

@section('js')
    <!-- Link scripts here -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/editor.js') }}"></script>
@endsection