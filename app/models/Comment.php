<?php

class Comment extends Eloquent {

    protected $table = 'comment';

    protected $guarded = array(
        'id',
    );

    public static function boot() {
        parent::boot();
        
        static::creating(function($comment) {
        
            $topic = Topic::find($comment->topic_id);
            $topic->floor_count += 1;
            $topic->save();

            $comment->floor = $topic->floor_count;

        });
    }

    // relation: user

    public function user() {
        return $this->belongsTo('User', 'user_id');
    }

}