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
    
    
    // $markdown = App::make('markdown');
    
    // $my_text="# abc\n\n* 123\n* 456\n\n<script></script>\n";
    // $my_html = $markdown->transform($my_text);
    // return $my_html;
    
    echo Str::random();
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

// 项目
Route::get(
    'projects',
    array(
        'uses' => 'HomeController@getProjects',
        'as' => 'projects')
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

// TODO: 新闻，顶
Route::get(
    'news/{news_id}/digg',
    array(
        'uses' => 'NewsController@getDigg',
        'as' => 'news_digg')
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
Route::get(
    'group',
    array(
        'uses' => 'GroupController@getAllPosts',
        'as' => 'group')
);
Route::get(
    'group/posts',
    array(
        'uses' => 'GroupController@getAllPosts',
        'as' => 'group_posts')
);

// 群组列表
Route::get(
    'groups',
    array(
        'uses' => 'GroupController@getIndex',
        'as' => 'groups')
);

// 申请建立小组
Route::get(
    'group/apply',
    array(
        'uses' => 'GroupController@getApply',
        'as' => 'group_apply')
);
Route::post(
    'group/apply',
    array(
        'uses' => 'GroupController@postApply',
        'as' => 'group_post_apply')
);

// 群组详细
Route::get(
    'group/{group_id}',
    array(
        'uses' => 'GroupController@getDetail',
        'as' => 'group_detail')
)->where('group_id', '[0-9]+');

// 加入群组
Route::get(
    'group/{group_id}/join',
    array(
        'uses' => 'GroupController@getJoin',
        'as' => 'group_join')
)->where('group_id', '[0-9]+');

// 退出群组
Route::get(
    'group/{group_id}/quit',
    array(
        'uses' => 'GroupController@getQuit',
        'as' => 'group_quit')
)->where('group_id', '[0-9]+');


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
// # 问答
// ask

// 问答首页
Route::get(
    'ask',
    array(
        'uses' => 'AskController@getIndex',
        'as' => 'ask')
);

// 问题列表
Route::get(
    'ask/questions',
    array(
        'uses' => 'AskController@getIndex',
        'as' => 'ask_questions')
);

// 提问
Route::get(
    'ask/new_question',
    array(
        'uses' => 'AskController@getNewQuestion',
        'as' => 'ask_new_question')
);
Route::post(
    'ask/new_question',
    array(
        'uses' => 'AskController@postNewQuestion',
        'as' => 'ask_post_new_question')
);

// 问题详细
Route::get(
    'ask/question/{question_id}',
    array(
        'uses' => 'AskController@getDetail',
        'as' => 'ask_detail')
)->where('question_id', '[0-9]+');

// 回答问题
Route::post(
    'ask/question/{question_id}/answer',
    array(
        'uses' => 'AskController@postAnswer',
        'as' => 'ask_post_answer')
)->where('question_id', '[0-9]+');

// 赞同答案
Route::get(
    'ask/answer/{answer_id}/approve',
    array(
        'uses' => 'AskController@getAnswerApprove',
        'as' => 'ask_answer_approve')
)->where('answer_id', '[0-9]+');

// 反对答案
Route::get(
    'ask/answer/{answer_id}/oppose',
    array(
        'uses' => 'AskController@getAnswerOppose',
        'as' => 'ask_answer_oppose')
)->where('answer_id', '[0-9]+');

// 答案评论
Route::get(
    'ask/answer/{answer_id}/comments',
    array(
        'uses' => 'AskController@getAnswerComments',
        'as' => 'ask_answer_comments')
)->where('answer_id', '[0-9]+');



// ---------------------------------
// # 翻译
// translation

Route::get(
    'translations',
    array(
        'uses' => 'TranslationController@getIndex',
        'as' => 'translations')
);

// ---------------------------------
// # 活动
// event

Route::get(
    'events',
    array(
        'uses' => 'EventController@getIndex',
        'as' => 'events')
);

// ---------------------------------
// # 用户
// 应该使用指向方法的，路由表，不能使用类暴露。

// 用户个人信息展示管理

Route::get(
    'user',
    array(
        'uses' => 'UserController@getIndex',
        'as' => 'user')
);

// 他人信息展示
Route::get(
    'user/{user_id}',
    array(
        'uses' => 'UserController@getDetail',
        'as' => 'user_detail')
)->where('user_id', '[0-9]+');

// 登录
Route::get(
    'user/login',
    array(
        'uses' => 'UserController@getLogin',
        'as' => 'user_login')
);
Route::post(
    'user/login',
    array(
        'uses' => 'UserController@postLogin',
        'as' => 'user_post_login')
);

// 忘记密码
Route::get(
    'user/forgot_password',
    array(
        'uses' => 'UserController@getForgotPassword',
        'as' => 'user_forgot_password')
);
Route::post(
    'user/forgot_password',
    array(
        'uses' => 'UserController@postForgotPassword',
        'as' => 'user_post_forgot_password')
);

// 重置密码
Route::get(
    'user/reset_password/{token}',
    array(
        'uses' => 'UserController@getResetPassword',
        'as' => 'user_reset_password')
);
Route::post(
    'user/reset_password/{token}',
    array(
        'uses' => 'UserController@postResetPassword',
        'as' => 'user_post_reset_password')
);


// 退出
Route::get(
    'user/logout',
    array(
        'uses' => 'UserController@getLogout',
        'as' => 'user_logout')
);

// 注册
Route::get(
    'user/register',
    array(
        //'uses' => 'UserController@getRegister',
        'uses' => 'UserController@getRegisterWithMailAuth',
        'as' => 'user_register')
);
Route::post(
    'user/register',
    array(
        //'uses' => 'UserController@postRegister',
        'uses' => 'UserController@postRegisterWithMailAuth',
        'as' => 'user_post_register')
);

// 个人设置 
Route::get(
    'user/setting',
    array(
        'uses' => 'UserController@getSetting',
        'as' => 'user_setting')
);

// 个人资料
Route::get(
    'user/setting/profile',
    array(
        'uses' => 'UserController@getSettingProfile',
        'as' => 'user_setting_profile')
);
Route::post(
    'user/setting/profile',
    array(
        'uses' => 'UserController@postSettingProfile',
        'as' => 'user_post_setting_profile')
);

// 头像
Route::get(
    'user/setting/avatar',
    array(
        'uses' => 'UserController@getSettingAvatar',
        'as' => 'user_setting_avatar')
);
Route::post(
    'user/setting/avatar',
    array(
        'uses' => 'UserController@postSettingAvatar',
        'as' => 'user_post_setting_avatar')
);

// 修改密码
Route::get(
    'user/setting/security',
    array(
        'uses' => 'UserController@getSettingSecurity',
        'as' => 'user_setting_security')
);
Route::post(
    'user/setting/security',
    array(
        'uses' => 'UserController@postSettingSecurity',
        'as' => 'user_post_setting_security')
);

// 第三方账号
Route::get(
    'user/setting/account',
    array(
        'uses' => 'UserController@getSettingAccount',
        'as' => 'user_setting_account')
);
Route::post(
    'user/setting/account',
    array(
        'uses' => 'UserController@postSettingAccount',
        'as' => 'user_post_setting_account')
);

// TODO: 第三方的验证信息独立库，独立 controller 。

// TODO: 通知
Route::get(
    'user/notices',
    array(
        'uses' => 'UserController@getNotices',
        'as' => 'user_notices')
);

// ---------------------------------
// # 标签
// 

Route::get(
    'tags',
    array(
        'uses' => 'TagController@getIndex',
        'as' => 'tags')
);

Route::get(
    'tag/{tag}',
    array(
        'uses' => 'TagController@getDetail',
        'as' => 'tag_detail')
);


// 数据库维护
Route::controller('scheme', 'SchemeController');