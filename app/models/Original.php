<?php

class Original extends Eloquent {

    protected $table = 'originals';

    protected $fillable = array('source_id', 'content', 'markdown', 'order');

    // setters
    public function setMarkdownAttribute($markdown)
    {
        $markdownTransform = App::make('markdown');
        $this->attributes['markdown'] = $markdown;
        $this->attributes['content'] = $markdownTransform->transform($markdown);
    }
    
}