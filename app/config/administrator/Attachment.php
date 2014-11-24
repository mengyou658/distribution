<?php

return [

    'title' => '附件',
    'single' => '附件',
    'model' => 'Attachment',
    'columns' => [
        'id',
        
        'uri' => [
            'title' => 'URI',
        ],
        
        'created_at' => [
            'title' => '上传时间',
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
        
        'name' => array(
            'title' => '文件',
            'type' => 'file',
            'location' => public_path() . '/upload/' . date('%Y/%m/%d'), // 按时间分割
            'naming' => 'random',
            'length' => 10,
            'size_limit' => 2,
        ),

    ),
    
    'form_width' => 900,
    
];