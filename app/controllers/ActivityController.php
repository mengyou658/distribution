<?php

class ActivityController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Activity Controller
	|--------------------------------------------------------------------------
	|
	|
	*/
    
    public function __construct()
    {
        $this->beforeFilter('auth', array('only' => array(
            'postComment',
            'getJoin',
            'getQuit',
        )));
    }

	public function getIndex()
	{
        
        $activities = Activity::orderBy('created_at', 'desc')->get();
        
		return View::make('activity.index')
                   ->with('activities', $activities)
                   ->with('series_id', 0);
	}
    
    public function getSeries($series_id)
    {
        $activities = Activity::whereSeries_id($series_id)->orderBy('created_at', 'desc')->get();
        
        return View::make('activity.index')
                   ->with('activities', $activities)
                   ->with('series_id', $series_id);
    }
    
    public function getDetail($activity_id)
    {
        $per_page_num = 3;
        Config::set('view.pagination', 'pagination::simple');
        
        $activity = Activity::find($activity_id);
        $activity_comments = ActivityComment::whereActivity_id($activity_id)->orderBy('created_at', 'desc')->paginate($per_page_num);
        $users = $activity->users;
        $user = Auth::user();
        $joined = $user?$users->contains($user->id):false;
        
        return View::make('activity.detail')
                   ->with('activity', $activity)
                   ->with('activity_comments', $activity_comments)
                   ->with('users', $users)
                   ->with('joined', $joined);
    }
    
    public function postComment($activity_id)
    {
        $user = Auth::user();
        
        $new_activity_comment = array(
            'markdown' => Input::get('markdown'),
            'activity_id' => $activity_id,
            'author_id' => $user->id,
            'author_name' => $user->username,
        );
        
        $rules = array(
            'markdown' => 'required',
        );
        
        $v = Validator::make($new_activity_comment, $rules);
        if ($v->fails()) {
            return Redirect::to("activity/$activity_id")->with('msg', '没有评论内容');
        }
        
        $activity_comment = ActivityComment::create($new_activity_comment);
        
        $activity = Activity::find($activity_id);
        $activity->comment_count += 1;
        $activity->save();
        
        // TODO: event fire user messages with @
        
        return Redirect::to("activity/$activity_id#activity-comment"); 
    }
    
    public function getJoin($activity_id)
    {
        $activity = Activity::find($activity_id);
        $user = Auth::user();
        $activity->users()->attach($user->id);
        return Redirect::to("activity/$activity_id")->with('msg', '加入成功');
    }
    
    public function getQuit($activity_id)
    {
        $activity = Activity::find($activity_id);
        $user = Auth::user();
        $activity->users()->detach($user->id);
        return Redirect::to("activity/$activity_id")->with('msg', '退出成功');
    }
    
    
    
}