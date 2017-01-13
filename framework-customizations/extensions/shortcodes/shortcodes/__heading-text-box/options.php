<?php if (!defined('FW')) die('Forbidden');
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
            'size' => 'large', // small, medium, large
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
    'heading' => array(
        'type'  => 'text',
        'value' => '',
    // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'label' => __('Heading', 'fw'),
        'desc'  => __('Define textblock heading', 'fw')
        ),
    'textblock' => array(
        'type'  => 'wp-editor',
        'value' => '',
        // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'label' => __('Text', 'fw'),
        // 'desc'  => __('Description', 'fw'),
        // 'help'  => __('Help tip', 'fw'),
        'size' => 'large', // small, large
        'editor_height' => 400,
    ),
);