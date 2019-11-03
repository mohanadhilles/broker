<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "answers";
    protected $fillable = ['title'];


    public function follow()
    {
        return $this->hasMany(FollowUp::class);
    }
}
