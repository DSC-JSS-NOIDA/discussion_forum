@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/editor.css') }}">
@endsection

@section('content')


        <br>
        <div class="container" style="height: 1200px;">
        <br>
<!--         <div class="alert">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          The Event is Over now, and no further submissin will be considered during Evaluations.
        </div>
 -->
            @if(isset($status) && Auth::check())
                <form action="/create_article" method="post">
                    <input type="text" class="title" name="title" required="" placeholder="Title"/>
                    <textarea name="content" id="editor1" style="height: 800px;">
                    </textarea>
                    <input type="number" name="category_id" value="{{$category_id}}" hidden="">
                    {{ csrf_field() }}
                    <input type="text" name="reference" required="" placeholder="Reference" />
                    <input type="submit" name="submit" class="publish btn green" value="PUBLISH"/>
                </form>
            @else
                <form action="/update" method="post">
                    <label class="title">Title</label>&nbsp;
                    <input type="text" class="title" value="{{ $article[0]->title  }}" name="title" required="" />
                    <textarea name="content" id="editor1" style="height: 800px;">
        			    {{ $article[0]->content }}
                    </textarea>
                    <input type="number" name="article_id" value="{{$article[0]->article_id}}" hidden="">
                    {{ csrf_field() }}
                    <br>
                    <input type="text" name="reference" value="{{$article[0]->reference}}" required="" />
                    <input type="submit" name="submit" class="publish btn green" value="PUBLISH"/>
                </form>
            @endif
        </div>
        <div class="publishpopup">
            The Article Submissions made now will not be considered for Judgement.
        </div>

@endsection

@section('js')
    <!-- Link scripts here -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/editor.js') }}"></script>
@endsection