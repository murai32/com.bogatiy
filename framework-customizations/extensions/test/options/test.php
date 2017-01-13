<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'hello' => array('type' => 'text'),
	'world' => array('type' => 'select', 'choices' => array('first' => 'First', 'second' => 'Second')),
	'slider' => array(
		'type'  => 'upload',
		'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
		'label' => __('Label', 'fw'),
		'desc'  => __('Description', 'fw'),
    'images_only' => true,
    ),
	);