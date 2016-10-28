<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
    	'user_id', 'category_id', 'title', 'content', 'reference', 'avg_rating', 'no_of_rating',
    ];
}
