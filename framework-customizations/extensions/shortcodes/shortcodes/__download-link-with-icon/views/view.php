<?php if (!defined('FW')) die('Forbidden'); ?>


<?php
if ( !empty( $atts['attrs']['custom_class']))  { 
	$custom_class = "class='" . $atts['attrs']['custom_class'] . "'";
};
if ( !empty( $atts['attrs']['custom_id']))  { 
	$custom_id = " id='" . $atts['attrs']['custom_id'] . "'";
}; 
// var_dump($atts['attrs']);
if ( !empty( $atts['file']) && !empty( $atts['link_text']))  { 
	if ( !empty( $atts['link_icon']['url']))  { 
	$svg = file_get_contents($atts['link_icon']['url'], true);
	};

	$link = "<a href='" . $atts['file']['url'] . "' download='" . $atts['link_text'] . "'><span>" . $atts['link_text'] . "</span>" . $svg . "</a>";
} else{
	$link = "Downloaded file or it's name not defined!!";
}; 

$content = "<div " . $custom_class . $custom_id . ">" . $link . "</div>";

echo $content;
?>