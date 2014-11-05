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
        //return "Hello";
        //return Redirect::to('/')->with('msg', 'test');

        return Redirect::back()->with('msg', '评论发布失败');
    });

    Route::get('test/editor', function() {
        return View::make('editor');
    });

    Route::get('test/code', function() {
        return View::make('code');
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


// @todo: args patten

/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
|
*/

// catch all and for 404
// App::missing(function($exception) {
//     return View::make('index');
// });

// @todo: for 500

Route::get('/', 'HomeController@getIndex');

// pages
Route::get('about', 'HomeController@getAbout');
Route::get('contact', 'HomeController@getContact');
Route::get('policy', 'HomeController@getPolicy');
Route::get('help', 'HomeController@getHelp');

Route::get('project', 'HomeController@getProject');

// @todo: 图书资料、视频教程、R 语言会议（数据科学会议），讲座与培训，招聘信息

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

Route::get('user/detail/{user_id}.html', 'UserController@getUserDetail');

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

Route::get('article/category/{id}.html', 'ArticleController@getCategory');
Route::get('article/tag/{id}.html', 'ArticleController@getTag');
Route::get('article/detail/{id}.html', 'ArticleController@getDetail');

// @todo: index by tag

/*
|--------------------------------------------------------------------------
| News Routes
|--------------------------------------------------------------------------
|
*/

Route::get('news', 'NewsController@getIndex');

Route::get('news/tag/{id}.html', 'NewsController@getTag');
Route::get('news/detail/{id}.html', 'NewsController@getDetail');

// digg
Route::post('news/digg', 'NewsController@postDigg');

// deliver
Route::get('news/deliver', 'NewsController@getDeliver');
Route::post('news/deliver', 'NewsController@postDeliver');

/*
|--------------------------------------------------------------------------
| Ask (Question) Routes
|--------------------------------------------------------------------------
|
*/

Route::get('ask', 'AskController@getIndex');

Route::get('ask/quesiton/tag/{id}.html', 'AskController@getQuestionTag');
Route::get('ask/question/detail/{id}.html', 'AskController@getQuestion');

Route::get('ask/ask', 'AskController@getAsk');
Route::post('ask/ask', 'AskController@postAsk');

Route::post('ask/question/answer', 'AskController@postAnswer');

Route::post('ask/answer/approve', 'AskController@postAnswerApprove');
Route::post('ask/answer/oppose', 'AskController@postAnswerOppose');

/*
|--------------------------------------------------------------------------
| Group (Discussion) Routes
|--------------------------------------------------------------------------
|
*/

Route::get('group', 'GroupController@getIndex');

Route::get('group/post', 'GroupController@getPost');
Route::get('group/group', 'GroupController@getGroup');

Route::get('group/detail/{id}.html', 'GroupController@getDetail');
// Route::get('group/{id}/join', 'GroupController@getJoin');
// Route::get('group/{id}/quit', 'GroupController@getQuit');

Route::get('group/{group_id}/post/detail/{post_id}.html', 'GroupController@getPostDetail');

Route::get('group/{id}/new_post', 'GroupController@getNewPost');
Route::post('group/{id}/new_post', 'GroupController@postNewPost');


/*
|--------------------------------------------------------------------------
| Event (Activity) Routes 
|--------------------------------------------------------------------------
|
*/


Route::get('event', 'ActivityController@getIndex');

Route::get('event/series/{id}.html', 'ActivityController@getSeries');
Route::get('event/detail/{id}.html', 'ActivityController@getDetail');

Route::get('event/{id}/join', 'ActivityController@getJoin');
Route::get('event/{id}/quit', 'ActivityController@getQuit');


/*
|--------------------------------------------------------------------------
| Comment Routes
|--------------------------------------------------------------------------
|
*/

Route::post('comment', 'CommentController@postIndex');

// ajax
Route::get('comment/topic/{id}', 'CommentController@getTopic');

// @todo: digg?