<?php
/**
 * Template Name: Главная
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
<section id="h_slider">
	<div class="container-fluid p-0">
		<div class="row no-gutters">
			<div class="col-12">
				<div class="h_slider__wrapper">
					<?php if(get_field('slider')): ?>
					<?php $i=1;while(the_repeater_field('slider')): ?>
					<?php $image = get_sub_field('image'); ?>
					<div class="h_slider__item" style="background-image:url(<?php echo wp_get_attachment_image_src( $image['ID'], 'full' )[0]; ?>);">
						<?php echo wp_get_attachment_image( $image['ID'], 'full', "", ["loading" => "lazy"] );?>
						<div class="h_slider__info container">
							<div class="slider_block">
								<?php if($i==1){?><h1><?php } ?><div class="h_slider__title mb-3"><?php the_sub_field('title'); ?></div><?php if($i==1){?></h1><?php } ?>
								<div class="h_slider_desc mb-md-5 mb-3"><?php the_sub_field('description'); ?></div>
								<!--<a href="<?php // the_sub_field('link'); ?>" class="slider_btn"><?php // pll_e('btn_slider'); ?></a>-->
							</div>
						</div>
					</div>
					<?php $i++;endwhile; ?>
					<?php endif; ?>
				</div>
				<div class="for_dots"></div>
			</div>
		</div>
	</div>
</section>


<section id="advantages" >
	<div class="container">
		<div class="row pb-96">
			<div class="title_why_we col-lg-3 col-sm-6 col-12 mb-4 d-flex align-items-end">
				<span class="title_section "><?php pll_e('title_why_us'); ?></span>
			</div>
			<?php if(get_field('advantages')): ?>
			<?php $i=1;while(the_repeater_field('advantages')): ?>
			<div class="col-lg-3 col-sm-6 col-12 mb-4 d-flex">
				<div class="advant_item_wrap box_shadows">
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

<section id="invest_list">

	<div class="container-fluid">
		<div class="row">
			<div class="img_invest_list col-xl-4 mb-lg-0 offset-mb-4">

			</div>
			<div class="invest col-xl-8 col-12 d-flex">
				<div class="row m-auto">					
					<div class="title_section line_left_title col-12 mb-4 ps-4 d-flex align-items-center "><?php pll_e('title_how_to_start_investing_with_Phoenix'); ?></div>
					<?php if( have_rows('invest_list') ):
				    $i=1;while ( have_rows('invest_list') ) : the_row();
					?>					
						<div id="invest-parent-block_<?=$i;?>" class="invest-block col-12 d-flex align-items-center">
							<span class="block_number">
								0<?=$i;?>
							</span>	
							<div class="name-tab-investments num-one ps-4"><span><?php the_sub_field('title'); ?></span></div>
							<button type="button" class="gr_btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="left" title="<?php the_sub_field('description'); ?>" > ?
							</button>
						</div>
					<?php $i++;endwhile;endif; ?>					
				</div>
			</div>
		</div>
	</div>
</section>

<section id="max_protection">
	<div class="container">
		<div class="row">
			<div class="img_title_protection col-lg-6 col-12 d-flex justify-content-start">
				<img src="/wp-content/uploads/2021/10/img_block_max_protection.png">
				<span class="title_section title_max_protect"><?php pll_e('title_maximum_protection'); ?></span>
			</div>
			
			<div class="text_protect col-lg-6 col-12 d-flex">
				<div class="descript_protect my-auto">
					<span>
						<?php the_field('investment_protection'); ?>
					</span>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="price_list" class="pb-96">
	<div class="container">
		<div class="row pt-96">
			<div class="title_section line_left_title col-12 mb-4 ps-4 d-flex align-items-center"><?php pll_e('title_average_monthly_profitability'); ?></div>		
			<?php if( have_rows('price_list') ): ?>
			<?php $i=1;while ( have_rows('price_list') ) : the_row(); ?>
			<div class="col-lg-6 col-12 pt-5 d-flex justify-content-between">
				<div class="table-responsive">
					<table class="table table_price table-striped table-borderless">
						<thead>
							<tr>
								<th colspan="2"><?php the_sub_field('table_title'); ?></th>
							</tr>
						</thead>
						<?php if( have_rows('price_table') ): ?>
						<tbody>
							<?php $y=1;while ( have_rows('price_table') ) : the_row(); ?>
							<tr>
								<td><?php the_sub_field('price_name'); ?></td>
								<td style="width:auto"><?php the_sub_field('price'); ?></td>
							</tr>
							<?php $y++;endwhile;?>
						</tbody>
						<?php endif; ?>
					</table>
					<a href="<?php the_sub_field('link'); ?>" class="gr_btn"><?php pll_e('btn_start_investing'); ?></a>
				</div>
			</div>
			<?php $i++;endwhile;?>
			<?php endif; ?>			
		</div>
	</div>
</section>


<!-- profit_graph   -->
<section id="profit_graph" class="pb-96">
	<div class="container">
		<div class="row pt-96">
			<div class="title_section line_left_title col-12 mb-4 ps-4 d-flex align-items-center"><?php pll_e('title_profit_graph'); ?></div>
			<ul class="list-group list-group-graph">
				<li class="list-group-bar_chart active-tab-graph" >Столбчатая диаграмма</li>
				<li class="list-group-area_chart" >Диаграмма области</li>				
			</ul>

			<!-- повторитель данных о прибыли          --> 

			<div class="graph_bar_chart">
				<ul class="list-control_panel_bar"><!--active-tab-year (add css class -first-child) -->
					<?php if ( have_rows( 'repeater_profit_data' ) ) : ?>
						<?php while ( have_rows( 'repeater_profit_data' ) ) : the_row(); ?>
							<li class="<?php the_sub_field( 'year_income' ); ?>" ><?php the_sub_field( 'year_income' ); ?>
								<?php if ( have_rows( 'profit_data' ) ) : ?>
									<?php while ( have_rows( 'profit_data' ) ) : the_row(); ?>
										<span class = "investment_income d-none"><?php the_sub_field( 'investment_income_percentage' ); ?></span>
									<?php endwhile; ?>
								<?php endif; ?>
							</li>	
						<?php endwhile; ?>
					<?php endif; ?>
				</ul>		
				<div id="chart_bar_Container" ></div>
			</div>

			<div class="graph_area_chart hidden">
				<ul class="list-control_panel_area">
					<li class="area_year_all active-tab-year" >All period</li>
					<li class="area_year_last_year" >last year</li>
					<li class="area_year_last_six" >last 6 month</li>
					<li class="area_year_last_three" >last 3 month</li>
				</ul>
				<div id="chart_area_Container" ></div>
			</div>
										
		</div>
	</div>
</section>


<!-- calculator-->
<section id="calculator" class="pb-96">
	<div class="container">
		<div class="row pt-96">
			<div class="title_section line_left_title col-12 mb-4 ps-4 d-flex align-items-center"><?php pll_e('title_profit_calculator'); ?></div>		
			<div class="mb-md-5 mb-4"><?php pll_e('subtitle_description_calculator'); ?></div>
			<div class="col-md-12 col-12 pt-lg-0 pt-5">
				<?php
				if (get_locale() == 'ru_RU') {
					echo do_shortcode('[CP_CALCULATED_FIELDS id="6"]');
				} else if (get_locale() == 'en_GB') {
					echo do_shortcode('[CP_CALCULATED_FIELDS id="7"]');
				} else {
					echo do_shortcode('[CP_CALCULATED_FIELDS id="8"]');
				}								 
				?>
			</div>
			<div class="column_graphic col-12 pt-md-5 pt-2">
				<div class="title_stacked_column_graphic"><?php pll_e('investment_growth_over_time'); ?></div>
				<figure class="highcharts-figure">
					<div id="stacked_column_graphic"></div>
				</figure>
			</div>
<!--		<div class="pie_graphic col-md-5 col-12 pt-md-5 pt-2">
				<div class="title_pie_with_legend_graphic"><?php //pll_e('investment_balance_for_year'); ?></div>
				<figure class="highcharts-figure">
					<div id="pie_with_legend_graphic"></div>
				</figure>
			</div>
-->
			<div class="col-12 table_block pt-lg-3 pt-4">
			<div class="title_table"><?php pll_e('deposit_accrual_scheme'); ?></div>
				<table class="table_deposit_accrual_scheme">
					<thead>
						<tr>
                            <th><?php pll_e('year'); ?></th>
                            <th><?php pll_e('base_amount_of_charges'); ?></th>
                            <th><?php pll_e('deposit_interest'); ?></th>
                            <th><?php pll_e('total_amount_including_interest'); ?></th>
						</tr>
					</thead>
					<tbody></tbody>
					<tfoot>
					</tfoot>			
				</table>
				<div class="total_calc d-none"><?php pll_e('total_calc'); ?></div>
				<div class="total_accrued d-none"><?php pll_e('total_accrued'); ?></div>
				<div class="general_contributions d-none"><?php pll_e('general_contributions'); ?></div>
				<div class="initial_amount d-none"><?php pll_e('initial_amount'); ?></div>
				<div class="schedule_month d-none"><?php pll_e('schedule_month'); ?></div>
				<div class="schedule_year d-none"><?php pll_e('schedule_year'); ?></div>
			</div>
		</div>
	</div>
</section>


				<!-- наши проекты -->			
<section id="our_projects" >
	<div class="container">
		<div class="row pb-96 pt-96 flex-row-reverse">
			<div class="title_our_projects title_section line_left_title col-lg-12 col-12 ps-4 mb-5">
				<?php pll_e('title_our_projects'); ?>
			</div>
			<?php global $wp_query;
			$args = ['post_type' => 'projects','posts_per_page' => 2];	
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




				<!-- Способы зачисления инвестиций -->			
<section id="methods" >
	<div class="container">
		<div class="row pb-96 pt-96">
			<div class="title_methods title_section line_left_title col-lg-12 col-12 ps-4 mb-5">
				<?php pll_e('title_methods'); ?>
			</div>
			
			<div  class="col-lg-4 col-12 method_item mb-md-0 mb-4">				
						
					<div class="block_method">
						<div class="method_img"><img src="<?php echo get_template_directory_uri() ?>/img/method1.svg"></div>
						<div class="method_content">
							<div class="method_head"><?php pll_e('title_method_1'); ?></div>
							
						</div>										
					</div>
				
			</div>
			
			<div  class="col-lg-4 col-12 method_item mb-md-0 mb-4">				
						
					<div class="block_method">
						<div class="method_img"><img src="<?php echo get_template_directory_uri() ?>/img/method2.svg"></div>
						<div class="method_content">
							<div class="method_head"><?php pll_e('title_method_2'); ?> (BitCoin, ETH)</div>
							
						</div>										
					</div>
				
			</div>
			
			<div  class="col-lg-4 col-12 method_item mb-md-0 mb-4">				
						
					<div class="block_method">
						<div class="method_img"><img src="<?php echo get_template_directory_uri() ?>/img/method3.svg"></div>
						<div class="method_content">
							<div class="method_head">Perfect money</div>
							<div class="method_subhead"><?php pll_e('subtitle_method_3'); ?>: <a href="https://perfectmoney.com/public_view.html?id=49918912">Phoenix Group</a></div>
						</div>										
					</div>
				
			</div>
			
		</div>
	</div>
</section>







<?php// get_template_part('inc_faq'); ?>


<section id="risk_information" class="pb-96">
	<div class="container">
		<div class="row pt-96">
			<div class="col-12 ">
				<div class="title_section line_left_title_w text-white ps-4 mb-4"><?php pll_e('title_risk_information'); ?></div>	
				<div class="risk_info text-white">
					<div class="text_risk_info mb-4">
						<?php the_field('description_risk_info'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php
get_footer();


