<?php if (!defined('FW')) die('Forbidden');

class FW_Extension_Test extends FW_Extension {
    protected function _init() {
        add_filter( 'widget_form_callback', array( $this, '_filter_form_callback' ), 10, 2 );
        add_filter( 'widget_update_callback', array( $this, '_filter_update_callback' ), 10, 4 );
    }

    public function _filter_form_callback( $values, WP_Widget $instance ) {
        $options = $this->get_options('test');
        $prefix = $instance->get_field_id('test');

        $this->print_widget_javascript('fw-ext-test-widget-options-'. $prefix);
        echo '<div class="fw-force-xs" id="fw-ext-test-widget-options-'. esc_attr($prefix) .'">';
        echo fw()->backend->render_options($options, $values, array(
            'id_prefix' => $prefix .'-',
            'name_prefix' => $prefix,
        ));
        echo '</div>';

        return $values;
    }

    public function _filter_update_callback( $values, $new_values, $old_values, WP_Widget $instance ) {
        $options = $this->get_options('test');
        $prefix = $instance->get_field_id('test');

        return array_merge(
            $values,
            fw_get_options_values_from_input($options, FW_Request::POST($prefix, array()))
        );
    }

    private function print_widget_javascript($id) {
        ?><script type="text/javascript">
            jQuery(function($) {
                var selector = '#<?php echo esc_js($id) ?>', timeoutId;

                $(selector).on('remove', function(){ // ReInit options on html replace (on widget Save)
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(function(){ // wait a few milliseconds for html replace to finish
                        fwEvents.trigger('fw:options:init', { $elements: $(selector) });
                    }, 100);
                });
            });
        </script><?php
    }
}