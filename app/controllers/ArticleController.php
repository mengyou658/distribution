<?php

class ArticleController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Article Controller
	|--------------------------------------------------------------------------
	|
	|
	*/

	public function getIndex()
	{
        $per_page_num = 3;
		$articles = Article::orderBy('created_at', 'desc')->paginate($per_page_num);
		return View::make('article.index')
                   ->with('articles', $articles);
	}
    
    public function getDetail($id)
	{
        $per_page_num = 3;
        $article = Article::find($id);
        $article_comments = ArticleComment::whereArticle_id($id)->paginate($per_page_num);
		return View::make('article.detail')
                   ->with('article', $article)
                   ->with('article_comments', $article_comments);
	}
    
    public function postComment($id)
    {
        // TODO
        return "post comment";
    }

    
}