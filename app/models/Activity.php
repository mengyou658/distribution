<?php

class Activity extends Eloquent {

    protected $table = 'activities';

    protected $fillable = array('series_id', 'title', 'organizer', 'start_at', 'end_at', 'location', 'descr', 'status', 'sponsor_id', 'sponsor_name');
    
    // scopes
    public function scopeAvailable($query)
    {
        return $query->where('status', '=', 1);
    }
    
    // relations
    public function users()
    {
        return $this->belongsToMany('User', 'activity_user', 'activity_id', 'user_id');
    }
    
    public function sponsor()
    {
        return $this->belongsTo('User', 'sponsor_id');
    }
    
    public function tags()
    {
        return $this->belongsToMany('Tag', 'activity_tag', 'activity_id', 'tag_id');
    }
    
}