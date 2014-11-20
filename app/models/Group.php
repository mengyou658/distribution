<?php

class Group extends Eloquent {

    protected $table = 'group';

    protected $guarded = array(
        'id',
    );

    public static function boot() {
        parent::boot();
        
        static::creating(function($group) {
        
            $discuss = Discuss::create([]);
            $group->discuss_id = $discuss->id;
            
        });
    }

    // relation: discuss
    public function discuss() {
        return $this->belongsTo('Discuss', 'discuss_id');
    }

}