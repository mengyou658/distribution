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
    
    public function getDetail($tag_id)
	{
        $tag = Tag::find($tag_id);
		return View::make('tag.detail')
                   ->with('tag', $tag);
	}
}