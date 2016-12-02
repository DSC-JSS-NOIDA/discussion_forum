@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
	
<!-- 	<div style="position: relative;">
		<img src="{{ asset('img/home_cover.jpg') }}" id="home_bg">
		@if(!Auth::check())
			<a href="/auth/google" class="btn green" id="login_btn" style="position: absolute;">Login</a>
		@endif
	</div>
 -->
<!-- 
	<br>
	<div class="container">
	<div class="row">
		<div class="col s12">
			
			@if(Auth::check())
				@if(!count($my_articles))
					<div class="row">
						<div class="col s12 center">
							<p id="no_article_text">You have not yet created an article</p>
						</div>
						<br>
						<div class="col s12 center">
							<span id="no_article_subtext">(Choose a category and start writing)</span>
						</div>
					</div>
				@else
					@foreach($my_articles as $my_article)
					<a href="/article/{{ $my_article->article_id }}">
						<div class="card white">
							<div class="card-content black-text">
								<div class="row">
									<div class="col s2 l1">
										<img src="{{ Auth::user()->image }}" alt="" class="circle" id="card_img">
									</div>
									<div class="col s6 l3">
										<span class="green-text" id="card_name">{{ Auth::user()->username }}</span>
										<br>
										<span style="color: #C9C9C9" id="card_date">{{ $my_article->created_at->diffForHumans() }}</span>
									</div>
									<div class="col s4 l1 offset-l7">
										<div class="chip">
											{{ $my_article->category_name }}
										</div>
									</div>
								</div>
								
								<span class="card-title" id="card_title" style="color: #333333">{{ $my_article->title }}</span>
								<br>
								<span id="raw_content">{!! $my_article->rawcontent !!}</span>
								<br><br>
								<a href="/article/{{ $my_article->article_id }}"><span>Read More</span></a>
							</div>
						</div>
					</a>
					@endforeach
				@endif
			@else
				@if(count($recentarticles))
					<h3 id="recent_articles">Recent Articles</h3>
					@foreach($recentarticles as $recentarticle)
						<a href="/article/{{ $recentarticle->article_id }}">
							<div class="card white">
								<div class="card-content black-text">
									<div class="row">
										<div class="col s2 l1">
											<img src="{{$recentarticle->image}}" alt="" class="circle" id="card_img">
										</div>
										<div class="col s6 l2">
											<span class="green-text" id="card_name">{{ $recentarticle->username }}</span>
											<br>
											<span style="color: #C9C9C9" id="card_date">{{ $recentarticle->created_at->diffForHumans() }}</span>
										</div>
										<div class="col s3 l1 offset-l8">
											<div class="chip">
												{{ $recentarticle->category_name }}
											</div>
										</div>
									</div>
									
									<span class="card-title" id="card_title" style="color: black">{{ $recentarticle->title }}</span>
									<br>
									<span style="color: black; font-size: 18px; font-weight: 100;">{!! $recentarticle->rawcontent !!}</span>
									<br><br>
									<a href="/article/{{ $recentarticle->article_id }}"><span>Read More</span></a>
								</div>
							</div>
						</a>
						<br>
					@endforeach
				@endif
			@endif
		</div>
	</div>

	<br><br>
	@if(Auth::check())
	<div class="fixed-action-btn toolbar" >
    	<a class="btn-floating btn-large green " style ="border-width:2px; border-color: white;border-style: solid;">
      		<i class="large material-icons">mode_edit</i>
    	</a>
    	<ul>
    	@if(Auth::check())
    		@if(count($my_articles)==count($categories))
			    <li class="waves-effect waves-light">You have written articles for Each Category</li>
    		@else
      			@foreach($remaining_categories as $remaining_category)
      				<li class="waves-effect waves-light"><a href="/add_article/{{ $remaining_category }}" class="create_article" id="remaining_categories_style">{{ $remaining_category }}</a></li>
	      		@endforeach
      		@endif
      	@endif
    	</ul>
  	</div>
  	@endif
  	</div>
 -->		

 <!-- Result -->
