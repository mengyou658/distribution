<?php

class Post extends Eloquent {

    protected $table = 'post';

    protected $guarded = array(
        'id',
    );

    public static function boot() {
        parent::boot();
        
        static::created(function($post) {
        
            $topic = Topic::create([]);
            $post->topic_id = $topic->id;
            $post->save();
            
        });
    }

}