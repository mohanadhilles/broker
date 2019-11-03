<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\BaseController;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;
class ForgotPasswordController extends BaseController
{

    public function verification(Request $request)
    {
        $to = $request->phone;
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $twilio = new Client($sid, $token);
        try {
            $verification = $twilio->verify->v2->services("VA7929034c28ba03c34bce7e3ad72186ad")
                ->verifications
                ->create($to, "sms");

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return $this->sendResponse($verification->status, 'success');
    }

    public function check(Request $request)
    {
        $code = $request->code;
        $to = $request->phone;
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $twilio = new Client($sid, $token);
        try {
            $verification = $twilio->verify->v2->services("VA7929034c28ba03c34bce7e3ad72186ad")
                ->verificationChecks
                ->create($code, // code
                    array("to" => $to)
                );

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return $this->sendResponse($verification->status, 'success');
    }

    public function generate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|min:11|regex:/[0-9]/',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return $this->sendError('error validation', $validator->errors());
        }
        $phone = $request->phone;
        $password = bcrypt($request->password);
        $user = User::where('phone', $phone)->first();
        $user->update([
            'password' => $password,
        ]);

        if (!($user)) {
            return $this->sendError(' not found ! ');
        }
        $msg = '';
        return $this->sendResponse($user, $msg);
    }

    /*
|--------------------------------------------------------------------------
| Password Reset Controller
|--------------------------------------------------------------------------
|
| This controller is responsible for handling password reset emails and
| includes a trait which assists in sending these notifications from
| your application to your users. Feel free to explore this trait.
|
*/
    use SendsPasswordResetEmails;

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return response(['message' => $response]);
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response(['error' => $response], 422);
    }


}
