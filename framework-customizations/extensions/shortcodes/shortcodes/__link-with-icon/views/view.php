<?php if (!defined('FW')) die('Forbidden'); ?>


<?php
if ( !empty( $atts['attrs']['custom_class']))  { 
	$custom_class = "class='" . $atts['attrs']['custom_class'] . "'";
};
if ( !empty( $atts['attrs']['custom_id']))  { 
	$custom_id = " id='" . $atts['attrs']['custom_id'] . "'";
}; 
// var_dump($atts['attrs']);
if ( !empty( $atts['link']) && !empty( $atts['link_text']))  { 
	if ( !empty( $atts['link_icon']['url']))  { 
	$svg = file_get_contents($atts['link_icon']['url'], true);
	};
	$link = "<a href='" . get_site_url() . $atts['link'] . "'>" . $atts['link_text'] . $svg . "</a>";
}; 


$content = "<div " . $custom_class . $custom_id . ">" . $link . "</div>";

echo $content;
?>