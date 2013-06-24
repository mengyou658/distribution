<?php

class AnswerAttitude extends Eloquent {

    protected $table = 'answer_attitude';
    protected $fillable = array('answer_id', 'user_id', 'type');
    
}