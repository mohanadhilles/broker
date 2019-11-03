<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Accept extends Model
{
    protected $table = 'accepts';
    protected $fillable = ['active', 'worker_id', 'employer_id', 'job_id', 'message_id', 'track_id'];

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


    public function acc()
    {
        return $this->belongsTo(User::class, 'worker_id')->select('id', 'name', 'salary', 'code', 'gender');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function messages()
    {
        return $this->belongsTo(Message::class, 'message_id');

    }

    public function track()
    {
        return $this->belongsTo(Track::class);
    }
}
