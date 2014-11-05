<?php

class Question extends Eloquent {

    protected $table = 'question';

    protected $guarded = array(
        'id',
    );

    public static function boot() {
        parent::boot();
        
        static::created(function($question) {
        
            $topic = Topic::create([]);
            $question->topic_id = $topic->id;
            $question->save();
            
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