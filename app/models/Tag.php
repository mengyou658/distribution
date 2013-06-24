<?php

class Tag extends Eloquent {

    protected $table = 'tags';
    
    protected $fillable = array('tag');
    
    // relations
    public function articles()
    {
        return $this->belongsToMany('Article', 'article_tag', 'tag_id', 'article_id');
    }
    
    public function news()
    {
        return $this->belongsToMany('News', 'news_tag', 'tag_id', 'news_id');
    }
    
    public function posts()
    {
        return $this->belongsToMany('Post', 'post_tag', 'tag_id', 'post_id');
    }
    
    public function sources()
    {
        return $this->belongsToMany('Source', 'source_tag', 'tag_id', 'source_id');
    }
    
    public function questions()
    {
        return $this->belongsToMany('Question', 'question_tag', 'tag_id', 'question_id');
    }

    public function events()
    {
        return $this->belongsToMany('Event', 'event_tag', 'tag_id', 'event_id');
    }
    
    public function tasks()
    {
        return $this->belongsToMany('Task', 'task_tag', 'tag_id', 'task_id');
    }

    // static
    static function markTag($tag_str)
    {
        $tag = Tag::whereTag($tag_str)->first();
        if ($tag) {
            $tag->refer_count += 1;
            $tag->save();
        } else {
            $tag = Tag::create(array('tag'=>$tag_str));
        }
        return $tag->id;
    }
    
}