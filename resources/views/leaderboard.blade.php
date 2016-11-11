@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
@endsection

@section('content')
    
    <br>
    <img src="{{ asset('img/leader1.png') }}" id="leader">



















    <table class="table striped bordered responsive-table highlight">
    <tr>
    	<th>Author </th>
    
    	@foreach($categories as $cat)
    		<th>{{$cat->category_name}}</th>
    	@endforeach
    </tr>
    	@foreach($users as $user)
    	
    	<?php $flags  = array();$a= array(); ?>
    	@foreach($categories as $c)
    	<?php  $flags[$c->category_id]=0; ?>
    	@endforeach
    	
    		<tr>
    			<td>
                    <img src="{{$user->image}}" alt="" class="circle" style="width: 40px; height: 40px;">
                    {{$user->username}}
                </td>
    		@foreach($articles as $article)
    			@foreach($categories as $c)
    				@if(!$flags[$c->category_id] && $article->user_id == $user->user_id && $article->category_id==$c->category_id)

    					<?php $a[$c->category_id]['id']=$article->article_id;
    					$a[$c->category_id]['title']=$article->title;
    					$flags[$c->category_id]=1; ?>
    				@endif

    			@endforeach
    		@endforeach
    		
    	@foreach($categories as $c)
    			<td>
    			@if($flags[$c->category_id])
    					<a href="/article/{{$a[$c->category_id]['id']}}">{{$a[$c->category_id]['title']}}</a>
    			@endif
    			</td>
    	@endforeach
    			
    		</tr>
    	@endforeach		
   </table>
@endsection

@section('js')
    <!-- Link scripts here -->
@endsection