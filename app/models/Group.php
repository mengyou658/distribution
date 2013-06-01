<?php

class Group extends Eloquent {

    protected $table = 'groups';
    
    public function users()
    {
        return $this->belongsToMany('User', 'user_group', 'group_id', 'user_id');
    }
    
}