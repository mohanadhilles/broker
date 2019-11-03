<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table= "questions";
    protected $fillable = ['title'];


    public function follow()
    {
        return $this->hasMany(FollowUp::class);
    }
}
