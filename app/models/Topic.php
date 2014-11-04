<?php

class Topic extends Eloquent {

    protected $table = 'topic';

    protected $guarded = array(
        'id',
    );


    // relation: comments 
    public function comments() {
        return $this->hasMany('Comment', 'topic_id');
    }
}