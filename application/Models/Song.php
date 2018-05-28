<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model as Eloquent;


/**
 * Class Song
 * @package App\Models
 * @access public
 */

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


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }



}
