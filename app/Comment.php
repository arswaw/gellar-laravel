<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
    	'title',
    	'body',
    	'author_id',
    	'todo_id'
    ];

    public function todo() {
    	return this->belongsTo(ToDo::class);
    };

}