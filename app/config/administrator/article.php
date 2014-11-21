<?php

return [

    'title' => '文章',
    'single' => '文章',
    'model' => 'Article',
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
            'type' => 'textarea',
        ),
        
        'content' => array(
            'title' => '内容',
            'type' => 'wysiwyg',
        ),

    ),
    
    'form_width' => 900,
    
    
];