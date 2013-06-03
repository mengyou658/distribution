<?php

class PostComment extends Eloquent {

    protected $table = 'post_comments';
    protected $fillable = array('post_id', 'markdown', 'content', 'author_id', 'author');
    
}