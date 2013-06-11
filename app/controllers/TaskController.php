<?php

class TaskController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Task Controller
	|--------------------------------------------------------------------------
	|
	|
	*/

	public function getIndex()
	{
		return View::make('task.index');
	}
    
    
    
}