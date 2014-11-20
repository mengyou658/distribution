<?php

/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories([

    app_path().'/commands',
    app_path().'/controllers',
    app_path().'/models',
    app_path().'/database/seeds',

]);

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
|
*/

Log::useDailyFiles(storage_path().'/logs/laravel.log');

/*
|--------------------------------------------------------------------------
| Application 404 Handler
|--------------------------------------------------------------------------
|
*/

// App::missing(function($exception) {
//     if(!Config::get('app.debug')) {
//         return View::make('error.404');
//     }
// });

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code) {
    Log::error($exception);

    if (!Config::get('app.debug')) {
        if ($code == 404) {
            return View::make('error.404');
        }
        else {
            return View::make('error.500');
        }
    }

});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenance mode is in effect for the application.
|
*/

App::down(function() {
    return View::make('error.maintaining');
});

/*
|--------------------------------------------------------------------------
| Custom Helper Functions
|--------------------------------------------------------------------------
|
*/

require app_path().'/helpers.php';

/*
|--------------------------------------------------------------------------
| Custom IoC
|--------------------------------------------------------------------------
|
*/

require app_path().'/iocs.php';


/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
*/

require app_path().'/filters.php';


/*
|--------------------------------------------------------------------------
| Custom View Composers
|--------------------------------------------------------------------------
|
*/

require app_path().'/viewcomposers.php';
