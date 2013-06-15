<?php

class NewsComment extends Eloquent {

    protected $table = 'news_comments';
    protected $fillable = array('news_id', 'markdown', 'content', 'author_id', 'author_name');
    
    // relations
    public function author()
    {
        return $this->belongsTo('User', 'author_id');
    }
    
    // setters
    public function setMarkdownAttribute($markdown)
    {
        $markdownTransform = App::make('markdown');
        $this->attributes['markdown'] = $markdown;
        $this->attributes['content'] = $markdownTransform->transform($markdown);
    }
    
}