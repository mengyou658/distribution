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

    public function getGroupNameAttribute() {
        $group = $this->discuss->group;
        if ($group) {
            return $group->name;
        }
        return '';
    }

    // setter: markdown
    public function setMarkdownAttribute($value) {
        $parsedown = App::make('parsedown');
        $this->attributes['markdown'] = $value;
        $this->attributes['content'] = $parsedown->text($value);
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