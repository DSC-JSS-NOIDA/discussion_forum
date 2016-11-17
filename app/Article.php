<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
    	'user_id', 'category_id', 'title', 'content', 'reference', 'avg_rating', 'no_of_rating',
    ];
    protected $primaryKey = 'article_id';

    public function increment_raters($article_id)
    {
    	$article = Article::where('article_id',$article_id)->get();
    	$article = $article[0];
  		$article->no_of_rating ++  ;
    	$article->save();
    }
    public function update_avg($article_id,$change,$rate)
    {
    	$article = Article::where('article_id',$article_id)->get();
    	
    	
    	if($change!=-50)
    	{
    	$article[0]->avg_rating += ($change/$article[0]->no_of_rating);
    	}
    	else
    	{
    		//it means a new user has rated an article

    		//taking max because we store -1 as initial avg rating
    		$old_total_rating = max($article[0]->avg_rating*($article[0]->no_of_rating-1),0);
    		$new_total_rating = $old_total_rating + $rate;
    		$article[0]->avg_rating = $new_total_rating/$article[0]->no_of_rating;
    	}
    	$article[0]->save();
    	return $article[0]->avg_rating;
    }

    public function getRecent()
    {
        return Article::join('categories','categories.category_id','=','articles.category_id')
                ->join('users','users.user_id','=','articles.user_id')
                ->select('categories.category_name','articles.*','users.username','users.image')
                ->where('users.status','=','1')
                ->latest()->limit(8)->get();
    }

    public function getRaters($id)
    {
         return Article::where('article_id',$id)->value('no_of_rating');
    }
    public function check($user_id,$id)
    {
        $article = Article::where([
                ['article_id','=',$id],
                ['user_id','=',$user_id],
            ])
            ->get();
            if(!count($article))
                return 0;
            else
            {
                return 1;
            }
    }

    public function delete_article($id)
    {
        Article::where('article_id',$id)->delete();
        return;
    }

}
