<?php

namespace App\Http\Controllers;

use App\Entities\Job;
use Illuminate\Http\Request;

use App\Entities\Faq;
use Illuminate\Support\Facades\Validator;

class FaqController extends BaseController
{

    public function index()
    {
     $faq = Faq::all();
        if (!($faq)) {
            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($faq, ' read successfully');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('error validation', $validator->errors());
        }

        $faq = Faq::create([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
        ]);
        if (!($faq)) {

            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($faq, ' read successfully');
    }


    public function show($id)
    {
        $faq = Faq::find($id);
        if (!($faq)) {
            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($faq, ' read successfully');
    }

}
