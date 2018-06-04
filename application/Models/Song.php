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
    /**
     * @var array
     */
    protected $fillable = [
        'track',
        'artist',
        'link',
        'user_id'
    ];

    /**
     * @var string
     */
    protected $table = 'songs';

    /**
     * @var array
     */
    public $timestamps = [];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
