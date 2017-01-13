<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	/*'is_fullwidth' => array(
		'label'        => __('Full Width', 'fw'),
		'type'         => 'switch',
	),*/
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
	'background_color' => array(
		'label' => __('Background Color', 'fw'),
		'desc'  => __('Please select the background color', 'fw'),
		'type'  => 'color-picker',
	),
	'background_image' => array(
		'label'   => __('Background Image', 'fw'),
		'desc'    => __('Please select the background image', 'fw'),
		'type'    => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),
	'video' => array(
		'label' => __('Background Video', 'fw'),
		'desc'  => __('Insert Video URL to embed this video', 'fw'),
		'type'  => 'text',
	)
);
