@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
@endsection

@section('content')
<!-- start of main div -->
	<div class="container">
	
		<!-- start of title div -->
		<div>
		<h2>Title: {{ $article->title }}</h2>
		</div>
		<!-- end of title div -->

		<!-- start of rating div -->
		<div>
		<br>
			<!-- avg rating -->
			<div>
				@if($article->avg_rating==-1)
				<h3>Be the first to Rate this article</h3>
				@else
				<h2>Rating: {{ $article->avg_rating }}</h2>
				@endif
			</div>
			<!-- end of avg rating -->
			<!-- user's rating -->
			@if(Auth::check())
			<div>

				@if($rating_by_me==-1)
					<h3 id="not_yet_rated">You haven't rate it yet</h3>
				@else
					<h3 id="rated"> Your rating : {{$rating_by_me}} </h3>
					<!-- Dropdown for rating -->
				@endif
						 <div class="dropdown">
						  	<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">	 Rate it
						  		<span class="caret"></span>
						  	</button>
						  	<ul class="dropdown-menu">
							   	@for($i=1;$i<=5;$i++)
							    	<li>
							    		<a href="" class="rating_by_me" id="{{ $i }}">{{ $i }}</a>
							    	</li>
						    	@endfor
							</ul>
						</div>
			</div>
			@else
			<h2>Login to rate this Article</h2>
			<a type="button" class="btn btn-default" href="/auth/google">Login</a>
			@endif

			<!-- end of user's rating -->
		</div>
		<!-- end of rating div -->

		<!-- start of content div -->
		<div>
		<br>
		<h2>Content:</h2>
		 {{ $article->content }}
		</div>
	
	</div>
	<!-- end of main div -->
	<br>

	<!-- start of comments div -->
	<div class="container">
	<h2>Comments:</h2>
	<br><br>
	@if(!count($comments))
		Be the first to review
	@else
		@foreach($comments as $comment)
			{{ $comment->content }}
			<br>
			<b>by
			{{ $comment->username }}
			</b><br><br>
		@endforeach
	@endif
	<br>
	<!--if(Auth::check() && -->@if($article->user_id==$user_id)
		<a clas=="btn" href="/editor/{{ $article->article_id }}">Edit</a>
	@endif
	</div>
	<!-- end of comments div -->

@endsection

@section('js')
	<script>
		var article_id = {{$article->article_id}};
		var user_id = {{ $user_id }};
	</script>
    <script src="{{ asset('js/article.js') }}"></script>
@endsection	