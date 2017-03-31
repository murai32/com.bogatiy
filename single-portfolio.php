<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bogatiy_Pavel_portfolio
 */
function get_sibiling_post($sibiling = "next"){
	$svg = '<span class="portfolio-navigation__img portfolio-navigation__img_'. $sibiling .'">' . file_get_contents(get_template_directory_uri().'/images/svg/right.svg', true) . '</span>';
	$sibiling_post = 'get_'.$sibiling.'_post';

	if (!empty( $sibiling_post() )){
		$get_sibiling_link = '<div class="portfolio-navigation__item portfolio-navigation__item_' . $sibiling . '"><a class="portfolio-navigation__link" href="'. get_permalink($sibiling_post()->ID) .'">' . $svg . '<span class="portfolio-navigation__name portfolio-navigation__name_'. $sibiling .'">'. $sibiling . '</span></a></div>';
		echo $get_sibiling_link;
	}

}


get_header('portfolio-item'); 

?>

<section class="site-content__portfolio-navigation site-content_template_portfolio-item__portfolio-navigation portfolio-navigation">
<?php
// Navigation between sibiling posts 

		echo get_sibiling_post('previous');
		echo get_sibiling_post('next');
?>
</section>


<div id="primary" class="content-area-portfolio-item">
	<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

		?>
		


		


		<?php





		get_template_part( 'template-parts/content', get_post_format() );

			// the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
