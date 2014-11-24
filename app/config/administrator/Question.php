<?php

return [

    'title' => '问题',
    'single' => '问题',
    'model' => 'Question',
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

        'title' => [
            'title' => '标题',
            'type' => 'text',
        ],
        
        'markdown' => array(
            'title' => '内容',
            'type' => 'markdown',
            'height' => 200,
        ),

        'tags' => [
            'title' => '标签',
            'type' => 'relationship',
            'name_field' => 'name',
        ],

        'topic_id' => [
            'title' => '评论话题ID',
            'type' => 'number',
            'editable' => false,
        ],

    ),
    
    'form_width' => 900,
    
    
];