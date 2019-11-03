<?php

namespace App\Entities;

use app\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use SoftDeletes;

    protected $fillable = ['title'];
    protected $table = 'currencies';


    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function city()
    {
        return $this->hasMany(User::class);
    }

}
