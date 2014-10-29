<?php

class News extends Eloquent {

    protected $table = 'news';

    protected $guarded = array(
        'id',
    );

    public static function boot() {
        parent::boot();
        
        static::created(function($news) {
        
            $topic = Topic::create([]);
            $news->topic_id = $topic->id;
            $news->save();
            
        });
    }

}