<?php

class ArticleComment extends Eloquent {

    protected $table = 'article_comments';
    protected $fillable = array('article_id', 'markdown', 'content', 'author_id', 'author');
}