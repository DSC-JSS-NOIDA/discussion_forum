<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'category_name', 'article_count',
    ];
    protected $primaryKey = 'category_id';
    public function show()
    {
    	return Category::join('articles','articles.category_id','=','categories.category_id')
    		->select('categories.category_id','categories.category_name',DB::raw('count(*) as article_count'))
    		->groupBy('articles.category_id')
    		// ->count();
    		->get();
    }
}
