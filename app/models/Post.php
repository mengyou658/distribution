<?php

class Post extends Eloquent {

    protected $table = 'post';

    protected $guarded = array(
        'id',
    );

    public static function boot() {
        parent::boot();
        
        static::creating(function($post) {
        
            $topic = Topic::create([]);
            $post->topic_id = $topic->id;
            
        });
    }

    // relation: discuss
    public function discuss() {
        return $this->belongsTo('Discuss', 'discuss_id');
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