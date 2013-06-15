<?php

class NewsController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| News Controller
	|--------------------------------------------------------------------------
	|
	|
	*/
    
    public function __construct()
    {
        $this->beforeFilter('auth', array('only' => array(
            'getDeliver',
            'postDeliver',
            'getDigg',
        )));
    }

	public function getIndex()
	{
        $per_page_num = 3;
		$news = News::orderBy('created_at', 'desc')->paginate($per_page_num);
		return View::make('news.index')
                   ->with('news', $news);
	}
    
    public function getHottest()
    {
        $per_page_num = 3;
		$news = News::orderBy('digg_count', 'desc')->paginate($per_page_num);
		return View::make('news.index')
                   ->with('news', $news);
    }
    
    public function getDetail($news_id)
	{
        $per_page_num = 3;
        Config::set('view.pagination', 'pagination::simple');
        
        $news_item = News::find($news_id);
        $news_comments = NewsComment::whereNews_id($news_id)->orderBy('created_at', 'desc')->paginate($per_page_num);
		return View::make('news.detail')
                   ->with('news_item', $news_item)
                   ->with('news_comments', $news_comments);
	}
    
    public function getDigg($news_id)
    {
        $user = Auth::user();
        $digg = NewsDigg::whereNews_id($news_id)->whereUser_id($user->id)->first();
        if (!$digg) {
            NewsDigg::create(array(
                'news_id' => $news_id,
                'user_id' => $user->id
            ));
            
            $news = News::find($news_id);
            $news->digg_count += 1;
            $news->save();
            
            return 0; // 成功
        }
        return 1; // 异常
    }
    
    public function postComment($news_id)
    {
        $markdown = App::make('markdown');
        $user = Auth::user();
        
        $new_news_comment = array(
            'markdown' => Input::get('markdown'),
            'content' => $markdown->transform(Input::get('markdown')),
            'news_id' => $news_id,
            'author_id' => $user->id,
            'author' => $user->username,
        );
        
        $rules = array(
            'markdown' => 'required',
        );
        
        $v = Validator::make($new_news_comment, $rules);
        if ($v->fails()) {
            return Redirect::to("news/$news_id")->with('msg', '没有评论内容');
        }
        
        $news_comment = NewsComment::create($new_news_comment);
        
        $news = News::find($news_id);
        $news->comments_count += 1;
        $news->save();
        
        // TODO: event fire user messages with @
        
        return Redirect::to("news/$news_id#news-comment");
    }
    
    public function getDeliver()
    {
        return View::make('news.deliver');
    }
    
    public function postDeliver()
    {
        $input = array(
            'title' => Input::get('title'),
            'link' => Input::get('link'),
            'abstract' => Input::get('abstract'),
        );

        $rules = array(
            'title' => 'required',
            'link' => 'required|url',
            'abstract' => 'required',
        );
        
        $v = Validator::make($input, $rules);
        if ($v->fails()) {
            return Redirect::to('news/deliver')->with('msg', '填写信息错误');
        }
        
        $user = Auth::user();
        $input['courier_id'] = $user->id;
        $input['courier'] = $user->username;

        $news = News::create($input);
        
        $tags = explode(',', Input::get('hidden-tags'));
        
        foreach($tags as $tag) {
            $tag = e($tag);
            if ($tag) {
                $tag_id = Tag::markTag($tag);
                NewsTag::create(array(
                    'news_id' => $news->id,
                    'tag_id' => $tag_id,
                ));
            }
        }
        
        $user->news_count += 1;
        $user->save();
        
        return Redirect::to('news')->with('msg', '投递成功，审核中...');
    }
    
    
}