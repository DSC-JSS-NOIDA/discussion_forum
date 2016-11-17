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
use Mail;

class CommentController extends Controller
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
    public function create(Request $request)
    {
        $coment = new Comment;
        $coment->user_id = $request->user_id;
        $coment->article_id = $request->article_id;
        $coment->content = str_replace('<script>','',$request->comment);
        $coment->save();

        $user = User::find(Article::find($coment->article_id)->user_id);
        $from = User::find($coment->user_id);
        $article=Article::find($coment->article_id);

        Mail::send('emails.comment',['comment'=>$coment,'user'=>$user,'from'=>$from,'article'=>$article],function($m) use ($coment,$user){
            $m->from('gdgjssn@gmail.com','Articulus');
            $m->to($user->email,$user->username)->subject('Notification');
        });
        return "success";
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
    public function edit_comment(Request $request)
    {
        $comment_model = new Comment;
        $status = $comment_model->edit($request->comment_id,$request->comment,$request->user_id);
        return;
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
