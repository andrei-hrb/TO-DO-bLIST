<?php

namespace App;

class Task extends Model
{
    protected $fillable = [
        'text',
        'user_id'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model){
            $model['user_id'] = \Auth::user()->id;
        });
    }

    public static function getTasks($user)
    {
        return User::find($user)->tasks()->get();
    }
}