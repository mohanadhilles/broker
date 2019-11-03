<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    protected $table = 'lang';
    protected $fillable = ['title'];


    public function settings()
    {
        return $this->hasMany(Setting::class);
    }


}
