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
    return View::make('editor');
});

Route::get('/', function()
{
	return View::make('index');
});


// ---------------------------------
// # 文章
Route::get('articles', 'article@index');

// TODO: 文章翻页

// 文章详细
Route::get('article/(:num)', 'article@detail');

// 文章评论翻页
Route::get('article/(:num)/page/(:num)', 'article@detail');

// TODO: 文章评论发布

// ---------------------------------
// # 新闻

// 新闻首页列表
Route::get('news', 'news@index');

// TODO: 新闻分页
Route::get('news/page/(:num)', 'news@index');

// 新闻详细
Route::get('news/(:num)', 'news@detail');

// 新闻详细分页
Route::get('news/(:num)/page/(:num)', 'news@detail');

// TODO: 投递

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

// ---------------------------------
// # 用户
// 应该使用指向方法的，路由表，不能使用类暴露。

// 用户个人信息展示管理
Route::get('user', 'user@index');

// 他人信息展示
Route::get('user/(:num)', 'user@detail');

// 登录
Route::get('user/login', 'user@login');
Route::post('user/login', 'user@login');

// 退出
Route::get('user/logout', 'user@logout');

// 注册
Route::get('user/register', 'user@register');
Route::post('user/register', 'user@register');


// 数据库维护
Route::controller('scheme');

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function($exception)
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('user/login');
});
