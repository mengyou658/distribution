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

    // attr: source_host
    public function getSourceHostAttribute() {
        $source = $this->source;

        $sourceInfo = parse_url($source);
        if (strpos($sourceInfo['host'], 'www.') === 0) {
            $host = substr($sourceInfo['host'], 4);
        } 
        else {
            $host = $sourceInfo['host'];
        }

        return $host;
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