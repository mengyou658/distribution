<?php

class TagController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Tag Controller
	|--------------------------------------------------------------------------
	|
	|
	*/

	public function getIndex()
	{
        $tags = Tag::all();
		return View::make('tag.index')
                   ->with('tags', $tags);
	}
    
    public function getDetail($tag)
	{
        $tag = Tag::whereTag($tag)->first();
		return View::make('tag.detail')
                   ->with('tag', $tag);
	}
}