<?php

class GroupController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Group Controller
	|--------------------------------------------------------------------------
	|
	|
	*/

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
		return View::make('group.detail')
                   ->with('group', $group)
                   ->with('posts', $posts);
	}
    
    public function getAllPosts()
    {
        $per_page_num = 3;
		$posts = Post::orderBy('created_at', 'desc')->paginate($per_page_num);
		return View::make('group.allposts')
                   ->with('posts', $posts);
    }
    
    
    
    
    
}