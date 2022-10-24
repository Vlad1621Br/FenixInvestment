<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package creamel
 */
if (get_locale() == 'ru_RU') {
	$page_id = 11;
} else if (get_locale() == 'en_GB') {
	$page_id = 288;
} else {
	$page_id = 393;
}
?>
	</section>
	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row">
				<div class="custom_logo col-lg-2 col-sm-2 col-12 mb-4 order-1">
					<?php the_custom_logo(); ?>
					<?php $creamel_description = get_bloginfo( 'description', 'display' );
					if ( $creamel_description || is_customize_preview() ) :
					?>
					<div class="site-description"><?php echo $creamel_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<?php endif; ?>
				</div>
				<div class="col-lg-2 col-sm-4 col-12 b_menu order-lg-2 order-4 mb-lg-0 mb-3">
					<div class="block-title color_gray txt_upper mb-3"><?php pll_e('f_COMPANY'); ?></div>
					
					<?php 
						if (get_locale() == 'ru_RU') {
							wp_nav_menu("menu=company");;
						} else if (get_locale() == 'en_GB') {
							wp_nav_menu("menu=company_En");
						} else {
							wp_nav_menu("menu=company_Chn");
						}
					?>
				</div>
				<div class="col-lg-2 col-sm-5 col-12 b_menu order-lg-3 order-5 mb-lg-0 mb-3">
					<div class="block-title color_gray txt_upper mb-3"><?php pll_e('f_PROJECTS'); ?></div>
					<?php 
						if (get_locale() == 'ru_RU') {
							wp_nav_menu("menu=projects");
						} else if (get_locale() == 'en_GB') {
							wp_nav_menu("menu=projects_En");
						} else {
							wp_nav_menu("menu=projects_Chn");
						}
					?>
				</div>
				<?php /*<div class="col-lg-7 col-12">
					<div class="row b_menu">
						<div class="col-md-3 mb-3 order-md-1 order-2">
							<div class="block-title">О компания</div>
							<?php wp_nav_menu(array('theme_location' => 'menu-company','menu_id' => 'company-menu',)); ?>
						</div>
						<div class="col-md-9 order-md-2 order-1">
							<div class="block-title">Услуги</div>
							<?php wp_nav_menu(array('theme_location' => 'menu-service','menu_id' => 'service-menu',)); ?>
						</div>
					</div>
				</div>*/?>
				<div class="col-lg-2 col-sm-3 col-12 b_menu order-lg-3 order-2 mb-lg-0 mb-5">
					<div class="block-title color_gray txt_upper mb-3"><?php pll_e('f_CONTACTS'); ?></div>
					<a href="mailto:<?php the_field( "mail", 11 ); ?>" class="contact_link"><span class="icon-mail-gray mx-sm-2 mx-2"></span><div class="footer_mail d-xl-block d-block"><?php the_field( "mail", 11 ); ?></div></a>	
					<?php if (get_locale() == 'ru_RU') { ?>
						<a href="tel:<?php echo echo_phone_link(); ?>" class="contact_link mt-3"><span class="icon-phone-gray mx-sm-2 mx-2"></span><div class=" footer_phone d-xl-block d-block"><?php the_field( "phone", 11 ); ?></div></a>
					<?php } else if (get_locale() == 'en_GB') { ?>
						<a href="tel:<?php echo echo_phone_link(); ?>" class="contact_link mt-3"><span class="icon-phone-gray mx-sm-2 mx-2"></span><div class=" footer_phone d-xl-block d-block"><?php the_field( "phone", 288 ); ?></div></a>
					<?php } else { ?>
						<a href="tel:<?php echo echo_phone_link(); ?>" class="contact_link mt-3"><span class="icon-phone-gray mx-sm-2 mx-2"></span><div class=" footer_phone d-xl-block d-block"><?php the_field( "phone", 393 ); ?></div></a>
					<?php } ?>
					<?php if(get_field('time', $page_id)): ?>
						<div class="contact_link mt-3">
							<span class="icon-time mx-sm-2 mx-2"></span>
							<div class="footer_time d-block"><?php the_field( "time", $page_id ); ?></div>
						</div><?php endif; ?>
					<?php if(get_field('address', $page_id)): ?>
						<div class="contact_link mt-3 mb-4">
							<span class="icon-address-gray mx-sm-2 mx-2"></span>
							<div class="footer_address d-block"><?php the_field( "address", $page_id ); ?></div>
						</div><?php endif; ?>
				</div>

				<div class="contact_us col-lg-4 col-sm-7 col-12 order-3 mb-lg-0 mb-5">
					<div class="b_contacts">
						<?php /*
             			<div class="b_mail"><?php echo get_field('mail', 11); ?></div>
						*/ ?>
						<div class="b_phone">
							<?php if(get_field('whatsapp', 11)): ?>
							<a href="<?php echo get_field('whatsapp', 11); ?>" target="_blank" class="mr-2">
								<img src="<?php echo get_template_directory_uri() ?>/img/whatsapp.svg" alt="whatsapp" title="whatsapp">
							</a>
							<?php endif; ?>
							<?php if(get_field('viber', 11)): ?>
							<a href="<?php echo get_field('viber', 11); ?>" target="_blank" class="mr-2">
								<img src="<?php echo get_template_directory_uri() ?>/img/viber.svg" alt="viber" title="viber">
							</a>
							<?php endif; ?>
							<?php if(get_field('telegram', 11)): ?>
							<a href="<?php echo get_field('telegram', 11); ?>" target="_blank" class="mr-2">
								<img src="<?php echo get_template_directory_uri() ?>/img/telegram.svg" alt="telegram" title="telegram">
							</a>
							<?php endif; ?>
							<?php /*<a href="tel:<?php echo_phone_link(); ?>"><?php echo get_field('phone', 11); ?></a>*/ ?>
						</div>
					</div>
					<div class="socials">
						<?php if(get_field('socials', 11)): ?>
						<?php $i=1;while(the_repeater_field('socials', 11)): ?>
						<?php if(get_sub_field('link')): ?>
						<a href="<?php echo get_sub_field('link'); ?>" target="_blank"><img src="<?php echo get_sub_field('icon'); ?>"></a>
						<?php endif; ?>
						<?php $i++;endwhile; ?>
						<?php endif; ?>
					</div>
					<a class="fancybox gr_btn" href="#contact_form_pop"><?php pll_e('header_btn_write_to_us'); ?></a>
					<div class="fancybox-hidden" style="display:none">
						<div id="contact_form_pop">
						  <?php 						   
							if (get_locale() == 'ru_RU') {
								//echo do_shortcode('[contact-form-7 id="14" title="Напишите нам"]');
								echo do_shortcode('[contact-form-7 id="672" title="Напишите нам_copy"]');
								
							} else if (get_locale() == 'en_GB') {
								echo do_shortcode('[contact-form-7 id="674" title="Write to us_copy"]');
							} else {
								echo do_shortcode('[contact-form-7 id="673" title="Write to us_Chinese_copy"]');
							}
						  ?>
						</div>
						  <div id="popup-success" class="popup">
						    <div class="popup-box">
						      <div class="popup-title"><?php pll_e('popup_Thanks'); ?></div>
						      <div class="popup-subtitle"><?php pll_e('popup_our_manager_will_contact_you'); ?></div>
						      <span class="popup-close-btn"><?php pll_e('popup_Close_window'); ?></span>
						    </div>
						  </div>
					</div>
					
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
	<div class="footer_bottom">
		<div class="site-info">
			<div class="container">
				<div class="row no-gutters text-white mb-3 mt-4">
					<div class="name_of_the_site col-lg-4 col-12 pb-lg-0 pb-3 d-flex justify-content-start">
						© <?php echo get_bloginfo('name'); ?> <?php echo date('Y'); ?>
					</div>
					<div class="privacy_policy_href col-lg-4 col-12 pb-lg-0 pb-3 d-flex  justify-content-center"><a href="#"><?php pll_e('f_Privacy_Policy'); ?></a></div>
					<div class="website_development col-lg-4 col-12 pb-lg-0 pb-3 d-flex justify-content-end">
						<div><?php pll_e('f_website_development'); ?> <a href="https://shulepov-code.ru/" target="_blank"><strong>Shulepov_Code</strong></a></div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row no-gutters text-white mb-4">
					<div class="name_of_the_site col-12 pb-lg-0 pb-3">
						<?php pll_e('f_footer_signature'); ?>
					</div>
					
					
				</div>
			</div>
			<?php /*
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'creamel' ) ); ?>">
				<?php
				// translators: %s: CMS name, i.e. WordPress.
				printf( esc_html__( 'Proudly powered by %s', 'creamel' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				// translators: 1: Theme name, 2: Theme author.
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'creamel' ), 'creamel', '<a href="http://koyot.info">Serhii Ivanov</a>' );
			*/
				?>
		</div><!-- .site-info -->
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri() ?>/slick/slick.js" type="text/javascript"></script>
<link href="<?php echo get_template_directory_uri() ?>/slick/slick.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri() ?>/slick/slick-theme.css" rel="stylesheet">
<script src="<?php echo get_template_directory_uri() ?>/js/main.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/wow.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/highcharts.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/exporting.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/export-data.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/accessibility.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/calc_graphics.js"></script>

<script src="<?php echo get_template_directory_uri() ?>/js/apexcharts.js"></script>
</body>
</html>
