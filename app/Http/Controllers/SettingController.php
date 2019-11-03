<?php

namespace App\Http\Controllers;

use App\Entities\Content;
use App\Entities\Lang;
use App\Entities\Setting;

class SettingController extends BaseController
{
    public function index()
    {
        return view('vue');
    }

    public function setSettings($country = null)
    {
        $filler = Setting::where('country_id', $country)->with('language')->with('country')->first();

        if (!($filler)) {

            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($filler, ' read successfully');
    }

    public function getLang()
    {
        $lang = Lang::all();
        if (!($lang)) {
            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($lang, ' read successfully');
    }

    public function content()
    {
        $content = Content::first();
        if (!($content)) {
            return $this->sendError(' not found ! ');
        }
        return $this->sendResponse($content, ' read successfully');
    }

}
