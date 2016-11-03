@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
@endsection

@section('content')
    Edit Article
        <form>
            <textarea name="editor1" id="editor1" rows="10" cols="80">
			    {{ $article[0]->content }}
            </textarea>
            <script>
            </script>
        </form>
@endsection

@section('js')
    <!-- Link scripts here -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/editor.js') }}"></script>
@endsection