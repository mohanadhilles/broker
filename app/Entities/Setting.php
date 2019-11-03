<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['fb','tw','yt','phone','address','country_id','lang_id','about'];
    protected $table = 'settings';





    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function language()
    {
        return $this->belongsTo(Lang::class,'lang_id');
    }

    public function banner(){

        return $this->belongsToMany('App\Entities\Banner');

    }



}
