<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	|
	*/

	public function getIndex()
	{
		return View::make('index');
	}
    
    public function getAbout()
	{
		return View::make('home.about');
	}
    
    public function getContact()
	{
		return View::make('home.contact');
	}
    
    public function getPolicy()
	{
		return View::make('home.policy');
	}
    
    public function getHelp()
	{
		return View::make('home.help');
	}
    
    public function getProjects()
	{
		return View::make('home.projects');
	}

}