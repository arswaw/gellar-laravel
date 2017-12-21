<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'title',
    	'board_id',
    	'author_id',
    	'active'
    ];

    public function board() {
    	return this->belongsTo(Board::class);
    };

    public function todos() {
    	return this->hasMany(ToDo::class);
    };
}