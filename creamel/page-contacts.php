<?php
/**
 * Template Name: Контакты
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package creamel
 */


get_header();
?>

<section id="top_page_contacts">
    <div class="container-fluid p-0">
        <div class="row no-gutters g-0">
            <div class="col-12">
                <div class="h_block_contact">
                    <div class="h_contact_item">
                        <div class="h_contact__info container">  
                            <div class="h_contact__title mb-3"><h1><?php pll_e('title_contacts'); ?></h1></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="page_contact_form" class="pb-96">
    <div class="container">
        <div class="row pt-96">
            <div class="col-md-12 col-12 d-flex justify-content-center">
                <div class="title_form_contacts d-flex justify-content-betwen  flex-row">
                    <div class="mail_info_contact d-flex justify-content-center  flex-column">
                        <span class="pb-md-4"><?php pll_e('email_contacts'); ?></span>
                        <span><?php the_field( "mail", 11 ); ?></span>
						<?php if (get_locale() == 'ru_RU') { ?>
							<a href="tel:<?php echo echo_phone_link(); ?>" class="contact_link me-auto">
								<span class="text-phone">Тел.: </span>
								<div class="d-xl-block d-none"><?php the_field( "phone", 11 ); ?></div>
							</a>
						<?php } ?>
                    </div>
                    <div class="text_info_contact d-flex justify-content-center  flex-column">
                        <span class="text_info_title pt-5 pb-4"><?php pll_e('subtitle_for_investors'); ?></span>
                        <span class="text_info_description"><?php pll_e('description_for_investors'); ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 form_contact d-flex justify-content-center flex-column">
                <?php                            
                    if (get_locale() == 'ru_RU') {
                        //echo do_shortcode('[contact-form-7 id="234" title="Контакты"]');
						echo do_shortcode('[contact-form-7 id="671" title="Контакты_copy"]');
                    } else if (get_locale() == 'en_GB') {
                        //echo do_shortcode('[contact-form-7 id="379" title="Contacts"]');
						echo do_shortcode('[contact-form-7 id="675" title="Contacts_copy"]');
                    } else {
						echo do_shortcode('[contact-form-7 id="676" title="Contact_Chinese_copy"]');
                        //echo do_shortcode('[contact-form-7 id="419" title="Контакты"]');
                    }
                ?>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();