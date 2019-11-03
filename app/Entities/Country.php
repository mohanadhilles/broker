<?php

namespace App\Entities;

use app\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    protected $fillable = ['title','code'];
    protected $table = 'countries';

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function settings()
    {
        return $this->hasMany(Setting::class);
    }



}
