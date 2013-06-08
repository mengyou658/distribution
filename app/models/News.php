<?php

class News extends Eloquent {

    protected $table = 'news';

    protected $fillable = array('title', 'link', 'courier_id', 'courier', 'abstract', 'status');
    
    // 审核通过的
    public function scopeAudited($query)
    {
        return $query->where('status', '=', 1);
    }
    
    public function tags()
    {
        return $this->belongsToMany('Tag', 'news_tag', 'news_id', 'tag_id');
    }
    
}