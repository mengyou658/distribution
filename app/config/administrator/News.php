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

        'source' => [
            'title' => '网址',
        ],
        
        'status' => [
            'title' => '状态',
        ],

        'created_at' => [
            'title' => '发布时间',
        ],
        
    ],

    'filters' => [
        'id',
        'title' => [
            'title' => '标题',
        ],
    ],

    'edit_fields' => [
    
        'id' => [
            'title' => 'ID',
            'type' => 'key',
        ],

        'title' => [
            'title' => '标题',
            'type' => 'text',
        ],

        'source' => [
            'title' => '网址',
            'type' => 'text',
        ],

        'content' => [
            'title' => '内容',
            'type' => 'textarea',
        ],

        'status' => [
            'title' => '状态',
            'type' => 'enum',
            'options' => ['published', 'dropped'],
        ],

        'topic_id' => [
            'title' => '评论话题ID',
            'type' => 'number',
            'editable' => false,
        ],
    ],
    
    'form_width' => 900,
    
];