<?php

class Group_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| Group Controller
	|--------------------------------------------------------------------------
	|
	|
	*/
    
    function __construct()
    {
        parent::__construct();
        
        $this->restful = true;
        //$this->filter('before', 'auth')->only(array('index'));
    }
    

	public function get_index()
	{
        $posts = Post::all();
		return View::make('group.index')
                   ->with('posts', $posts);
	}
    
	public function get_list()
	{
        $groups = Group::all();
		return View::make('group.list')
                   ->with('groups', $groups);
	}
    
	public function get_detail($group_id, $page=1)
	{
        $group = Group::find($group_id);
        // TODO: 分页逻辑
        $posts = Post::where_group_id($group_id)->get();
		return View::make('group.detail')
                   ->with('group', $group)
                   ->with('posts', $posts)
                   ->with('page', $page);
	}
    
	public function get_new_post($group_id)
	{
        // TODO:
        echo "new post for $group_id";
    }

}