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

}