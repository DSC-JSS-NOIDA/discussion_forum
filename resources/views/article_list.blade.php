@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
@endsection

@section('content')

    <div style="position: relative;">
        <img src="{{ asset('img/'.$articles[0]->category_name.'.jpg') }}" id="home_bg">

    </div>

    <div class="container">
        <div class="row">
            <div class="col s12">
                @if(!count($articles))
                    No articles Published under this category yet
                @else
                    @foreach($articles as $article)
                        <br>
                        <a href="/article/{{$article->article_id}}">
                            <div class="card white">
                                <div class="card-content black-text">
                                    <div class="row">
                                        <div class="col s1">
                                            <img src="{{$article->image}}" alt="" class="circle" style="width: 40px; height: 40px;">
                                        </div>
                                        <div class="col s3">
                                            <span style="font-size: 16px;" class="green-text">{{ $article->username }}</span>
                                            <br>
                                            <span style="color: #C9C9C9">{{ $article->created_at }}</span>
                                        </div>
                                        <div class="col s1 offset-s7">
                                            <div class="chip">
                                                {{ $article->category_name }}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <span class="card-title" style="font-weight: 500; font-size: 30px; color: #333333">{{ $article->title }}</span>
                                    <br>
                                    <span style="color: #333333; font-size: 18px; font-weight: 100;">{!! $article->rawcontent !!}</span>
                                    <br>
                                    <a href="/article/{{ $article->article_id }}"><span>Read More</span></a>
                                </div>
                            </div>  
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    @include('pagination.default', ['paginator' => $articles])
    </div>


@endsection

@section('js')
    <!-- Link scripts here -->
@endsection