<?php

namespace App\Http\Controllers\Agency;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgencyController extends BaseController
{
    use FileUploadTrait;


    public function showWorker($id)
    {
        $profile = User::where('role','2')->with('nationality')
            ->with('country')->with('place_of_birth')->with('english_lang')->with('arabic_lang')
            ->with('mandarin_lang')->with('currency')->with('education')->with('completion')->with('religion')
            ->with('job_type')->find($id);
        if (!($profile)) {

            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($profile, ' read successfully');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'brand' => 'required',
            'bio' => 'required',
            'phone' => 'required',
            'facebook' => 'required',
            'whats_app' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('error validation', $validator->errors());
        }

        $profile = User::find($id);
        $profile->update($request->all());
        if (!($profile)) {

            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($profile, ' read successfully');
    }

    public function filterByName($name = null)
    {
        $filter = User::where('role', '2')->orWhere('name', 'like', "%{$name}%")
            ->with('nationality')
            ->with('country')->with('place_of_birth')->with('english_lang')->with('arabic_lang')
            ->with('mandarin_lang')->with('currency')->with('education')->with('completion')->with('religion')->with('job_type')
            ->paginate(8);

        if (!($filter)) {

            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($filter, ' read successfully');
    }


    public function preferToFriend($id)
    {
        $worker = User::where('role', ٤)->find($id);
        if (!($worker)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($worker, ' read successfully');
    }


    public function filterWorker($country = null, $nationality = null, $name = null, $salary = null)
    {
        $filler = User::where('role', '2')
            ->orWhere('country', 'like', "%{$country}%")
            ->orWhere('name', 'like', "%{$name}%")
            ->orWhere('salary', 'like', "%{$salary}%")
            ->orWhere('nationality', 'like', "%{$nationality}%")
            ->with('nationality')
            ->with('countries')->with('place_of_birth')->with('english_lang')->with('arabic_lang')
            ->with('mandarin_lang')->with('currency')->with('education')->with('completion')->with('religion')->with('job_type')
            ->paginate(8);

        if (!($filler)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($filler, ' read successfully');
    }


    public function updatePhoto(Request $request)
    {
        $request = $this->savePhoto($request);
        if (!($request)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($request, ' read successfully');
    }


    public function updateFile(Request $request)
    {
        $request = $this->saveFiles($request);
        if (!($request)) {


            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($request, ' read successfully');
    }

    public function getِAgency()
    {

        $worker = User::where('role', '4')->with('nationality')
            ->with('countries')->with('place_of_birth')->with('english_lang')->with('arabic_lang')
            ->with('mandarin_lang')->paginate(8);

        if (!($worker)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($worker, ' read successfully');
    }

    public function getCount()
    {

        $counts = User::where('role', '4')->count();

        if (!($counts)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($counts, ' read successfully');

    }

    public function showWorkerProfile($id)
    {

        $worker = User::where('role', 2)->find($id);
        if (!($worker)) {

            return $this->sendError(' not found ! ');
        }

        return $this->sendResponse($worker, ' read successfully');
    }

}
