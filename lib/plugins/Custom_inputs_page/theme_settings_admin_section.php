<?php
class ThemeSettingsSection
{
/**
* Плагин написан с расчетом на вывод настроек в одной странице админки
* В дальнейшем необходимо доработать плагин, что бы создать полноценную секцию администрирования темы.
*
*/
    /**
     * Holds the values to be used in the fields callbacks
     *
     */
    private $page_name = 'theme-settings';
    private $option_group = 'theme-settings_group';

    // private $social_links;
    private $header_options;
    private $footer_options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_section' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }


    /**
     * Add options page
     */
    // Здесь смело прописываю структуру своего плагина страницы, подстраницы и прочее
    public function add_plugin_section(){
        // This page will be under "Settings"
        add_menu_page(
            "Theme setting section", 
            "Theme Panel", 
            "manage_options", 
            $this->page_name, 
            array( $this, 'create_admin_page' ), 
            null, 
            99
        );

        add_submenu_page(
            $this->page_name,
            'Settings Admin', 
            'My Settings', 
            "manage_options", 
            $this->page_name,  
            array( $this, 'create_admin_page' )
        );

         
        // То же что и в сабменю 
        /*        
        add_options_page(
            'Settings Admin', 
            'My Settings', 
            'manage_options', 
            $page_name, 
            array( $this, 'create_admin_page' )
        );*/
        
    }

