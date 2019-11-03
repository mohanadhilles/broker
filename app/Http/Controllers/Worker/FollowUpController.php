<?php

namespace App\Http\Controllers\Worker;

use App\Entities\Answer;
use App\Entities\FollowUp;
use App\Entities\Question;
use App\Http\Controllers\BaseController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;

class FollowUpController extends BaseController
{

    public function sendMgs($to = null, $body = null)
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $client = new Client($sid, $token);
        try {

            $message = $client->messages->create(
                $to,
                array(
                    'from' => env('TWILIO_FROM'),
                    'body' => $body,
                )
            );
        } catch (Twilio\Exceptions\RestException $e) {
            return $e;
        }
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('error validation', $validator->errors());
        }

        $phone = explode(',', $request->input('phone'));

        $followUp = User::where('phone', $phone)->where('follow_up_id', $id)->with('follow')->first();

        if ($followUp->followUp->id >= 12) {

            return $this->sendError(' not found ! ');

        }
        switch ($followUp->follow->id) {
            case 1:
                $this->sendMgs($request->phone, 'https://www.mery.com/follow-up/2');

                $followUp->follow_up_id = $id + 1;
                break;
            case 2:
                $this->sendMgs($request->phone, 'Welcome To mery.com please go to https://www.mery.com/up/3');
                $followUp->follow_up_id = $id + 1;
                break;
            case 3:
                $this->sendMgs($request->phone, 'Welcome To mery.com please go to https://www.mery.com/up/4');
                $followUp->follow_up_id = $id + 1;
                break;
            case 4:
                $this->sendMgs($request->phone, 'Welcome To mery.com please go to https://www.mery.com/up/5');
                $followUp->follow_up_id = $id + 1;
                break;
            case 5:
                $this->sendMgs($request->phone, 'Welcome To mery.com please go to https://www.mery.com/up/6');
                $followUp->follow_up_id = $id + 1;
                break;
            case 6:
                $this->sendMgs($request->phone, 'Welcome To mery.com please go to https://www.mery.com/up/7');
                $followUp->follow_up_id = $id + 1;
                break;
            case 7:
                $this->sendMgs($request->phone, 'Welcome To mery.com please go to https://www.mery.com/up/8');
                $followUp->follow_up_id = $id + 1;
                break;
            case 8:
                $this->sendMgs($request->phone, 'Welcome To mery.com please go to https://www.mery.com/up/9');
                $followUp->follow_up_id = $id + 1;
                break;
            case 9:
                $this->sendMgs($request->phone, 'Welcome To mery.com please go to https://www.mery.com/up/10');
                $followUp->follow_up_id = $id + 1;
                break;
            case 10:
                $this->sendMgs($request->phone, 'Welcome To mery.com please go to https://www.mery.com/up/11');
                $followUp->follow_up_id = $id + 1;
                break;
            case 11:
                $this->sendMgs($request->phone, 'Welcome To mery.com please go to https://www.mery.com/up/12');
                $followUp->follow_up_id = $id + 1;
                break;
            default:
                echo "Your favorite color is neither red, blue, nor green!";
        }
        $followUp->update($request->all());

        if (!($followUp)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($followUp, ' read successfully');
    }

    public function question($fo_id){

       $q = Question::where('id',$fo_id)->first();
       return $q;


    }
    public function follow(Request $request)
    {
        $userId = Auth::user()->id;
        $followUp = FollowUp::with('question')->with('answer')->with('user')->where('user_id',$userId)->first();
        $followUp->update($request->all());
        if (!($followUp)) {
            return $this->sendError(' not found ! ');
        }
        $q = $this->question($followUp->question->id + 1);
        return $this->sendResponse($followUp, $q);
    }

    public function getfollow()
    {
        $userId = Auth::user()->id;
        $follow = FollowUp::where('user_id',$userId)->first();

        if (!($follow)){
            $f = new FollowUp();
            $f->user_id = $userId;
            $f->question_id = 1;
            $f->answer_id = 1;
            $f->save();
        }

        $followUp = FollowUp::with('question')->with('answer')->with('user')->where('user_id',$userId)->first();
        $q = $this->question($followUp->question->id);


        if (!($followUp)) {

            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($followUp, $q);
    }

}
