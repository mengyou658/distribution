<?php

class Post extends Eloquent {

    protected $table = 'post';

    protected $guarded = array(
        'id',
    );

}