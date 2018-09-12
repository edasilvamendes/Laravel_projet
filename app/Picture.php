<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{

	protected $fillable = [
		'link'
	];

    public function posts() {
    	return $this->belongsTo(Post::class);
    }

}
