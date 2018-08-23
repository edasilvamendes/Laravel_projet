<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    /*protected $fillable = [
    	'title', 'description', 'begin_date', 'end_date', 'price', 'max_students'
    ];*/

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function picture(){
        return $this->hasOne(Picture::class);
    }
    
}
