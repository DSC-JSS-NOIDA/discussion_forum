@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
    <meta property="og:url"           content="http://localhost:8000/article/{{$article->article_id}}" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="{{$article->title}}" />
	<meta property="og:description"   content="{!! $article->content !!}" />
	<meta property="og:image"         content="http://njitvector.com/wp-content/uploads/2014/09/googledev.png" />
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
				<h3>Rating: <span id="avg_rating">Be the first to Rate this article</span></h3>
				@else
				<h2>Rating: <span id="avg_rating">{{ $article->avg_rating }}</span></h2>
				@endif
			</div>
			<!-- end of avg rating -->
			<!-- user's rating -->
			@if(Auth::check())
			<div>

				@if($rating_by_me==-1)
					<h3> Your rating : <span id="my_rating">You haven't rate it yet</span></h3>
				@else
					<h3 id="rated"> Your rating : <span id="my_rating">{{$rating_by_me}} </span></h3>
					<!-- Dropdown for rating -->
				@endif
						 <div class="dropdown">
						  	<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">	 Rate it
						  		<span class="caret"></span>
						  	</button>
						  	<ul class="dropdown-menu">
							   	@for($i=1;$i<=5;$i++)
							    	<li>
							    		<button class="rating_by_me" id="{{ $i }}">{{ $i }}</button>
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
		 {!! $article->content !!}
		</div>
		
		<!-- start of reference div -->
		<div>
		<h3>Reference:</h3>
		{{ $article->reference }}
		</div>
	
	</div>
	<!-- end of main div -->
	<br>

	<!-- start of comments div -->
	<div class="container">
	<h2>Comments:</h2>
	@if(!count($comments))
		Be the first to review
	@else
		@foreach($comments as $comment)
			<hr>
			<h4 >{{ $comment->username }}</h4>
		<input type="text" class="edit_box" id="input{{$comment->comment_id}}" value="{{ $comment->content }}" hidden></input>
			<p id="content{{$comment->comment_id}}">{!! $comment->content !!}</p>
			<span>{{ $comment->created_at }}</span>
			@if($user_id==$comment->user_id)
				<a class="edit_comment btn btn-default" id="edit{{$comment->comment_id}}">Edit</a>	
				<a class="confirm_edit_comment btn btn-default" id="confirm{{$comment->comment_id}}" >confirm</a>			
			@endif
		@endforeach
	@endif

	@if(Auth::check())
		<input type="text" placeholder="Comment" id="new_comment_text">
		<input type="submit" class="btn" value="COMMENT" id="new_comment_btn">
	@else
		Please login to comment
	@endif

	<br>
	@if(Auth::check() && $article->user_id==$user_id)
		<a clas=="btn" href="/editor/{{ $article->article_id }}">Edit</a>
		<!-- change the data href link after hosting -->
		<!-- <div class="fb-share-button" data-href="http://localhost:8000/article/{{$article->article_id}}" data-layout="button_count" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ffacebook.com%2Fgdgjss&amp;src=sdkpreparse">Share</a></div> -->
		<div class="fb-share-button" data-href="http://www.google.com" data-layout="button_count" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ffacebook.com%2Fgdgjss&amp;src=sdkpreparse">Share</a></div>
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
    <script src="{{ asset('js/comments.js') }}"></script>

@endsection	
