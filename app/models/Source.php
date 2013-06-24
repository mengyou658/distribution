<?php

class Source extends Eloquent {

    protected $table = 'sources';

    protected $fillable = array('orig_title', 'orig_link', 'courier_id', 'courier_name');
    
    // scopes
    public function scopeAvailable($query)
    {
        return $query->where('status', '=', 1);
    }
    
    // relations
    public function courier()
    {
        return $this->belongsTo('User', 'courier_id');
    }
    
    public function tags()
    {
        return $this->belongsToMany('Tag', 'source_tag', 'source_id', 'tag_id');
    }
    
}