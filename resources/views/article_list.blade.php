@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/article_list.css') }}">
@endsection

@section('content')

    <div style="position: relative;">
        <img src="{{ asset('img/'.$articles[0]->category_name.'.jpg') }}" id="category_bg">

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
                                        <div class="col s2 l1">
                                            <img src="{{$article->image}}" alt="" class="circle" id="card_img">
                                        </div>
                                        <div class="col s6 l3">
                                            <span class="green-text" id="card_name">{{ $article->username }}</span>
                                            <br>
                                            <span style="color: #C9C9C9" id="card_date">{{ $article->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="col s4 l1 offset-l7">
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
    @if(Auth::check() && !$my_article)
    <!-- <div class="fixed-action-btn"> -->
        <!-- <a class="btn-floating btn-large green" style ="border-width:2px; border-color: white;border-style: solid;" href="/add_article/{{ $articles[0]->category_name }}"> -->
            <!-- <i class="large material-icons">mode_edit</i> -->
        <!-- </a> -->
    <!-- </div> -->
    @endif



@endsection

@section('js')
    <!-- Link scripts here -->
@endsection