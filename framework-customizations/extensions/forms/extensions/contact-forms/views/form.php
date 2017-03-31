<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var string $form_id
 * @var string $form_html
 * @var array $extra_data
 */


$form_attr = array(
	'id' => $extra_data['custom_id'],
	'class' => 'form-wrapper '.$extra_data['custom_class'],
	);     
?>
<div <?php echo fw_attr_to_html($form_attr); ?>">
	<?php echo $form_html; ?>
</div>

