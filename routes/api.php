<?php
use Illuminate\Http\Request;


Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');

Route::prefix('verify')->group(function () {
    Route::post('/verification', 'Auth\ForgotPasswordController@verification');
    Route::post('check', 'Auth\ForgotPasswordController@check');

    Route::post('email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('reset', 'Auth\ResetPasswordController@reset');
    Route::post('generate', 'Auth\ForgotPasswordController@generate');

});

Route::get('auth/{provider}/callback', function () {
    return;
});

Route::post('auth/login/{provider}', 'Auth\LoginController@redirect');
Route::post('auth/login/{provider}/callback', 'Auth\LoginController@handleProvider')->where('provider', '.*');


Route::get('faq', 'FaqController@index');
Route::get('faq/{id}', 'FaqController@show');
Route::get('Content', 'SettingController@Content');

Route::get('locale/{locale}', function ($locale) {
    \Illuminate\Support\Facades\Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('settings/{country}', 'SettingController@setSettings')->name('setting');

Route::get('lang', 'SettingController@getLang')->name('lang');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {

    Route::get('messages/{user}', 'Messenger\MessageController@messages');
    Route::post('messages/{user}', 'Messenger\MessageController@sendMessage');
    Route::get('messages', 'Messenger\MessageController@users');

    Route::get('auth', 'BaseController@getUser');

    Route::get('question', 'Worker\FollowUpController@question');

    Route::post('update/follow', 'Worker\FollowUpController@follow');
    Route::get('follow', 'Worker\FollowUpController@getfollow');

    Route::get('track','Api\V1\TrackController@track')->name('track');
    Route::get('track-case','Api\V1\TrackController@trackCase')->name('track-case');

    Route::post('track','Api\V1\TrackController@startTrack');
});


Route::prefix('worker')->group(function () {
    Route::get('/', 'Worker\WorkerController@getWorker')->name('worker');
    Route::get('count', 'Worker\WorkerController@getCount')->name('getCount');
    Route::get('prefer/{id}', 'Worker\WorkerController@preferToFriend')->name('preferToFriend');
    Route::get('country', 'Worker\WorkerController@getCountry')->name('getCountry');
    Route::get('language', 'Worker\WorkerController@getLanguage')->name('getLanguage');
    Route::get('education', 'Worker\WorkerController@getEducation')->name('getEducation');
    Route::get('completion', 'Worker\WorkerController@getCompletion')->name('getCompletion');
    Route::get('religion', 'Worker\WorkerController@getReligion')->name('getReligion');
    Route::get('marital', 'Worker\WorkerController@getMarital')->name('getMarital');
    Route::get('currency', 'Worker\WorkerController@getCurrency')->name('getCurrency');
    Route::get('job_type', 'Worker\WorkerController@getJobType')->name('getJobType');
    Route::get('skills', 'Worker\WorkerController@getSkills')->name('getSkills');
    Route::get('filter/{country?}/{city?}/{name?}/{brand?}', 'Worker\WorkerController@filterEmployer')->name('filterEmployer');
    Route::get('places', 'Worker\WorkerController@getPlaces')->name('getPlaces');
    Route::get('contract', 'Worker\WorkerController@getContract')->name('getContract');

    Route::get('job/filter/{title?}', 'Worker\WorkerController@filterJobName')->name('filterJob');
    Route::get('job/filter/{title?}/{country?}/{salary?}/{job-type?}', 'Worker\WorkerController@filterJob')->name('filterJob');

});

Route::group(['middleware' => ['auth:api'], 'prefix' => 'worker', 'as' => 'worker.', 'namespace' => 'Worker'], function () {

    Route::post('{id}/update', 'WorkerController@update')->name('updateProfile');
    Route::post('avatar', 'WorkerController@updatePhoto')->name('WorkerController');
    Route::post('file', 'WorkerController@updateCV')->name('cv');

    Route::get('agency', 'WorkerController@agency')->name('showAgency');
    Route::get('agency/{id}', 'WorkerController@showAgency')->name('showAgency');
    Route::get('employer', 'WorkerController@employer')->name('showEmployer');
    Route::get('employer/{id}', 'WorkerController@showEmployer')->name('showEmployer');
    Route::get('notification', 'WorkerController@getNotification')->name('getNotification');

    Route::post('accept', 'AcceptController@accept')->name('accept');
    Route::get('accept', 'AcceptController@getAccept')->name('getAccept');

    Route::get('jobs', 'WorkerController@jobs')->name('jobs');
    Route::get('job/{id}', 'WorkerController@job')->name('job');


});

Route::prefix('agency')->group(function () {
    Route::get('/', 'Agency\AgencyController@getِAgency')->name('agency');
    Route::get('count', 'Agency\AgencyController@getCount')->name('getCount');
    Route::get('filters/{name?}', 'Agency\AgencyController@filterByName')->name('filterByName');
    Route::get('filter/{country?}/{nationality?}/{name?}/{salary?}/', 'Agency\AgencyController@filterWorker')->name('filterWorker');
});

Route::group(['middleware' => ['auth:api', 'agency'], 'prefix' => 'agency', 'as' => 'agency.', 'namespace' => 'Agency'], function () {

    Route::get('worker/{id}', 'AgencyController@showWorker')->name('showWorker');
    Route::post('avatar', 'AgencyController@updatePhoto')->name('avatar');
    Route::post('update/{id}', 'AgencyController@update')->name('UpdateEmployer');
    Route::post('file', 'AgencyController@updateFile')->name('cv');
});

Route::prefix('employer')->group(function () {

    Route::get('/', 'Employer\EmployerController@getEmployer')->name('employer');
    Route::get('count', 'Employer\EmployerController@getCount')->name('getCount');
    Route::get('filters/{name?}', 'Employer\EmployerController@filterByName')->name('filterByName');
    Route::get('filter/{country?}/{nationality?}/{name?}/{salary?}/', 'Employer\EmployerController@filterWorker')->name('filter');

});

Route::group(['middleware' => ['auth:api', 'employer'], 'prefix' => 'employer', 'as' => 'employer.', 'namespace' => 'Employer'], function () {
    Route::get('worker/{id}', 'Employer\EmployerController@showWorkerProfile')->name('showWorkerProfile');

    Route::post('rating/{user}', 'EmployerController@storeRating')->name('storeRating');
    Route::get('jobs', 'FindController@jopPosted')->name('jobs');
    Route::get('job/{id}', 'FindController@jobPostedDetails')->name('job');
    Route::post('find', 'FindController@storeFullTime')->name('find');
    Route::post('avatar', 'EmployerController@updatePhoto')->name('avatar');
    Route::post('file', 'EmployerController@updateFile')->name('cv');
    Route::post('update/{id}', 'EmployerController@update')->name('update');
    Route::get('worker/{id}', 'EmployerController@showWorker')->name('showWorker');
});
