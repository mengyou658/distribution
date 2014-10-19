<?php

return [

    'title' => '附件',
    'single' => '附件',
    'model' => 'Media',
    'columns' => [
        'id',

        'url' => [
            'title' => 'URL',
        ],
        
        'name' => [
            'title' => '文件夹名',
        ],
        
        'created_at' => array(
            'title' => '发布时间',
        ),
        
    ],

    'filters' => array(
        'id',
    ),

    'edit_fields' => array(
    
        'id' => array(
            'title' => 'ID',
            'type' => 'key',
        ),
        
        'name' => array(
            'title' => '文件',
            'type' => 'file',
            'location' => public_path() . '/upload/',
            'naming' => 'random',
            'length' => 10,
            'size_limit' => 2,
        ),

    ),
    
    'form_width' => 900,
    
];