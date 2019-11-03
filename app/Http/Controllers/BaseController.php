<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;
class BaseController extends Controller
{

    public function sendResponse($result, $message)
    {
        $response = [
            'code' => 200,
            'success' => true,
            'data' => $result,
            'message' => $message
        ];
        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'code' => 404,
            'success' => false,
            'message' => $error
        ];
        if (!empty($errorMessages)) {

            $response['date'] = $errorMessages;
        }
        return response()->json($response, $code);

    }

    public function getUser()
    {
        $auth = User::where('id', Auth::id())->with('nationality')
            ->with('countries')->with('place_of_birth')->with('english_lang')->with('arabic_lang')
            ->with('mandarin_lang')->with('currency')->with('education')->with('completion')->with('religion')
            ->with('job_type')->get();

        if (!($auth)) {

            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($auth, ' read successfully');
    }

    public function sendMessage($message)
    {

        $response = [
            'message' => $message
        ];
        return response()->json($response, 200);

    }

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
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function userId()
    {
        return Auth::user()->id;
    }

}
