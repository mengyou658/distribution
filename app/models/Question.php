<?php

class Question extends Eloquent {

    protected $table = 'questions';

    protected $fillable = array('title', 'asker_id', 'asker_name');
    
    // scopes
    public function scopeAvailable($query)
    {
        return $query->where('status', '=', 1);
    }
    
    // relations
    public function asker()
    {
        return $this->belongsTo('User', 'asker_id');
    }
    
    public function tags()
    {
        return $this->belongsToMany('Tag', 'question_tag', 'question_id', 'tag_id');
    }
    
}