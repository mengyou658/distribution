<?php

class PostTag extends Eloquent {

    protected $table = 'post_tag';
    protected $fillable = array('post_id', 'tag_id');
    
}