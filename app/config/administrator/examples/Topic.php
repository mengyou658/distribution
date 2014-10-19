<?php

return array(

    'title' => '评论话题',

    'single' => '评论话题',

    'model' => 'Topic',

    'columns' => array(
        'id',
        
        'title' => array(
            'title' => '标题',
        ),
        
        'created_at' => array(
            'title' => '创建时间',
        ),
    ),

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
        
        'title' => array(
            'title' => '标题',
            'type' => 'text',
        ),

    ),
    
    'form_width' => 900,
    
    
);