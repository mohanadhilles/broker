<?php
namespace App\Entities;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = ['message','user_id','receiver_id'];


    public function user()
    {
        return $this->belongsTo(User::class)->select('id','name','email');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class,'receiver_id')->select('id','name','email');
    }

}
