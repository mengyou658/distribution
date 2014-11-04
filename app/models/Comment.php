<?php

class Comment extends Eloquent {

    protected $table = 'comment';

    protected $guarded = array(
        'id',
    );


    // relation: user

    public function user() {
        return $this->belongsTo('User', 'user_id');
    }

}