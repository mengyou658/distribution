<?php

return array(

    'title' => '反馈',

    'single' => '反馈',

    'model' => 'Feedback',

    'columns' => array(
        'id',
        
        'user' => array(
            'title' => '用户',
            'relationship' => 'user',
            'select' => "(:table).name",
        ),
        
        'title' => array(
            'title' => '称呼',
        ),
        
        'contact' => array(
            'title' => '联系方式',
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
    
        'id' => array(
            'title' => 'ID',
            'type' => 'key',
        ),

    ),
    
    'form_width' => 500,
    
    
);