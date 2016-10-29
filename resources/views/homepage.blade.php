@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sx-12 col-md-6">
	    		<a type="button" class="btn btn-default" href="/auth/google">Login</a>
				Or My articles Section..............................................................................................
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
    <!-- Link scripts here -->
@endsection