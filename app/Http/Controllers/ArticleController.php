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
    public function create($category)
    {
        $category_model = new Category;
        $categories = $category_model->show();
        $category = Category::where('category_name',$category)->get();
        // var_dump($category);
        $category_id = $category[0]['category_id'];
        // echo $category_id;
        $status = "new";
        return view('editor',compact('status','category_id','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_id = $request->category_id;
        $articles = Article::where([
                ['user_id','=',$request->user_id],
                ['category_id','=',$category_id]
            ])
            ->get();
        if(count($articles))
        {
            $errorcode=3;
            return view('errors.503','errorcode');
        }
        $article = new Article;
        $article->user_id = Auth::user()->user_id;
        $article->category_id = $category_id;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->rawcontent = strip_tags($request->content,"");
        $article->reference = $request->reference;
        $article->avg_rating = -1;
        $article->no_of_rating = 0;
        $article->save();
        // return redirect('/editor/'.$article->article_id);
        return redirect('/article/'.$article->article_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category_model = new Category;
        $categories = $category_model->show();
      if(Auth::check())
        {
            $user = Auth::user();
            $user_id = $user->user_id;
            $username = $user->username;
        }
        else
        {
            $user_id = -1;
            $username = 'guest';
        }
       $article = Article::join('users','users.user_id','=','articles.user_id')
                    ->join('categories','categories.category_id','=','articles.category_id')
                    ->select('categories.category_name','users.username','users.image','articles.*')
                    ->where('article_id', $id)->get();
                    // return $article;
        if(!count($article))
        {
            $errorcode=4;
            return view('errors.503',compact('categories','errorcode'));
        }
        else
            $article = $article[0];
            $author = $article->user_id;
            //$author = (int)$author;
            $author = User::where('user_id',$author)->get();
            // var_dump($author);
            if($author[0]->status==0)
            {
                $errorcode=5;
               return view('errors.503',compact('categories','errorcode'));
            }
            $comments = Comment::join('users', 'users.user_id','=','comments.user_id')
                        ->select('users.username','comments.*','users.image')
                        ->where('comments.article_id', $id)
                        ->where('users.status',1)
                        ->get();

            $raters = Rating::join('users','users.user_id','=','ratings.user_id')
                        ->where('ratings.article_id',$id)
                        ->select('users.username','users.image','ratings.*')
                        ->get();
            // return var_dump($raters);
            $rating = Rating::where([
                ['article_id','=',$id],
                ['user_id','=',$user_id],
            ])->get();
            if(!count($rating))
                $rating_by_me=-1;
            else
                $rating_by_me = $rating[0]->rating;
            // echo $username;
            return view('article', compact('article','categories','comments','user_id','rating_by_me','username','raters'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_model = new Category;
        $categories = $category_model->show();
        if(Auth::check())
        {
            $user = Auth::user();
            $user_id = $user->user_id;
            $article = Article::where([
                ['article_id','=',$id],
                ['user_id','=',$user_id],
            ])
            ->get(); 
            if(!count($article))
            {
                $errorcode=4;
                return view('errors.503',compact('categories','errorcode'));
            }
            else
            {
                return view('editor',compact('article','categories'));
            }
        }
        else
        {
            $errorcode=1;
            return view('errors.503',compact('categories','errorcode'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category_model = new Category;
        $categories = $category_model->show();
        if(Auth::check())
        {
            $user = Auth::user();
            $user_id = $user->user_id;
            $article = Article::where([
                ['article_id','=',$request->article_id],
                ['user_id','=',$user_id],
            ]);
            if(!count($article))
            {
                $errorcode=4;
                return view('errors.503',compact('categories','errorcode'));
            }
            else
            {
                //update article
                $data = $request->only('title','content','reference');
                $data["rawcontent"]=strip_tags($request->content,"");                
                $article -> update($data);
                return redirect('/article/'.$request->article_id);
            }
        }
        else
        {
            $errorcode=1;
            return view('errors.503',compact('categories','errorcode'));
        }
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
