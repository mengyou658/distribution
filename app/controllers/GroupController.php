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
        $this->beforeFilter('auth', array('only' => array('getApply', 'postApply', 'getJoin', 'getQuit', 'getNewPost', 'postNewPost')));
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
            'description' => Input::get('description'),
        );
        
        $rules = array(
            'name' => 'required',
            'pic' => 'required|url',
            'description' => 'required',
        );
        
        $v = Validator::make($input, $rules);
        if ($v->fails()) {
            return Redirect::to('group/apply')->with('msg', '填写信息错误');
        }
        
        Group::create($input);
        return Redirect::to('groups')->with('msg', '申请成功，审核中...');
    }
    
    public function getJoin($id)
    {
        $group = Group::find($id);
        $user = Auth::user();
        $group->users()->attach($user->id);
        return Redirect::to("group/$id")->with('msg', '加入成功');
    }
    
    public function getQuit($id)
    {
        $group = Group::find($id);
        $user = Auth::user();
        $group->users()->detach($user->id);
        return Redirect::to("group/$id")->with('msg', '退出成功');
    }
    
    public function getNewPost($group_id)
    {
        return View::make('group.post.new_post')->with('group_id', $group_id);
    }
    
    public function postNewPost($group_id)
    {
        $input = array(
            'title' => Input::get('title'),
            'markdown' => Input::get('markdown'), // TODO: 上传图片，保存图片，保存图片url
            'content' => Input::get('content'),
        );
        
        $rules = array(
            'title' => 'required',
            'markdown' => 'required',
            'content' => 'required',
        );
        
        $v = Validator::make($input, $rules);
        if ($v->fails()) {
            return Redirect::to("group/$group_id/new_post")->with('msg', '填写信息错误');
        }
        
        $group = Group::find($group_id);
        $user = Auth::user();
        
        $input['group_id'] = $group_id;
        $input['group_name'] = $group->name;
        $input['author_id'] = $user->id;
        $input['author'] = $user->username;
        
        
        Post::create($input);
        return Redirect::to("group/$group_id")->with('msg', '发帖成功');
    }
    
    public function getPostDetail($group_id, $post_id)
    {
        // TODO:
        var_dump($group_id);
        var_dump($post_id);
        //return View::make('group.post.detail');
    }
    
    
    public function postPostComment($group_id, $post_id)
    {
        // TODO: post comment
        echo "post comment";
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