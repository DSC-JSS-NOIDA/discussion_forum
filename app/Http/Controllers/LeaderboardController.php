<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Category;
use App\Event;
use App\join;
use App\Rating;
use App\User;

class LeaderboardController extends Controller
{
    public function show()
    {
    	return view('leaderboard');
    }
}
