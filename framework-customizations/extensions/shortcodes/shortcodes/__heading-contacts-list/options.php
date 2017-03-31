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
    'contacts_box' => array(
        'type'  => 'addable-box',
        'value' => array(
            array(
                'contact_type' => '',
                'contact_name' => '',
                'contact_info' => '',
                'contacts_set' => '',
                ),
            ),
        //'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'label' => __('Contact list', 'fw'),
        'desc'  => __('Define contact list', 'fw'),
        // 'help'  => __('Help tip', '{domain}'),
        'box-options' => array(            
            'contacts_set' => array(
                'type'  => 'multi-picker',
                'label' => false,
                'desc'  => false,
                'value' => array(
                    /**
                     * '<custom-key>' => 'default-choice'
                     */
                    'contact_type' => 'simple',

                    /**
                     * These are the choices and their values,
                     * they are available after option was saved to database
                     */
                    'email' => array(                        
                        'contact_name' => 'E-mail',
                        'contact_email' => '',
                    ),
                    'simple' => array(                        
                        'contact_name' => '',
                        'contact_info' => '',
                    ),
                    'net_contacts' => array(                        
                        'net_item' => '',
                    )
                ),
                'picker' => array(
                    // '<custom-key>' => option
                    'contact_type' => array(
                        'label'   => __('Contact type:', '{domain}'),
                        'type'    => 'select', // or 'short-select'
                        'choices' => array(
                            'simple'  => __('Simple contact', '{domain}'),
                            'email' => __('Email', '{domain}'),
                            'net_contacts' => __('Net contact', '{domain}'),
                        ),
                        'desc'    => __('Select contact type', '{domain}'),
                        // 'help'    => __('Help tip', '{domain}'),
                    )
                ),
                'choices' => array(
                    'simple' => array(
                        'contact_name' => array(
                            'type'  => 'text',
                            'value' => '',
                            // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                            'label' => __('Heading', 'fw'),
                            'desc'  => __('Define contact name', 'fw')
                            ),
                        'contact_info' => array(
                            'type'  => 'text',
                            'value' => '',
                            // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                            'label' => __('Contact info', 'fw'),
                            'desc'  => __('Define contact info', 'fw')
                            ), 
                    ),
                    'email' => array(
                        'contact_info' => array(
                            'type'  => 'text',
                            'value' => '',
                            // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                            'label' => __('Contact email', 'fw'),
                            'desc'  => __('Define contact email', 'fw')
                            ), 
                    ),
                    'net_contacts' => array(

                        'net_items' => array(
                            'type'  => 'addable-box',
                            'value' => array(
                                array(
                                    'net_name' => '',
                                    'net_link' => '',
                                    ),

                            ),
                            'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                            'label' => __('Net contacts:', '{domain}'),
                            // 'desc'  => __('Description', '{domain}'),
                            // 'help'  => __('Help tip', '{domain}'),
                            'box-options' => array(
                                'net_name' => array( 
                                    'type' => 'text' 
                                    ),
                                'net_link' => array( 
                                    'type' => 'text' 
                                ),
                            ),
                            'template' => '{{- net_name }}: {{- net_link }}', // box title
                            'box-controls' => array( // buttons next to (x) remove box button
                                // 'control-id' => '<small class="dashicons dashicons-smiley"></small>',
                                ),
                            'limit' => 0, // limit the number of boxes that can be added
                            'add-button-text' => __('Add', '{domain}'),
                            'sortable' => true,
                        ),

                    ),
                ),
                /**
                 * (optional) if is true, the borders between choice options will be shown
                 */
                'show_borders' => false,
            )
        ),
        'template' => '{{- contacts_set.contact_type }}', // box title
        'box-controls' => array( // buttons next to (x) remove box button
            'control-id' => '<small class="dashicons dashicons-smiley"></small>',
        ),
        'limit' => 0, // limit the number of boxes that can be added
        'add-button-text' => __('Add', 'fw'),
        'sortable' => true, 
    ),

);