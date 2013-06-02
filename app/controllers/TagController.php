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
		return View::make('tag.index');
	}
    
    public function getDetail($tag)
	{
        echo $tag;
		//return View::make('tag.detail');
	}
}