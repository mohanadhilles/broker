<?php

namespace App;

use App\Entities\Accept;
use App\Entities\City;
use App\Entities\Completion;
use App\Entities\Contract;
use App\Entities\Country;
use App\Entities\Currency;
use App\Entities\Education;
use App\Entities\FollowUp;
use App\Entities\Job;
use App\Entities\JobType;
use App\Entities\Language;
use App\Entities\Message;
use App\Entities\Notification;
use App\Entities\Notifications\PasswordResetNotification;
use App\Entities\Place;
use App\Entities\Provider;
use App\Entities\Rating;
use App\Entities\Religion;
use App\Entities\Role;
use App\Entities\Track;
use Carbon\Carbon;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Nova\Actions\Actionable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{

    use Notifiable, SoftDeletes, HasApiTokens, Notifiable, CanResetPassword, Actionable;

    protected $fillable = [
        'name', 'email', 'password', 'brand', 'role', 'whats_app', 'experience','follow_up_id','social_id','provider_id',
        'worked_in', 'place_of_birth', 'job_type', 'nationality', 'arabic_lang',
        'mandarin_lang', 'english_lang', 'currency', 'religion',
        'phone', 'date_of_birth', 'photo', 'cv', 'available_at', 'date_join_training_center',
        'age', 'status', 'active', 'city', 'facebook', 'passport', 'passport_date_of_issue',
        'passport_date_of_exp', 'exp_visa', 'marital_status', 'no_of_child', 'height', 'completion', 'job', 'notification',
        'weight', 'gender', 'bio', 'code', 'salary', 'education', 'country', 'youtube', 'contract','track_id'

    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $appends = ['imgUrl'];


    public function findForPassport($username) {
        return $this->where('phone', $username)->orWhere('email',$username)->first();
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));

    }

    public function getImgUrlAttribute()
    {
        if (strpos($this->photo, 'http') !== false) {
            return $this->photo;
        } else if ($this->photo) {
            return env('APP_URL') . 'storage/storage/' . $this->photo;
        } else {
            return env('APP_URL') . 'avatar.png';

        }
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setDateFormata($input)
    {
        $this->attributes['passport_date_of_exp'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        $this->attributes['exp_visa'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        $this->attributes['passport_date_of_issue'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        $this->attributes['exp_visa'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        $this->attributes['exp_visa'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        $this->attributes['date_of_birth'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
    }

    public function getEntryDateAttribute($input)
    {
        return Carbon::createFromFormat('Y-m-d', $input)
            ->format(config('app.date_format'));
    }

    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }

    public function isAdmin()
    {
        $role = Role::all();
        return $role->id;
    }

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

    public function setCodeAttribute($input)
    {
        $this->attributes['code'] = $input ? $input : null;
    }

    public function setRoleIdAttribute($input)
    {
        $this->attributes['role'] = $input ? $input : null;
    }

    public function notifications()
    {
        $this->hasMany(Notification::class, 'notification');
    }

    public function worked_in()
    {
        return $this->belongsTo(Country::class, 'worked_in');
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class,'worker_id');
    }

    public function place()
    {
        return $this->belongsTo(Place::class, 'place');
    }

    public function skills()
    {
        return $this->belongsToMany('App\Entities\Skill');
    }

    public function place_of_birth()
    {
        return $this->belongsTo(Country::class, 'place_of_birth');
    }

    public function nationality()
    {
        return $this->belongsTo(Country::class, 'nationality');
    }

    public function countries()
    {
        return $this->belongsTo(Country::class, 'country');
    }

    public function english_lang()
    {
        return $this->belongsTo(Language::class, 'english_lang');
    }

    public function arabic_lang()
    {
        return $this->belongsTo(Language::class, 'arabic_lang');
    }

    public function mandarin_lang()
    {
        return $this->belongsTo(Language::class, 'mandarin_lang');
    }

    public function roles()
    {
        return $this->belongsTo(Role::class, 'role');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency');
    }

    public function education()
    {
        return $this->belongsTo(Education::class, 'education');
    }

    public function completion()
    {
        return $this->belongsTo(Completion::class, 'completion');
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class, 'religion');
    }

    public function job_type()
    {
        return $this->belongsTo(JobType::class, 'job_type');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city');
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }


    public function accept()
    {
        return $this->hasMany(Accept::class);
    }

    public function follow()
    {
        return $this->belongsToMany(FollowUp::class,'follow_up_id');
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    public function track()
    {
        return $this->belongsTo(Track::class,'track_id');
    }


}
