<?php
/**
 * Register post types and taxonomies.
 *
 * @link http://wp-kama.ru/function/register_post_type
 */

function register_post_taxonomies(){
	register_taxonomy('portfolio_tag', array('portfolio'),  array(
		'label'                 => 'Tags', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Tag',
			'singular_name'     => 'Tags',
			'search_items'      => 'Search tags',
			'all_items'         => 'All tags',
			'parent_item'       => 'Parent tag',
			'parent_item_colon' => 'Parent tag:',
			'edit_item'         => 'Edit tag',
			'update_item'       => 'Refresh tag',
			'add_new_item'      => 'Add new tag',
			'new_item_name'     => 'New tag name',
			'menu_name'         => 'Tags',
			),	
		'description'           => 'Portfolio works tags', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => true, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => true, // равен аргументу show_ui
		'hierarchical'          => false,
		// 'update_count_callback' => '',
		'rewrite'               => true,
		'query_var'             => true, // название параметра запроса
		// 'capabilities'          => array('manage_terms'),
		// 'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		// 'show_in_quick_edit'    => null, // по умолчанию значение show_ui
		) );

	register_taxonomy('portfolio_case', array('portfolio'),  array(
		'label'                 => 'Cases', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Case',
			'singular_name'     => 'Cases',
			'search_items'      => 'Search Cases',
			'all_items'         => 'All Cases',
			'parent_item'       => 'Parent Case',
			'parent_item_colon' => 'Parent Case:',
			'edit_item'         => 'Edit Case',
			'update_item'       => 'Refresh Case',
			'add_new_item'      => 'Add new Case',
			'new_item_name'     => 'New Case name',
			'menu_name'         => 'Cases',
			),	
		'description'           => 'Portfolio works Cases', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => true, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => true, // равен аргументу show_ui
		'hierarchical'          => true,
		// 'update_count_callback' => '',
		'rewrite'               => true,
		'query_var'             => true, // название параметра запроса
		// 'capabilities'          => array('manage_terms'),
		// 'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		// 'show_in_quick_edit'    => null, // по умолчанию значение show_ui
		) );

};

function register_post_types(){
	register_post_type('portfolio', array(
		'label'  => 'Portfolio works',
		'labels' => array(
			'name'               => 'Portfolio works', // основное название для типа записи
			'singular_name'      => 'Portfolio work', // название для одной записи этого типа
			'add_new'            => 'Add new', // для добавления новой записи
			'add_new_item'       => 'Add new portfolio work', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit portfolio work', // для редактирования типа записи
			'new_item'           => 'New portfolio work', // текст новой записи
			'view_item'          => 'View portfolio work', // для просмотра записи этого типа.
			'search_items'       => 'Search portfolio work', // для поиска по этим типам записи
			'not_found'          => 'Portfolio work not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Portfolio work not found', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Portfolio', // название меню
			'all_items'     		 => 'All works',
			),
		'description'         => 'This post type was specially developed to publish portfolio works',
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-portfolio',
		// 'capability_type'   => array('work', 'works'),
		'capability_type'   => 'post',
		// 'capabilities'      => 'post',// массив дополнительных прав для этого типа записи
		'map_meta_cap'      => true, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			// 'trackbacks',
			'custom-fields',
			'revisions',
			'post-formats'
			),
		'taxonomies'          => array('portfolio_tag','portfolio_case'),
		'has_archive'         => false,
		'rewrite'             => true, //slug (строка) Префикс в ЧПУ (/префикс/ярлык_записи). Используйте array( 'slug' => $slug ), чтобы создать другой префикс.
		'query_var'           => true,
		//'show_in_nav_menus'   => null, ??
		) );
}

add_action('init', 'register_post_types');
add_action('init', 'register_post_taxonomies');
// add_theme_support('post-thumbnails');

// add_theme_support( 'post-thumbnails', array( 'portfolio' ) ); 