<div class="container" style="margin-top: 30px;">
	<div class="row">
		<div class="col s12">
		<center><img src="{{asset('img/winner.png')}}" height="100px;"></center>
		</div>
		<div class="col s12">
		<center><h2 style="margin-top: 0px;">Results</h2></center>
		</div>
	</div>
	<div class="row">
		<center><strong>
		<div class="col s12 m4 l2 offset-l1">
			<div class="chip row">
				Technical
			</div>
			<div class="row" style="margin-bottom: 0px;">
				<h5 style="margin-bottom: 0px;">1. Akrita Verma</h5>
			</div>
			<div class="row" style="margin-top: 0px;">
				<h5 style="margin-top: 0px;" style="margin-bottom: 0px;">2. Abhishek</h5>
			</div>
		</div>
		<div class="col s12 m4 l2">
			<div class="chip row">
				Social
			</div>
			<div class="row">
				<h5>1. Praful Goyal</h5>
			</div>
		</div>
		<div class="col s12 m4 l2">
			<div class="chip row">
				Politics
			</div>
			<div class="row">
				<h5>1. Gautam Shakya</h5>
			</div>
		</div>
		<div class="col s12 m4 l2">
			<div class="chip row">
				Nature
			</div>
			<div class="row">
				<h5>1. Ishan Srivastava</h5>
			</div>
		</div>
		<div class="col s12 m4 l2">
			<div class="chip row">
				Poetry
			</div>
			<div class="row" style="margin-bottom: 0px;">
				<h5 style="margin-bottom: 0px;">1. Tanya Seth</h5>
			</div>
			<div class="row" style="margin-top: 0px;">
				<h5 style="margin-top: 0px;">2. Swapnil Kumar</h5>
			</div>
		</div>
		</center></strong>
	</div>
	<br>
	<div class="row">
		<center><h4>Appreciable Articles</h4></center>
	</div>
	<div class="row">
		<div class="col s12 m6 l4">
	      <ul class="collection with-header">
	        <li class="collection-header"><h4>Technical</h4></li>
	        <li class="collection-item">Er Mohdanas (Electronic Waste)</li>
	        <li class="collection-item">Sagar Shelar (Android Pay...)</li>
	        <li class="collection-item">Aditya Singh (Reliance Revolu...)</li>
	        <li class="collection-item">Santosh Nahak (Online Threats)</li>
	      </ul>
		</div>
		<div class="col s12 m6 l4">
	      <ul class="collection with-header">
	        <li class="collection-header"><h4>Social</h4></li>
	        <li class="collection-item">Akrita Verma (Honour Killing...)</li>
	        <li class="collection-item">Shraddha Jain (Samaj aur Sans...)</li>
	        <li class="collection-item">Shaukat Ali Khan (Dard Se Bilakhta...)</li>
	        <li class="collection-item">Shrishti Yadav (Standing at The Edge)</li>
	      </ul>
		</div>
		<div class="col s12 m6 l4">
	      <ul class="collection with-header">
	        <li class="collection-header"><h4>Politics</h4></li>
	        <li class="collection-item">Praful Goyal (Can Modi Be...)</li>
	        <li class="collection-item">Yashi Agarwal (Media and Politics)</li>
	        <li class="collection-item">Arvind Singh Chaudhary (Demonitization...)</li>
	        <li class="collection-item">Er Mohdanas (Kaledhan Ko...)</li>
	      </ul>
		</div>
		<div class="col s12 m6 l4">
	      <ul class="collection with-header">
	        <li class="collection-header"><h4>Nature</h4></li>
	        <li class="collection-item">Tanya Seth (Dharmshala The Night...)</li>
	        <li class="collection-item">Shraddha Jain (Prakriti Kyu Bani...)</li>
	        <li class="collection-item">Yashi Gupta (Rachael's Song)</li>
	        <li class="collection-item">N Tara (Seasons of Life)</li>
	      </ul>
		</div>
		<div class="col s12 m6 l4">
	      <ul class="collection with-header">
	        <li class="collection-header"><h4>Poetry</h4></li>
	        <li class="collection-item">Yashi Gupta (Seldom)</li>
	        <li class="collection-item">Niharika Sakshee (What If I told...)</li>
	        <li class="collection-item">Sakshi Sharma (Save Yourself an...)</li>
	        <li class="collection-item">Avni Agarwal (Captive in a Zoo)</li>
	        <li class="collection-item">Devesh Upadhyay (Jeevan Gaatha)</li>
	      </ul>
		</div>
	</div>
	<div class="row">
		<center><h4>Note: Prizes and Certificates will be awarded soon.</h4></center>
	</div>
</div>
@endsection

@section('js')
	<script>
		var user_id = {{ $user_id }};
	</script>
    <script src="{{ asset('js/homepage.js') }}"></script>
@endsection	