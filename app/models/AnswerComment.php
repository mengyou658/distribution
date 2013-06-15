<?php

class AnswerComment extends Eloquent {

    protected $table = 'answer_comments';

    protected $fillable = array('answer_id', 'author_id', 'author', 'content');
    
    // scopes
    public function scopeAvailable($query)
    {
        return $query->where('status', '=', 1);
    }
    
    // relations
    public function author()
    {
        return $this->belongsTo('User', 'author_id');
    }
    
}