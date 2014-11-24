<?php

return [

    'title' => '文章分类',
    'single' => '文章',
    'model' => 'Category',
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
            'title' => '分类名',
            'type' => 'text',
        ),
        
        'order' => array(
            'title' => '排序（从小到大）',
            'type' => 'number',
        ),

    ),

    'sort' => array(
        'field' => 'order',
        'direction' => 'asc',
    ),
    
    'form_width' => 900,
    
];