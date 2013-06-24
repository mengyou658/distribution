<?php

class NewsDigg extends Eloquent {

    protected $table = 'news_digg';
    protected $fillable = array('news_id', 'user_id');
    
}