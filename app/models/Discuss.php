<?php

class Discuss extends Eloquent {

    protected $table = 'discuss';

    protected $guarded = array(
        'id',
    );

    // attr: post_count
    public function getPostCountAttribute() {
        return $this->posts->count();
    }

    // relation: posts
    public function posts() {
        return $this->hasMany('Post', 'discuss_id');
    }

    // relation: group
    public function group() {
        return $this->hasOne('Group', 'discuss_id');
    }

}