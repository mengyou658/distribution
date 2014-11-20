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

        $user = Auth::user();
        $refer = Input::get('refer', false);
        $topicId = Input::get('topic_id');

        $input = [];
        if (Input::has('markdown')) {
            $parsedown = App::make('parsedown');
            $markdown = Input::get('markdown');
            $input = [
                'user_id' => $user->id,
                'topic_id' => $topicId,
                'markdown' => $markdown,
                'content' => $parsedown->text($markdown),
            ];
        }
        else {
            $content = Input::get('content');
            $input = [
                'user_id' => $user->id,
                'topic_id' => $topicId,
                'content' => '<p>' . nl2br(e($content)) . '</p>', // @todo: 看看有没有更好的办法
            ];
        }

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

    public function postDigg() {
        if (!Request::ajax()) {
            App::abort(404);
        }

        $user = Auth::user();

        $commentId = Input::get('comment_id');

        $oldCommentDigg = CommentDigg::whereUser_id($user->id)
                               ->whereComment_id($commentId)
                               ->first();
        if ($oldCommentDigg) {
            return Response::json(['status'=>'error', 'msg'=>'already have'], 400);
        }
        
        CommentDigg::create(array(
            'user_id' => $user->id,
            'comment_id' => $commentId,
        ));
        
        $comment = Comment::find($commentId);
        $comment->digg_count += 1;
        $comment->save();
        
        return Response::json(['status'=>'ok']);
    }

}
