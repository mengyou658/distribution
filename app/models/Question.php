<?php

class Question extends Eloquent {

    protected $table = 'questions';

    protected $fillable = array('title', 'asker_id', 'asker');
    
    // 状态正常的
    public function scopeAvailable($query)
    {
        return $query->where('status', '=', 1);
    }
    
}