<?php
/**
 * Template Name: О нас
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

<!-- титульная картинка о нас -->
<section id="about_us">
    <div class="container-fluid p-0">
        <div class="row no-gutters g-0">
            <div class="col-12">
                <div class="h_block_about">
                    <div class="h_about_item">
                        <div class="h_about__info container">                            
                            <div class="h_about__title mb-3"><h1><?php the_field('f_title'); ?></h1></div>
                            <div class="h_about_desc mb-md-5 mb-3"><?php the_field('f_description'); ?></div>
                            <!--<a href="#efficient_management" class="w_btn"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M26.2498 10C26.2498 10.32 26.1273 10.64 25.8836 10.8838L15.8836 20.8838C15.3948 21.3725 14.6048 21.3725 14.1161 20.8838L4.11607 10.8838C3.62732 10.395 3.62732 9.60501 4.11607 9.11626C4.60482 8.62751 5.39482 8.62751 5.88357 9.11626L14.9998 18.2325L24.1161 9.11626C24.6048 8.62751 25.3948 8.62751 25.8836 9.11626C26.1273 9.36001 26.2498 9.68001 26.2498 10Z" fill="white"/></svg></a> -->                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- инвесторами для инвесторов -->
<section id="efficient_management">
    <div class="container">
        <div class="row">

            <div class="img_title_protection col-lg-6 col-12 m-auto d-flex justify-content-between">
                <img src="/wp-content/uploads/2021/10/img_block_max_protection.png">                
                <div class="text-white d-flex flex-column">
                    <span class="title mb-4"><?php the_field('efficient_managemen_title'); ?></span>
                    <span><?php the_field('efficient_management_subtitle'); ?></span>
                </div>
            </div>          
            <div class="text_protect col-lg-6 col-12 d-flex">             
                <div class="descript_protect pt-4 my-auto">
                    <span>
                        <?php the_field('efficient_management_description'); ?>
                    </span>
                </div>              
            </div>

        </div>
    </div>
</section>


<!-- о нас в цифрах -->
<section id="about_us_in_numbers" >
    <div class="container">
        <div class="row pb-96 pt-96">
            <div class="title_about_us_in_numbers title_section line_left_title col-lg-12 col-12 mb-5 ps-4 d-flex align-items-end">
                <?php pll_e('title_about_us_in_numbers'); ?>
            </div>
            <?php if(get_field('advantages')): ?>
            <?php $i=1;while(the_repeater_field('advantages')): ?>
            <div class="col-lg-4 col-sm-6 col-12 mb-4 d-flex">
                <div class="advant_item_about box_shadows">
                    <div class="advant_info">
                        <div class="advant_info_head mb-4">
                            <img src="<?php the_sub_field('icon') ?>" >
                            <div class="advant_title mb-1"><?php the_sub_field('title') ?></div>
                        </div>
                        <div class="advant_txt"><?php the_sub_field('description') ?></div>
                    </div>
                </div>
            </div>
            <?php $i++;endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<!-- данные регистрации компании -->
<section id="about_company_registration"> 
    <div class="container">
        <div class="row pb-96 pt-96">
            <div class="title_our_projects title_section line_left_title col-lg-12 col-12 ps-4 mb-5">
                <?php pll_e('company_registration_data'); ?>
            </div>
                <div class="img_about_company_reg col-lg-6 col-12 d-flex">
                    <img src="<?php the_field('reg_image'); ?>" />
                </div>                
                <div class="right_about_company_reg  col-lg-6 col-12 d-flex flex-column">
                    <div class="title_about_company_reg">
                        <span><?php the_field('reg_title'); ?></span>
                    </div>
                    <div class="bot_about_company_reg d-flex flex-column">
                        <span class="firm mb-3"><?php the_field('reg_firm'); ?></span>
                        <div class="location_about_company_reg mb-5">
                            <img src="/wp-content/uploads/2021/11/icon_geo.svg">
                            <span class="location "><?php the_field('reg_location'); ?></span>
                        </div>                       
                        <a href="<?php the_field('reg_link'); ?>" class="gr_btn"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21 16C21.5128 16 21.9355 16.386 21.9933 16.8834L22 17V19C22 20.5977 20.7511 21.9037 19.1763 21.9949L19 22H5C3.40232 22 2.09634 20.7511 2.00509 19.1763L2 19V17C2 16.4477 2.44772 16 3 16C3.51284 16 3.93551 16.386 3.99327 16.8834L4 17V19C4 19.5128 4.38604 19.9355 4.88338 19.9933L5 20H19C19.5128 20 19.9355 19.614 19.9933 19.1166L20 19V17C20 16.4477 20.4477 16 21 16ZM12 2C12.5523 2 13 2.44772 13 3V12.585L14.2929 11.2929C14.6534 10.9324 15.2206 10.9047 15.6129 11.2097L15.7071 11.2929C16.0676 11.6534 16.0953 12.2206 15.7903 12.6129L15.7071 12.7071L12.7071 15.7071L12.6631 15.7485L12.5953 15.8037L12.4841 15.8753L12.3713 15.9288L12.266 15.9642L12.1175 15.9932L12 16L11.9248 15.9972L11.7993 15.9798L11.6879 15.9503L11.5768 15.9063L11.4793 15.854L11.3833 15.7872C11.3515 15.7623 11.3214 15.7356 11.2929 15.7071L8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929C8.65338 10.9324 9.22061 10.9047 9.6129 11.2097L9.70711 11.2929L11 12.585V3C11 2.44772 11.4477 2 12 2Z" fill="white"/>
                        </svg><?php pll_e('download_official_reg_file'); ?></a>
                    </div>                    
                </div>
        </div>
    </div>
</section>


<?php
if (get_locale() == 'ru_RU') {
    $id_home = 2;
} else if (get_locale() == 'en_GB') {
    $id_home = 81;
} else {
    $id_home = 83;
}                                
?>


<!-- Как начать инвестировать -->
<section id="invest_list">
    <div class="container-fluid">
        <div class="row">
            <div class="img_invest_list col-xl-4 mb-lg-0 offset-mb-4">
            </div>
            <div class="invest col-xl-8 col-12 d-flex">
                <div class="row m-auto">                    
                    <div class="title_section line_left_title col-12 mb-4 ps-4 d-flex align-items-center "><?php pll_e('title_how_to_start_investing_with_Phoenix'); ?></div>
                    <?php if( have_rows('invest_list', $id_home) ):
                    $i=1;while ( have_rows('invest_list', $id_home) ) : the_row();
                    ?>                  
                        <div id="invest-parent-block_<?=$i;?>" class="invest-block col-12 d-flex align-items-center">
                            <span class="block_number">
                                0<?=$i;?>
                            </span> 
                            <div class="name-tab-investments num-one strong ps-4"><?php the_sub_field('title', $id_home); ?></div>
                            <button type="button" class="gr_btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="left" title="<?php the_sub_field('description', $id_home); ?>" > ?
                            </button>
                        </div>
                    <?php $i++;endwhile;endif; ?>                   
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Информация о рисках -->
<section id="risk_information" class="pb-96">
    <div class="container">
        <div class="row pt-96">
            <div class="col-12 ">
                <div class="title_section line_left_title_w text-white ps-4 mb-4"><?php pll_e('title_risk_information'); ?></div> 
                <div class="risk_info text-white">
                    <div class="text_risk_info mb-4">
                        <?php the_field('description_risk_info', $id_home); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();