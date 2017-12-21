<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
    	'file_name',
    	'resolution',
    	'file_size',
    	'maker',
        'todo_id',
        'author_id',
    	'model',
    	'flash',
    	'focal_length',
    	'white_balance',
    	'aperture',
    	'author_id',
    	'exposure_time',
    	'ISO',
    	'storage_URL'
    ];

    public todo() {
        return this->belongsTo(ToDo::class);
    }
}