<?php

class Post extends Eloquent {

    protected $table = 'posts';
    
    protected $fillable = array('title', 'group_id', 'group_name', 'author_id', 'author', 'content', 'markdown');
    
    public function group()
    {
        return $this->belongsTo('Group', 'group_id');
    }
    
    public function tags()
    {
        return $this->belongsToMany('Tag', 'post_tag', 'post_id', 'tag_id');
    }
    
}