<?php

namespace App\Http\Controllers\Api\V1;

use App\Entities\Accept;
use App\Entities\Track;
use App\Entities\TrackCase;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TrackController extends BaseController
{

    public function track()
    {
        $tracking = Track::where('user_id', $this->userId())->orWhere('helper_id',$this->userId())->with('users')->with('jobs')->with('accepts')->first();
        if (!($tracking)) {

            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($tracking, ' read successfully');
    }

    public function trackCase()
    {
        $tracking = TrackCase::select('title','id')->get();
        if (!($tracking)) {

            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($tracking, ' read successfully');
    }
    public function startTrack(Request $request)
    {

        $tracking = Track::where('accept_id','!=', $request->accept_id)->create([
            'user_id' => $this->userId(),
            'helper_id' => $request->input('helper_id'),
            'job_id' => $request->input('job_id'),
            'accept_id' => $request->input('accept_id'),
        ]);
        if (!($tracking)) {

            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($tracking, ' read successfully');
    }

}
