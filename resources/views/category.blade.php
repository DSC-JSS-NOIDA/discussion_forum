@foreach($categories as $category)
	<a href="/category/{{$category->category_id}}" ref="">
		{{ $category->category_name }}
	</a>
	<br>
@endforeach
