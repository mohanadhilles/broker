<?php

namespace App\Http\Controllers\Auth;
use App\Entities\Provider;
use App\Entities\Track;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class LoginController extends Controller
{

    public function redirect($provider, Request $request)
    {
        $social = $user = Socialite::driver($provider)->stateless()->user();
        $user = User::where('social_id', $social->getId())->first();

        if (!$user) {
            $user = User::create([
                'email' => $social->getEmail(),
                'name' => $social->getName(),
                'social_id' => $social->getId(),
                'photo' => $social->getAvatar(),
                'role' => 2,
            ]);

        }

        request()->request->add([
            'grant_type' => 'password',
            'client_id' => '2',
            'client_secret' => '9J6YdN9OO961fr99DICjE1ziJOfSoY7qzZPtIxDr',
            'username' => $user->email,
            'phone' =>  $request->phone,
            'password' => '',
            'scope' => null,
        ]);

        $proxy = Request::create(
            'oauth/token',
            'POST'
        );


        $success['access_token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
        $success['email'] = $user->email;
        $success['token_type'] = "Bearer";

        return $success;

    }

    public function handleProvider($provider)
    {
        return view('welcome');
        $social = Socialite::driver($provider)->user();
        $user = User::where('social_id',$social->getId())->first();

        if (!$user){
            $user = User::create([
                'email' => $social->getEmail(),
                'name' => $social->getName(),
                'social_id' => $social->getId(),
                'photo' => $social->getAvatar(),
                'role' => 2,
            ]);

        }

        request()->request->add([
            'grant_type'    =>  'password',
            'client_id'     =>  '2',
            'client_secret' =>  '9J6YdN9OO961fr99DICjE1ziJOfSoY7qzZPtIxDr',
            'username'      =>   $user->email,
            'password'      =>   '' ,
            'scope'         =>   null,
        ]);

//        dd($user);

        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        $success['access_token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
        $success['email'] = $user->email;
        $success['token_type'] = "Bearer";

        return $success;



    }


}
