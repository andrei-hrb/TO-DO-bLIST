<?php

namespace App;

class Task extends Model
{
    protected $fillable = [
        'text'
    ];

    public static function boot()
    {
        static::creating(function($model){
            $model['user_id'] = \Auth::user()->id;
        });
    }
}
