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

 ?>

<?php get_header(); ?>


	<div class="site-content__main site-content__main_page-contact-me">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'heading');
				get_template_part( 'template-parts/content', 'page-contact-me' );
		

			endwhile; // End of the loop.
			?>

	</div>


<?php
 //get_sidebar();
get_footer();
?>