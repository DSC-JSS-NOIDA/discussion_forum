@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sx-12 col-md-6">
				@if(Auth::check())
					@if(!count($my_articles))
						You have not yet created an article
					@else
						@foreach($my_articles as $my_article)
							Category: {{ $my_article->category_name }}
							<br>
							Title: {{ $my_article->title }}
							<br>
							Content: {{ $my_article->content }}
							<br>
						@endforeach
					@endif
					@if(count($my_articles)==count($categories))
						You have written articles for all categories available.
					@else
						Dropdown for add new article
						 <div class="dropdown">
						  	<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">	 Add New Category
						  		<span class="caret"></span>
						  	</button>
						  	<ul class="dropdown-menu">
							   	@foreach($remaining_categories as $remaining_category)
							    	<li>
							    		<a href="#" class="create_article" id="{{ $remaining_category }}">{{ $remaining_category }}</a>
							    	</li>
						    	@endforeach
							</ul>
						</div>
					@endif
	    		@else
	    		<a type="button" class="btn btn-default" href="/auth/google">Login</a>
				@endif
			</div>
			<div class="col-sx-12 col-md-6">
				Categories
				<br>
				@if(!count($categories))
					Categories coming soon
				@else
					@foreach($categories as $category)
						<a href="/category/{{$category->category_id}}" ref="">
							{{ $category->category_name }}
						</a>
						<br>
					@endforeach
				@endif
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script>
		var user_id = {{ $user_id }};
	</script>
    <script src="{{ asset('js/homepage.js') }}"></script>
@endsection	