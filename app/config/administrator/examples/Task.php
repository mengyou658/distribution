<?php

return array(

    'title' => '任务',

    'single' => '任务',

    'model' => 'Task',

    'columns' => array(
        'id',
        
        'title' => array(
            'title' => '标题',
        ),
        
        'content' => array(
            'title' => '内容',
        ),
        
        'expired_at' => array(
            'title' => '截止',
        ),
        
        'author' => array(
            'title' => '作者',
            'relationship' => 'author',
            'select' => "(:table).name",
        ),
        
        'topic_id' => array(
            'title' => '评论话题ID',
        ),
        
        'comment_count' => array(
            'title' => '评论数',
        ),
        
        'digg_count' => array(
            'title' => '评论数',
        ),
        
        'status' => array(
            'title' => '状态',
        ),
        
        'created_at' => array(
            'title' => '发布时间',
        ),
    ),

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
        
        'title' => array(
            'title' => '标题',
            'type' => 'text',
        ),
        
        'content' => array(
            'title' => '内容',
            'type' => 'textarea',
        ),
        
        // 'expired_at' => array(
            // 'title' => '截止',
            // 'type' => 'text',
        // ),
        
        'author' => array(
            'title' => '作者',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
        
        'tag' => array(
            'title' => '标签',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
        
        'status' => array(
            'title' => '状态',
            'type' => 'number',
        ),

    ),
    
    'form_width' => 900,
    
    
);