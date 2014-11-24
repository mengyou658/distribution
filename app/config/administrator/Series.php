<?php

return [

    'title' => '系列',
    'single' => '系列',
    'model' => 'Series',
    'columns' => [
        'id',
        
        'name' => [
            'title' => '系列名',
        ],
        
    ],

    'filters' => array(
        'id',
        'name' => array(
            'title' => '系列名',
        ),
    ),

    'edit_fields' => array(
    
        'id' => array(
            'title' => 'ID',
            'type' => 'key',
        ),

        'name' => array(
            'title' => '系列名',
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