@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
	

	<br>
	<div>
		<img src="{{ asset('img/home_bg1.jpg') }}" id="home_bg">
	</div>


	<br>
	<div class="row">
		<div class="col s12">
			
			@if(Auth::check())
				@if(!count($my_articles))
					<p>You have not yet created an article</p>
				@else
					@foreach($my_articles as $my_article)
					<a href="/article/{{ $my_article->article_id }}">
						<div class="card white">
							<div class="card-content black-text">
								<div class="row">
									<div class="col s1">
										<img src="{{ asset('img/profile_icon.gif') }}" alt="" class="circle" style="width: 40px; height: 40px;">
									</div>
									<div class="col s3">
										<span style="font-size: 16px;" class="green-text">{{ Auth::user()->username }}</span>
										<br>
										<span style="color: #C9C9C9">{{ $my_article->created_at }}</span>
									</div>
									<div class="col s1 offset-s7">
										<div class="chip">
											{{ $my_article->category_name }}
										</div>
									</div>
								</div>
								
								<span class="card-title" style="font-weight: 500; font-size: 30px; color: #333333">{{ $my_article->title }}</span>
								<br>
								<span style="color: #333333; font-size: 18px; font-weight: 100;">{!! $my_article->rawcontent !!}</span>
								<br>
								<a href="/article/{{ $my_article->article_id }}"><span>Read More</span></a>
							</div>
						</div>
					</a>
					@endforeach
				@endif
			@else
				@if(count($recentarticles))
					@foreach($recentarticles as $recentarticle)
						<div class="card white">
							<div class="card-content black-text">
								<div class="row">
									<div class="col s1">
										<img src="{{ asset('img/profile_icon.gif') }}" alt="" class="circle" style="width: 40px; height: 40px;">
									</div>
									<div class="col s3">
										<span style="font-size: 16px;" class="green-text">{{ $recentarticle->username }}</span>
										<br>
										<span style="color: #C9C9C9">{{ $recentarticle->created_at }}</span>
									</div>
									<div class="col s1 offset-s7">
										<div class="chip">
											{{ $recentarticle->category_name }}
										</div>
									</div>
								</div>
								
								<span class="card-title" style="font-weight: 500; font-size: 30px; color: #333333">{{ $recentarticle->title }}</span>
								<br>
								<span style="color: #333333; font-size: 18px; font-weight: 100;">{!! $recentarticle->rawcontent !!}</span>
								<br>
								<a href="/article/{{ $recentarticle->article_id }}"><span>Read More</span></a>
							</div>
						</div>				
					@endforeach
				@endif
			@endif
		</div>
	</div>

	<br><br>
	@if(Auth::check())
	<div class="fixed-action-btn toolbar">
    	<a class="btn-floating btn-large green">
      		<i class="large material-icons">mode_edit</i>
    	</a>
    	<ul>
    	@if(Auth::check())
    		@if(count($my_articles)==count($categories))
			    <li class="waves-effect waves-light"><a class="create_article">You have written articles for Each Category</a></li>
    		@else
      			@foreach($remaining_categories as $remaining_category)
      				<li class="waves-effect waves-light"><a href="/add_article/{{ $remaining_category }}" class="create_article">{{ $remaining_category }}</a></li>
	      		@endforeach
      		@endif
      	@endif
    	</ul>
  	</div>
  	@endif
		
@endsection

@section('js')
	<script>
		var user_id = {{ $user_id }};
	</script>
    <script src="{{ asset('js/homepage.js') }}"></script>
@endsection	