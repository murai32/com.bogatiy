<?php if (!defined('FW')) die('Forbidden'); ?>


<?php
$custom_class = "class='contacts-list ";
if ( !empty( $atts['attrs']['custom_class']))  { 
	$custom_class .=  $atts['attrs']['custom_class'];
};
$custom_class .= "'";
if ( !empty( $atts['attrs']['custom_id']))  { 
	$custom_id = " id='" . $atts['attrs']['custom_id'] . "'";
}; 
if ( !empty( $atts['heading'])  && !empty( $atts['contacts_box']))  {

	$heading = "<section class='contacts-list__heading'>" . $atts['heading'] . "</section>";
	
	$contacts_box = "<section class='contacts-list__list'>";

	foreach ($atts['contacts_box'] as $key => $value) {



		$contacts_set = $value['contacts_set'];

		$contacts_box .= "<div class='contacts-box__item contact-item'><div class='contact-item__label'><p><small class='contact-item__number'>";

		($key+1) < 10 ? $contacts_box .= "0" . ($key+1) : $contact_box .= ($key+1);

		$contact_type = $contacts_set['contact_type'];
		$contact_item = $contacts_set[$contact_type];

		switch ($contact_type) {
			case 'simple':
						$contacts_box .= "\n</small><br><strong class='contact-item__name'>"  . $contact_item['contact_name'] . ":</strong></p></div>";
						$contacts_box .= "<div  class='contact-item__info'><p>" . $contact_item['contact_info'] . "</p></div>"; 
			break;

			case 'email':
						$contacts_box .= "\n</small><br><strong class='contact-item__name'>E-mail:</strong></p></div>";
						$contacts_box .= "<div  class='contact-item__info contact-item__info-email'><p><a href='mailto:" . $contact_item['contact_info'] . " '> " . $contact_item['contact_info'] . " </a></p></div>"; 
			break;

			case 'net_contacts':
						$net_contacts = $contact_item['net_items'];
						$second_column = sizeof($net_contacts) > 3 ? "contact-item__info_net-contacts_columns" : "";

						$contacts_box .= "\n</small><br><strong class='contact-item__name'>In the Internet:</strong></p></div><div  class='contact-item__info contact-item__info_net-contacts " . $second_column . "'>";

						foreach ($net_contacts as $key => $item_val) {

							

							$contacts_box .= "<p>— <a target='_blank' href='http://" . $item_val['net_link'] . " '>" . $item_val['net_name'] . " </a></p>";
						}
						$contacts_box .= "</div>"; 
			break;
			
			default:
						$contacts_box .= "\n</small><br><strong class='contact-item__name'>Contact variant pattern not defined!!!</strong></p></div>";
						$contacts_box .= "<div  class='contact-item__info contact-item__info-email'><p>Contact variant pattern not defined!!!</p></div>"; 
			break;
		}


		$contacts_box2 .= "\n</small><br><strong class='contact-item__name'>"  . $value['contact_name'] . ":</strong></p></div>";

		
		switch ($value['contact_type']) {
			case 'email':
					$contacts_box2 .= "<div  class='contact-item__info contact-item__info-email'><p><a href='mailto:" . $value['contact_info'] . " '> " . $value['contact_info'] . " </a></p></div>"; 
				break;
			
			default:
					$contacts_box2 .= "<div  class='contact-item__info'><p>" . $value['contact_info'] . "</p></div>"; 
				break;
		}



		$contacts_box .= "</div>";

	}

	$contacts_box .= "</section>";

	$content = "<div " . $custom_class . $custom_id . ">" . $heading . $contacts_box . "</div>";
} else{
	$content = "<div " . $custom_class . $custom_id . ">Heading or contacts list content are empty!!</div>";
}; 

echo $content;
?>


