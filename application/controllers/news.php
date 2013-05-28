<?php

class News_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| News Controller
	|--------------------------------------------------------------------------
	|
	|
	*/
    
    function __construct()
    {
        parent::__construct();
        
        $this->restful = true;
        //$this->filter('before', 'auth')->only(array('index'));
    }
    
	public function get_index($page=1)
	{
        // TODO:
        $news = News::all();
		return View::make('news.index')
                   ->with('news', $news)
                   ->with('page', $page);
	}
    
    public function get_detail($id, $page=1)
	{
        $news_item = News::find($id);
        $news_comments = NewsComment::where_news_id($id)->get();
		return View::make('news.detail')
                   ->with('news_item', $news_item)
                   ->with('page', $page)
                   ->with('news_comments', $news_comments);
	}

}