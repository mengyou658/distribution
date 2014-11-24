<?php

return [

    'title' => '评论',
    'single' => '评论',
    'model' => 'Comment',
    'columns' => [
        'id',
        
        'topic_id' => [
            'title' => '所属话题ID',
        ],

        'user_name' => array(
            'title' => '作者',
            'relationship' => 'user',
            'select' => "(:table).nickname",
        ),

        'floor' => [
            'title' => '楼层',
        ],

        'digg_count' => [
            'title' => '被顶次数',
        ],

        'created_at' => [
            'title' => '发布时间',
        ],
        
    ],

    'filters' => array(
        'id',
    ),

    'edit_fields' => array(
    
        'id' => array(
            'title' => 'ID',
            'type' => 'key',
        ),
        
        'content' => array(
            'title' => '内容',
            'type' => 'textarea',
        ),

    ),
    
    'form_width' => 900,
    
    
];