<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = [
    	'title',
    	'author_id',
    	'public',
    	'description',
    	'active'
    ];

    public function categories() {
    	return this->hasMany(Category::class);
    };

    public function users() {
    	return this->hasMany(User::class);
    };

    public function teams() {
    	return this->hasMany(Team::class);
    };
}