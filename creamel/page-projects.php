<?php
/**
 * Template Name: Проекты
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
<section id="top_page_projects" class="pb-96">
    <div class="container">
        <div class="row pt-96">
            <div class="title_page_projects col-12 mb-4 mt-lg-0 mt-3 d-flex align-items-center"><h1><?php pll_e('title_projects'); ?></h1></div>      
            <div class="mb-md-5 h6 mb-4"><?php pll_e('description_projects'); ?></div>
            <div class="col-md-12 col-12 pt-lg-0 pt-1 pb-lg-0 pb-3">
                <a class="fancybox gr_btn project_btn" href="#contact_form_pop"><?php pll_e('btn_submit_your_application'); ?></a>
                <div class="fancybox-hidden" style="display:none">
                    <div id="contact_form_pop_2">
                      <?php echo do_shortcode('[contact-form-7 id="14" title="Напишите нам"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="our_projects" >
    <div class="container">
        <div class="row pb-96 flex-row-reverse">
            <?php global $wp_query;
            $args = ['post_type' => 'projects','posts_per_page' => 2,]; 
            $wp_query = new WP_Query($args);
            $i=1;while ( $wp_query->have_posts() ) : $wp_query->the_post();
            ?>
            <div id="post-<?php the_ID(); ?>" class="col-lg-6 col-12 project_item mb-md-0 mb-4">                
                <a href="<?php echo esc_url( get_permalink() ); ?>" class="box_shadow p-4">                 
                    <div class="block_project">
                        <div class="project_img"><img src="<?php the_post_thumbnail_url(); ?>"></div>
                        <div class="project_subhead">
                            <div class="project_name w_txt"><?php echo the_title(); ?></div>
                            <div class="project_excerpt w_txt"><?php the_excerpt(); ?></div>
                            <div class="gr_btn"><span><?php pll_e('btn_learn_more'); ?></span></div>
                        </div>                                      
                    </div>
                </a>
            </div>
            <?php $i++;endwhile; wp_reset_query();?>    
        </div>
    </div>
</section>

<?php // get_template_part('inc_faq'); ?>

<?php
get_footer();