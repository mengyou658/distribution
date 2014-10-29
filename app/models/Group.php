<?php

class Group extends Eloquent {

    protected $table = 'group';

    protected $guarded = array(
        'id',
    );

    public static function boot() {
        parent::boot();
        
        static::created(function($group) {
        
            $discuss = Discuss::create([]);
            $group->discuss_id = $discuss->id;
            $group->save();
            
        });
    }
}