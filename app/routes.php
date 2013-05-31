<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('/', function()
{
	return View::make('index');
});

// for test
Route::get('test', function()
{
    //return View::make('comment_editor');
    
    return View::make('at_user');
});

// ---------------------------------
// # 文章
Route::get('articles', array('uses' => 'ArticleController@getIndex', 'as' => 'articles'));

// 文章详细
Route::get('article/{id}', array('uses' => 'ArticleController@getDetail', 'as' => 'article_detail'))->where('id', '[0-9]+');

// TODO: 文章评论发布
Route::post('article/{id}/comment', array('uses' => 'ArticleController@postComment', 'as' => 'article_post_comment'))->where('id', '[0-9]+');

// ---------------------------------
// # 新闻

// 新闻首页列表
Route::get('news', array('uses' => 'NewsController@getIndex', 'as' => 'news'));

// 新闻详细
Route::get('news/{id}', array('uses' => 'NewsController@getDetail', 'as' => 'news_detail'))->where('id', '[0-9]+');

// TODO: 投递

/*
// ---------------------------------
// # 群组

// 群组首页最新 posts 列表
Route::get('group', 'group@index');

// 群组列表
Route::get('groups', 'group@list');

// 群组详细
Route::get('group/(:num)', 'group@detail');

// 群组详细分页
Route::get('group/(:num)/page/(:num)', 'group@detail');

// 帖子详细
Route::get('post/(:num)', 'group@post');

// TODO: 帖子发布
Route::get('group/(:num)/new_post', 'group@new_post');
*/

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
Route::get('user/notice', array('uses' => 'UserController@getNotice', 'as' => 'user_notice'));


// 数据库维护
Route::controller('scheme', 'SchemeController');