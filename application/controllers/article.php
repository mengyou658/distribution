<?php

class Article_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| Article Controller
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
    
	public function get_index()
	{
        $articles = Article::all();
		return View::make('article.index')
                   ->with('articles', $articles);
	}
    
    public function get_detail($id, $page=1)
	{
        $article = Article::find($id);
        $article_comments = ArticleComment::where_article_id($id)->get();
		return View::make('article.detail')
                   ->with('article', $article)
                   ->with('page', $page)
                   ->with('article_comments', $article_comments);
	}

}