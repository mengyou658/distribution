<?php

class ArticleComment extends Eloquent {

    protected $table = 'article_comments';
    protected $fillable = array('article_id', 'markdown', 'content', 'author_id', 'author_name');
    
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

    public function setAuthorIdAttribute($author_id)
    {
        $this->attributes['author_id'] = $author_id;
        $this->attributes['author_name'] = User::find($author_id)->username;
    }
}