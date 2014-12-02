<?php

class Topic extends Eloquent {

    protected $table = 'topic';

    protected $guarded = [
        'id',
    ];

    public static function boot() {
        parent::boot();
        
        // static::creating(function($topic) {
        // });

        static::deleting(function($topic) {
        
            Comment::whereTopic_id($topic->id)->get()->delete();

        });

    }

    // relation: comments 
    public function comments() {
        return $this->hasMany('Comment', 'topic_id');
    }
}