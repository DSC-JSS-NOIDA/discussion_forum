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
										<span style="font-size: 16px;" class="green-text">Author Name</span>
										<br>
										<span style="color: #C9C9C9">Date</span>
									</div>
									<div class="col s1 offset-s7">
										<div class="chip">
											{{ $my_article->category_name }}
										</div>
									</div>
								</div>
								
								<span class="card-title" style="font-weight: 500; font-size: 30px; color: #333333">{{ $my_article->title }}</span>
								<br>
								<span style="color: #333333; font-size: 18px; font-weight: 100;">{!! $my_article->content !!}</span>
								<br>
								<a href="/article/{{ $my_article->article_id }}"><span>Read More</span></a>
							</div>
						</div>
					</a>
					@endforeach
				@endif
			@else
			<div class="card white">
				<div class="card-content black-text">
              		<span class="card-title">Card Title</span>
              		<p>I am a very simple card. I am good at containing small bits of information.
              		I am convenient because I require little markup to use effectively.</p>
            	</div>
			</div>
			@endif
		</div>
	</div>

	<br><br>
	<div class="fixed-action-btn toolbar">
    	<a class="btn-floating btn-large green">
      		<i class="large material-icons">mode_edit</i>
    	</a>
    	<ul>
      		@foreach($remaining_categories as $remaining_category)
      			<li class="waves-effect waves-light"><a href="/add_article/{{ $remaining_category }}" class="create_article">{{ $remaining_category }}</a></li>
      		@endforeach
    	</ul>
  	</div>
		
@endsection

@section('js')
	<script>
		var user_id = {{ $user_id }};
	</script>
    <script src="{{ asset('js/homepage.js') }}"></script>
@endsection	