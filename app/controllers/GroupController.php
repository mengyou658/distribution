<?php

class GroupController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Group Controller
    |--------------------------------------------------------------------------
    |
    |
    */

    public function __construct(){
        $this->beforeFilter('auth', array('only' => array(
            'getNewPost',
            'postNewPost',
            // 'postSettingAvatar',
            // 'getSettingPassword',
            // 'postSettingPassword',
        )));
    }

    public function getIndex() {

        $posts = Post::whereStatus('published')
                     ->orderBy('created_at', 'desc')
                     ->take(5)
                     ->get();

        $groups = Group::orderBy('order')
                       ->take(6)
                       ->get();

        return View::make('group.index', compact('posts', 'groups'));
    }

    public function getPost() {

        $posts = Post::whereStatus('published')
                     ->orderBy('created_at', 'desc')
                     ->paginate(5);

        return View::make('group.post', compact('posts'));
    }

    public function getGroup() {

        $groups = Group::orderBy('order')
                       ->get();

        return View::make('group.group', compact('groups'));
    }

    public function getDetail($groupId) {

        $group = Group::find($groupId);
        $posts = $group->discuss->posts()->paginate(5);

        return View::make('group.detail', compact('group', 'posts'));
    }

    public function getPostDetail($postId) {

        $post = Post::find($postId);
        $group = $post->discuss->group;
        $topic = $post->topic;

        $comments = $topic->comments()
                          ->orderBy('created_at', 'desc')
                          ->paginate(3);

        $refer = action('GroupController@getPostDetail', $post->id);

        return View::make('group.post.detail', compact('post', 'group', 'topic', 'comments', 'refer'));
    }

    public function getNewPost($groupId) {
        return View::make('group.post.new', compact('groupId'));
    }

    public function postNewPost($groupId) {
        // dd(Input::all());

        $user = Auth::user();
        $discuss = Group::find($groupId)->discuss;
        $title = Input::get('title');
        $markdown = Input::get('markdown');
        $parsedown = App::make('parsedown');

        $newPost = [
            'user_id' => $user->id,
            'discuss_id' => $discuss->id,
            'title' => $title,
            'markdown' => $markdown,
            'content' => $parsedown->text($markdown),
        ];

        $rules = [
            'title' => 'required',
            'content' => 'required',
        ];

        $validator = Validator::make($newPost, $rules);

        if ($validator->fails()) {
            return Redirect::action('GroupController@getNewPost', $groupId)
                           ->with('title', $title)
                           ->with('markdown', $markdown)
                           ->with('msg', '请填写正确的信息');
        }

        $post = Post::create($newPost);

        return Redirect::action('GroupController@getDetail', $groupId)
                       ->with('msg', '发帖成功');

    }
}
