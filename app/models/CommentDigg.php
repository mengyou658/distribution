<?php

class CommentDigg extends Eloquent {

    protected $table = 'comment_digg';

    protected $guarded = array(
        'id',
    );

    public static function boot() {
        parent::boot();
        
        static::creating(function($commentDigg) {
        
            $comment = Comment::find($commentDigg->comment_id);
            $comment->digg_count += 1;
            $comment->save();

        });

        static::deleting(function($commentDigg) {
        
            $comment = Comment::find($commentDigg->comment_id);
            $comment->digg_count -= 1;
            $comment->save();

        });

    }
}