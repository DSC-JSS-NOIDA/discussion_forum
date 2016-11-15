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

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_model = new Category;
        $categories = $category_model->show();
        if(Auth::check())
        {
            if(Auth::user()->admin==1)
            {
                $users = User::orderBy('admin','desc')->orderBy('status')->orderBy('email')->get();
                return view('admin.home',compact('users','categories'));
            }
            else
            {
                $errorcode=2;
                return view('errors.503',compact('categories','errorcode'));
            }
        }
        else
        {
            $errorcode=1;
            return view('errors.503',compact('categories','errorcode'));
        }
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
    public function spam(Request $request)
    {
        $category_model = new Category;
        $categories = $category_model->show();
        $user_id = $request->user_id;
        $user_id = (int)$user_id;
        // return var_dump($user_id);
        $user = User::where('user_id',$user_id)->get();
        // return $user;
        // echo $user;
        if(!count($user))
            return "User does not Exist";
        else
        {
            //return $user[0];
            if($user[0]->status==0)
            {
                User::where('user_id',$user_id)->update(['status'=>1]);
                return "User unspammed";
            }
            else
            {
                User::where('user_id',$user_id)->update(['status'=>0]);
                return "User Spammed";
            }
        }
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
}
