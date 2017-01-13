<?php if (!defined('FW')) die('Forbidden');

// file: framework-customizations/extensions/sidebars/config.php

$cfg = array(
    'sidebar_positions' => array(
        'full' => array(
            'icon_url' => 'full.png',
            'sidebars_number' => 0
            ),
        'left' => array(
            'icon_url' => 'left.png',
            'sidebars_number' => 1
            ),
        'right' => array(
            'icon_url' => 'right.png',
            'sidebars_number' => 1
            ),
        'left_right' => array(
            'icon_url' => 'left_right.png',
            'sidebars_number' => 2
            ),
        // other positions ...
    ),
    /**
     * Array that will be passed to register_sidebar($args)
     * Should be without 'id' and 'name'.
     * Will be used for all dynamic sidebars.
     */
    'dynamic_sidebar_args' => array(
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ),
    /**
     * Render sidebar metabox in post types.
     * By default is set to false.
     * If you want to render sidebar in post types set it to true.
     */
     'show_in_post_types' => false
);