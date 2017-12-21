<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
    	'title',
    	'description',
    	'color',
    	'region',
    	'author_id',
    	'active'
    ];

    public function boards() {
    	return this->hasMany(Board::class);
    };

    public function users() {
    	return this->hasMany(User::class);
    };
}