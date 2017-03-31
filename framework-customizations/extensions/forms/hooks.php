<?php if (!defined('FW')) die('Forbidden');


/** @internal */
function _action_theme_fw_ext_forms_include_custom_builder_items() {

    require_once dirname(__FILE__) .'/includes/builder-items/text/class-fw-option-type-form-builder-item-custom-text.php';
    require_once dirname(__FILE__) .'/includes/builder-items/email/class-fw-option-type-form-builder-item-custom-email.php';
    require_once dirname(__FILE__) .'/includes/builder-items/textarea/class-fw-option-type-form-builder-item-custom-textarea.php';

}
add_action('fw_option_type_form_builder_init', '_action_theme_fw_ext_forms_include_custom_builder_items');