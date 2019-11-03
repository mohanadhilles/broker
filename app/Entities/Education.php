<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use SoftDeletes;

    protected $fillable = ['title'];
    protected $table = 'education';

    public function user()
    {
        return $this->hasMany('Education');
    }

}
