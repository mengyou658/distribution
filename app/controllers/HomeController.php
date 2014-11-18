<?php

class HomeController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    |
    */

    public function __construct(){
        $this->beforeFilter('auth', array('only' => array(
            // 'getDashboard',
            // 'getSettingAvatar',
            // 'postSettingAvatar',
            // 'getSettingPassword',
            // 'postSettingPassword',
        )));
    }

    public function content($viewName) {
        $viewsPath = __DIR__.'/../views/home';
        //$markdownPath = 
    }

    public function getIndex() {
        return View::make('index');
    }

    public function getAbout() {


        return View::make('home.about');
    }

    public function getContact() {
        return View::make('home.contact');
    }

    public function getTerms() {
        return View::make('home.terms');
    }

    public function getPolicy() {
        return View::make('home.policy');
    }

    public function getHelp() {
        return View::make('home.help');
    }

    public function getBooks() {

        return View::make('home.books');
    }

    public function getProject() {
        return View::make('home.project');
    }
}
