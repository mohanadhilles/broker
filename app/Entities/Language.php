<?php

namespace App\Entities;

use app\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use SoftDeletes;

    protected $fillable = ['title'];
    protected $table = 'languages';


    public function user()
    {
        return $this->hasMany(User::class);
    }







}
