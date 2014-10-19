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