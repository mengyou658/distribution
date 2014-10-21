<?php

class Article extends Eloquent {

    protected $table = 'article';
    
    protected $guarded = array(
        'id',
        //'status',
    );
    
    // attr: comment_count
    // public function getCommentCountAttribute() {
    //     $topicId = $this->attributes['topic_id'];
    //     $cacheKey = 'topic_comment_count_'.$topicId;
    //     $commentCount = Cache::rememberForever($cacheKey, function() use ($topicId) {
    //         $topic = Topic::find($topicId);
    //         return $topic?$topic->comment_count:0;
    //     });      
    //     return $commentCount;
    // }

    // scope
    // public function scopePublished($query) {
    //     return $query->whereStatus('published');
    // }
    
    // relation
    public function topic() {
        return $this->belongsTo('Topic', 'topic_id');
    }
    
    public function tag() {
        return $this->belongsToMany('Tag', 'article_tag', 'article_id', 'tag_id');
    }
    
    public static function boot() {
        parent::boot();
        
        static::created(function($article) {
        
            $topic = Topic::create([]);
            $article->topic_id = $topic->id;
            $article->save();
            
        });
    }
    
}
