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

class HomeController extends Controller
{
    public function index()
    {
//<<<<<<< HEAD
    	$user = Auth::user();
        $category_model = new Category;
        $categories = $category_model->show();
        //$categories = Category::get();
    	if($user)
        {
            $user_id = $user->user_id;
        	$my_articles = Article::join('users','users.user_id','=','articles.user_id')
        				->join('categories','categories.category_id','=','articles.category_id')
        				->select('users.username','users.user_id','articles.*','categories.category_name')
        				->where('users.email',$user->email)
        				->get();
            $remaining_categories = array();
            foreach ($categories as $category)
            {
                $flag=1;
                foreach ($my_articles as $my_article)
                {
                    if($category->category_id==$my_article->category_id)
                    {
                        $flag=0;
                        break;
                    }
                }
                if($flag==1)
                {
                    $remaining_categories[] = $category->category_name;
                }
            }
        	return view('homepage', compact('categories','my_articles','remaining_categories','user_id'));
        }
        else
        {
            $user_id = 0;
            return view('homepage', compact('categories','user_id'));
        }
	}
//=======
//   	$categories = Category::get();
//    	return view('homepage', compact('categories'));
    	
//   }
//>>>>>>> 7017bd9e9a79cc687905537c2be473ec73d60cea
}
