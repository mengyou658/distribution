<?php

class NewsController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | News Controller
    |--------------------------------------------------------------------------
    |
    |
    */

    public function __construct(){
        $this->beforeFilter('auth', ['only' => [
            'postDigg',
            'getDeliver',
            'postDeliver',
            // 'getSettingAvatar',
        ]]);
    }

    public function getIndex() {

        $orderBy = Input::get('order_by', 'created_at');

        switch ($orderBy) {
            case 'created_at':
                $newses = News::whereStatus('published')
                              ->orderBy('created_at', 'desc');
                break;
            case 'last_week':
                $lastWeek = Carbon\Carbon::now()->subWeek();
                $newses = News::whereStatus('published')
                              ->where('created_at', '>=', $lastWeek)
                              ->orderBy('digg_count', 'desc');
                break;
            case 'last_month':
                $lastMonth = Carbon\Carbon::now()->subMonth();
                $newses = News::whereStatus('published')
                              ->where('created_at', '>=', $lastMonth)
                              ->orderBy('digg_count', 'desc');

                break;
            case 'last_year':
                $lastYear = Carbon\Carbon::now()->subYear();
                $newses = News::whereStatus('published')
                              ->where('created_at', '>=', $lastYear)
                              ->orderBy('digg_count', 'desc');

                break;
            case 'digg_count':
                $newses = News::whereStatus('published')
                             ->orderBy('digg_count', 'desc');
                break;
            default:
                break;
        }

        // @todo: perPage num
        $newses = $newses->paginate(10);
        return View::make('news.index', compact('newses', 'orderBy'));
    }

    public function getTag($tagId) {
        // @todo
    }

    public function getDetail($newsId) {

        $news = News::find($newsId);
        $topic = $news->topic;
        $comments = $topic->comments()
                          ->orderBy('created_at', 'desc')
                          ->paginate(8);

        $refer = action('NewsController@getDetail', $news->id);

        $isDugg = false;
        if (Auth::check()) {
            $user = Auth::user();
            $newsDigg = NewsDigg::whereUser_id($user->id)
                                ->whereNews_id($newsId)
                                ->first();
            if ($newsDigg) {
                $isDugg = true;
            }
        }

        return View::make('news.detail', compact('news', 'isDugg', 'topic', 'comments', 'refer'));
    }

    public function postDigg() {
        // dd(Input::all());

        // @todo: only need ajax?
        if (!Request::ajax()) {
            App::abort(404);
        }

        $user = Auth::user();

        $newsId = Input::get('news_id');

        $oldNewsDigg = NewsDigg::whereUser_id($user->id)
                               ->whereNews_id($newsId)
                               ->first();
        if ($oldNewsDigg) {
            return Response::json(['status'=>'error', 'msg'=>'already have'], 400);
        }
        
        NewsDigg::create(array(
            'user_id' => $user->id,
            'news_id' => $newsId,
        ));
        
        $news = News::find($newsId);
        $news->digg_count += 1;
        $news->save();
        
        return Response::json(['status'=>'ok']);
    }

    public function getDeliver() {
        $source = Input::get('source', '');

        $input = [
            'source' => $source,
        ];

        $rules = [
            'source' => 'required|url',
        ];

        $validator = Validator::make($input, $rules);
        
        if ($validator->fails()) {
            return Redirect::back()->with('msg', '请输入正确的网址'); 
        }

        return View::make('news.deliver', compact('source'));
    }

    public function postDeliver() {
        //dd(Input::all());

        $user = Auth::user();

        $title = Input::get('title');
        $source = Input::get('source');
        $content = Input::get('content');

        // @todo: 考虑其他实现方式
        $content = '<p>' . nl2br(e($content)) . '</p>';

        $input = [
            'title' => $title,
            'source' => $source,
            'content' => $content,
            'user_id' => $user->id,
        ];

        $rules = [
            'title' => 'required',
            'source' => 'required|url',
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('news/deliver?source='.$source)
                           ->with('msg', '请输入标题和正确的网址');
        }

        $news = News::create($input);
        return Redirect::to('news')->with('msg', '投递成功'); 
    }

}
