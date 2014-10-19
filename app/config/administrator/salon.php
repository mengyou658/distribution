<?php

return [

    'title' => '活动',
    'single' => '活动',
    'model' => 'Salon',
    'columns' => [
        'id',
        
        'title' => [
            'title' => '标题',
        ],
        
        'datetime' => array(
            'title' => '活动时间',
        ),
        
    ],

    'filters' => array(
        'id',
        'title' => array(
            'title' => '标题',
        ),
    ),

    'edit_fields' => array(
    
        'id' => array(
            'title' => 'ID',
            'type' => 'key',
        ),

        'datetime' => array(
            'title' => '活动时间',
            'type' => 'datetime',
        ),
        
        'abstract' => array(
            'title' => '摘要',
            'type' => 'wysiwyg',
        ),
        
        'content' => array(
            'title' => '内容',
            'type' => 'wysiwyg',
        ),
    ),
    
    'form_width' => 900,
    
];