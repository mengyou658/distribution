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
        
        'status' => [
            'title' => '状态',
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

        'abstract' => array(
            'title' => '摘要',
            'type' => 'textarea',
        ),

        'thumbnail' => [
            'title' => '缩略图（URL）',
            'type' => 'text',
        ],
        
        'content' => array(
            'title' => '内容',
            'type' => 'wysiwyg',
        ),

        'category' => [
            'title' => '文章分类',
            'type' => 'relationship',
            'name_field' => 'name',
        ],

        'published_at' => [
            'title' => '发布时间',
            'type' => 'datetime',
        ],

        'status' => [
            'title' => '状态',
            'type' => 'enum',
            'options' => ['published', 'dropped'],
        ],

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