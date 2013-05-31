<?php

class NewsController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| News Controller
	|--------------------------------------------------------------------------
	|
	|
	*/

	public function getIndex()
	{
        $per_page_num = 3;
		$news = News::orderBy('created_at', 'desc')->paginate($per_page_num);
		return View::make('news.index')
                   ->with('news', $news);
	}
    
    public function getDetail($id)
	{
        $per_page_num = 3;
        $news_item = News::find($id);
        $news_comments = NewsComment::whereNews_id($id)->paginate($per_page_num);
		return View::make('news.detail')
                   ->with('news_item', $news_item)
                   ->with('news_comments', $news_comments);
	}
    
}