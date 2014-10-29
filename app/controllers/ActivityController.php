<?php

class ActivityController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Activity Controller
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
        return View::make('event.index');
    }

}
