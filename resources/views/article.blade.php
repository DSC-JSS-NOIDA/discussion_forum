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
					
					@if(Auth::check())
						<div class="col s3 offset-s2">
							<div style="font-size: 20px;">
								@if($article->avg_rating==-1)
									<span style="color: green;">Be the first to rate this!!!</span>
								@else
									<span style="color: green;">Rating:</span>
									<span id="avg_rating">{{ $article->avg_rating }}</span>
								@endif
							</div>
							<div>
								@if($rating_by_me==-1)
									<span style="color: green;">Your rating :</span>
									<span id="my_rating" style="color: #c9c9c9;">You haven't rate it yet</span>
								@else
									<span style="color: green;" id="rated"> Your rating :</span>
									<span id="my_rating">{{$rating_by_me}} </span>
								@endif
							</div>
							
							<div class="fixed-action-btn horizontal">
							    <a class="btn-floating btn-large green">
							      	<span style="font-size: 20px;"><i class="material-icons">star</i></span>
							    </a>
							    <ul style="padding-left: -10px;">
							      	<li><a class="btn-floating red rating_by_me" id="1"><i class="material-icons">looks_one</i></a></li>
							      	<li><a class="btn-floating pink rating_by_me" id="2"><i class="material-icons">looks_two</i></a></li>
							      	<li><a class="btn-floating blue rating_by_me" id="3"><i class="material-icons">looks_3</i></a></li>
							      	<li><a class="btn-floating green rating_by_me" id="4"><i class="material-icons">looks_4</i></a></li>
							      	<li><a class="btn-floating green darken-2 rating_by_me" id="5"><i class="material-icons">looks_5</i></a></li>
							    </ul>
							</div>
						@else
							<div class="col s3 offset-s3">
								<br>
								<span style="color: #c9c9c9; font-size: 16px;">Please login to rate</span>
							</div>
						@endif


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
									<h4 style="color: #8a8a8a;">Comment</h4>
									@if(!count($comments))
										Be the first to review
									@else
										@foreach($comments as $comment)
											
											<img src="{{ $comment->image }}" class="circle" style="width: 30px;">
											<span style="font-size: 20px; color: green;">{{ $comment->username }}</span><br>
											<span style="color: #8a8a8a;">{{ $comment->created_at }}</span>
											<input type="text" class="edit_box" id="input{{$comment->comment_id}}" value="{{ $comment->content }}" hidden></input>
											<p id="content{{$comment->comment_id}}">{!! $comment->content !!}</p>
											@if($user_id==$comment->user_id)
												<a class="edit_comment right" id="edit{{$comment->comment_id}}">Edit</a>	
												<a class="confirm_edit_comment btn btn-default" id="confirm{{$comment->comment_id}}" >confirm</a>			
											@endif
											<br>
											<hr>
											<br>
										@endforeach
										<div id="comment_insert"></div>
									@endif

									<br>
									@if(Auth::check())
										<input type="text" placeholder="Comment" id="new_comment_text" id="cmnt">
										<input type="submit" class="btn green" value="Comment" id="new_comment_btn">
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
		
	
	</div>
	<!-- end of main div -->
	<br>

	
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
