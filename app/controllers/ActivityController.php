<?php

class ActivityController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Activity Controller
    |--------------------------------------------------------------------------
    |
    |
    */

    public function __construct(){
        $this->beforeFilter('auth', array('only' => array(
            'getJoin',
            'getQuit',
            // 'getSettingAvatar',
            // 'postSettingAvatar',
            // 'getSettingPassword',
            // 'postSettingPassword',
        )));
    }

    public function getIndex() {

        $activities = Activity::whereStatus('published')
                              ->orderBy('created_at', 'desc')
                              ->paginate(9);

        return View::make('event.index', compact('activities'));
    }

    public function getSeries($seriesId) {

        $activities = Activity::whereStatus('published')
                              ->whereSeries_id($seriesId)
                              ->orderBy('created_at', 'desc')
                              ->paginate(9);

        $curSeriesId = $seriesId;

        return View::make('event.index', compact('activities', 'curSeriesId'));
    }

    public function getDetail($activityId) {
        
        $activity = Activity::find($activityId);

        $topic = $activity->topic;
        $comments = $topic->comments()
                          ->orderBy('created_at', 'desc')
                          ->paginate(3);

        $refer = action('ActivityController@getDetail', $activity->id);

        $curSeriesId = $activity->series_id;

        $isJoined = false;

        if (Auth::check()) {
            $user = Auth::user();
            $activityUser = ActivityUser::whereActivity_id($activityId)
                                        ->whereUser_id($user->id)
                                        ->first();
            if ($activityUser) {
                $isJoined = true;
            }
        }

        return View::make('event.detail', compact('activity', 'curSeriesId', 'isJoined', 'topic', 'comments', 'refer'));
    }

    public function getJoin($activityId) {
        $user = Auth::user();

        $oldActivityUser = ActivityUser::whereActivity_id($activityId)
                                       ->whereUser_id($user->id)
                                       ->first();

        if ($oldActivityUser) {
            return Redirect::back()->with('msg', '已经加入此活动');
        }

        ActivityUser::create([
            'activity_id' => $activityId,
            'user_id' => $user->id,
        ]);

        return Redirect::back()->with('msg', '加入活动成功');
    }

    public function getQuit($activityId) {
        $user = Auth::user();

        $oldActivityUser = ActivityUser::whereActivity_id($activityId)
                                       ->whereUser_id($user->id)
                                       ->first();

        if (!$oldActivityUser) {
            return Redirect::back()->with('msg', '没有参加此活动');
        }

        $oldActivityUser->delete();
        return Redirect::back()->with('msg', '退出活动成功');
    }

}
