<?php

class Notice extends Eloquent {

    protected $table = 'notices';
    protected $fillable = array('user_id', 'content');
    
}