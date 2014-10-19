<?php

return array(

    'title' => '邀请码',

    'single' => '邀请码',

    'model' => 'Invitation',

    'columns' => array(
        'id',
        
        'code' => array(
            'title' => '邀请码',
        ),
        
        'user_id' => array(
            'title' => '属于用户',
        ),

        'is_used' => array(
            'title' => '是否被使用',
        ),
        
        'created_at' => array(
            'title' => '创建时间',
        ),
    ),

    'filters' => array(
        'id',
    ),

    'edit_fields' => array(
    
        'id' => array(
            'title' => 'ID',
            'type' => 'key',
        ),
        
        'code' => array(
            'title' => '邀请码',
            'type' => 'text',
        ),
        
        'user_id' => array(
            'title' => '属于用户',
            'type' => 'number',
        ),
        
        'is_used' => array(
            'title' => '是否被使用',
            'type' => 'number',
        ),

    ),
    
    'form_width' => 400,
    
    
);