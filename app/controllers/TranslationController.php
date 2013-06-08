<?php

class TranslationController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Translation Controller
	|--------------------------------------------------------------------------
	|
	|
	*/

	public function getIndex()
	{
		return View::make('translation.index');
	}
    
}