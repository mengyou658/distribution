<?php

class ArticleController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Article Controller
    |--------------------------------------------------------------------------
    |
    |
    */

    public static $perPage = 3;

    public function __construct(){
        $this->beforeFilter('auth', array('only' => array(
            // 'getDashboard',
            // 'getSettingAvatar',
            // 'postSettingAvatar',
            // 'getSettingPassword',
            // 'postSettingPassword',
        )));
    }

    public function getIndex() {

        $articles = Article::whereStatus('published')
                           ->orderBy('published_at', 'desc')
                           ->paginate(self::$perPage);

        return View::make('article.index', compact('articles'));
    }

    public function getCategory($categoryId) {

        $articles = Article::whereStatus('published')
                           ->whereCategory_id($categoryId)
                           ->orderBy('published_at', 'desc')
                           ->paginate(self::$perPage);

        $curCategoryId = $categoryId;

        // @todo: 考虑使用 自有 的模板
        return View::make('article.index', compact('articles', 'curCategoryId'));
    }

    public function getTag($tagId) {

        $tag = Tag::find($tagId);
        $articles = $tag->articles->paginate(self::$perPage);

        // @todo: 考虑使用 自有 的模板
        return View::make('article.index', compact('articles'));
    }

    public function getDetail($articleId) {

        $article = Article::find($articleId);
        $topic = $article->topic;

        //Config::set('view.pagination', 'pagination::simple');
        // @todo: config comments prePage num
        $comments = $topic->comments()
                          ->orderBy('created_at', 'desc')
                          ->paginate(3);

        $refer = action('ArticleController@getDetail', $article->id);

        return View::make('article.detail', compact('article', 'topic', 'comments', 'refer'));

    }

}
