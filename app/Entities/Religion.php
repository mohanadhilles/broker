<?php

namespace App\Entities;

use app\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Religion extends Model
{

    use SoftDeletes;

    protected $fillable = ['title'];
    protected $table = 'religions';


    public function user()
    {
        return $this->hasMany(User::class);
    }


}
