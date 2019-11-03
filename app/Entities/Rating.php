<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';
    protected $fillable = ['user_id','worker_id','rating'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
