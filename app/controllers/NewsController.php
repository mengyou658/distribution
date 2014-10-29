<?php

class NewsController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | News Controller
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

    public function getIndex() {
        return View::make('news.index');
    }

}
