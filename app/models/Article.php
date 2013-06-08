<?php

class Article extends Eloquent {

    protected $table = 'articles';

    public function tags()
    {
        return $this->belongsToMany('Tag', 'article_tag', 'article_id', 'tag_id');
    }
}