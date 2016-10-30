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
use App\Comment;

class HomeController extends Controller
{
    public function index()
    {
    	$categories = Category::get();
    	//$categories = $categories->toArray();
    	return view('homepage', compact('categories'));
    }
}
