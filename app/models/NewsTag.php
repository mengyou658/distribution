<?php

class NewsTag extends Eloquent {

    protected $table = 'news_tag';
    protected $fillable = array('news_id', 'tag_id');
    
}