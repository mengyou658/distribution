<?php

class AskController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Ask Controller
	|--------------------------------------------------------------------------
	|
	|
	*/
    
    public function __construct()
    {
        $this->beforeFilter('auth', array('only' => array(
            'getNewQuestion',
            'postNewQuestion',
            'postAnswer',
            'getAnswerApprove',
            'getAnswerOppose'
        )));
    }

	public function getIndex()
	{
        $per_page_num = 3;
        $questions = Question::orderBy('created_at', 'desc')->paginate($per_page_num);
		return View::make('ask.index')
                   ->with('questions', $questions);
	}
    
    public function getDetail($question_id)
	{
        $per_page_num = 3;
    
        $question = Question::find($question_id);
        $answers = Answer::whereQuestion_id($question_id)->orderBy('created_at', 'desc')->paginate($per_page_num);
        
        // TODO: view composer 探测答案状态
        
		return View::make('ask.detail')
                   ->with('question', $question)
                   ->with('answers', $answers);
	}
    
    public function getNewQuestion()
    {
        return View::make('ask.new_question');
    }
    
    public function postNewQuestion()
    {
        $input = array(
            'title' => Input::get('title'),
        );
        
        $rules = array(
            'title' => 'required',
        );
        
        $v = Validator::make($input, $rules);
        if ($v->fails()) {
            return Redirect::to('ask/new_question')->with('msg', '填写信息错误');
        }
        
        $user = Auth::user();
        $input['asker_id'] = $user->id;
        $input['asker'] = $user->username;
        
        Question::create($input);
        
        // TODO: 标记tags
        
        return Redirect::to('ask')->with('msg', '提问成功');
    }
    
    public function postAnswer($question_id)
    {
        //var_dump(Input::all());
        $markdown = App::make('markdown');
        $user = Auth::user();
        
        $new_answer = array(
            'markdown' => Input::get('markdown'),
            'content' => $markdown->transform(Input::get('markdown')),
            'question_id' => $question_id,
            'author_id' => $user->id,
            'author' => $user->username,
        );
        
        $rules = array(
            'markdown' => 'required',
        );
        
        $v = Validator::make($new_answer, $rules);
        if ($v->fails()) {
            return Redirect::to("ask/question/$question_id")->with('msg', '请写答案内容');
        }
        
        Answer::create($new_answer);
        
        // TODO: event fire user messages with @
        
        return Redirect::to("ask/question/$question_id")->with('msg', '答案发送成功');
    }

    public function getAnswerApprove($answer_id)
    {
        $user = Auth::user();
        $answer = Answer::find($answer_id);
        
        $attitude = AnswerAttitude::whereUser_id($user->id)->whereAnswer_id($answer_id)->first();
        
        if (!$attitude) {
            
        
            AnswerAttitude::create(array(
                'answer_id' => $answer_id,
                'user_id' => $user->id,
                'type' => 1,
            ));
            
            // TODO 操作答案属性
            
            return 0;
        } else if ($attitude->type == 2) {
        
            // TODO update 数据
            
            // TODO 操作答案属性
            
            return 0;
        }
        return 1;
    }
    
    public function getAnswerOppose($answer_id)
    {
        $user = Auth::user();
        $answer = Answer::find($answer_id);
        
        $attitude = AnswerAttitude::whereUser_id($user->id)->whereAnswer_id($answer_id)->first();
        
        if (!$attitude) {
            AnswerAttitude::create(array(
                'answer_id' => $answer_id,
                'user_id' => $user->id,
                'type' => 2,
            ));
            
            // TODO 操作答案属性
            
            
            return 0;
        } else if ($attitude->type == 1) {
        
            // TODO update 数据
            
            // TODO 操作答案属性
            
            return 0;
        }
        return 1;
    }
    
    public function getAnswerComments($answer_id)
    {
        // 返回评论json数据
        sleep(2);
        return "hello";
    }
    
}