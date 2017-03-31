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
<header class="site-header">
	<div class="site-header__logo site-header__logo_template_portfolio-item header-logo">
		<?php	//$blogname = get_bloginfo( 'name' );?>
		<div class="header-logo__name header-logo__name_template_portfolio-item">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php	//echo substr($blogname, 0, 5)?> 
				Pavel
				<br> 
				Bogatiy
				<?php	//echo substr($blogname, 5, 13)?>			
			</a>
		</div>
		<?php	//$description = get_bloginfo( 'description' );?>
		<div class="header-logo__description header-logo__description_template_portfolio-item">
			<span>
					<?php echo get_option( 'header_options' )['logo_desc_1'] ?><br>
				</span>				
				<span>	
					<?php echo get_option( 'header_options' )['logo_desc_2'] ?>
				</span>
		</div>				 
	</div>
	<!-- #site-navigation -->
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
	<div class="site-header__social-links site-header__social-links_template_portfolio-item">
			<?php 
			/*wp_nav_menu( array( 'theme_location' => 'socials-links', 'menu_class' => 'social-links-menu' ) );*/
			bem_menu_bogatiy_main('socials-links', 'social-links');  
			?>
	</div> 
</header>
<div class="site-content site-content_template_portfolio-item"><!-- #content -->