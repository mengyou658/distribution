<?php

class Comment extends Eloquent {

    protected $table = 'comment';

    protected $guarded = array(
        'id',
    );

}