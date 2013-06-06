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
        $this->beforeFilter('auth', array('only' => array('getApply')));
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
		return View::make('ask.detail')
                   ->with('question', $question)
                   ->with('answers', $answers);
	}
    
    public function getNewQuestion()
    {
        
    }
    
    public function postNewQuestion()
    {
        
    }
    
    public function postAnswer($question_id)
    {
        
    }
    
    public function getAnswerComments($answer_id)
    {
        // 返回评论json数据
        sleep(2);
        return "hello";
    }
    
}