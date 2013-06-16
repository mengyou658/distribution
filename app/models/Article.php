<?php

class Article extends Eloquent {

    protected $table = 'articles';
    
    protected $fillable = array('author_id', 'author_name', 'category_id', 'category_name', 'abstract', 'content', 'markdown');
    
    // relations
    public function author()
    {
        return $this->belongsTo('User', 'author_id');
    }

    public function category()
    {
        return $this->belongsTo('Category', 'category_id');
    }
    
    public function tags()
    {
        return $this->belongsToMany('Tag', 'article_tag', 'article_id', 'tag_id');
    }
    
    
    // setters
    public function setAuthorIdAttribute($author_id)
    {
        $this->attributes['author_id'] = $author_id;
        $this->attributes['author_name'] = User::find($author_id)->username;
    }
    
    public function setCategoryIdAttribute($category_id)
    {
        $this->attributes['category_id'] = $category_id;
        $this->attributes['category_name'] = Category::find($category_id)->name;
    }
    
    public function setMarkdownAttribute($markdown)
    {
        $markdownTransform = App::make('markdown');
        $this->attributes['markdown'] = $markdown;
        $this->attributes['content'] = $markdownTransform->transform($markdown);
    }
    
}