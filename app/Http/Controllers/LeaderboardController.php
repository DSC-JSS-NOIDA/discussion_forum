<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Article;
use App\Category;
use App\Event;
use App\join;
use App\Rating;
use App\User;
use App\Comment;

class LeaderboardController extends Controller
{
    public function show()
    {
        $category_model = new Category;        
        $categories = $category_model->show();
    	// $categories = Category::get();
    	$users = User::join("articles","Users.user_id","=","Articles.user_id")
                ->groupBy('users.user_id')
                ->where('status',"=","1")->get();
    	$articles =Article::get();
    	return view('leaderboard',compact('categories','users','articles'));
    }

    public function rules()
    {
        $category_model = new Category;        
        $categories = $category_model->show();
        return view('rules',compact('categories'));
    }
}
