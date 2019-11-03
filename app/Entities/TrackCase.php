<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TrackCase extends Model
{
    protected $table = 'track_cases';
    protected $fillable = ['title'];


    public function track()
    {
        return $this->hasMany(Track::class)->with('Timestamps');
    }
}
