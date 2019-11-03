<?php

namespace App\Entities;

use app\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $fillable = ['title'];
    protected $table = 'roles';

    public function user()
    {
        return $this->hasMany(User::class);
    }

}

