<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('config',function (){
    Route::get('foo', function (){ \Illuminate\Support\Facades\Artisan::call('storage:link');});
    Route::get('cache', function (){ \Illuminate\Support\Facades\Artisan::call('cache:clear'); });
    Route::get('route', function (){ \Illuminate\Support\Facades\Artisan::call('route:clear'); });
    Route::get('config', function (){ \Illuminate\Support\Facades\Artisan::call('config:clear'); });
    Route::get('clear',function (){ \Illuminate\Support\Facades\Artisan::call('clear'); });

});

Route::any('{all}','SettingController@index')->where('all', '^(?!nova).*$', '^(?!api).*$');

