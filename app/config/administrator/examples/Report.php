<?php

return array(

    'title' => '举报',

    'single' => '举报',

    'model' => 'Report',

    'columns' => array(
        'id',
        
        'user_id' => array(
            'title' => '举报人ID',
        ),
        
        'src' => array(
            'title' => '源地址',
        ),
        
        'content' => array(
            'title' => '内容',
        ),

        
        'created_at' => array(
            'title' => '创建时间',
        ),
    ),

    'filters' => array(
        'id',
    ),

    'edit_fields' => array(
    
        'user_id' => array(
            'title' => '举报人ID',
            'type' => 'number',
        ),
        
        'src' => array(
            'title' => '源地址',
            'type' => 'text',
        ),

        
        'content' => array(
            'title' => '内容',
            'type' => 'textarea',
        ),
        




    ),
    
    'form_width' => 900,
    
    
);