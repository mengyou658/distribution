<?php

class Answer extends Eloquent {

    protected $table = 'answers';

    protected $fillable = array('question_id', 'author_id', 'author', 'content', 'markdown');
    
    // 可用的
    public function scopeAvailable($query)
    {
        return $query->where('status', '=', 1);
    }
    
}