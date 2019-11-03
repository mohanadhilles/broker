<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table ='providers';

    protected $fillable = ['provider', 'provider_id','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
