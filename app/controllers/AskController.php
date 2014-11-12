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

        return View::make('ask.pending', compact('pendingQuestions'));
    }

    public function getHottest() {

        $hottestQuestions = Question::whereStatus('published')
                                    //->where('answer_count', '<=', 3)
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(3);
        
        return View::make('ask.hottest', compact('hottestQuestions'));
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

        // @todo

    }

    public function getAsk() {
        return View::make('ask.ask');
    }

    public function postAsk() {
        //dd(Input::all());

        $user = Auth::user();
        $title = Input::get('title');
        $markdown = Input::get('markdown');
        $parsedown = App::make('parsedown');


        $newQuestion = [
            'user_id' => $user->id,
            'title' => $title,
            'markdown' => $markdown,
            'content' => $parsedown->text($markdown),
        ];

        $rules = [
            'title' => 'required',
            'content' => 'required',
        ];

        $validator = Validator::make($newQuestion, $rules);

        if ($validator->fails()) {
            return Redirect::to('ask/ask')
                           ->with('title', $title)
                           ->with('markdown', $markdown)
                           ->with('msg', '请输入问题和题干');
        }

        $question = Question::create($newQuestion);

        $tags = explode(',', Input::get('hidden-tags'));

        foreach ($tags as $tagName) {
            $question->tag($tagName);
        }

        return Redirect::to('ask')->with('msg', '提问成功');
    }

    public function getQuestionAnswer($questionId) {
        
        $question = Question::find($questionId);

        return View::make('ask.answer', compact('question'));
    }

    public function postQuestionAnswer() {
        dd(Input::all());
        // @todo: 
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
