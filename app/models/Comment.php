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

    // setter: markdown
    public function setMarkdownAttribute($value) {
        $parsedown = App::make('parsedown');
        $this->attributes['markdown'] = $value;
        $this->attributes['content'] = $parsedown->text($value);
    }

    // relation: user
    public function user() {
        return $this->belongsTo('User', 'user_id');
    }

}