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
        'file' => array(
            'type'  => 'upload',
            // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
            'label' => __('Upload file', 'fw'),
            'images_only' => false,
            /**
             * An array with allowed files extensions what will filter the media library and the upload files.
             */
            'files_ext' => array( 'doc', 'docx', 'pdf', 'zip' ),
            /**
             * An array with extra mime types that is not in the default array with mime types from the javascript Plupload library.
             * The format is: array( '<mime-type>, <ext1> <ext2> <ext2>' ).
             * For example: you set rar format to filter, but the filter ignore it , than you must set
             * the array with the next structure array( '.rar, rar' ) and it will solve the problem.
             */
            'extra_mime_types' => array( 'audio/x-aiff, aif aiff' )
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