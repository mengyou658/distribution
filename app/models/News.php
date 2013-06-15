<?php

class News extends Eloquent {

    protected $table = 'news';

    protected $fillable = array('title', 'link', 'courier_id', 'courier_name', 'abstract', 'status');
    
    // relations
    public function courier()
    {
        return $this->belongsTo('User', 'courier_id');
    }
    
    // scopes
    public function scopeAudited($query)
    {
        return $query->where('status', '=', 1);
    }
    
    // relations
    public function tags()
    {
        return $this->belongsToMany('Tag', 'news_tag', 'news_id', 'tag_id');
    }
    
}