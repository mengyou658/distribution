<?php

class QuestionDigg extends Eloquent {

    protected $table = 'question_digg';

    protected $guarded = array(
        'id',
    );

    public static function boot() {
        parent::boot();
        
        static::creating(function($questionDigg) {
        
            $question = Question::find($questionDigg->question_id);
            $question->digg_count += 1;
            $question->save();

        });

        static::deleting(function($questionDigg) {
        
            $question = Question::find($questionDigg->question_id);
            $question->digg_count -= 1;
            $question->save();

        });

    }

}