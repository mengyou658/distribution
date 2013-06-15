<?php

class ArticleComment extends Eloquent {

    protected $table = 'article_comments';
    protected $fillable = array('article_id', 'markdown', 'content', 'author_id', 'author');
    
    // relations
    public function author()
    {
        return $this->belongsTo('User', 'author_id');
    }
    
    public function setMarkdownAttribute($markdown)
    {
        $markdownTransform = App::make('markdown');
        $this->attributes['markdown'] = $markdown;
        $this->attributes['content'] = $markdownTransform->transform($markdown);
    }
}