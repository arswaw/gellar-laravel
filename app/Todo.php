<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    protected $fillable = [
    	'title',
    	'category_id',
    	'author_id',
    	'active',
    	'description',
    	'is_completed',
    	'due_date',
    	'pinned',
    	'priority'
    ];

    public function category() {
    	return this->hasOne(Category::class);
    };

    public function comments() {
    	return this->hasMany(Comment::class);
    };

    public function labels() {
    	return this->hasMany(Label::class);
    };

    public function users() {
    	return this->hasMany(User::class);
    };
}