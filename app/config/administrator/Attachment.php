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
            'location' => public_path() . '/upload/temp/',
            'naming' => 'keep',
            'length' => 10,
            'size_limit' => 2,
            'editable' => function($model) {
                return !$model->exists;
            },
            'visible' => function($model) {
                return !$model->exists;
            },
        ),

    ),
    
    'form_width' => 900,
    
];