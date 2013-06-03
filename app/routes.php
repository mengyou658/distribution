<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
|
*/

// for test
Route::get('test', function()
{
    //return View::make('comment_editor');
    
    //return View::make('at_user');
    // $event = Event::fire('notice', array(1, 'test notice'));
    
    // var_dump($event);
    
    // $tag = Tag::markTag('中文123');
    // var_dump($tag);
    
    
    $markdown = App::make('markdown');
    
    $my_text="# abc\n\n* 123\n* 456\n\n<script></script>\n";
    $my_html = $markdown->transform($my_text);
    return $my_html;
    
    
});

Route::get(
    '/',
    array(
        'uses' => 'HomeController@getIndex',
        'as' => 'index')
);

// 关于我们
Route::get(
    'about',
    array(
        'uses' => 'HomeController@getAbout',
        'as' => 'about')
);

// 联系我们
Route::get(
    'contact',
    array(
        'uses' => 'HomeController@getContact',
        'as' => 'contact')
);

// 免责申明
Route::get(
    'policy',
    array(
        'uses' => 'HomeController@getPolicy',
        'as' => 'policy')
);

// 帮助中心
Route::get(
    'help',
    array(
        'uses' => 'HomeController@getHelp',
        'as' => 'help')
);

// ---------------------------------
// # 文章
Route::get(
    'articles',
    array(
        'uses' => 'ArticleController@getIndex',
        'as' => 'articles')
);


// 文章详细
Route::get('
    article/{article_id}',
    array(
        'uses' => 'ArticleController@getDetail',
        'as' => 'article_detail')
)->where('article_id', '[0-9]+');

// 文章评论发布
Route::post(
    'article/{article_id}/comment',
    array(
        'uses' => 'ArticleController@postComment',
        'as' => 'article_post_comment')
)->where('article_id', '[0-9]+');

// ---------------------------------
// # 新闻

// 新闻首页列表
Route::get(
    'news',
    array(
        'uses' => 'NewsController@getIndex',
        'as' => 'news')
);

// 新闻详细
Route::get(
    'news/{news_id}',
    array(
        'uses' => 'NewsController@getDetail',
        'as' => 'news_detail')
)->where('news_id', '[0-9]+');

// 新闻评论发布
Route::post(
    'news/{news_id}/comment',
    array(
        'uses' => 'NewsController@postComment',
        'as' => 'news_post_comment')
)->where('news_id', '[0-9]+');

// 新闻投递
Route::get(
    'news/deliver',
    array(
        'uses' => 'NewsController@getDeliver',
        'as' => 'news_deliver')
);
Route::post(
    'news/deliver',
    array(
        'uses' => 'NewsController@postDeliver',
        'as' => 'news_post_deliver')
);


// ---------------------------------
// # 群组

// 群组首页最新 posts 列表
Route::get('group', array('uses' => 'GroupController@getAllPosts', 'as' => 'group'));
Route::get('group/posts', array('uses' => 'GroupController@getAllPosts', 'as' => 'group_posts'));

// 群组列表
Route::get('groups', array('uses' => 'GroupController@getIndex', 'as' => 'groups'));

// 申请建立小组
Route::get('group/apply', array('uses' => 'GroupController@getApply', 'as' => 'group_apply'));
Route::post('group/apply', array('uses' => 'GroupController@postApply', 'as' => 'group_post_apply'));

// 群组详细
Route::get('group/{group_id}', array('uses' => 'GroupController@getDetail', 'as' => 'group_detail'))->where('group_id', '[0-9]+');

// 加入群组
Route::get('group/{id}/join', array('uses' => 'GroupController@getJoin', 'as' => 'group_join'))->where('id', '[0-9]+');

// 退出群组
Route::get('group/{id}/quit', array('uses' => 'GroupController@getQuit', 'as' => 'group_quit'))->where('id', '[0-9]+');


// 帖子详细
Route::get(
    'group/{group_id}/post/{post_id}',
    array(
        'uses' => 'GroupController@getPostDetail',
        'as' => 'group_post_detail')
)->where('group_id', '[0-9]+')
 ->where('post_id', '[0-9]+');

// 发新帖
Route::get(
    'group/{group_id}/new_post',
    array(
        'uses' => 'GroupController@getNewPost',
        'as' => 'group_new_post')
)->where('group_id', '[0-9]+');

Route::post(
    'group/{group_id}/new_post',
    array(
        'uses' => 'GroupController@postNewPost',
        'as' => 'group_post_new_post')
)->where('group_id', '[0-9]+');

// 发表帖子评论
Route::post(
    'group/{group_id}/post/{post_id}/comment',
    array(
        'uses' => 'GroupController@postPostComment',
        'as' => 'group_post_comment')
)->where('group_id', '[0-9]+')
 ->where('post_id', '[0-9]+');

// ---------------------------------
// # 用户
// 应该使用指向方法的，路由表，不能使用类暴露。

// 用户个人信息展示管理

Route::get('user', array('uses' => 'UserController@getIndex', 'as' => 'user'));

// 他人信息展示
Route::get('user/{id}', array('uses' => 'UserController@getDetail', 'as' => 'user_detail'))->where('id', '[0-9]+');

// 登录
Route::get('user/login', array('uses' => 'UserController@getLogin', 'as' => 'user_login'));
Route::post('user/login', array('uses' => 'UserController@postLogin', 'as' => 'user_post_login'));

// 退出
Route::get('user/logout', array('uses' => 'UserController@getLogout', 'as' => 'user_logout'));

// 注册
Route::get('user/register', array('uses' => 'UserController@getRegister', 'as' => 'user_register'));
Route::post('user/register', array('uses' => 'UserController@postRegister', 'as' => 'user_post_register'));

// TODO: 个人设置 
Route::get('user/setting', array('uses' => 'UserController@getSetting', 'as' => 'user_setting'));

// TODO: 通知
Route::get(
    'user/notice',
    array(
        'uses' => 'UserController@getNotice',
        'as' => 'user_notice')
);

Route::get(
    'tag/{tag}',
    array(
        'uses' => 'TagController@getDetail',
        'as' => 'tag_detail')
);




// 数据库维护
Route::controller('scheme', 'SchemeController');