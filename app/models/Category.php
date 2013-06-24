<?php

class Category extends Eloquent {

    protected $table = 'categories';

    protected $fillable = array('name', 'descr', 'parent_id');
    
    // scopes

    
    // relations
    public function articles()
    {
        return $this->hasMany('Article', 'category_id');
    }
    
    public function parent_cate()
    {
        return $this->belongsTo('Category', 'parent_id');
    }
    
}