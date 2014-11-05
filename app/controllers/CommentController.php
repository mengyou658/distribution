<?php

class CommentController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Comment Controller
    |--------------------------------------------------------------------------
    |
    */

    public function __construct(){
        $this->beforeFilter('auth', ['only' => [
            'postIndex',
            // 'getSettingAvatar',
            // 'postSettingAvatar',
            // 'getSettingPassword',
            // 'postSettingPassword',
        ]]);
    }

    public function postIndex() {
        //dd(Input::all());

        $user = Auth::user();
        $refer = Input::get('refer', false);

        $input = [
            'user_id' => $user->id,
            'topic_id' => Input::get('topic_id'),
            'content' => Input::get('content'),
        ];

        $rules = [
            'user_id' => 'required',
            'topic_id' => 'required',
            'content' => 'required',
        ];

        $validator = Validator::make($input, $rules);
        
        if ($validator->fails()) {

            if ($refer) {
                return Redirect::to($refer)->with('comment_message', '评论发布失败');
            }
            else {
                return Redirect::back()->with('comment_message', '评论发布失败');
            }
            
        }

        // @todo: 看看有没有更好的办法
        $input['content'] = '<p>' . nl2br(e($input['content'])) . '</p>';

        $comment = Comment::create($input);

        if ($refer) {
            return Redirect::to($refer)->with('comment_message', '评论发布成功');
        }
        else {
            return Redirect::back()->with('comment_message', '评论发布成功');
        }
    }

    public function getTopic($topicId) {

        if (!Request::ajax()) {
            App::abort(404);
        }

        $comments = Topic::find($topicId)
                         ->comments()
                         ->orderBy('created_at', 'desc')
                         ->get();

        // @todo: 设置 hidden 字段
        return $comments->toJson();
    }

}
