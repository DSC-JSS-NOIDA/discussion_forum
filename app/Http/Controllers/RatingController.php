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

class RatingController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public function rate_by_user(Request $request)
    {
        if(!Auth::check())
        {
            $errorcode = 1;
            $category_model = new Category;
            $categories = $category_model->show();
            return view('errors.503',compact('categories','errorcode'));
        }
        $user_id = $request->user_id;
        $rate = $request->rate;
        $article_id = $request->article_id;
        $rating_model = new Rating;
        //create or update rating in rating table..
        $save_and_diff = $rating_model->save_rating($user_id,$article_id,$rate);
        
        $article_model = new Article;
        
        //increment no. of raters if this is a new rater..
        if($save_and_diff==-50)
        {
            $article_model->increment_raters($article_id);
        }


        //update the average rating of the article and return it
        $avg = $article_model->update_avg($article_id,$save_and_diff,$rate);
        $data['avg'] = $avg;
        $data['my_rating'] = $rate;
        $data['raters'] = $article_model->getRaters($article_id);
        return $data;
    }
}
