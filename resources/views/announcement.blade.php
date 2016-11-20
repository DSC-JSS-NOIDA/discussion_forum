@extends('layouts.app')

@section('css')
    <!-- Link CSS Files here -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/leaderboard.css') }}">
@endsection

@section('content')
    
    <br>
    <div class="row">
    <center><h1>Announcements</h1></center>
        <div class="col s12 l10 offset-l1"> 
            <div class="card">
                <br>
                <div class="row">
                    <div class="col s12">
                        <ol id="rules_list">
                            <li>The Article submissions will be closed by 20th November, Midnight.</li>
                            <li>Participants are still allowed to rate each others articles and the ratings will be considered till 21st Nov, Midnight.</li>
                            <li>Any Rating or Comments made after 21st Nov will not count towards the Judgement.</li>
                            <li>The results of the Event will be announced once all the articles are thoroughly analysed.</li>
                            <li>The results will be announced on this site, http://gdgjss.in and http://facebook.com/gdgjss</li>
                            <li>All decisions taken by the GDG JSS Noida will be final.</li>
                            <li>GDG JSS reserves the right to spam a user for Plagiarised/Irrelevant content.</li>
                            <li><strong>Please fill the following Form to be eligible to win prizes and goodies.</strong></li>
                            <h3><a href="https://goo.gl/forms/OtKWLp6Lja4J4Vwm2">Click here to fill out your details..</a></h3>
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