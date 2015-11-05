<?php

namespace LearnTube;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['video_title', 'video_description', 'video_category', 'video_url'];

    public function user()
    {
        return $this->belongsTo('LearnTube\User');
    }

    public function scopePersonal($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }
}
