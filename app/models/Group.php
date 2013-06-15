<?php

class Group extends Eloquent {

    protected $table = 'groups';
    
    protected $fillable = array('name', 'pic', 'descr', 'status');
    
    // scopes
    public function scopeValid($query)
    {
        return $query->where('status', '=', 1);
    }
    
    // relations
    public function users()
    {
        return $this->belongsToMany('User', 'group_user', 'group_id', 'user_id');
    }
    
}