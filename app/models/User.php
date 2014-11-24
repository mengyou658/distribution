<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    protected $table = 'user';

    protected $hidden = array('password', 'remember_token');

    protected $fillable = array(
        'email',
        'name',
        'password',
    );

    // attr: show_name
    public function getShowNameAttribute() {
        return ($this->attributes['nickname'] != '')?$this->attributes['nickname']:$this->attributes['name'];
    }

    // attr: show_avatar
    public function getShowAvatarAttribute() {
        return ($this->attributes['avatar'] != '')?$this->attributes['avatar']:'/img/default_avatar.png';
    }

}
