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
        $this->beforeFilter('auth', ['only' => [
            'postQuestionDigg',
            'getAsk',
            'postAsk',
            'getAnswer',
            'postAnswer',
            'postAnswerApprove',
            'postAnswerOppose',
            // 'postSettingPassword',
        ]]);
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

    public function getPending() {

        // @todo: perPage
        $pendingQuestions = Question::whereStatus('published')
                                    ->where('answer_count', '<=', 3)
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(3);

        return View::make('ask.list', compact('pendingQuestions'));
    }

    public function getHottest() {

        $hottestQuestions = Question::whereStatus('published')
                                    //->where('answer_count', '<=', 3)
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(3);
        
        return View::make('ask.list', compact('hottestQuestions'));
    }

    public function getQuestionTag($tagId) {
        // @todo
    }

    public function getQuestionDetail($questionId) {

        $question = Question::find($questionId);
        $answers = $question->answers()->paginate(3);

        return View::make('ask.question.detail', compact('question', 'answers'));
    }

    public function postQuestionDigg() {
        dd(Input::all());

        if (!Request::ajax()) {
            App::abort(404);
        }

    }

    public function getAsk() {
        
        return View::make('ask.ask');
    }

    public function postAsk() {
        dd(Input::all());

        $user = Auth::user();

        $Input = [];
    }

    public function getAnswer($questionId) {
        
    }

    public function postAnswer() {
        dd(Input::all());

    }

    public function postAnswerApprove() {
        dd(Input::all());

        if (!Request::ajax()) {
            App::abort(404);
        }

    }

    public function postAnswerOppose() {
        dd(Input::all());

        if (!Request::ajax()) {
            App::abort(404);
        }

    }

}
