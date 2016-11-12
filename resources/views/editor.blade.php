@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
@endsection

@section('content')
        <br>
        <div class="container">
            @if(isset($status) && Auth::check())
                <form action="/create_article" method="post">
                    <input type="text" class="title" name="title" required="" placeholder="Title"/>
                    <textarea name="content" id="editor1" rows="100" cols="80">
                    </textarea>
                    <input type="number" name="category_id" value="{{$category_id}}" hidden="">
                    {{ csrf_field() }}
                    <input type="text" name="reference" required="" placeholder="Reference" />
                    <input type="submit" name="submit" class="btn green" value="PUBLISH"/>
                </form>
            @else
                <form action="/update" method="post">
                    <label class="title">Title</label>&nbsp;
                    <input type="text" class="title" value="{{ $article[0]->title  }}" name="title" required="" />
                    <textarea name="content" id="editor1" rows="100" cols="80">
        			    {{ $article[0]->content }}
                    </textarea>
                    <input type="number" name="article_id" value="{{$article[0]->article_id}}" hidden="">
                    {{ csrf_field() }}
                    <br>
                    <input type="text" name="reference" value="{{$article[0]->reference}}" required="" />
                    <input type="submit" name="submit" class="btn green" value="PUBLISH"/>
                </form>
            @endif
        </div>
@endsection

@section('js')
    <!-- Link scripts here -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/editor.js') }}"></script>
@endsection