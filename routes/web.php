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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/campaign/{campaign}/send', 'SendMailController@send');
Route::resource('bunches', 'BunchController');
Route::resource('templates', 'TemplatController');
Route::prefix('bunches/{bunch}')->group(function () {
    Route::resource('subscribers', 'SubscriberController');
});
Route::resource('campaign', 'CampaignController');

Route::get('/test', 'HomeController@index');

/*Route::get('send_test_email', function(){
    Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
    {
        $message->to('pl110287mva@gmail.com');
    });
});*/
Route::get('/campaign/{campaign}/test', 'SendMailController@test');
