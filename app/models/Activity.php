<?php

class Activity extends Eloquent {

    protected $table = 'activity';

    protected $guarded = array(
        'id',
    );

    public function getDates() {
        return ['began_at', 'ended_at', 'created_at', 'updated_at'];
    }

    public static function boot() {
        parent::boot();
        
        static::creating(function($activity) {
        
            $topic = Topic::create([]);
            $activity->topic_id = $topic->id;
            
        });

        // static::deleting(function($activity) {
        
        //     // @todo: delete topic
            
        // });
    }

    // relation: members
    public function members() {
        return $this->belongsToMany('User', 'activity_user', 'activity_id', 'user_id');
    }

    // relation: user
    public function user() {
        return $this->belongsTo('User', 'user_id');
    }

    // relation: topic
    public function topic() {
        return $this->belongsTo('Topic', 'topic_id');
    }

    // relation: series
    public function series() {
        return $this->belongsTo('Series', 'series_id');
    }

    // relation: tags
    public function tags() {
        return $this->belongsToMany('Tag', 'activity_tag', 'activity_id', 'tag_id');
    }
}