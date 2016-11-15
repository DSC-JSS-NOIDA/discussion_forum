@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
@endsection

@section('content')
    <br>
    <center><h3>
	<?php 
	switch($errorcode)
	{	
    	case 1:
		    echo "User not logeed in.";
			break; 
    	case 2:
    		echo "Access denied for admin panel.";
			break; 
    	case 3:
    		echo "Can not create article. You have already written article this category.";
			break; 
    	case 4:
    		echo "No such article exist.";
			break;
    	case 5:
	   		echo "This articles has been marked as spam. Contact admin.";
			break; 
    	case 6:
    		echo "Category doesn't exist.";
			break; 
    	default:
    		echo "Missing Page";
    }
    ?>
    </h3>
    </center>
    <img src="{{ asset('img/404.png') }}" style="padding-left: 15%;">
@endsection

@section('js')
    <!-- Link scripts here -->
@endsection