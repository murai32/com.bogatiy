<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bogatiy_Pavel_portfolio
 */

get_header(); ?>


	<div class="site-content__main page-portfolio">

			<?php
			
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page-portfolio-items' );
				

				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;

			endwhile; // End of the loop.

			// while ( have_posts() ) : the_post();

				// vardump(get_the_category($post->ID) );				

			// endwhile; // End of the loop.

			?>
<?php

// Вывод постов типа "портфолио"
/*$posts = get_posts( array(
	'numberposts'     => 1, // тоже самое что posts_per_page
	'offset'          => 0,
	'category'        => '',
	'orderby'         => 'post_date',
	'order'           => 'DESC',
	'include'         => '',
	'exclude'         => '',
	'meta_key'        => '',
	'meta_value'      => '',
	'post_type'       => 'fw-portfolio',
	'post_mime_type'  => '', // image, video, video/mp4
	'post_parent'     => '',
	'post_status'     => 'publish'
) );

vardump($posts);


foreach($posts as $post){ setup_postdata($post);
    // формат вывода
}
wp_reset_postdata();*/

?>



	</div>



<?php
/*
get_sidebar();*/
get_footer();
?>