<?php

/**
 * Actors model config
 */

return array(

    'title' => '栏目',

    'single' => 'categories',

    'model' => 'Category',

    /**
     * The display columns
     */
    'columns' => array(
        'id',
        
        'name' => array(
            'title' => '名称',
            'select' => "(:table).name",
        ),

        'parent_cate' => array(
            'title' => '父栏目',
            'relationship' => 'parent_cate',
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
            'title' => '名称',
        ),
        
    ),

    /**
     * The editable fields
     */
    'edit_fields' => array(
    
        'name' => array(
            'title' => '名称',
            'type' => 'text',
        ),
        
        'parent_cate' => array(
            'title' => '父栏目',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
        
        'descr' => array(
            'title' => '描述',
            'type' => 'textarea',
        ),
        
    ),
);