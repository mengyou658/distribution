<?php

class ArticleTag extends Eloquent {

    protected $table = 'article_tag';
    protected $fillable = array('article_id', 'tag_id');
    
}