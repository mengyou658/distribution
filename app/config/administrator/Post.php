<?php

return [

    'title' => '帖子',
    'single' => '帖子',
    'model' => 'Post',
    'columns' => [
        'id',
        
        'group_name' => [
            'title' => '小组',
        ],
 
        'title' => [
            'title' => '标题',
        ],

        'user_name' => array(
            'title' => '作者',
            'relationship' => 'user',
            'select' => "(:table).nickname",
        ),

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
    ),
    
    'form_width' => 900,
    
    
];