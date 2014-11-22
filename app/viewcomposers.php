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

View::composer('news.index', function($view) {
    if (Auth::check()) {
        $user = Auth::user();
        $newsCollection = $view->newses->getCollection();

        if(!$newsCollection->isEmpty()) {
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
        
    }
});

View::composer(['article.detail', 'news.detail', 'group.post.detail'], function($view) {
    if (Auth::check()) {
        $user = Auth::user();
        $commentsCollection = $view->comments->getCollection();

        if(!$commentsCollection->isEmpty()) {
            $ids = $commentsCollection->lists('id');
            
            $checks = CommentDigg::whereUser_id($user->id)
                                 ->whereIn('comment_id', $ids)
                                 ->get();
            
            $isDuggs = [];
            foreach ($checks as $check) {
                $isDuggs[$check->comment_id] = $check->user_id;
            }
            
            $view->with('isDuggs', $isDuggs);
        }
    }
});

View::composer('ask.question.detail', function($view) {
    if (Auth::check()) {
        $user = Auth::user();
        $answersCollection = $view->answers->getCollection();

        if(!$answersCollection->isEmpty()) {
            $ids = $answersCollection->lists('id');
            
            $checks = AnswerAttitude::whereUser_id($user->id)
                                    ->whereIn('answer_id', $ids)
                                    ->get();
            
            $attitudes = [];
            foreach ($checks as $check) {
                $attitudes[$check->answer_id] = $check->type;
            }
            
            $view->with('attitudes', $attitudes);
        }
        
    }
});

// View::composer('event.index', function($view) {

//     if (Auth::check()) {
//         $user = Auth::user();
//         $activityCollection = $view->activities->getCollection();

//         $ids = $activityCollection->lists('id');

//         $checks = ActivityUser::whereUser_id($user->id)
//                               ->whereIn('activity_id', $ids)
//                               ->get();

//         $isJoineds = [];
//         foreach ($checks as $check) {
//             $isJoineds[$check->activity_id] = $check->user_id;
//         }

//         $view->with('isJoineds', $isJoineds);
//     }

// });



