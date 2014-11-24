<?php

return [

    'title' => '活动',
    'single' => '活动',
    'model' => 'Activity',
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

        'thumbnail' => [
            'title' => '缩略图(URL)',
            'type' => 'text'
        ],

        'abstract' => array(
            'title' => '摘要',
            'type' => 'textarea',
        ),
        
        'content' => array(
            'title' => '内容',
            'type' => 'wysiwyg',
        ),

        'series' => [
            'title' => '系列',
            'type' => 'relationship',
            'name_field' => 'name',
        ],

        'began_at' => [
            'title' => '开始时间',
            'type' => 'datetime',
        ],

        'ended_at' => [
            'title' => '结束时间',
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