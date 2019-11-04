<?php

namespace App\Http\Controllers\Worker;

use App\Entities\Accept;
use App\Entities\Contract;
use App\Entities\Job;
use App\Entities\Notification;
use App\Entities\Place;
use App\Entities\Track;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use App\Entities\Completion;
use App\Entities\Country;
use App\Entities\Currency;
use App\Entities\Education;
use App\Entities\JobType;
use App\Entities\Language;
use App\Entities\Religion;
use App\Entities\Skill;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WorkerController extends BaseController
{
    use FileUploadTrait;

    public function getNotification()
    {
        $not = Notification::with('job_type')->with('user')->with('country')->with('job')->paginate(10);
        if (!($not)) {
            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($not, ' read successfully');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'religion' => 'required',
            'nationality' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('error validation', $validator->errors());
        }

        $profile = User::find($id);
        $profile->update($request->all());
        $profile->skills()->attach($request->input('skills'));
        $age = date_diff(date_create($profile->date_of_birth), date_create('now'))->y;
        $profile->age = $age;
        if (!($profile)) {
            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($profile, ' read successfully');
    }


    public function preferToFriend($id)
    {

        $worker = User::where('role', 2)->find($id);
        if (!($worker)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($worker, ' read successfully');
    }

    public function updatePhoto(Request $request)
    {
        $request = $this->savePhoto($request);
        if (!($request)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($request, ' read successfully');
    }

    public function updateCV(Request $request)
    {
        $request = $this->saveCv($request);
        if (!($request)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($request, ' read successfully');
    }


    public function getCount()
    {
        $counts = User::where('role', '2')->count();

        if (!($counts)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($counts, ' read successfully');

    }

    protected function User()
    {
        return $users = Auth::user()->getAuthIdentifier();
    }

    public function showEmployer($id)
    {
        $profile = User::where('role', '3')->with('nationality')
            ->with('countries')->with('place_of_birth')->with('english_lang')->with('arabic_lang')
            ->with('mandarin_lang')->with('currency')->with('education')->with('completion')->with('religion')
            ->find($id);

        if (!($profile)) {

            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($profile, ' read successfully');
    }

    public function agency(){

        $agency = User::where('role', '4')->with('nationality')->paginate(8);
        if (!($agency)) {
            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($agency, ' read successfully');
    }

    public function employer(){

        $agency = User::where('role', '3')->with('nationality')->paginate(8);
        if (!($agency)) {
            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($agency, ' read successfully');
    }

    public function showAgency($id)
    {
        $profile = User::where('role', '4')->with('nationality')
            ->with('countries')->with('place_of_birth')->with('english_lang')->with('arabic_lang')
            ->with('mandarin_lang')->with('currency')->with('education')->with('completion')->with('religion')
            ->find($id);
        if (!($profile)) {

            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($profile, ' read successfully');
    }

    public function filterEmployer($country = null, $city = null, $name = null, $brand = null)
    {
        $filler = User::where('role', 3)->where('role', 4)
            ->orWhere('country', $country)
            ->orWhere('name', $name)
            ->orWhere('city', $city)
            ->orWhere('brand', $brand)->with('nationality')
            ->with('countries')->with('place_of_birth')->with('english_lang')->with('arabic_lang')
            ->with('mandarin_lang')->with('currency')->with('education')->with('completion')->with('religion')
            ->paginate(8);

        if (!($filler)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($filler, ' read successfully');
    }

    public function filterJobName($title = null)
    {
        $filler = Job::with('type') ->paginate(8);
        $filler->employer()->name->first();

        if (!($filler)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($filler, ' read successfully');
    }

    public function filterJob()
    {
        $filler = Job::with('type')->with('user')->with('country')
            ->paginate(8);
        if (!($filler)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($filler, ' read successfully');
    }
    public function getWorker()
    {
        $worker = User::orWhere('role', 4)->orWhere('role',2)->with('nationality')->with('ratings')
            ->with('countries')->with('place_of_birth')->with('english_lang')->with('arabic_lang')
            ->with('mandarin_lang')->with('currency')->with('education')->with('completion')->with('religion')->with('job_type')->with('skills')->paginate(8);

        if (!($worker)) {

            return $this->sendError(' not found ! ');
        }
//        hello

        return $this->sendResponse($worker, ' read successfully');
    }
    public function outWorker()
    {
        $worker = User::where('role', 2)->with('nationality')->with('ratings')
            ->with('countries')->with('place_of_birth')->with('english_lang')->with('arabic_lang')
            ->with('mandarin_lang')->with('currency')->with('education')->with('completion')->with('religion')->with('job_type')->with('skills')->get();

        if (!($worker)) {

            return $this->sendError(' not found ! ');
        }
//        hello

        return $this->sendResponse($worker, ' read successfully');
    }


    public function getContract()
    {
        $con = Contract::all();

        if (!($con)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($con, ' read successfully');
    }


    public function getCountry()
    {

        $country = Country::orderBy('title', 'ASC')->get();

        if (!($country)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($country, ' read successfully');
    }

    public function getJobType()
    {

        $jobtype = JobType::orderBy('title', 'ASC')->get();

        if (!($jobtype)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($jobtype, ' read successfully');

    }

    public function getReligion()
    {
        $religion = Religion::orderBy('title', 'ASC')->get();

        if (!($religion)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($religion, ' read successfully');


    }

    public function getPlaces()
    {
        $places = Place::orderBy('title', 'ASC')->get();

        if (!($places)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($places, ' read successfully');


    }


    public function getSkills()
    {
        $skills = Skill::orderBy('title', 'ASC')->get();

        if (!($skills)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($skills, ' read successfully');

    }

    public function getLanguage()
    {
        $language = Language::orderBy('title', 'ASC')->get();

        if (!($language)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($language, ' read successfully');

    }

    public function getEducation()
    {

        $educations = Education::orderBy('title', 'ASC')->get();
        if (!($educations)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($educations, ' read successfully');

    }

    public function getCurrency()
    {
        $currency = Currency::orderBy('title', 'ASC')->get();

        if (!($currency)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($currency, ' read successfully');

    }

    public function getCompletion()
    {

        $completions = Completion::orderBy('title', 'ASC')->get();
        if (!($completions)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($completions, ' read successfully');

    }

    public function getMarital()
    {

        $marital_status = ['1' => 'Single', '2' => 'Married', '3' => 'Sepad', '4' => 'Widowed'];
        if (!($marital_status)) {

            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($marital_status, ' read successfully');


    }

    public function getGender()
    {
        $gender = ['1' => 'male', '2' => 'female'];

        if (!($gender)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($gender, ' read successfully');
    }

    public function getAuth()
    {
        return Auth::user()->getAuthIdentifier();
    }

    public function job($id)
    {
        $job = Job::with('contract')->with('user')->with('country')->with('type')->with('place')->find($id);

        if (!($job)) {

            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($job,  $this->jobapply($id));
    }

    public function jobapply($job_id = null){
        $accept = Accept::where('job_id', $job_id)->with('acc')->get();
        if (!($accept)) {
            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse( $accept,' read successfully');
    }

    public function jobs()
    {
        $Jobs = Job::with('contract')->with('user')->with('country')->with('type')
        ->with('place')->orderBy('created_at','asc')->paginate(5);
        if (!($Jobs)) {
            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($Jobs, ' read successfully');
    }
}
