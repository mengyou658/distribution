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
    
    public function getCategory($category_id)
	{
        $per_page_num = 3;
		$articles = Article::whereCategory_id($category_id)->orderBy('created_at', 'desc')->paginate($per_page_num);
		return View::make('article.category')
                   ->with('articles', $articles);
	}
    
    public function getDetail($article_id)
	{
        $per_page_num = 3;
        Config::set('view.pagination', 'pagination::simple');
        
        $article = Article::find($article_id);
        $article_comments = ArticleComment::whereArticle_id($article_id)->orderBy('created_at', 'desc')->paginate($per_page_num);
		return View::make('article.detail')
                   ->with('article', $article)
                   ->with('article_comments', $article_comments);
	}
    
    public function postComment($article_id)
    {
        $user = Auth::user();
        $new_article_comment = array(
            'markdown' => Input::get('markdown'),
            'article_id' => $article_id,
            'author_id' => $user->id,
        );
        
        // TODO: rules
        
        $article_comment = ArticleComment::create($new_article_comment);
        
        // TODO: event fire user messages with @
        
        return Redirect::to("article/$article_id#article-comment");
    }
    
    public function getCommentDigg($comment_id)
    {
        $user = Auth::user();
        $digg = ArticleCommentDigg::whereArticle_comment_id($comment_id)->whereUser_id($user->id)->first();
        if (!$digg) {
            ArticleCommentDigg::create(array(
                'article_comment_id' => $comment_id,
                'user_id' => $user->id
            ));
            
            $article_comment = ArticleComment::find($comment_id);
            $article_comment->digg_count += 1;
            $article_comment->save();
            
            return 0; // 成功
        }
        return 1; // 异常
    }

    public function makeNoticeContent($article_id, $article_comment_id)
    {
        // TODO: 利用 $article_id $article_comment_id 组合成，可读的带有 锚链 的通知内容。
        // result url /article/{id}?page={page}#article-comment-{comment_id}
    }
    
}