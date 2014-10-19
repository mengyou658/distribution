<?php

return array(

    'title' => '邀请码申请',

    'single' => '邀请码申请',

    'model' => 'InvitationApply',

    'columns' => array(
        'id',
        
        'email' => array(
            'title' => '邮箱',
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
    
    'form_width' => 400,
    
    
);