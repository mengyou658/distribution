<?php

return array(

    'uri' => 'admin',
    'title' => '后台管理',
    'model_config_path' => app('path') . '/config/administrator',
    'settings_config_path' => app('path') . '/config/administrator/settings',

    /**
     *
     *     array(
     *        'E-Commerce' => array('collections', 'products', 'product_images', 'orders'),
     *        'homepage_sliders',
     *        'users',
     *        'roles',
     *        'colors',
     *        'Settings' => array('settings.site', 'settings.ecommerce', 'settings.social'),
     *         'Analytics' => array('E-Commerce' => 'page.ecommerce.analytics'),
     *    )
     */
    'menu' => [
        '文章' => ['Article', 'Category'],
        'News',
        '问答' => ['Question', 'Answer'],
        '讨论' => ['Group', 'Post'],
        '活动' => ['Series', 'Activity'],
        'Comment',
        'Tag',
        'User',
        'Attachment',
    ],

    'permission'=> function() {
        return Auth::check() && in_array( Auth::user()->status, ['admin', 'editor']) ;
    },

    'use_dashboard' => false,
    'dashboard_view' => '',
    'home_page' => 'Article',
    'back_to_site_path' => '/',
    'login_path' => 'user/login',
    'logout_path' => 'user/logout',
    'login_redirect_key' => 'redirect',
    'global_rows_per_page' => 20,
    'locales' => array(),
);
