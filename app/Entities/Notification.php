<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = ['title','job_type_id','user','country_id','job_id'];


    public function user(){
        return $this->belongsTo(User::class,'user');
    }

    public function job_type(){

        return $this->belongsTo(JobType::class,'job_type_id');
    }

    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }
    public function job(){
        return $this->belongsTo(Job::class,'job_id');
    }
}
