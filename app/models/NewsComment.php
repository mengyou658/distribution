<?php

class NewsComment extends Eloquent {

    protected $table = 'news_comments';
    protected $fillable = array('news_id', 'markdown', 'content', 'author_id', 'author');
    
}