<?php

class GroupController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Group Controller
	|--------------------------------------------------------------------------
	|
	|
	*/
    
    public function __construct()
    {
        $this->beforeFilter('auth', array('only' => array(
            'getApply',
            'postApply',
            'getJoin',
            'getQuit',
            'getNewPost',
            'postNewPost',
            'postPostComment'
        )));
    }

	public function getIndex()
	{
		$groups = Group::valid()->get();
		return View::make('group.index')
                   ->with('groups', $groups);
	}
    
    public function getDetail($group_id)
	{
        $per_page_num = 3;

        $group = Group::find($group_id);
        
        $posts = Post::whereGroup_id($group_id)->orderBy('created_at', 'desc')->paginate($per_page_num);
        $users = $group->users;
        
        $user = Auth::user();
        $is_member = $user?$users->contains($user->id):false;
		return View::make('group.detail')
                   ->with('group', $group)
                   ->with('posts', $posts)
                   ->with('users', $users)
                   ->with('is_member', $is_member);
	}
    
    public function getAllPosts()
    {
        $per_page_num = 3;
		$posts = Post::orderBy('created_at', 'desc')->paginate($per_page_num);
		return View::make('group.posts')
                   ->with('posts', $posts);
    }
    
    public function getApply()
    {
        return View::make('group.apply');
    }
    
    public function postApply()
    {
        $input = array(
            'name' => Input::get('name'),
            'pic' => 'http://pic.com', // TODO: 上传图片，保存图片，保存图片url
            'descr' => Input::get('descr'),
        );
        
        $rules = array(
            'name' => 'required',
            'pic' => 'required|url',
            'descr' => 'required',
        );
        
        $v = Validator::make($input, $rules);
        if ($v->fails()) {
            return Redirect::to('group/apply')->with('msg', '填写信息错误');
        }
        
        Group::create($input);
        return Redirect::to('groups')->with('msg', '申请成功，审核中...');
    }
    
    public function getJoin($group_id)
    {
        $group = Group::find($group_id);
        $user = Auth::user();
        $group->users()->attach($user->id);
        return Redirect::to("group/$group_id")->with('msg', '加入成功');
    }
    
    public function getQuit($group_id)
    {
        $group = Group::find($group_id);
        $user = Auth::user();
        $group->users()->detach($user->id);
        return Redirect::to("group/$group_id")->with('msg', '退出成功');
    }
    
    public function getNewPost($group_id)
    {
        return View::make('group.post.new_post')->with('group_id', $group_id);
    }
    
    public function postNewPost($group_id)
    {
        $markdown = App::make('markdown');
        
        $user = Auth::user();
        $group = Group::find($group_id);

        $new_post = array(
            'title' => Input::get('title'),
            'markdown' => Input::get('markdown'), // TODO: 上传图片，保存图片，保存图片url
            'content' => $markdown->transform(Input::get('markdown')),
        );
        
        $rules = array(
            'title' => 'required',
            'markdown' => 'required',
        );
        
        $v = Validator::make($new_post, $rules);
        if ($v->fails()) {
            return Redirect::to("group/$group_id/new_post")->with('msg', '填写信息错误');
        }
        
        $new_post['group_id'] = $group_id;
        $new_post['group_name'] = $group->name;
        $new_post['author_id'] = $user->id;
        $new_post['author'] = $user->username;
        
        $post = Post::create($new_post);
        
        $tags = explode(',', Input::get('hidden-tags'));
        foreach($tags as $tag) {
            if($tag) {
                $tag_id = Tag::markTag($tag);
                PostTag::create(array(
                    'post_id' => $post->id,
                    'tag_id' => $tag_id,
                ));
            }
        }
        
        $user->post_count += 1;
        $user->save();
        
        return Redirect::to("group/$group_id")->with('msg', '发帖成功');
    }
    
    public function getPostDetail($group_id, $post_id)
    {
        $per_page_num = 3;
        Config::set('view.pagination', 'pagination::simple');
        
        $user = Auth::user();
        $users = Group::find($group_id)->users;
        $is_member = $user?$users->contains($user->id):false;
        
        $post = Post::find($post_id);
        $post_comments = PostComment::wherePost_id($post_id)->orderBy('created_at', 'desc')->paginate($per_page_num);
        return View::make('group.post.detail')
                   ->with('post', $post)
                   ->with('post_comments', $post_comments)
                   ->with('is_member', $is_member);
    }
    
    
    public function postPostComment($group_id, $post_id)
    {
        $markdown = App::make('markdown');
        $user = Auth::user();
        
        $new_post_comment = array(
            'markdown' => Input::get('markdown'),
            'content' => $markdown->transform(Input::get('markdown')),
            'post_id' => $post_id,
            'author_id' => $user->id,
            'author' => $user->username,
        );
        
        $rules = array(
            'markdown' => 'required',
        );
        
        $v = Validator::make($new_post_comment, $rules);
        if ($v->fails()) {
            return Redirect::to("group/$group_id/post/$post_id")->with('msg', '没有评论内容');
        }
        
        $post_comment = PostComment::create($new_post_comment);
        
        // TODO: event fire user messages with @
        
        return Redirect::to("group/$group_id/post/$post_id#news-comment");
    }
    
    public function getTest()
    {
        // TODO: 需要删除此方法
        // MEMO: 连表状态标记 QUERY

        $result = DB::table('groups')
                    ->leftJoin('user_group', 'groups.id', '=', 'user_group.group_id')
                    ->where('user_group.user_id', '=', '1')
                    ->orWhereNull('user_group.user_id')
                    ->select('groups.id', 'user_group.user_id')->get();
        
        var_dump($result);
    }
    
    
}