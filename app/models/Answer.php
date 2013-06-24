<?php

class Answer extends Eloquent {

    protected $table = 'answers';

    protected $fillable = array('question_id', 'author_id', 'author_name', 'content', 'markdown');
    
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
    
    // seters
    public function setMarkdownAttribute($markdown)
    {
        $markdownTransform = App::make('markdown');
        $this->attributes['markdown'] = $markdown;
        $this->attributes['content'] = $markdownTransform->transform($markdown);
    }
    
}