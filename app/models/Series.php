<?php

class Series extends Eloquent {

    protected $table = 'series';

    protected $fillable = array('name', 'pic', 'descr');
    
    // scopes
    
    // relations
    public function activities()
    {
        return $this->hasMany('Activity', 'activity_id');
    }
    
}