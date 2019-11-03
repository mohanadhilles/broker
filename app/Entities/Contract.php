<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table= 'contracts';
    protected $fillable = ['title'];

    public function user()
    {
        return $this->hasMany(User::class,'contract');
    }



}
