<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'category_name', 'article_count',
    ];
    protected $primaryKey = 'category_id';
    public function show()
    {
    	return Category::get();
    }
}
