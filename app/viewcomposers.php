<?php

/*
|--------------------------------------------------------------------------
| View Composers
|--------------------------------------------------------------------------
|
| Defining View Composers
|
*/

// View::composer('*', function($view)
// {
//     // 全局 view 渲染数据绑定
//     //$view->with('test', 123);
// });

View::composer('news.index', function($view)
{
    if (Auth::check()) {
        $user = Auth::user();
        $newsCollection = $view->newses->getCollection();
        
        $ids = $newsCollection->lists('id');
        
        $checks = NewsDigg::whereUser_id($user->id)
                          ->whereIn('news_id', $ids)
                          ->get();
        
        $isDuggs = [];
        foreach ($checks as $check) {
            $isDuggs[$check->news_id] = $check->user_id;
        }
        
        $view->with('isDuggs', $isDuggs);
    }
});