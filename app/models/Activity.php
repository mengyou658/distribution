<?php

class Activity extends Eloquent {

    protected $table = 'activity';

    protected $guarded = array(
        'id',
    );


    public static function boot() {
        parent::boot();
        
        static::created(function($activity) {
        
            $topic = Topic::create([]);
            $activity->topic_id = $topic->id;
            $activity->save();
            
        });
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
}