<?php

class Tag extends Eloquent {

    protected $table = 'tags';
    
    protected $fillable = array('tag');
    
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