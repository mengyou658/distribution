<?php

return [

    'title' => '标签',
    'single' => '标签',
    'model' => 'Tag',
    'columns' => [
        'id',
        
        'name' => [
            'title' => '分类名',
        ],
        
    ],

    'filters' => array(
        'id',
        'name' => array(
            'title' => '分类名',
        ),
    ),

    'edit_fields' => array(
    
        'id' => array(
            'title' => 'ID',
            'type' => 'key',
        ),

        'name' => array(
            'title' => '标签名',
            'type' => 'text',
        ),
        
    ),

    
    'form_width' => 900,
    
];