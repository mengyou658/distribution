<?php

class Answer extends Eloquent {

    protected $table = 'answer';

    protected $guarded = array(
        'id',
    );

    public static function boot() {
        parent::boot();
        
        static::created(function($answer) {
        
            $topic = Topic::create([]);
            $answer->topic_id = $topic->id;
            $answer->save();
            
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

}