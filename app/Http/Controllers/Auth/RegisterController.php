<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;

class RegisterController extends BaseController
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required',
            'phone' => 'unique:users|min:11|regex:/[0-9]/',
            'email' => 'unique:users|email',
            'name' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',

        ]);

        if ($validator->fails()) {
            return $this->sendError('error validation', $validator->errors());
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
        $this->sendMgs($request->phone, 'Welcome to join mery.com your username is'. $request->phone . 'and password is' . $request->password . 'can you go to mery.com/up to complete survey');

//        if ($request->phone){
//
//        }
        return $this->sendResponse($success, 'User created successfully');

    }

}

