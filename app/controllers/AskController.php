<?php

class AskController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Ask Controller
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
        return View::make('ask.index');
    }

}
