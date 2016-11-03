<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
    	'user_id', 'article_id', 'rating',
    ];
    public function save_rating($user_id,$article_id,$rate)
    {
    	$rating = Rating::where([
                ['user_id','=',$user_id],
                ['article_id','=',$article_id]
            ])->get();
        if(count($rating))
        {
        	$diff = $rate - $rating[0]->rating ;
            $rating[0]->rating = $rate;
            $rating[0]->save();
            return $diff;
        }
        else
        {
            $rating = new Rating;
            $rating->user_id = $user_id;
            $rating->rating = $rate;
            $rating->article_id = $article_id;
            $rating->save();

            return -50;
        }
    }
}
