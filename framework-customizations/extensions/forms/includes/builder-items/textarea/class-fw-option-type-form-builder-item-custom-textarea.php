<?php 

class FW_Option_Type_Form_Builder_Item_Custom_Textarea extends FW_Option_Type_Form_Builder_Item
{
    /**
     * The item type
     * @return string
     */
    public function get_type()
    {
        return 'custom-textarea';
    }

    /**
     * The boxes that appear on top of the builder and can be dragged down or clicked to create items
     * @return array
     */
    public function get_thumbnails()
    {
        return array(
            array(
                'html' =>
                '<div class="item-type-icon-title" data-hover-tip="' . __( 'Add a Paragraph Text', 'fw' ) . '">' .
                '<div class="item-type-icon"><span class="dashicons dashicons-editor-alignleft"></span></div>'.
                '<div class="item-type-title">' . __( 'Paragraph Text', 'fw' ) . '</div>' .
                '</div>'
                )
            );
    }

    /**
     * Enqueue item type scripts and styles (in backend)
     */
    public function enqueue_static()
    {
        $uri = fw_get_template_customizations_directory_uri('/extensions/forms/includes/builder-items/textarea/static');

        wp_enqueue_style(
            'fw-form-builder-item-type-custom-textarea',
            $uri .'/backend.css',
            array(),
            fw()->theme->manifest->get_version()
            );

        wp_enqueue_script(
            'fw-form-builder-item-type-custom-textarea',
            $uri .'/backend.js',
            array('fw-events'),
            fw()->theme->manifest->get_version(),
            true
            );

        wp_localize_script(
            'fw-form-builder-item-type-custom-textarea',
            'fw_form_builder_item_type_custom_textarea',
            array(
                'l10n' => array(
                    'item_title'      => __( 'Paragraph Text', 'fw' ),
                    'label'           => __( 'Label', 'fw' ),
                    'edit'            => __( 'Edit', 'fw' ),
                    'delete'          => __( 'Delete', 'fw' ),
                    'edit_label'      => __( 'Edit Label', 'fw' ),
                    'toggle_required' => __( 'Toggle mandatory field', 'fw' ),
                    ),
                'options'  => $this->get_options(),
                'defaults' => array(
                    'type'    => $this->get_type(),
                    'width'   => fw_ext( 'forms' )->get_config( 'items/width' ),
                    'options' => fw_get_options_values_from_input( $this->get_options(), array() )
                    )
                )
            );

        fw()->backend->enqueue_options_static($this->get_options());
    }

    /**
     * Render item html for frontend form
     *
     * @param array $item Attributes from Backbone JSON
     * @param null|string|array $input_value Value submitted by the user
     * @return string HTML
     */
    public function frontend_render(array $item, $input_value)
    {
        if (is_null($input_value)) {
            $input_value = $item['options']['default_value'];
        }

        return fw_render_view(
            $this->locate_path(
                // Search view in 'framework-customizations/extensions/forms/form-builder/items/yes-no/views/view.php'
                '/views/view.php',
                // Use this view by default
                dirname(__FILE__) .'/view.php'
                ),
            array(
                'item' => $item,
                'input_value' => $input_value
                )
            );
    }

    /**
     * Validate item on frontend form submit
     *
     * @param array $item Attributes from Backbone JSON
     * @param null|string|array $input_value Value submitted by the user
     * @return null|string Error message
     */
    public function frontend_validate( array $item, $input_value ) {
        $options = $item['options'];

        $messages = array(
            'required'                => str_replace(
                array( '{label}' ),
                array( $options['label'] ),
                __( 'The {label} field is required', 'fw' )
                ),
            'characters_min_singular' => str_replace(
                array( '{label}' ),
                array( $options['label'] ),
                __( 'The {label} field must contain minimum %d character', 'fw' )
                ),
            'characters_min_plural'   => str_replace(
                array( '{label}' ),
                array( $options['label'] ),
                __( 'The {label} field must contain minimum %d characters', 'fw' )
                ),
            'characters_max_singular' => str_replace(
                array( '{label}' ),
                array( $options['label'] ),
                __( 'The {label} field must contain maximum %d character', 'fw' )
                ),
            'characters_max_plural'   => str_replace(
                array( '{label}' ),
                array( $options['label'] ),
                __( 'The {label} field must contain maximum %d characters', 'fw' )
                ),
            'words_min_singular'      => str_replace(
                array( '{label}' ),
                array( $options['label'] ),
                __( 'The {label} field must contain minimum %d word', 'fw' )
                ),
            'words_min_plural'        => str_replace(
                array( '{label}' ),
                array( $options['label'] ),
                __( 'The {label} field must contain minimum %d words', 'fw' )
                ),
            'words_max_singular'      => str_replace(
                array( '{label}' ),
                array( $options['label'] ),
                __( 'The {label} field must contain maximum %d word', 'fw' )
                ),
            'words_max_plural'        => str_replace(
                array( '{label}' ),
                array( $options['label'] ),
                __( 'The {label} field must contain maximum %d words', 'fw' )
                ),
            );

        if ( $options['required'] && ! fw_strlen( trim( $input_value ) ) ) {
            return $messages['required'];
        }

        $length = fw_strlen( $input_value );

        if ( $length && ! empty( $options['constraints']['constraint'] ) ) {
            $constraint      = $options['constraints']['constraint'];
            $constraint_data = $options['constraints'][ $constraint ];

            switch ( $constraint ) {
                case 'characters':
                if ( $constraint_data['min'] && $length < $constraint_data['min'] ) {
                    return sprintf( $messages[ 'characters_min_' . ( $constraint_data['min'] == 1 ? 'singular' : 'plural' ) ],
                        $constraint_data['min']
                        );
                }
                if ( $constraint_data['max'] && $length > $constraint_data['max'] ) {
                    return sprintf( $messages[ 'characters_max_' . ( $constraint_data['max'] == 1 ? 'singular' : 'plural' ) ],
                        $constraint_data['max']
                        );
                }
                break;
                case 'words':
                $words_length = count( preg_split( '/\s+/', $input_value ) );

                if ( $constraint_data['min'] && $words_length < $constraint_data['min'] ) {
                    return sprintf( $messages[ 'words_min_' . ( $constraint_data['min'] == 1 ? 'singular' : 'plural' ) ],
                        $constraint_data['min']
                        );
                }
                if ( $constraint_data['max'] && $words_length > $constraint_data['max'] ) {
                    return sprintf( $messages[ 'words_max_' . ( $constraint_data['max'] == 1 ? 'singular' : 'plural' ) ],
                        $constraint_data['max']
                        );
                }
                break;
                default:
                return 'Unknown constraint: ' . $constraint;
            }
        }
    }

