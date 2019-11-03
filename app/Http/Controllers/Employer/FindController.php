<?php

namespace App\Http\Controllers\Employer;

use App\Entities\Job;
use App\Entities\Notification;
use App\Events\JobEvent;
use App\Http\Controllers\BaseController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail;
use Illuminate\Support\Facades\Validator;

class FindController extends BaseController
{

    public function storeFullTime(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_type' => 'required',
            'wanted_at' => 'required',
            'salary' => 'required',
            'place_size' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('error validation', $validator->errors());
        }
        $sender = Auth::user()->id;
        $job = Job::create([
            'contract' => 1,
            'job_type' => $request->input('job_type'),
            'wanted_at' => $request->input('wanted_at'),
            'salary' => $request->input('salary'),
            'employer' => $sender,
            'place_size' => $request->input('place_size'),
            'place' => $request->input('place'),
            'country' => $request->input('country'),
            'bed_rooms' => $request->input('bed_rooms'),
            'child_no' => $request->input('child_no'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'description' => $request->input('description'),
        ]);


        // Make Filter after Store Jobs
        $filter = $this->filter($job->country, $job->job_type, $job->gender, $job->age, $job->contract);

        $message = $this->sendMessage(['Welcome,' . Auth::user()->name . ' Wanted Mery House helper']);
        // Send Notifications
//        dd($message);
        if (!$job){
            return false;
        }
        event(new JobEvent($message));
//        event(new Job($job->job_type));



        //Store Notifications
        $notiy = Notification::create([
            'title' => 'Added New Job',
            'job_type_id' => $job->job_type,
            'user' => $sender,
            'job_id' => $job->id,
            'country_id' => $job->country
        ]);
        if (!($filter)) {
            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($filter, ' read successfully');

    }

    public function filter($country = null, $job_type = null, $gender = null, $age = null, $contract = null)
    {
        $filler = User::where('role', 2)->where('country',$country)
            ->orWhere('job_type',$job_type)
            ->orWhere('gender', $gender)
            ->orWhere('contract', $contract)
            ->orWhere('age', $age)
            ->with('contract')->with('nationality')
            ->with('countries')->with('place_of_birth')
            ->with('english_lang')->with('arabic_lang')
            ->with('mandarin_lang')->with('currency')
            ->with('education')->with('completion')->with('religion')
            ->with('job_type')
            ->with('place')
            ->paginate(8);

        if (!($filler)) {
            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($filler, ' read successfully');
    }

    public function jopPosted()
    {
        $userId = Auth::user()->id;
        $jobs = Job::where('employer', $userId)->with('user')->with('places')
            ->with('type')->with('countries')->with('contract')->paginate(10);
        if (!($jobs)) {
            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($jobs, ' read successfully');
    }

    public function jobPostedDetails($id)
    {
        $userId = Auth::user()->id;
        $job = Job::where('employer', $userId)->with('user')
            ->with('places')->with('type')->with('countries')->with('contract')->find($id);
        if (!($job)) {
            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($job, ' read successfully');
    }

    public function sendEmail($email = null)
    {
        $data['email'] = 'Mery.com';
        \Illuminate\Support\Facades\Mail::to($email)->send(new Mail\MailNotify($data));
        if (\Illuminate\Support\Facades\Mail::failures()) {
            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($data, ' read successfully');
    }

}
