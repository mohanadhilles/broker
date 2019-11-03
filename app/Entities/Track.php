<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $table = 'tracks';
    protected $fillable = ['user_id','job_id','description','track_case_id','accept_id','helper_id'];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function helper()
    {
        return $this->belongsTo(User::class,'helper_id');
    }

    public function jobs()
    {
        return $this->belongsTo(Job::class,'job_id');
    }

    public function accept()
    {
        return $this->belongsTo(Accept::class,'accept_id');
    }

    public function track_case()
    {
        return $this->belongsTo(TrackCase::class,'track_case_id');
    }
}
