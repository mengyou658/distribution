<?php

class Post extends Eloquent {

    protected $table = 'posts';
    
    protected $fillable = array('title', 'group_id', 'group_name', 'author_id', 'author_name', 'content', 'markdown');
    
    // relations 
    public function author()
    {
        return $this->belongsTo('User', 'author_id');
    }
    
    public function group()
    {
        return $this->belongsTo('Group', 'group_id');
    }
    
    public function tags()
    {
        return $this->belongsToMany('Tag', 'post_tag', 'post_id', 'tag_id');
    }
    
    // setters
    public function setMarkdownAttribute($markdown)
    {
        $markdownTransform = App::make('markdown');
        $this->attributes['markdown'] = $markdown;
        $this->attributes['content'] = $markdownTransform->transform($markdown);
    }
    
}