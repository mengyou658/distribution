<?php

class Translation extends Eloquent {

    protected $table = 'translations';

    protected $fillable = array('original_id', 'content', 'markdown', 'author_id', 'author_name');

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