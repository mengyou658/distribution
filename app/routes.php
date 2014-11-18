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

    Route::get('env', function() {

        echo App::environment();

    });

    Route::get('test', function() {
        //return "Hello";
        //return Redirect::to('/')->with('msg', 'test');

        //return Redirect::back()->with('msg', '评论发布失败');

        // $parsedown = App::make('parsedown');
        // echo $parsedown->text("```python\ndef foo():\n    return abc\n```");

        // $discuss = Discuss::find(1);
        // dd($discuss->group->name);
        //echo strpos('acdbcdecd', 'cd');

        echo nl2p("abc\nefg");
    });

    Route::get('test/editor', function() {
        return View::make('editor');
    });

    Route::post('test/editor', function() {
        dd(Input::all());
    });

    Route::get('import-from-xml', function() {
        set_time_limit(0); // prevent timeout

        Schema::dropIfExists('import_article');
        Schema::create('import_article', function($table) {
            $table->increments('id');

            $table->integer('wp_post_id');
            $table->string('title', 128);
            $table->text('content');
            $table->dateTime('published_at');
            $table->string('status', 16);
        });

        $xmlFilePath = 'D:/Dropbox/Docs/COS/wordpress.2014-11-18.xml';
        $xmlObj = simplexml_load_file($xmlFilePath);

        foreach ($xmlObj->channel->item as $item) {

            $wp = $item->children('http://wordpress.org/export/1.2/');

            $status = 'published';
            if ((string)$wp->status != 'publish' ) {
                $status = 'draft';
            }

            $wp_post_id = (int)$wp->post_id;
            $published_at = (string)$wp->post_date;

            $title = (string)$item->title;
            $content = (string)($item->children('http://purl.org/rss/1.0/modules/content/')->encoded);

            DB::table('import_article')->insert([
                'wp_post_id' => $wp_post_id,
                'title' => str_limit($title, 128),
                'content' => $content,
                'published_at' => $published_at,
                'status' => $status,
            ]);

        }

        echo "done";
    });

    Route::get('import-article', function() {
        set_time_limit(0); // prevent timeout

        DB::statement('truncate table article');

        $oldArticles = DB::table('import_article')->get();

        foreach ($oldArticles as $oldArticle) {
            Article::create([
                'title' => $oldArticle->title,
                'content' => nl2p($oldArticle->content),
                'status' => $oldArticle->status,
                'published_at' => $oldArticle->published_at,
                'created_at' => $oldArticle->published_at,
                'updated_at' => $oldArticle->published_at,
            ]);
        }

        echo "done";
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
        define('STDIN',fopen("php://stdin","r"));
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
Route::get('terms', 'HomeController@getTerms');
Route::get('policy', 'HomeController@getPolicy');
Route::get('help', 'HomeController@getHelp');

Route::get('books', 'HomeController@getBooks');
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

Route::get('ask/pending', 'AskController@getPending');
Route::get('ask/hottest', 'AskController@getHottest');

Route::get('ask/quesiton/tag/{id}.html', 'AskController@getQuestionTag');
Route::get('ask/question/detail/{id}.html', 'AskController@getQuestionDetail');

Route::post('ask/question/digg', 'AskController@postQuestionDigg');

Route::get('ask/ask', 'AskController@getAsk');
Route::post('ask/ask', 'AskController@postAsk');

Route::get('ask/question/{id}/answer', 'AskController@getQuestionAnswer');
Route::post('ask/question/answer', 'AskController@postQuestionAnswer');

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

Route::get('group/post/detail/{post_id}.html', 'GroupController@getPostDetail');

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