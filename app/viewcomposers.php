<?php

/*
|--------------------------------------------------------------------------
| View Composers
|--------------------------------------------------------------------------
|
| Defining View Composers
*/

View::composer('*', function($view)
{
    // 全局 view 渲染数据绑定
    //$view->with('test', 123);
});

View::composer('news.index', function($view)
{
    // function object_fetch($object, $attr)
	// {
        // $results = array_map(function($obj)use(&$attr){return $obj->$attr; }, $object);
		// return $results;
	// }
    if (Auth::check()) {
        $user = Auth::user();
        $items = $view->news->getCollection();
        
        
        $item_ids = $items->lists('id');
        
        $checks = DB::table('news_digg')->whereUser_id($user->id)->whereIn('news_id', $item_ids)->get();
        
        $digg_marks = array();
        foreach ($checks as $check) {
            $digg_marks[$check->news_id] = $check->user_id;
        }
        
        $view->with('digg_marks', $digg_marks);
    }
    // $items = $view->news->getItems();
    // $item_ids = object_fetch($items, 'id');
    
    //$check = DB::table('news_digg')->whereUser_id(1)->whereIn('news_id', array(1))->first();
    // $array = array();
    // $array = array_add($array, $check->news_id, $check->user_id);
    // dd($array);
    // dd($item_ids);
});

View::composer('article.detail', function($view)
{
    if (Auth::check()) {
        $user = Auth::user();
        
        $comments = $view->article_comments->getCollection();
        
        if (!$comments->isEmpty()) {
            $comment_ids = $comments->lists('id');
            $checks = DB::table('article_comment_digg')->whereUser_id($user->id)->whereIn('article_comment_id', $comment_ids)->get();
            
        
            $digg_marks = array();
            foreach ($checks as $check) {
                $digg_marks[$check->article_comment_id] = $check->user_id;
            }
            
            $view->with('digg_marks', $digg_marks);
        }
    }
    // use this to check
    
    // function object_fetch($object, $attr)
	// {
        // $results = array_map(function($obj)use(&$attr){return $obj->$attr; }, $object);
		// return $results;
	// }
    
    // $items = $view->news->getItems();
    // $item_ids = object_fetch($items, 'id');
    
    //$check = DB::table('news_digg')->whereUser_id(1)->whereIn('news_id', array(1))->first();
    // $array = array();
    // $array = array_add($array, $check->news_id, $check->user_id);
    // dd($array);
    // dd($item_ids);
});
