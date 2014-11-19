<?php

class WpUser extends Eloquent {

    protected $connection = 'legacy';
    protected $table = 'wp_users';
    protected $primaryKey = 'ID';

    protected $guarded = array(
        'ID',
    );

}