<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['photo'];
    protected $table = 'banners';

//    protected $appends = ['imgUrl'];

//    public function getImgUrlAttribute()
//    {
//        if (strpos($this->photo, 'http') !== false) {
//            return $this->photo;
//        } else if ($this->photo) {
//            return env('APP_URL') .'/storage/' . $this->photo;
//        } else {
//            return env('APP_URL') . '/images' . '/showCase.png';
//
//        }
//
//    }


    public function setting(){

        return $this->belongsToMany('App\Entities\Setting');

    }



}
