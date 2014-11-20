<?php

class Question extends Eloquent {

    protected $table = 'question';

    protected $guarded = array(
        'id',
    );

    public static function boot() {
        parent::boot();
        
        static::creating(function($question) {
        
            $topic = Topic::create([]);
            $question->topic_id = $topic->id;
            
        });
    }

    public function tag($tagName) {
        $tag = Tag::whereName($tagName)->first();

        if (!$tag) {
            $tag = Tag::create([
                'name' => $tagName,
            ]);

            QuestionTag::create([
                'question_id' => $this->id,
                'tag_id' => $tag->id,
            ]);

            return;
        }

        $questionTag = QuestionTag::whereQuestion_id($this->id)
                                  ->whereTag_id($tag->id)
                                  ->first();

        if (!$questionTag) {
            QuestionTag::create([
                'question_id' => $this->id,
                'tag_id' => $tag->id,
            ]);
        }

        return;
    }

    // relation: user
    public function user() {
        return $this->belongsTo('User', 'user_id');
    }

    // relation: topic
    public function topic() {
        return $this->belongsTo('Topic', 'topic_id');
    }

    // relation: answers
    public function answers() {
        return $this->hasMany('Answer', 'question_id');
    }

    // relation: tags
    public function tags() {
        return $this->belongsToMany('Tag', 'question_tag', 'question_id', 'tag_id');
    }

}