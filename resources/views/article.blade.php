@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
    <meta property="og:url"           content="http://localhost:8000/article/{{$article->article_id}}" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="{{$article->title}}" />
	<meta property="og:description"   content="{!! $article->rawcontent !!}" />
	<meta property="og:image"         content="http://njitvector.com/wp-content/uploads/2014/09/googledev.png" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/article_page.css') }}">
	<link rel="stylesheet" href="{{ asset('css/jquery.rateyo.min.css') }}">
@endsection

@section('content')
<!-- start of main div -->
	<div class="container">
		<br><br>
		<div class="row">
			<div class="col s12">
				
				<div class="row">
					<div class="col s1 offset-s1">
						<img src="{{$article->image}}" alt="" class="circle" style="width: 60px; height:60px;">
					</div>
					<div class="col s4">
						<span style="font-size: 20px; color: green;">{{ $article->username }}</span>
						<br>
						<span style="color: #c9c9c9;">{{ $article->created_at }}</span>
						<br>
						<span style="color: #c9c9c9;">{{ $article->category_name }}</span>
					</div>
					<div class="col s3 offset-s3">
						<div class="rateyo"></div>
					</div>
					<div class="col s10 offset-s1">
						<h2>{{ $article->title }}</h2>
					</div>
					<div class="col s10 offset-s1">
						{!! $article->content !!}
					</div>
					<div class="col s10 offset-s1">
						<h4 id="refrence">Refrences</h4>
						<span>{{ $article->reference }}</span>
					</div>
				</div>

				<div class="row">
					<div class="col s10 offset-s1">
						<div class="card">
							<div class="row">
								<div class="col s10 offset-s1">
									<br>
									<h4 style="color: #333333;">Responses:</h4>
									<br>
									@if(!count($comments))
										Be the first to review
									@else
										@foreach($comments as $comment)
											
											{{$comment->image}}
											<img src="{{ $comment->image }}">
											<span style="font-size: 16px;">{{ $comment->username }}</span>>
											<input type="text" class="edit_box" id="input{{$comment->comment_id}}" value="{{ $comment->content }}" hidden></input>
											<p id="content{{$comment->comment_id}}">{!! $comment->content !!}</p>
											<span>{{ $comment->created_at }}</span>
											@if($user_id==$comment->user_id)
												<a class="edit_comment btn btn-default" id="edit{{$comment->comment_id}}">Edit</a>	
												<a class="confirm_edit_comment btn btn-default" id="confirm{{$comment->comment_id}}" >confirm</a>			
											@endif
											<hr>
										@endforeach
										<div id="comment_insert"></div>
									@endif

									@if(Auth::check())
										<input type="text" placeholder="Comment" id="new_comment_text">
										<input type="submit" class="btn" value="COMMENT" id="new_comment_btn">
										<script>var username = "{{ $username }}";</script>
									@else
										Please login to comment
									@endif

									<br>
									@if(Auth::check() && $article->user_id==$user_id)
										<a clas=="btn" href="/editor/{{ $article->article_id }}">Edit</a>
										<!-- change the data href link after hosting -->
										<div class="fb-share-button" data-href="http://articulus.gdgjss.in/article/{{$article->article_id}}" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Farticulus.gdgjss.in%2Farticle%2F{{$article->article_id}}&amp;src=sdkpreparse">Share</a></div>
									@endif
								</div>
							</div>
							<br>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
		
		













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
		<div id="comment_insert"></div>
	@endif

	@if(Auth::check())
		<input type="text" placeholder="Comment" id="new_comment_text">
		<input type="submit" class="btn" value="COMMENT" id="new_comment_btn">
		<script>var username = "{{ $username }}";</script>
	@else
		Please login to comment
	@endif

	<br>
	@if(Auth::check() && $article->user_id==$user_id)
		<a clas=="btn" href="/editor/{{ $article->article_id }}">Edit</a>
		<!-- change the data href link after hosting -->
		<div class="fb-share-button" data-href="http://articulus.gdgjss.in/article/{{$article->article_id}}" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Farticulus.gdgjss.in%2Farticle%2F{{$article->article_id}}&amp;src=sdkpreparse">Share</a></div>
	@endif
	</div>
	<!-- end of comments div -->
@endsection

@section('js')
    <script src="{{ asset('js/jquery.rateyo.min.js') }}"></script>
	<script>
		var article_id = {{$article->article_id}};
		var user_id = {{ $user_id }};
	</script>
    <script src="{{ asset('js/article.js') }}"></script>
    <script src="{{ asset('js/comments.js') }}"></script>

@endsection	
