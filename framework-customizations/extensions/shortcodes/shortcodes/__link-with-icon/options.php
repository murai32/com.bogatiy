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

        'attrs' => array(
            'type' => 'popup',
            'value' => array(
                'custom_class' => '',
                'custom_id' => '',
                ),
            'label' => __('Attributes', 'fw'),
            'desc'  => __('Set item attributes', 'fw'),
            'popup-title' => __('Popup Title', 'fw'),
            'button' => __('Edit', 'fw'),
            'popup-title' => null,
            'size' => 'small', // small, medium, large
            'popup-options' => array(
                'custom_class' => array(
                    'type'  => 'text',
                    'value' => '',
            // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('Class', 'fw'),
                    'desc'  => __('Define custom class or classes', 'fw')
                    ),
                'custom_id' => array(
                    'type'  => 'text',
                    'value' => '',
            // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('ID', 'fw'),
                    'desc'  => __('Define custom id', 'fw')
                    ),
                ),
            ),
        'link_text' => array(
            'type'  => 'text',
            'value' => '',
    // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
            'label' => __('Link text', 'fw'),
            'desc'  => __('Define link text', 'fw')
            ),
        'link' => array(
            'type'  => 'text',
            'value' => '',
    // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
            'label' => __('Link', 'fw'),
            'desc'  => __('Define link address', 'fw')
            ),
        'link_icon' => array(
            'type'  => 'icon-v2',
            'preview_size' => 'medium',
            'modal_size' => 'medium', 
            // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
            'label' => __('Icon', 'fw'),
            'desc'  => __('Chose or upload icon', 'fw')
            ),
        );