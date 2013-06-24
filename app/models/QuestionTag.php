<?php

class QuestionTag extends Eloquent {

    protected $table = 'question_tag';
    protected $fillable = array('question_id', 'tag_id');
    
}