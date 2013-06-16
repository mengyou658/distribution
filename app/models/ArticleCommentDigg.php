<?php

class ArticleCommentDigg extends Eloquent {

    protected $table = 'article_comment_digg';
    protected $fillable = array('article_comment_id', 'user_id');
    
}