<?php

return array(

    'title' => '评论',

    'single' => '评论',

    'model' => 'Comment',

    'columns' => array(
        'id',
        
        'topic_id' => array(
            'title' => '所属话题ID',
        ),
        
        'content' => array(
            'title' => '内容',
        ),
        
        'author' => array(
            'title' => '作者',
            'relationship' => 'author',
            'select' => "(:table).name",
        ),
        
        'digg_count' => array(
            'title' => '被顶数',
        ),
        
        'created_at' => array(
            'title' => '发布时间',
        ),
    ),

    'filters' => array(
        'id',
        'content' => array(
            'title' => '内容',
        ),
    ),

    'edit_fields' => array(
        'id' => array(
            'title' => 'ID',
            'type' => 'key',
        ),
        
        'topic_id' => array(
            'title' => '所属话题ID',
            'type' => 'number',
        ),
        
        'content' => array(
            'title' => '内容',
            'type' => 'textarea',
        ),
        
        'author' => array(
            'title' => '作者',
            'type' => 'relationship',
            'name_field' => 'name',
        ),


    ),
    
    'form_width' => 900,
    
    
);