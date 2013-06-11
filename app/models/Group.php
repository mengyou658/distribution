<?php

class Group extends Eloquent {

    protected $table = 'groups';
    
    protected $fillable = array('name', 'pic', 'descr', 'status');
    
    public function users()
    {
        return $this->belongsToMany('User', 'user_group', 'group_id', 'user_id');
    }
    
    public function scopeValid($query)
    {
        return $query->where('status', '=', 1);
    }
}