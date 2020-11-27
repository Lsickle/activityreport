<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'time',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function activity()
    {
        return $this->belongsTo('App\Activity');
    }
}
