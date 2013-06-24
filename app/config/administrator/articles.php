<?php

/**
 * Actors model config
 */

return array(

    'title' => '文章',

    'single' => 'article',

    'model' => 'Article',

    /**
     * The display columns
     */
    'columns' => array(
        'id',
        
        'title' => array(
            'title' => '标题',
            'select' => "(:table).title",
        ),

        'author' => array(
            'title' => '作者',
            'relationship' => 'author',
            'select' => "(:table).username",
        ),
        
        'category' => array(
            'title' => '栏目',
            'relationship' => 'category',
            'select' => "(:table).name",
        ),
        
        
        'created_at' => array(
            'title' => '发布时间',
            'select' => "(:table).created_at",
        ),
        
    ),

    /**
     * The filter set
     */
    'filters' => array(
        'id',
        
        'title' => array(
            'title' => '标题',
        ),
        
        'created_at' => array(
            'title' => '发布时间',
            'type' => 'date',
        ),
        
    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(
    
        'title' => array(
            'title' => '标题',
            'type' => 'text',
        ),
        
        'author' => array(
            'title' => '作者',
            'type' => 'relationship',
            'name_field' => 'username',
        ),
        
        'category' => array(
            'title' => '栏目',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
        
        'abstract' => array(
            'title' => '摘要',
            'type' => 'textarea',
        ),
        
        'content' => array(
            'title' => '内容',
            'type' => 'wysiwyg',
        ),
        
        'tags' => array(
            'title' => '标签',
            'type' => 'relationship',
            'name_field' => 'tag',
        ),
        
        
    ),
    'form_width' => 1000,
);