@extends('layouts.app')

@section('css')

@endsection

@section('content')
	<div id="show_users" class="btn btn-primary">Show Users</div>
	<div id="users">
		<table class="table table-striped">
	    	<thead>
	      		<tr>
	        		<th>User Id</th>
	        		<th>Name</th>
	        		<th>Email</th>
	        		<th>Status</th>
	        		<th>Admin</th>
	      		</tr>
	    	</thead>
	    	<tbody>
				@foreach($users as $user)
					<tr class="user_detail" user_id="{{$user->user_id}}">
						<td>{{ $user->user_id }}</td>
						<td>{{ $user->username }}</td>
						<td>{{ $user->email }}</td>
						<td id="{{$user->user_id}}">{{ $user->status }}</td>
						<td>{{ $user->admin }}</td>
					</tr>
				@endforeach
	    	</tbody>
	  	</table>
  	</div>
@endsection

@section('js')
	<script src="{{asset('js/admin.js')}}"></script>
@endsection