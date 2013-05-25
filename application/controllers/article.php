<?php

class Article_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| Article Controller
	|--------------------------------------------------------------------------
	|
	|
	*/

	public function action_index()
	{
		return View::make('article.index');
	}

}