<?php

return [

    'title' => '回答',
    'single' => '回答',
    'model' => 'Answer',
    'columns' => [
        'id',
        
        'question_title' => [
            'title' => '问题',
            'relationship' => 'question',
            'select' => "(:table).title",
        ],

        'user_name' => array(
            'title' => '作者',
            'relationship' => 'user',
            'select' => "(:table).nickname",
        ),

        'vote_count' => [
            'title' => '得票数',
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

        'markdown' => array(
            'title' => '内容',
            'type' => 'markdown',
            'height' => 200,
        ),

        'topic_id' => [
            'title' => '评论话题ID',
            'type' => 'number',
            'editable' => false,
        ],

    ),
    
    'form_width' => 900,
    
    
];