<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package creamel
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site <?php echo get_field('site_header'); ?>">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'creamel' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="head_top">
			<div class="container">
				<div class="row row_bb d-flex justify-content-between">
					<div class="col-lg-2 col-4"><?php the_custom_logo(); ?></div>
					<div class="col-lg-4 col-4 d-flex align-items-center d-xl-block d-none">
						<nav id="site-navigation" class="main-navigation ">
							<?php wp_nav_menu(array('theme_location' => 'menu-1','menu_id' => 'primary-menu',));?>
						</nav>
					</div>
					<div class="header_menu col-lg-6 col-md-8 col-8 d-flex align-items-center justify-content-between">
						 <ul class="list-unstyled lang selection_line "> 
							   <?php if(function_exists('pll_the_languages')){ 
							         pll_the_languages(array('show_names'=>1)); 
							    } ?>
						    			    
						</ul>
						<ul class="list-unstyled lang drop_down_list d-sm-none d-block"> 
						   <?php pll_the_languages( array( 'dropdown' => 1 ) ); ?>						    
						</ul>
						<div class="admin_email_contact flex-xl-column">
						<?php if (get_locale() == 'ru_RU') { ?>
								<a href="phone:<?php the_field( "phone", 11 ); ?>" class="contact_link"><span class="icon-phone mx-sm-2 mx-2"></span><div class="d-xl-block d-none"><?php the_field( "phone", 11 ); ?></div></a>
						<?php } ?>
						
							<a href="mailto:<?php the_field( "mail", 11 ); ?>" class="contact_link"><span class="icon-mail mx-sm-2 mx-2"></span><div class="d-xl-block d-none"><?php the_field( "mail", 11 ); ?></div></a>			
						</div>

						<a class="fancybox gr_btn" href="#contact_form_pop"><?php pll_e('header_btn_write_to_us'); ?></a>


						<div id="responsive-menu-button" class="d-xl-none d-block ml_menu_mob ml-xl-0 ml-4">
							<div class="hamburger hamburger--spin">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>

	</header><!-- #masthead -->
	<?php if ( !is_front_page() && !is_home()) { ?>
	<section id="breadcrumbs">
		<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread_wrap mt-4 mb-4">
					<?php if(function_exists('bcn_display')) bcn_display(); ?>
				</div>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>
	<section id="content">
