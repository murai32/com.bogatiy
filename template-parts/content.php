<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bogatiy_Pavel_portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h3 class="entry-title">', '</h3>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php bogatiy_pavel_portfolio_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bogatiy-pavel-portfolio' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );



/*			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bogatiy-pavel-portfolio' ),
				'after'  => '</div>',
			) );*/



		?>
	</div><!-- .entry-content -->




<!-- 
	<footer class="entry-footer">
		<?php bogatiy_pavel_portfolio_entry_footer(); ?>
	</footer>
 -->

	<!-- .entry-footer -->
</article><!-- #post-## -->
