<?php

class CommentController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Comment Controller
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

    // public function getIndex() {
    //     return View::make('event.index');
    // }

}
