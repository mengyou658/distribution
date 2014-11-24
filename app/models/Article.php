<?php

class Article extends Eloquent {

    // @todo: 考虑删除模型时的处理，相关删除等

    protected $table = 'article';
    
    protected $guarded = array(
        'id',
        //'status',
    );

    // protected $appends = [
    //     'abstract',
    // ];

    public static function boot() {
        parent::boot();

        //static::addGlobalScope(new ArticleDefaultScope);

        static::creating(function($article) {
        
            $topic = Topic::create([]);
            $article->topic_id = $topic->id;
            
        });

        // @todo: handle other events
    }
    
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

    // attr: show_abstract
    public function getShowAbstractAttribute() {
        if ($this->attributes['abstract']) {
            return $this->attributes['abstract'];
        }
        else {
            return substr($this->attributes['content'], 0, strpos($this->attributes['content'], '<!--more-->'));
        }
    }

    // scope
    // public function scopePublished($query) {
    //     return $query->whereStatus('published');
    // }
    

    // relation: user
    public function user() {
        return $this->belongsTo('User', 'user_id');
    }

    // relation: topic
    public function topic() {
        return $this->belongsTo('Topic', 'topic_id');
    }
    
    // relation: tags
    public function tags() {
        return $this->belongsToMany('Tag', 'article_tag', 'article_id', 'tag_id');
    }
    
    // relation: category
    public function category() {
        return $this->belongsTo('Category', 'category_id');
    }

}

// use Illuminate\Database\Eloquent\ScopeInterface;
// use Illuminate\Database\Eloquent\Builder;

// class ArticleDefaultScope implements ScopeInterface {
//     public function apply(Builder $builder) {
//         $builder->where('status','=', 'published');
//     }

//     public function remove(Builder $builder) {
//         $query = $builder->getQuery();

//         foreach ((array) $query->wheres as $key => $where) {

//             if ($where['column'] == 'status' 
//              && $where['operator'] == '=' 
//              && $where['value'] == 'published') {

//                 unset($query->wheres[$key]);
//                 $query->wheres = array_values($query->wheres);

//             }
//         }

//     }
// }
