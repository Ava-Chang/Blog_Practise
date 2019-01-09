<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'content', 'add_user'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

}