    /**
     * Options page callback
     */
    // Разметка одной из созданныйх страниц
    public function create_admin_page()
    {
        // Set class property

        // Фиксируем значение ранее сохраненных опций (для автозаполнения полей)
        // $this->social_links = get_option( 'social_links' );
        $this->header_options = get_option( 'header_options' );
        $this->footer_options = get_option( 'footer_options' );
        ?>

        <div class="wrap">
            <h1>My Settings</h1>

            <?php // ВОПРОС: на каждую отдельную грппу нужна своя форма?? ?>

            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( $this->option_group ); // вывожу скрытые поля закрепленные за этой (страницы)группой
                do_settings_sections( $this->page_name ); // вывожу секции и соответствующие им поля данной страницы 
                submit_button();
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        /*
        * Header options
        */
        register_setting(
                $this->option_group, // Option group
                'header_options', // Option name
                array($this, 'sanitize_header_options') // В этой функции происходит регистрация полей и сохранение значения
        );

        add_settings_section(
            'header_options_section',  // ID
            'Header', // Title 
            '', // Вывод дополнительного содержания группы опций
            $this->page_name // Page
        );

        add_settings_field(
            'logo_desc_1', // ID
            'Logo descripton 1', // Title 
            array( $this, 'header_options_callback' ), // То как поле будет выглядеть
            $this->page_name, // Page
            'header_options_section', // Section   
            array( // Параметры передаваемы в коллбек функцию 
                    'id' => 'logo_desc_1',
                    'name' => 'header_options[logo_desc_1]'
            )    
        );

        add_settings_field(
            'logo_desc_2', // ID
            'Logo descripton 2', // Title 
            array( $this, 'header_options_callback' ), // То как поле будет выглядеть
            $this->page_name, // Page
            'header_options_section', // Section   
            array( // Параметры передаваемы в коллбек функцию 
                    'id' => 'logo_desc_2',
                    'name' => 'header_options[logo_desc_2]'
            )    
        );

        /*
        * Footer
        */
        register_setting(
            $this->option_group, // Option group
            'footer_options', // Option name
            array($this, 'sanitize_footer_options') // В этой функции происходит регистрация полей и сохранение значения
        );

        add_settings_section(
            'footer_options_section',  // ID
            'Footer', // Title 
            '', // Вывод дополнительного содержания группы опций
            $this->page_name // Page
        );

        add_settings_field(
            'e-mail', // ID
            'Email', // Title 
            array( $this, 'Footer_options_callback' ), // То как поле будет выглядеть
            $this->page_name, // Page
            'footer_options_section', // Section   
            array( // Параметры передаваемы в коллбек функцию 
                    'id' => 'e-mail',
                    'name' => 'footer_options[e-mail]'
            )    
        );

        add_settings_field(
            'copy_right', // ID
            'Copy right', // Title 
            array( $this, 'Footer_options_callback' ), // То как поле будет выглядеть
            $this->page_name, // Page
            'footer_options_section', // Section   
            array( // Параметры передаваемы в коллбек функцию 
                    'id' => 'copy_right',
                    'name' => 'footer_options[copy_right]'
            )    
        );



        

        /*
        * Social links
               
            register_setting(
                    $this->option_group, // Option group
                    'social_links', // Option name
                    array($this, 'sanitize_social_links') // В этой функции происходит регистрация полей и сохранение значения
            );

            add_settings_section(
                'social_links_section',  // ID
                'Social links', // Title 
                array($this, 'social_links_info'), // Вывод дополнительного содержания группы опций
                $this->page_name // Page
            );
            add_settings_field(
                'vk', // ID
                'Vkontakte (URL)', // Title 
                array( $this, 'social_links_callback' ), // То как поле будет выглядеть
                $this->page_name, // Page
                'social_links_section', // Section   
                array( // Параметры передаваемы в коллбек функцию 
                        'id' => 'vk',
                        'name' => 'social_links[vk]'
                ) 
            );
            add_settings_field(
                'be',
                'Behance (URL)',
                array( $this, 'social_links_callback' ),
                $this->page_name,
                'social_links_section',
                array(
                        'id' => 'be',
                        'name' => 'social_links[be]'
                ) 
            );
            add_settings_field(
                'ln',
                'Linkedin (URL)',
                array( $this, 'social_links_callback' ),
                $this->page_name,
                'social_links_section',
                array(
                        'id' => 'ln',
                        'name' => 'social_links[ln]'
                ) 
            );
        */
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    

    public function sanitize_header_options( $input ){   
        // для каждой регестрируемой опции определи свою обработку вносимой информации, на всякий случай

        $new_input = array();

        if( isset( $input['logo_desc_1'] ) )
            $new_input['logo_desc_1'] = sanitize_text_field( $input['logo_desc_1'] );

        if( isset( $input['logo_desc_2'] ) )
            $new_input['logo_desc_2'] = sanitize_text_field( $input['logo_desc_2'] );

        return $new_input;
    }

    public function sanitize_footer_options( $input ){   
        // для каждой регестрируемой опции определи свою обработку вносимой информации, на всякий случай

        $new_input = array();

        if( isset( $input['e-mail'] ) )
            $new_input['e-mail'] = sanitize_text_field( $input['e-mail'] );

        if( isset( $input['copy_right'] ) )
            $new_input['copy_right'] = sanitize_text_field( $input['copy_right'] );

        return $new_input;
    }

   /*     public function sanitize_social_links( $input ){   
            // для каждой регестрируемой опции определи свою обработку вносимой информации, на всякий случай

                    $new_input = array();

            if( isset( $input['vk'] ) )
                $new_input['vk'] = sanitize_text_field( $input['vk'] );

            if( isset( $input['be'] ) )
                $new_input['be'] = sanitize_text_field( $input['be'] );

            if( isset( $input['ln'] ) )
                $new_input['ln'] = sanitize_text_field( $input['ln'] );

            return $new_input;
        }*/

    /** 
     * Print the Section text
     */
  
    /*    public function social_links_info(){
            echo "<p><i>Enter your social pages links adress. Links displayed in header and footer.</i></p>";
        }*/

    /** 
     * Get the settings option array and print one of its values
     */

/*    public function social_links_callback($args){
        printf(
            '<input type="text" id="' . $args["id"] . '" class="regular-text code" name="' . $args["name"] . '" value="%s" />',
            isset( $this->social_links[$args["id"]] ) ? esc_attr( $this->social_links[$args["id"]]) : ''
        );
    }   */ 

    public function header_options_callback($args){        
        printf(
            '<textarea rows="2" cols="40" id="' . $args["id"] . '" class="regular-text code" name="' . $args["name"] . '">%s</textarea>',
            isset( $this->header_options[$args["id"]] ) ? esc_attr( $this->header_options[$args["id"]]) : ''
        );
    }    

    public function footer_options_callback($args){        
        printf(
            '<input type="text" id="' . $args["id"] . '" class="regular-text code" name="' . $args["name"] . '" value="%s" />',
            isset( $this->footer_options[$args["id"]] ) ? esc_attr( $this->footer_options[$args["id"]]) : ''
        );
    }


}

if( is_admin() )
    $my_settings_page = new ThemeSettingsSection();