<?php

namespace App\Entities;

use app\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobType extends Model
{

    use SoftDeletes;

    protected $fillable = ['title'];
    protected $table = 'job_types';


    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }



}
