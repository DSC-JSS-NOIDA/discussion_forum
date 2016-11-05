<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'user_id', 'article_id', 'content',
    ];
    protected $primaryKey = 'comment_id';
    public function edit($id,$comment,$user_id)
    {
    	$record = Comment::where([
                ['user_id','=',$user_id],
                ['comment_id','=',$id],
            ])->get();
    	if(count($record))
    	{
    		$record[0]->content = $comment;
    		$record[0]->save();
    		return 1;
    	}
    	return 0;
    }

}
