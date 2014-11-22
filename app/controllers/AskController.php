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
            'getQuestionAnswer',
            'postQuestionAnswer',
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

        $pendingQuestions = Question::whereStatus('published')
                                    ->where('answer_count', '<=', 3)
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(8);

        return View::make('ask.pending', compact('pendingQuestions'));
    }

    public function getHottest() {

        $hottestQuestions = Question::whereStatus('published')
                                    //->where('answer_count', '<=', 3)
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(8);
        
        return View::make('ask.hottest', compact('hottestQuestions'));
    }

    public function getQuestionTag($tagId) {
        // @todo
    }

    public function getQuestionDetail($questionId) {

        $question = Question::find($questionId);
        $answers = $question->answers()->paginate(8);

        return View::make('ask.question.detail', compact('question', 'answers'));
    }

    public function postQuestionDigg() {
        //dd(Input::all());

        if (!Request::ajax()) {
            App::abort(404);
        }

        $user = Auth::user();

        $questionId = Input::get('question_id');

        $oldQuestionDigg = QuestionDigg::whereUser_id($user->id)
                                       ->whereQuestion_id($questionId)
                                       ->first();
        if ($oldQuestionDigg) {
            return Response::json(['status'=>'error', 'msg'=>'already have'], 400);
        }
        
        QuestionDigg::create(array(
            'user_id' => $user->id,
            'question_id' => $questionId,
        ));
        
        return Response::json(['status'=>'ok']);
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
        return View::make('ask.question.answer', compact('question'));
    }

    public function postQuestionAnswer() {
        // dd(Input::all());

        $user = Auth::user();
        $questionId = Input::get('question_id');
        $markdown = Input::get('markdown');
        $parsedown = App::make('parsedown');

        $newAnswer = [
            'user_id' => $user->id,
            'question_id' => $questionId,
            'markdown' => $markdown,
            'content' => $parsedown->text($markdown),
        ];

        $rules = [
            'content' => 'required',
        ];

        $validator = Validator::make($newAnswer, $rules);

        if ($validator->fails()) {
            return Redirect::action('AskController@getQuestionAnswer', $questionId)
                           ->with('msg', '请填写正确的信息');
        }

        $answer = Answer::create($newAnswer);

        return Redirect::action('AskController@getQuestionDetail', $questionId)
                       ->with('msg', '提交回答成功');
    }

    public function postAnswerApprove() {
        // dd(Input::all());

        if (!Request::ajax()) {
            App::abort(404);
        }

        $user = Auth::user();
        $answerId = Input::get('answer_id');


        $oldAnswerAttitude = AnswerAttitude::whereUser_id($user->id)
                                           ->whereAnswer_id($answerId)
                                           ->first();

        if ($oldAnswerAttitude) {

            if ($oldAnswerAttitude->type == 'approve') {
                return Response::json(['status'=>'error', 'msg'=>'already have'], 400); 
            }
            else if ($oldAnswerAttitude->type == 'oppose') {

                $oldAnswerAttitude->type = 'approve';
                $oldAnswerAttitude->save();

                $answer = Answer::find($answerId);
                $answer->vote_count += 2;
                $answer->save();
                
                return Response::json(['vote_count'=>$answer->vote_count]);
            }

        }
        else {
            $answerAttitude = AnswerAttitude::create([
                'answer_id' => $answerId,
                'user_id' => $user->id,
                'type' => 'approve',
            ]);

            $answer = Answer::find($answerId);
            $answer->vote_count += 1;
            $answer->save();

            return Response::json(['vote_count'=>$answer->vote_count]);
        }

    }

    public function postAnswerOppose() {
        // dd(Input::all());

        if (!Request::ajax()) {
            App::abort(404);
        }

        $user = Auth::user();
        $answerId = Input::get('answer_id');

        $oldAnswerAttitude = AnswerAttitude::whereUser_id($user->id)
                                           ->whereAnswer_id($answerId)
                                           ->first();

        if ($oldAnswerAttitude) {

            if ($oldAnswerAttitude->type == 'oppose') {
                return Response::json(['status'=>'error', 'msg'=>'already have'], 400); 
            }
            else if ($oldAnswerAttitude->type == 'approve') {

                $oldAnswerAttitude->type = 'oppose';
                $oldAnswerAttitude->save();

                $answer = Answer::find($answerId);
                $answer->vote_count -= 2;
                $answer->save();
                
                return Response::json(['vote_count'=>$answer->vote_count]);
            }

        }
        else {
            $answerAttitude = AnswerAttitude::create([
                'answer_id' => $answerId,
                'user_id' => $user->id,
                'type' => 'oppose',
            ]);

            $answer = Answer::find($answerId);
            $answer->vote_count -= 1;
            $answer->save();

            return Response::json(['vote_count'=>$answer->vote_count]);
        }
    }

}
