<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    protected $fillable = [
    	'author_id',
    	'field_changed',
    	'old_value',
    	'new_value'
    ];

    public function user() {
    	return this->hasOne(User::class);
    };
}