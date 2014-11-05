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

        // @todo: 等待回答相关分类

        $pendingQuestions = Question::whereStatus('published')
                                    ->where('answer_count', '<=', 3)
                                    ->orderBy('created_at', 'desc')
                                    ->take(5)
                                    ->get();

        $hottestQuestions = Question::whereStatus('published')
                                    //->where('answer_count', '<=', 3)
                                    ->orderBy('created_at', 'desc')
                                    ->take(5)
                                    ->get();

        return View::make('ask.index', compact('pendingQuestions', 'hottestQuestions'));
    }

}
