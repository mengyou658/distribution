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
        $this->beforeFilter('auth', array('only' => array('getApply', 'postApply', 'getJoin', 'getQuit', 'getNewPost')));
    }

	public function getIndex()
	{
		$groups = Group::all();
		return View::make('group.index')
                   ->with('groups', $groups);
	}
    
    public function getDetail($id)
	{

        $group = Group::find($id);

        $per_page_num = 3;
        $posts = Post::whereGroup_id($id)->paginate($per_page_num);
        $users = $group->users;
        $is_member = $users->contains(Auth::user()->id);
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
		return View::make('group.allposts')
                   ->with('posts', $posts);
    }
    
    public function getApply()
    {
        // TODO: 申请建立小组
        // 需要一个前端表格
    }
    
    public function postApply()
    {
        // TODO: 申请建立小组
        // 需要一个前端表格
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
        
    }
    
    public function postNewPost($group_id)
    {
        
    }
    
    public function getPostDetail($post_id)
    {
        
    }
    
    
}