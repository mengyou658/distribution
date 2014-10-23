<?php

return [

    'title' => '快讯',
    'single' => '快讯',
    'model' => 'News',
    'columns' => [
        'id',
        
        'title' => [
            'title' => '标题',
        ],
        
        'created_at' => [
            'title' => '发布时间',
        ],
        
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