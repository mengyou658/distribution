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
        $this->beforeFilter('auth', array('only' => array('getDeliver', 'postDeliver')));
    }

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

        News::create($input);
        return Redirect::to('news')->with('msg', '投递成功，审核中...');
    }
    
    
}