<?php
/**
 * Template Name: Сингл проекта
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

<!-- титульная картинка project -->
<section id="business_project">
    <div class="container-fluid p-0">
        <div class="row no-gutters g-0">
            <div class="col-12">
                <div class="h_block_project">
                    <div class="h_project_item" style="background-image:url(<?php the_field('img_business'); ?>);">
                        <div class="h_project__info container px-4">                            
                            <div class="h_project__title mb-3"><h1><?php the_field('title_business'); ?></h1></div>
                            <div class="h_project_desc mb-md-5 mb-3"><?php the_field('description_business'); ?></div>
                            <!--<a href="#description_of_the_project" class="w_btn">
                                <svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path  d="M11.2681 12.3658L9.57535 10.6732L6.83092 13.4176L6.83092 -1.93954e-07L4.43703 -2.98594e-07L4.43703 13.4176L1.69252 10.6732L-0.000200812 12.3658L5.63397 18L11.2681 12.3658Z" fill="url(#paint0_linear_220_635)"/>
                                    <defs>
                                        <linearGradient id="paint0_linear_220_635" x1="4.61979" y1="-0.966102" x2="4.61979" y2="18" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#E10714"/><stop offset="1" stop-color="#01213F"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 
<!-- Описание проекта -->
<section id="description_of_the_project">
    <div class="container">
        <div class="row">
            <div class="title_descript_project col-lg-6 col-12 m-auto d-flex justify-content-between">
                <div class="d-flex">
                    <span class="title__project mb-4"><?php the_field('title_description_contents'); ?></span>
                </div>
            </div>          
            <div class="text_project col-lg-6 col-12 d-flex">             
                <div class="descript_project my-md-auto my-4">
                    <span><?php the_field('short_description_contents'); ?></span>
                </div>              
            </div>
        </div>
    </div>
</section>


<!-- Елементы контента -->
<section id="elements_project"> 
    <div class="container pt-96">
		<?php if(get_field('elements_project')): ?>
		<?php $i=1;while(the_repeater_field('elements_project')): ?>
		<div class="row pb-96 align-items-center <?php if($i % 2 == 0){ ?>flex-row-reverse<?php } ?>">
			<div class="img_element_project col-lg-6 col-12 mb-lg-0 mb-4">
				<img src="<?php the_sub_field('img_project'); ?>" class="w-100" />
			</div>
			<div class="right_elements_project col-lg-6 col-12">
				<div class="ms-lg-4">
					<div class="title__project mb-3">
						<span><?php the_sub_field('title_project'); ?></span>
					</div>
					<div class="description_project d-flex flex-column">
						<span><?php the_sub_field('description_project'); ?></span>
					</div>
				</div>
			</div>
		</div>
		<?php $i++;endwhile; ?>
		<?php endif; ?>
    </div>
</section>



<!-- Планы по проекту -->
<section id="project_plans" class="project_<?php the_ID(); ?> pt-96 pb-96 text-white">
	<div class="container">
		<div class="row flex-md-row flex-md-row flex-column-reverse align-items-md-center mt-md-5 mb-md-5">
			<div class="col-md-10 col-12">			
				<div class="text_block_project">
					<div class="project_plans_title mb-4"><?php the_field('title_project_plans'); ?></div>
					<div class="project_plans_desc"><?php the_field('description_project_plans'); ?></div>
				</div>				
			</div>
			<div class="col-md-2 col-12 d-flex align-items-center justify-content-md-end justify-content-center favicon_project_plans">
				<img src="/wp-content/uploads/2021/10/img_block_max_protection.png">
			</div>
		</div>
	</div>
</section>



<?php if(get_field('greenhouse')): ?>
    <section id="greenhouse_slider">
        <div class="container pt-96 pb-96">
            <div class="row">
                <div class="title_section line_left_title col-12 mb-4 ps-4 d-flex align-items-center">GreenHouse</div>      
                <div class="mb-md-5 h6 mb-4"><?php pll_e('subtitle_GreenHouse'); ?></div>
                <div class="col-12 px-0">
                    <div class="slider_greenhouse">                       
                        <?php $img_gallery = get_field('greenhouse');
                            if ($img_gallery) { $i = 0;?>
                            <?php foreach( $img_gallery as $img ) {  $i++ ?>
                            <div class="img_slider">
                                <img src="<?php echo esc_url($img['sizes']['medium']);?>"/>
                                <a href="<?php echo esc_url($img['sizes']['large']); ?>" data-fancybox="images">
                                <div class="hov" style="position: absolute; width: 100%; height:100%; background-color: rgba(255,255,255, 0.5); display: none; justify-content: center; align-items: center; top: 0"><span class="icon_zoom"></span></div>
                                </a>
                            </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
					  <div class="slider_dots">
						<?php for($j=0; $j < $i; $j++){?>
							<div class="slider_navigators" id="<?php $j ?>"></div>
						<?php } ?>
					  </div>
                </div>
            </div>
        </div>
    </section>
 <?php endif; ?>


<?php if(get_field('woodenhouse')): ?>
    <section id="woodenhouse_slider">
        <div class="container pb-96">
            <div class="row">
                <div class="title_section line_left_title col-12 mb-4 ps-4 d-flex align-items-center"><?php pll_e('title_Woodenhouse'); ?></div>  
                <div class="description_wh_section mb-md-5 h6 mb-4"><?php pll_e('description_Woodenhouse'); ?></div>   
                <div class="subtitle_wh_section mb-md-5 h6 mb-4" style="color: #191A1B;"><?php pll_e('subtitle_Woodenhouse'); ?></div>
                <div class="col-12 px-0">
                    <div class="slider_woodenhouse">                       
                        <?php $img_gallery = get_field('woodenhouse');
                            if ($img_gallery) { $i = 0;?>
                            <?php foreach( $img_gallery as $img ) {  $i++ ?>
                            <div class="img_slider">
                                <img src="<?php echo esc_url($img['sizes']['medium']);?>"/>
                                <a href="<?php echo esc_url($img['sizes']['large']); ?>" data-fancybox="images">
                                <div class="hov" style="position: absolute; width: 100%; height:100%; background-color: rgba(255,255,255, 0.5); display: none; justify-content: center; align-items: center; top: 0"><span class="icon_zoom"></span></div>
                                </a>
                            </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                      <div class="slider_dots_woodenhouse">
                        <?php for($j=0; $j < $i; $j++){?>
                            <div class="slider_navigators" id="slider_woodenhouse_<?php $j ?>"></div>
                        <?php } ?>
                      </div>
                </div>
            </div>
        </div>
    </section>
 <?php endif; ?>


<?php// get_template_part('inc_faq'); ?>


<section id="risk_information" class="pb-96">
    <div class="container">
        <div class="row pt-96">
            <div class="col-12 ">
                <div class="title_section line_left_title_w text-white ps-4 mb-4"><?php pll_e('title_risk_information'); ?></div> 
                <div class="risk_info text-white">
                    <div class="text_risk_info mb-4">
                        <?php
                            if (get_locale() == 'ru_RU') {
                                $i=2;
                            } else if (get_locale() == 'en_GB') {
                                $i=81;
                            } else {
                                $i=83;
                            }                               
                        ?>
                        <?php the_field('description_risk_info', $i); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();


