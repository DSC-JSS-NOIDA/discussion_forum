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

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_name = $request->category;
        $category = Category::select('category_id')
                    ->where('category_name',$category_name)
                    ->get();
        $category = $category->toArray();
        $category_id = $category[0]['category_id'];
        $articles = Article::where([
                ['user_id','=',$request->user_id],
                ['category_id','=',$category_id]
            ])
            ->get();
        if(count($articles))
            return view('errors.503');
        $article = new Article;
        $article->user_id = (int)$request->user_id;
        $article->category_id = (int)$category_id;
        $article->title = "";
        $article->content = "";
        $article->reference = "";
        $article->avg_rating = -1;
        $article->no_of_rating = 0;
        $article->save();
        return $article->category_id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if(Auth::check())
        {
            $user = Auth::user();
            $user_id = $user->user_id;
        }
        else
            $user_id = -1;
       $article = Article::where('article_id', $id)->get();
        if(!count($article))
            return view('errors.503');
        else
            $article = $article[0];
            $comments = Comment::join('users', 'users.user_id','=','comments.user_id')
                        ->select('users.username','comments.*')
                        ->where('comments.article_id', $id)
                        ->get();

            $rating = Rating::where([
                ['article_id','=',$id],
                ['user_id','=',$user_id],
            ])->get();
            if(!count($rating))
                $rating_by_me=-1;
            else
                $rating_by_me = $rating[0]->rating;

            return view('article', compact('article','comments','user_id','rating_by_me'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            $user_id = $user->user_id;
            //$user_id = 55;
            $article = Article::where([
                ['article_id','=',$id],
                ['user_id','=',$user_id],
            ])
            ->get(); 
            if(!count($article))
                return view('errors.503');
            else
            {
                return view('editor',compact('article'));
            }
        }
        else
            return view('errors.503');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
