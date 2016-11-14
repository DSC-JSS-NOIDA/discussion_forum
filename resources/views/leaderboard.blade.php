@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
@endsection

@section('content')
    
    <div class="container">
    <br>
    <img src="{{ asset('img/leader1.png') }}" id="leader">
    <br><br>

    <table class="bordered striped">
    <div>
    <tr>
        <th>Sno.</th>
    	<th>Author </th>
    <?php $k=1; ?>
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
                <td style="font-size: 16px;"><?php echo $k;$k++; ?></td>
    			<td style="font-size: 16px;">
                    <img src="{{$user->image}}" alt="" class="circle" style="width: 41px; height: 40px;">
                    &nbsp;
                    <span style="top: -5px;">{{$user->username}}</span>
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
    			<td style="font-size: 16px;">
    			@if($flags[$c->category_id])
    					<a href="/article/{{$a[$c->category_id]['id']}}">{{substr($a[$c->category_id]['title'],0,20)}}...</a>
    			@endif
    			</td>
    	@endforeach
    			
    		</tr>
    	@endforeach
    </table>
    </div>
@endsection

@section('js')
    <!-- Link scripts here -->
@endsection