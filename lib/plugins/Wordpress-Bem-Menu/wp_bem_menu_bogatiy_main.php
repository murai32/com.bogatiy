<?php

/**
 * bogatiy_main_menu
 * Add any extra content to wp_bem_menu
 */

class bogatiy_main_menu extends walker_texas_ranger {



    // Extra content Array


    function add_extra_content($key){
        $extra_content = array(
            /*'extra_item_active'         =>  "<object type='image/svg+xml' data='". get_template_directory() ."/images/svg/line.svg' class='logo'></object>",*/
            'extra_another_content'     =>  '',
            'extra_item_active'         => file_get_contents(get_template_directory() . '/images/svg/line.svg', true),
            'extra_item_ln'         => file_get_contents(get_template_directory() . '/images/svg/ln.svg', true),
            'extra_item_vk'         => file_get_contents(get_template_directory() . '/images/svg/vk.svg', true),
            'extra_item_be'         => file_get_contents(get_template_directory() . '/images/svg/be.svg', true),   

            );  
        return $extra_content[$key]; 
    }

    // Add main/sub classes to li's and links

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        //var_dump(get_bloginfo('template_url'));
        $indent = ( $depth > 0 ? str_repeat( "    ", $depth ) : '' ); // code indent

        $prefix = $this->css_class_prefix;
        $suffix = $this->item_css_class_suffixes;

        // Item classes
        $item_classes =  array(
            'item_class'            => $depth == 0 ? $prefix . $suffix['item'] : '',
            'parent_class'          => $args->has_children ? $parent_class = $prefix . $suffix['parent_item'] : '',
            'active_page_class'     => in_array("current-menu-item",$item->classes) ? $prefix . $suffix['active_item'] : '',
            'active_parent_class'   => in_array("current-menu-parent",$item->classes) ? $prefix . $suffix['parent_of_active_item'] : '',
            'active_ancestor_class' => in_array("current-menu-ancestor",$item->classes) ? $prefix . $suffix['ancestor_of_active_item'] : '',
            'depth_class'           => $depth >=1 ? $prefix . $suffix['sub_menu_item'] . ' ' . $prefix . $suffix['sub_menu'] . '_' . $depth . '__item' : '',
            'item_id_class'         => $prefix . '__item_'. $item->object_id,
            'user_class'            => $item->classes[0] !== '' ? $prefix . '__item_'. $item->classes[0] : ''
            );

        // convert array to string excluding any empty values
        $class_string = implode("  ", array_filter($item_classes));

        // Add the classes to the wrapping <li>
        $output .= $indent . '<li class="' . $class_string . '">';

        // Chose what content will add (add by class name)

            strlen($item_classes["active_page_class"]) > 0 ? $item_class_key = '_active' : $item_class_key = explode("__item", $item_classes["user_class"]) ;

            switch (is_array($item_class_key) ? $item_class_key[1] : $item_class_key) {
                case '_active':
                $output .= $this->add_extra_content('extra_item_active');
                break;
                case '_ln':
                $link_extra_content .= $this->add_extra_content('extra_item_ln');
                break;
                case '_vk':
                $link_extra_content .= $this->add_extra_content('extra_item_vk');
                break;
                case '_be':
                $link_extra_content .= $this->add_extra_content('extra_item_be');
                break;               
                
            }



        // Link classes
            $link_classes = array(
                'item_link'             => $depth == 0 ? $prefix . $suffix['link'] : '',
                'depth_class'           => $depth >=1 ? $prefix . $suffix['sub_menu'] . $suffix['link'] . '  ' . $prefix . $suffix['sub_menu'] . '_' . $depth . $suffix['link'] : '',
                );

            $link_class_string = implode("  ", array_filter($link_classes));
            $link_class_output = 'class="' . $link_class_string . '"';

        // link attributes
            $attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
            $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
            $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
            $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';

        // Creatre link markup
            $item_output = $args->before;
            $item_output .= '<a' . $attributes . ' ' . $link_class_output . '>';
            $item_output .=     $args->link_before;
            $item_output .=     apply_filters('the_title', $item->title, $item->ID);
            $item_output .=     $args->link_after;
            $item_output .=     $args->after;
        
        //  Add extra link content
        $item_output .= $link_extra_content;
        $item_output .= '</a>';

        // Filter <li>

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);

    }
    
}

/**
 * bem_menu returns an instance of the walker_texas_ranger class with the following arguments
 * @param  string $location This must be the same as what is set in wp-admin/settings/menus for menu location.
 * @param  string $css_class_prefix This string will prefix all of the menu's classes, BEM syntax friendly
 * @param  arr/string $css_class_modifiers Provide either a string or array of values to apply extra classes to the <ul> but not the <li's>
 * @return [type]
 */

function bem_menu_bogatiy_main($location = "main_menu", $css_class_prefix = 'main-menu', $css_class_modifiers = null){  

    // Check to see if any css modifiers were supplied
    if($css_class_modifiers){

        if(is_array($css_class_modifiers)){
            $modifiers = implode(" ", $css_class_modifiers);
        } elseif (is_string($css_class_modifiers)) {
            $modifiers = $css_class_modifiers;
        }

    } else {
        $modifiers = '';
    }

    $args = array(
        'theme_location'    => $location,
        'container'         => false,
        'items_wrap'        => '<ul class="' . $css_class_prefix . ' ' . $modifiers . '">%3$s</ul>',
        'walker'            => new bogatiy_main_menu($css_class_prefix, true)
        );
    
    if (has_nav_menu($location)){
        return wp_nav_menu($args);
    }else{
        echo "<p>You need to first define a menu in WP-admin<p>";
    }
}
