<?php

namespace App\Entities;

use app\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    protected $table = 'jobs';
    protected $fillable = [

        'job_type', 'wanted_at', 'salary', 'employer', 'place_size','age',
        'place', 'country', 'bed_rooms', 'child_no', 'gender', 'contract', 'status','active','description'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $random_code = null;
            while ($random_code === null) {
                $tmp_random_code = '#' . rand(10000000, 99999999);
                if (!self::where('code', $tmp_random_code)->count()) {
                    $random_code = $tmp_random_code;
                }
            }
            $model->code = $random_code;
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class,'employer');
    }

    public function places()
    {
        return $this->belongsTo(Place::class,'place');
    }
    public function place()
    {
        return $this->belongsTo(Place::class,'place');
    }

    public function type()
    {
        return $this->belongsTo(JobType::class,'job_type');
    }

    public function countries()
    {
        return $this->belongsTo(Country::class,'country');
    }
    public function country()
    {
        return $this->belongsTo(Country::class,'country');
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class,'contract');
    }

    public function accept()
    {
        return $this->hasMany(Accept::class);
    }

    public function track(){
        return $this->hasMany(Track::class);
    }

    public function notifications(){
        return $this->hasMany(Notification::class);
    }

}
