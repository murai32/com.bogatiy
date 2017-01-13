<?php if (!defined('FW')) die('Forbidden'); ?>


<?php
$custom_class = "class='skills-sliders ";
if ( !empty( $atts['attrs']['custom_class']))  { 
	$custom_class .=  $atts['attrs']['custom_class'];
};
$custom_class .= "'";
if ( !empty( $atts['attrs']['custom_id']))  { 
	$custom_id = " id='" . $atts['attrs']['custom_id'] . "'";
}; 
// var_dump($atts['attrs']);
if ( !empty( $atts['heading']) && !empty( $atts['skills_box']))  {

	$heading = "<section class='skills-sliders__heading'>" . $atts['heading'] . "</section>";
	$skills_box = "<section class='skills-sliders__items'>";

	foreach ($atts['skills_box'] as $key => $value) {
		$skills_box .= "<div class='skills-sliders__item skill-item'><div class='skill-item__label'><p><small class='skill-item__number'>";

		($key+1) < 10 ? $skills_box .= "0" . ($key+1) : $skills_box .= ($key+1);

		$skills_box .= "\n</small><br><strong class='skill-item__name'>"  . $value['skill_name'] . "</strong></p></div>
		<div class='skill-item__slider'><p>" . $value['skill_slider'] . "%<span style='width:" . $value['skill_slider'] . "%'></span></p></div>";

		$skills_box .= !empty($value['skill_comment']) ? "<div><p class='skill-item__comment'>" . $value['skill_comment'] . "</p></div>" : "";    	

		$skills_box .= "</div>";
	}
	$skills_box .= "</section>";

	$content = "<div " . $custom_class . $custom_id . ">" . $heading . $skills_box . "</div>";
} else{
	$content = "<div " . $custom_class . $custom_id . ">Heading or skills not defined!!</div>";
}; 

echo $content;
?>