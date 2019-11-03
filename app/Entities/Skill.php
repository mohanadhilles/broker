<?php

namespace App\Entities;

use app\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use SoftDeletes;

    protected $fillable = ['title'];
    protected $table = 'skills';

    public function users(){
        return $this->belongsToMany('App\User')->with('Timestamps');
    }


}
