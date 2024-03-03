<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('/admin')->name('admin.')->namespace('Dashboard')->group(function () {
    Route::get('/login', 'AuthController@showLoginForm')->name('login');
    Route::post('/login', 'AuthController@login')->name('login.store');
    Route::get('/logout', 'AuthController@logout')->name('logout');
    Route::get('/reset-password', 'AuthController@reset')->name('reset');
    Route::post('/send-link', 'AuthController@sendLink')->name('sendLink');
    Route::get('/changePassword/{code}', 'AuthController@changePassword')->name('resetPassword');
    Route::post('/update/password/admin', 'AuthController@updatePassword')->name('updatePassword');

    Route::middleware('auth')->group(function () {
        Route::get('/', 'AuthController@home')->name('home');
        Route::get('/profile', 'ProfileController@getProfile')->name('profile');
        Route::post('/update-profile', 'ProfileController@updateProfile')->name('update_profile');
        Route::post('/update-password', 'ProfileController@updatePassword')->name('update_profile_password');

        /* ================================================= Setting ================================================= */
        Route::get('/settings', 'SettingController@create')->name('settings');
        Route::post('/settings', 'SettingController@store')->name('settings.store');

        /* ================================================= Slider ================================================= */
        Route::resource('/sliders', 'SliderController')->except('show');
        /* ================================================= Partner ================================================= */
        Route::resource('/partners', 'PartnerController')->except('show');
        /* ================================================= Feature ================================================= */
        Route::resource('/features', 'FeatureController')->except('show');
        /* ================================================= Category ================================================= */
        Route::resource('/categories', 'CategoryController')->except('show');
        /* ================================================= Service ================================================= */
        Route::resource('/services', 'ServiceController')->except('show');
        /* ================================================= Training ================================================= */
        Route::resource('/trainings', 'TrainingController')->except('show');
        /* ================================================= Service Order ================================================= */
        Route::resource('/orders', 'OrderController')->only('index', 'destroy');
        /* ================================================= Subscribe ================================================= */
        Route::resource('/subscribes', 'SubscribeController')->only('index', 'destroy');
        /* ================================================= Contacts ================================================= */
        Route::controller('ContactController')->prefix('/contacts')->name('contacts.')->group(function () {
            Route::get('/', 'index')->name('index');

            Route::get('/{id}', 'show')->name('show');

            Route::get('/{id}/reply', 'showReplyForm')->name('reply');

            Route::post('/reply', 'sendReply')->name('sendReply');

            Route::delete('/{id}', 'destroy')->name('destroy');

        });
    });
});


Route::name('site.')->namespace('Site')->middleware('lang')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/lang/{lang}', 'HomeController@lang')->name('lang');

    Route::controller('HomeController')->prefix('/site')->group(function () {

        Route::post('/order/service', 'orderService')->name('orderService');
        Route::post('contact/send', 'sendContact')->name('contact');
        Route::post('/subscribe', 'subscribe')->name('subscribe');
    });
});


//Route::get('/', function () {
//    return view('welcome');
//});
