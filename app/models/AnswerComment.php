<?php

class AnswerComment extends Eloquent {

    protected $table = 'answer_comments';

    protected $fillable = array('answer_id', 'author_id', 'author', 'content');
    
    // 可用的
    public function scopeAvailable($query)
    {
        return $query->where('status', '=', 1);
    }
    
}