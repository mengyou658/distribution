<?php

class ActivityUser extends Eloquent {

    protected $table = 'activity_user';

    protected $guarded = array(
        'id',
    );

    public static function boot() {
        parent::boot();
        
        static::creating(function($activityUser) {
        
            $activity = Activity::find($activityUser->activity_id);
            $activity->member_count += 1;
            $activity->save();
            
        });

        static::deleting(function($activityUser) {
        
            $activity = Activity::find($activityUser->activity_id);
            $activity->member_count -= 1;
            $activity->save();
            
        });

    }

}