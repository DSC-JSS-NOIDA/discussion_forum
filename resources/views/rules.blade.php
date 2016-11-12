@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
@endsection

@section('content')
    
    <br>
    <div class="row">
    	<img src="{{ asset('img/rules1.png') }}" id="rules">
    	<div class="col s10 offset-s1">	
    		<div class="card">
    			<br>
    			<div class="row">
	    			<div class="col s10 offset-s1">
		    			<ol style="font-size: 18px;">
		    				<li>Participants must be currently enrolled as a graduate student at an accredited university.</li>
		    				<li>Submissions must be a minimum of 300 words. There is no maximum word limit.</li>
		    				<li>Submissions must be new original work that has not been previously published (this includes articles published in your school newspaper, on other websites or blogs, or even as part of your graduate thesis). Any references made within the work to other studies or publications must be credited and noted. However, submissions will not be considered and may be removed if they are primarily a collection of links to other articles.</li>
		    				<li>All participants must become registered users , and follow the submission instructions provided for the competition.</li>
		    				<li>All submissions must be received between November  12, 2016 07:00 pm PDT, and November  20, 2016 07:00 pm IST.</li>
		    				<li>A participant can write atmost 1 article per category.. that means if there are 5 categories he/she can write atmost 5 articles( each in one category).</li>
		    				<li>Submissions must be about concerned category, and will be judged upon their clarity, accuracy, and relevance to the discipline of category under which they are submitted. Consideration will also be given to the contemporary nature of the topic, the overall readability of the article, as well as the writing skill of the author.</li>
		    				<li>Finalists will be notified by email.</li>
		    				<li>Winners will be determined on the basis of average rating of other participants  as well as on the basis of  evaluation by our respective judges.</li>
		    				<li>Winners will be announced on gdgjss.in as well as on the Facebook page.</li>
		    				<li>Exciting prizes will be given to winners.</li>
		    				<br>
		    			</ol>
	    			</div>
    			</div>
    		</div>
    	</div>
    </div>



@endsection

@section('js')
    <!-- Link scripts here -->
@endsection