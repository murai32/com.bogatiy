<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bogatiy_Pavel_portfolio
 */
?>

	</div><!-- #content -->

	<footer>
		<div class="site-footer">
			<div class="site-footer__name">
				<span><?php echo get_option( 'footer_options' )['copy_right'] ?></span>
			</div>
			<div class="site-footer__email">
				<span><?php echo get_option( 'footer_options' )['e-mail'] ?></span>
			</div>
			<div class="site-footer__social-links">
				<?php
				bem_menu_bogatiy_main('socials-links', 'social-links'); 
				?>
			</div>
		</div>
	</footer>
<?php 


// вызываем хук так как к ниму могут быть привязаны какие то события
// К примеру сюда мы можем выплевывать подключение скриптов

// wp_footer(); ?> 

</body>
</html>



<!-- 		<div class="site-info">
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bogatiy-pavel-portfolio' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'bogatiy-pavel-portfolio' ), 'WordPress' ); ?></a>
	<span class="sep"> | </span>
	<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'bogatiy-pavel-portfolio' ), 'bogatiy-pavel-portfolio', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
</div>
 -->