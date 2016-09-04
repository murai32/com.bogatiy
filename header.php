<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bogatiy_Pavel_portfolio
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!--  
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bogatiy-pavel-portfolio' ); ?></a>

-->





<header class="site-header">
	<div class="site-header__logo header-logo">
		<?php	//$blogname = get_bloginfo( 'name' );?>

		<a  class="header-logo__name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php	//echo substr($blogname, 0, 5)?> 
			Pavel
			<br> 
			Bogatiy
			<?php	//echo substr($blogname, 5, 13)?>			
		</a>

		<?php	//$description = get_bloginfo( 'description' );?>
		<div class="header-logo__description">
				<span>
					<?php /*
					* подключить если захочу кастомизированный вывод лого из админки
					*echo substr($description, 0, 21)
					*/?> 
					UI & UX designer<br>
					<?php // echo substr($description, 21, 40)?>
				</span>				
				<span>					 
					and sometimes Web developer
					<?php // echo substr($description, 21, 40)?>
				</span>
			</div>				 
		</div>
		<div class="site-header__main-navigation">
			<nav class="site-header__main-menu" role="navigation">
<?php 
//wp_nav_menu( array( 'theme_location' => 'main', 'menu_class' => 'main-menu' ) ); 
?> 

		<?php 
		///bem_menu('main', 'main-menu', 'my-menu_my-modifier');  с модификатором
		bem_menu_bogatiy_main('main', 'main-menu'); 
		?>
		


			</nav>
		</div>
		<div class="site-header__social-links">
				<?php 
				/*wp_nav_menu( array( 'theme_location' => 'socials-links', 'menu_class' => 'social-links-menu' ) );*/
				bem_menu_bogatiy_main('socials-links', 'social-links');  
				?>
		</div> 







		<!-- #site-navigation -->

	</header>
	<!-- #masthead -->



	<div class="site-content">
