<?php

return [

    'title' => '用户',
    'single' => '用户',
    'model' => 'User',

    'columns' => [
        'id',
        
        'name' => [
            'title' => '用户名',
        ],
        
        'email' => [
            'title' => '邮箱',
        ],
        
        'created_at' => [
            'title' => '注册时间',
        ],
    ],

    'filters' => [
        'id',
        
        'name' => [
            'title' => '用户名',
        ],
        
        'email' => [
            'title' => '邮箱',
        ],
    ],

    'edit_fields' => array(
    
        'id' => array(
            'title' => 'ID',
            'type' => 'key',
        ),
    
        'name' => array(
            'title' => '用户名',
            'type' => 'text',
        ),

        'password' => array(
            'title' => '密码',
            'type' => 'password',
        )
    ),
    
    'form_width' => 900,
];