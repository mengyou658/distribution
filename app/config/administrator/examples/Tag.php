<?php

return array(

    'title' => '标签',

    'single' => '标签',

    'model' => 'Tag',

    'columns' => array(
        'id',
        
        'name' => array(
            'title' => '标签',
        ),
        
        'created_at' => array(
            'title' => '创建时间',
        ),
    ),

    'filters' => array(
        'id',
        'name' => array(
            'title' => '标签',
        ),
    ),

    'edit_fields' => array(
        'id' => array(
            'title' => 'ID',
            'type' => 'key',
        ),
        
        'name' => array(
            'title' => '标签',
            'type' => 'text',
        ),
        

    ),
    
    'form_width' => 600,
    
    
);