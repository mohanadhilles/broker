<?php

namespace App\Entities;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    protected $fillable = ['question_id','answer_id','user_id','date','other'];
    protected $table = 'follow_ups';


    public function setDateFormata($input)
    {
        $this->attributes['date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');

    }

    public function getEntryDateAttribute($input)
    {
        return Carbon::createFromFormat('Y-m-d', $input)
            ->format(config('app.date_format'));
    }
    public function user()
    {
        return $this->belongsTo(User::class)->select('id','name','email','phone','code');

    }
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

}
