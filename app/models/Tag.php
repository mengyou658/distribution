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
    
    // TODO: 标记标签
    static function markTag($tag)
    {
        $my_tag = Tag::whereTag($tag)->first();
        if ($my_tag) {
            $my_tag->refer_counts += 1;
            $my_tag->save();
            return $my_tag;
        } else {
            return Tag::create(array('tag'=>$tag));
        }
    }
    
}