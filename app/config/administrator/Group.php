<?php

return [

    'title' => '群组',
    'single' => '群组',
    'model' => 'Group',
    'columns' => [
        'id',
        
        'name' => [
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

        'name' => [
            'title' => '标题',
            'type' => 'text',
        ],

        'thumbnail' => [
            'title' => '图标',
            'type' => 'text',
        ],

        'short_descr' => [
            'title' => '简介',
            'type' => 'text',
        ],

        'descr' => array(
            'title' => '介绍',
            'type' => 'wysiwyg',
        ),
        
        'order' => array(
            'title' => '顺序（从小到大）',
            'type' => 'number',
        ),

        'discuss_id' => [
            'title' => '评论话题ID',
            'type' => 'number',
            'editable' => false,
        ],

    ),

    'sort' => array(
        'field' => 'order',
        'direction' => 'asc',
    ),
    
    'form_width' => 900,
    
    
];