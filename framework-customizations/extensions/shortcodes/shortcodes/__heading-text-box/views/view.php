<?php if (!defined('FW')) die('Forbidden'); ?>


<?php
	$custom_class = "class='textbox-heading ";
if ( !empty( $atts['attrs']['custom_class']))  { 
	$custom_class .=  $atts['attrs']['custom_class'];
};
	$custom_class .= "'";
if ( !empty( $atts['attrs']['custom_id']))  { 
	$custom_id = " id='" . $atts['attrs']['custom_id'] . "'";
}; 
// var_dump($atts['attrs']);
if ( !empty( $atts['heading']) && !empty( $atts['textblock']))  {

	$heading = "<section class='textbox-heading__heading'>" . $atts['heading'] . "</section>";
	$textblock = "<section class='textbox-heading__textbox'>" . $atts['textblock'] . "</section>";

	$content = "<div " . $custom_class . $custom_id . ">" . $heading . $textblock . "</div>";
} else{
	$content = "<div " . $custom_class . $custom_id . ">Heading or textblock content is empty!!</div>";
}; 

echo $content;
?>