<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model as Eloquent;


class Song extends Eloquent
{
    protected $fillable = [
        'track',
        'artist',
        'link',
        'user_id'
    ];

    protected $table = 'songs';

    public $timestamps = [];

}
