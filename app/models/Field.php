<?php

class Field extends Eloquent {

    protected $table = 'fields';

    protected $fillable = array('name');
    
    // scopes
    
    // relations
    public function sources()
    {
        return $this->hasMany('Source', 'category_id');
    }
    
}