<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $fillable = [
    	'post_type', 'title', 'description', 'begin_date', 'end_date', 'price', 'max_students', 'id_category'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function picture(){
        return $this->hasOne(Picture::class);
    }
    
}
