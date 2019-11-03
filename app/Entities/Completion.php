<?php

namespace App\Entities;

use app\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Completion extends Model
{
    use SoftDeletes;

    protected $fillable = ['title'];
    protected $table = 'completions';

    public function user()
    {
        return $this->hasMany(User::class);
    }
}

