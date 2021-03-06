<?php if (!defined('FW')) die('Forbidden');
/**
 * @var array $item
 * @var array $input_value
 */

$options = $item['options'];
?>
<div class="<?php echo esc_attr(fw_ext_builder_get_item_width('form-builder', $item['width'] .'/frontend_class')) ?>">
    <div  class='<?php echo $item['options']['attrs']['form_class']?>__item field-text field-text--email'>
        <?php if ($options['label']): ?>
            <label class='field-text__label'><?php echo fw_htmlspecialchars($item['options']['label']) ?>
                <?php if (!$options['required']): ?><sup class = "field-text__input-required"> — Optional</sup><?php endif; ?>
            </label>
        <?php endif; 
         // vardump($item);
        // vardump($input_value) ?>

        <?php
        $wraper_attr = array(
            'class' => "field-text__input field-text__input_text ",
            );
        $choice_attr = array(
            'value' => $item['options']['default_value'],
            'type' => 'text',
            'name' => $item['shortcode'],
            'id' => (strlen($item['options']['attrs']['custom_id']) > 0) ? $item['options']['attrs']['custom_id'] : 'rand-'. fw_unique_increment(),
            'class' => "field_theme ".$item['options']['attrs']['custom_class'],
            'placeholder' => $item['options']['placeholder'],
            'maxlength' => $item['options']['constraints']['characters']['max'],
            'minlength' => $item['options']['constraints']['characters']['min'],
            'required' => $item['options']['required'] ? 'required' : '',
            );  
        
        $bcg_img = get_template_directory_uri() . '/images/message-dot.png';   

        echo '<div '. fw_attr_to_html($wraper_attr) .'><input style="background: url(' . $bcg_img . ')" '.  fw_attr_to_html($choice_attr) .'></div>';
        ?>
        <?php if ($options['info']): ?>
            <div class="field-text__info"><p><em><?php echo $options['info'] ?></em></p></div>
        <?php endif; ?>     

        
    </div>
</div>