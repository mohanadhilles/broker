<?php

namespace App\Entities;

use app\User;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table= 'cities';
    protected $fillable = ['title','country'];



    public function country()
    {
        return $this->belongsTo(Country::class,'country');
    }

    public function user(){
        return $this->hasMany(User::class);
}

}
