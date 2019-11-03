<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

trait FileUploadTrait
{


    /**
     * File upload trait used in controllers to upload files
     */

    public function savePhoto(Request $request)
    {
        $uploadPath = env('UPLOAD_PATH');
        $request->validate([
            'photo' => 'required',
        ]);
        $user = Auth::user();
        $avatarName = $user->id . time() . '.' . request()->photo->getClientOriginalExtension();
        $request->photo->storeAs($uploadPath, $avatarName);
        $user->photo = $avatarName;
        $user->save();
       return $user;

    }

    public function saveCv(Request $request)
    {
        $uploadPath = env('UPLOAD_PATH');
        $request->validate([
            'cv' => 'required',
        ]);
        $user = Auth::user();
        $avatarName = $user->id . time() . '.' . request()->cv->getClientOriginalExtension();
        $request->cv->storeAs($uploadPath, $avatarName);
        $user->cv = $avatarName;
        $user->save();
        return $user;

    }

}
