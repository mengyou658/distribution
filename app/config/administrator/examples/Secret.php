<?php

return array(

    'title' => '秘密',

    'single' => '秘密',

    'model' => 'Secret',

    'columns' => array(
        'id',
        
        'title' => array(
            'title' => '标题',
        ),
        
        'content' => array(
            'title' => '内容',
        ),
        
        'anonym' => array(
            'title' => '马甲',
        ),
        
        'topic_id' => array(
            'title' => '评论话题ID',
        ),
        
        'comment_count' => array(
            'title' => '评论数',
        ),
        
        'digg_count' => array(
            'title' => '被顶数',
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
        
        'anonym' => array(
            'title' => '马甲',
            'type' => 'text',
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