<?php

namespace App\Http\Controllers\Worker;

use App\Entities\Accept;
use App\Entities\Track;
use App\Http\Controllers\BaseController;
use App\Entities\Job;
use App\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use app\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AcceptController extends BaseController
{
    public function accept(Request $request)
    {
        $id = $request->id;
        $accept = Job::with('accept')->find($id);
        $accept->status = 1;
        $this->storeAccept($accept->id, $accept->employer);
        if (!($accept)) {

            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($accept, ' read successfully');
    }

    public function storeAccept($job_id = null, $employer_id = null)
    {
        $sender = Auth::user()->id;
        foreach (Accept::all() as $ac) {
            $ac->worker_id;
            if ($sender == $ac) {
                return false;
            }
        }

        $job = Accept::create([
            'contract' => 1,
            'job_id' => $job_id,
            'worker_id' => $sender,
            'employer_id' => $employer_id,
            'active' => 1,
        ]);
        if (!($job)) {
            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($job, ' read successfully');

    }


    public function getAccept()
    {
        $authId = Auth::user()->id;
        $accepts = Accept::where('worker_id', $authId)->with('job')->with('user')->get();

        if (!($accepts)) {
            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($accepts, ' read successfully');
    }

}
