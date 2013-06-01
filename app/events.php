<?php

/*
|--------------------------------------------------------------------------
| Events
|--------------------------------------------------------------------------
|
| Subscrib Events 
*/

Event::listen('notice', function($user_id, $content)
{
    $new_notice = array(
        'user_id' => $user_id,
        'content' => $content,
    );
    
    // TODO: rules
    // TODO: 根据成功与否添加返回值
    
    Notice::create($new_notice);
    
});
