<?php

return array(

    'title' => '文章',

    'single' => '文章',

    'model' => 'Article',

    'columns' => array(
        'id',
        
        'title' => array(
            'title' => '标题',
        ),
        
        'descr' => array(
            'title' => '描述',
        ),
        
        'editor' => array(
            'title' => '编辑',
            'relationship' => 'editor',
            'select' => "(:table).name",
        ),
        
        'topic_id' => array(
            'title' => '评论话题ID',
        ),
        
        'comment_count' => array(
            'title' => '评论数',
        ),
        
        'status' => array(
            'title' => '状态',
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
        
        'thumb' => array(
            'title' => '缩略图',
            'type' => 'text',
        ),
        
        'descr' => array(
            'title' => '描述',
            'type' => 'textarea',
        ),
        
        'content' => array(
            'title' => '内容',
            'type' => 'wysiwyg',
        ),
        
        'editor' => array(
            'title' => '编辑',
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