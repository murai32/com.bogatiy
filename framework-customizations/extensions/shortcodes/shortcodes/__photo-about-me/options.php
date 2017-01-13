<?php if (!defined('FW')) die('Forbidden');

/*$options = array(
    'portfolio-image' => array(
        'type'  => 'upload',
        'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'label' => __('Portfolio owner image', 'fw'),
        'desc'  => __('Portfolio owner image', 'fw'),
        'images_only' => true,
    )
    );*/

    $options = array(
        'image' => array(
            'type'  => 'upload',            
            'attr'  => array( 'class' => 'custom-image', 'data-foo' => 'bar', ),
            'label' => __('Label', 'fw'),
            'desc'  => __('Description', 'fw'),
            'help'  => __('Help tip', 'fw'),
    'images_only' => true,
    )
        );