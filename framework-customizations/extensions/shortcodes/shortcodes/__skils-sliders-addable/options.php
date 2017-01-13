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
        'desc'  => __('Define skils heading', 'fw')
        ),



    'skills_box' => array(
        'type'  => 'addable-box',
        'value' => array(
            array(
                'skill_name' => '',
                'skill_slider' => '',
                'skill_comment' => '',
                ),
            ),
        //'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'label' => __('Skils', 'fw'),
        'desc'  => __('Define set of your skils', 'fw'),
        'box-options' => array(
            'skill_name' => array(
                'type'  => 'text',
                'value' => '',
                // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                'label' => __('Heading', 'fw'),
                'desc'  => __('Define skils heading', 'fw')
                ),
            'skill_slider' => array(
                'type'  => 'slider',
                'value' => 50,
                'properties' => array(                    
                    'min' => 0,
                    'max' => 100,
                    'step' => 5, // Set slider step. Always > 0. Could be fractional.                    
                 ),
                // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                'label' => __('Skill slider', 'fw'),
                'desc'  => __('Set level of this skill (in percents)', 'fw'),
                ),
            'skill_comment' => array(
                'type'  => 'textarea',
                'value' => '',
                // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                'label' => __('Comment', 'fw'),
                'desc'  => __('Write comment to this skill if it nececary', 'fw'),
                'help'  => __('Help tip', 'fw'),
                ),
            ),
    'template' => '{{- skill_name }}', // box title
    'box-controls' => array( // buttons next to (x) remove box button
        'control-id' => '<small class="dashicons dashicons-smiley"></small>',
        ),
    'limit' => 0, // limit the number of boxes that can be added
    'add-button-text' => __('Add', 'fw'),
    'sortable' => true,
    )









    );