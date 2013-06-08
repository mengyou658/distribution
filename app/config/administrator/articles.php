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
            'title' => 'Title',
            'select' => "(:table).title",
        ),

        'author' => array(
            'title' => 'Author',
            'select' => "(:table).author",
        ),
    ),

    /**
     * The filter set
     */
    'filters' => array(
        'id',
        
        'title' => array(
            'title' => 'Title',
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