    private function get_options()
    {
        return array(
            array(
                'attrs' => array(
                    'type' => 'popup',
                    'value' => array(
                        'form_class' => '',
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
                'form_class' => array(
                    'type'  => 'text',
                    'value' => '',
            // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('Parent class', 'fw'),
                    'desc'  => __('Define perent form class', 'fw')
                    ),
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
                ),
            array(
                'g1' => array(
                    'type'    => 'group',
                    'options' => array(
                        array(
                            'label' => array(
                                'type'  => 'text',
                                'label' => __( 'Label', 'fw' ),
                                'desc'  => __( 'Enter field label (it will be displayed on the web site)', 'fw' ),
                                'value' => __( 'Paragraph Text', 'fw' ),
                                )
                            ),
                        array(
                            'required' => array(
                                'type'  => 'switch',
                                'label' => __( 'Mandatory Field', 'fw' ),
                                'desc'  => __( 'Make this field mandatory?', 'fw' ),
                                'value' => true,
                                )
                            ),
                        )
                    )
                ),
            array(
                'g2' => array(
                    'type'    => 'group',
                    'options' => array(
                        array(
                            'placeholder' => array(
                                'type'  => 'text',
                                'label' => __( 'Placeholder', 'fw' ),
                                'desc'  => __( 'This text will be used as field placeholder', 'fw' ),
                                )
                            ),
                        array(
                            'default_value' => array(
                                'type'  => 'text',
                                'label' => __( 'Default Value', 'fw' ),
                                'desc'  => __( 'This text will be used as field default value', 'fw' ),
                                )
                            )
                        )
                    )
                ),
            array(
                'g3' => array(
                    'type'    => 'group',
                    'options' => array(
                        array(
                            'constraints' => array(
                                'type'    => 'multi-picker',
                                'label'   => false,
                                'desc'    => false,
                                'value'   => array(
                                    'constraint' => 'characters',
                                    ),
                                'picker'  => array(
                                    'constraint' => array(
                                        'label'   => __( 'Restrictions', 'fw' ),
                                        'desc'    => __( 'Set characters or words restrictions for this field', 'fw' ),
                                        'type'    => 'radio',
                                        'inline'  => true,
                                        'choices' => array(
                                            'characters' => __( 'Characters', 'fw' ),
                                            'words'      => __( 'Words', 'fw' )
                                            ),
                                        )
                                    ),
                                'choices' => array(
                                    'characters' => array(
                                        'min' => array(
                                            'type'  => 'short-text',
                                            'label' => __( 'Min', 'fw' ),
                                            'desc'  => __( 'Minim value', 'fw' ),
                                            'value' => 0
                                            ),
                                        'max' => array(
                                            'type'  => 'short-text',
                                            'label' => __( 'Max', 'fw' ),
                                            'desc'  => __( 'Maxim value', 'fw' ),
                                            'value' => ''
                                            ),
                                        ),
                                    'words'      => array(
                                        'min' => array(
                                            'type'  => 'short-text',
                                            'label' => __( 'Min', 'fw' ),
                                            'desc'  => __( 'Minim value', 'fw' ),
                                            'value' => 0
                                            ),
                                        'max' => array(
                                            'type'  => 'short-text',
                                            'label' => __( 'Max', 'fw' ),
                                            'desc'  => __( 'Maxim value', 'fw' ),
                                            'value' => ''
                                            ),
                                        ),
                                    ),
                                )
                            ),
                        )
                    )
                ),
            array(
                'g4' => array(
                    'type'    => 'group',
                    'options' => array(
                        array(
                            'info' => array(
                                'type'  => 'textarea',
                                'label' => __( 'Instructions for Users', 'fw' ),
                                'desc'  => __( 'The users will see these instructions in the tooltip near the field',
                                    'fw' ),
                                )
                            ),
                        )
                    )
                ),
            );
}
}
FW_Option_Type_Builder::register_item_type('FW_Option_Type_Form_Builder_Item_Custom_Textarea');