<?php

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
*/

/*
|--------------------------------------------------------------------------
| Dev Routes
|--------------------------------------------------------------------------
|
*/

if(Config::get('app.debug')) {
    // Event::listen('illuminate.query', function($query, $params, $time, $conn)
    // {
    //    echo "<!-- debug \n";
    //    print_r(array($query, $params, $time, $conn));
    //    echo "-->\n";
    // });

    Route::get('test', function() {
        return "Hello";
    });

    Route::get('schema/up', function() {
        Artisan::call('migrate', ['--seed' => true, '--force' => true]);
        echo 'migrated!';
    });

    Route::get('schema/reset', function(){
        Artisan::call('migrate:reset', ['--force' => true]);
        echo 'reseted!';
    });

    Route::get('schema/refresh', function(){
        Artisan::call('migrate:refresh', ['--seed' => true, '--force' => true]);
        echo 'refreshed!';
    });
}


/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', 'HomeController@getIndex');

// pages
Route::get('about', 'HomeController@getAbout');
Route::get('contact', 'HomeController@getContact');
Route::get('policy', 'HomeController@getPolicy');
Route::get('help', 'HomeController@getHelp');

Route::get('project', 'HomeController@getProject');

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
*/

Route::get('user/signup', 'UserController@getSignup');
Route::post('user/signup', 'UserController@postSignup');

Route::get('user/login', 'UserController@getLogin');
Route::post('user/login', 'UserController@postLogin');

Route::get('user/logout', 'UserController@getLogout');

Route::get('user/dashboard', 'UserController@getDashboard');

Route::get('user/{user_id}', 'UserController@getUserDetail');

Route::get('user/setting/profile', 'UserController@getSettingProfile');
Route::post('user/setting/profile', 'UserController@postSettingProfile');

Route::get('user/setting/email', 'UserController@getSettingEmail');
Route::post('user/setting/email', 'UserController@postSettingEmail');

Route::get('user/setting/avatar', 'UserController@getSettingAvatar');
Route::post('user/setting/avatar', 'UserController@postSettingAvatar');

Route::get('user/setting/password', 'UserController@getSettingPassword');
Route::post('user/setting/password', 'UserController@postSettingPassword');

/*
|--------------------------------------------------------------------------
| Article Routes
|--------------------------------------------------------------------------
|
*/

Route::get('article', 'ArticleController@getIndex');


/*
|--------------------------------------------------------------------------
| News Routes
|--------------------------------------------------------------------------
|
*/


/*
|--------------------------------------------------------------------------
| Question Routes
|--------------------------------------------------------------------------
|
*/


/*
|--------------------------------------------------------------------------
| Discussion Routes
|--------------------------------------------------------------------------
|
*/

/*
|--------------------------------------------------------------------------
| Event (Activity) Routes 
|--------------------------------------------------------------------------
|
*/



/*
|--------------------------------------------------------------------------
| Comment Routes
|--------------------------------------------------------------------------
|
*/

