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
use Db;

class LeaderboardController extends Controller
{
        if(!Auth::check())
        {
            $errorcode = 1;
            $category_model = new Category;
            $categories = $category_model->show();
            return view('errors.503',compact('categories','errorcode'));
        }
    public function show()
    {
        $category_model = new Category;        
        $categories = $category_model->show();
    	// $categories = Category::get();
    	$users = User::join("articles","users.user_id","=","articles.user_id")
                ->groupBy('users.user_id')
                ->where('status',"=","1")
                ->orderBy(DB::raw('SUM(avg_rating)'),'desc')->get();
    	$articles =Article::get();
    	return view('leaderboard',compact('categories','users','articles'));
    }

    public function rules()
    {
        if(!Auth::check())
        {
            $errorcode = 1;
            $category_model = new Category;
            $categories = $category_model->show();
            return view('errors.503',compact('categories','errorcode'));
        }
        $category_model = new Category;        
        $categories = $category_model->show();
        return view('rules',compact('categories'));
    }

    public function over()
    {
        if(!Auth::check())
        {
            $errorcode = 1;
            $category_model = new Category;
            $categories = $category_model->show();
            return view('errors.503',compact('categories','errorcode'));
        }
        $category_model = new Category;
        $categories = $category_model->show();
        return view('errors.over',compact('categories'));
    }

    public function announcement()
    {
        if(!Auth::check())
        {
            $errorcode = 1;
            $category_model = new Category;
            $categories = $category_model->show();
            return view('errors.503',compact('categories','errorcode'));
        }
        $category_model = new Category;
        $categories = $category_model->show();
        return view('announcement',compact('categories'));
    }
}
