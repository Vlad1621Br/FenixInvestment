<?php
/**
 * creamel functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package creamel
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'creamel_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function creamel_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on creamel, use a find and replace
		 * to change 'creamel' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'creamel', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'creamel' ),
				'menu-mob' => esc_html__( 'Mobile', 'creamel' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'creamel_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'creamel_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function creamel_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'creamel_content_width', 640 );
}
add_action( 'after_setup_theme', 'creamel_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function creamel_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'creamel' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'creamel' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'creamel_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function creamel_scripts() {
	wp_enqueue_style( 'bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' );
	wp_enqueue_script( 'bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), false, true );

	wp_enqueue_style( 'creamel-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'creamel-style', 'rtl', 'replace' );

	wp_enqueue_script( 'creamel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'creamel_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
*/
function echo_phone_link() {$phone_mobile_link=get_field('phone', 11); echo '+'.preg_replace('/[^0-9]/', '', $phone_mobile_link);}

function do_excerpt($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if (count($words) > $word_limit)
    array_pop($words);
  echo implode(' ', $words) . ' ...';
}

/* изменить дизайн под проект */
function true_load_objects(){
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1;
	$args['post_status'] = 'publish';
	query_posts( $args );
	if( have_posts() ) :
		while( have_posts() ): the_post();
?>
					<div class="col-lg-4 col-sm-6 col-12 mb-4">
						<a href="<?php echo esc_url( get_permalink() ); ?>">
							<div class="service_item">
								<div class="service_img"><?php the_post_thumbnail(''); ?></div>
								<div class="service_title"><span><?php echo the_title(); ?></span></div>
							</div>
						</a>
					</div>
<?php
		endwhile;
	endif;
	die();
}
add_action('wp_ajax_loadmore', 'true_load_objects');
add_action('wp_ajax_nopriv_loadmore', 'true_load_objects');


add_filter( 'get_the_archive_title', 'artabr_remove_name_cat' );
function artabr_remove_name_cat( $title ){
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	}
	return $title;
}

function posts_on_blog( $query ) {
if ( is_category( array(29, 45) ) ) 
    {
        // If you want "posts per page"
        $query->query_vars['posts_per_page'] = 9;
        return;
    }
}
add_action( 'pre_get_posts', 'posts_on_blog' );

/* //Пример подмены перевода без использования плагина Loco Translate
add_filter('gettext', 'translate_text');
add_filter('ngettext', 'translate_text');
function translate_text($translated) {
$translated = str_ireplace('Подытог', 'Сумма', $translated);
return $translated;
}
*/
/*
add_filter( 'single_template', function ( $single_template ) {
    $parent     = '19'; //Change to your category ID
    $categories = get_categories( 'child_of=' . $parent );
    $cat_names  = wp_list_pluck( $categories, 'name' );
    if ( has_category( 'blog' ) || has_category( $cat_names ) ) {
        $single_template = dirname( __FILE__ ) . '/single-blog.php';
    }
    return $single_template;
}, PHP_INT_MAX, 2 );
*/

//Castom adminbar
if( 'Сollapse Toolbar' ){
	//
	// Сollapse ADMIN-BAR (Toolbar) into left-top corner
	// v 0.9
	//
	add_action( 'admin_bar_init', function(){
			//remove_action( 'wp_head', '_admin_bar_bump_cb' ); // html margin bumps
			add_action( 'wp_before_admin_bar_render', 'kama_adminbar_styles' );
			//add_action( 'wp_after_admin_bar_render', 'set_adminbar_styles_show' );
	});
	function kama_adminbar_styles(){
			// Выходим если админка, можно закомментить...
			if( is_admin() ) return;
			ob_start();
			?>
			<style>
					#wpadminbar{ background:none; float:left; width:auto; height:auto; bottom:0; min-width:0 !important; }
					#wpadminbar > *{ float:left !important; clear:both !important; }
					#wpadminbar .ab-top-menu li{ float:none !important; }
					#wpadminbar .ab-top-secondary{ float: none !important; }
					#wpadminbar .ab-top-menu>.menupop>.ab-sub-wrapper{ top:0; left:100%; white-space:nowrap; }
					#wpadminbar .quicklinks>ul>li>a{ padding-right:17px; }
					#wpadminbar .ab-top-secondary .menupop .ab-sub-wrapper{ left:100%; right:auto; }
					html{ margin-top:0!important; }
					#wpadminbar{ overflow:hidden; width:33px; height:30px; }
					#wpadminbar:hover{ overflow:visible; width:auto; height:auto; background:rgba(102,102,102,.7); }
					#wp-admin-bar-<?= is_multisite() ? 'my-sites' : 'site-name' ?> .ab-item:before{ color:#797c7d; }
					#wp-admin-bar-wp-logo{ display:none; }
						#wp-admin-bar-search{ display:none; }
					body.admin-bar:before{ display:none; }
					@media screen and ( min-width: 782px ) {
							html.wp-toolbar{ padding-top:0 !important; }
							#wpadminbar:hover{ background:rgba(102,102,102,1); }
							#adminmenu{ margin-top:48px !important; }
					}
					#wpwrap .edit-post-header{ top:0; }
					#wpwrap .edit-post-sidebar{ top:56px; }
			</style>
			<?php
			$styles = ob_get_clean();
			echo preg_replace( '/[\n\t]/', '', $styles ) ."\n";
	}
}

function theme_current_type_nav_class($css_class, $item) {
    static $custom_post_types, $post_type, $filter_func;
    if (empty($custom_post_types))
        $custom_post_types = get_post_types(array('_builtin' => false));
    if (empty($post_type))
        $post_type = get_post_type();
    if ('page' == $item->object && in_array($post_type, $custom_post_types)) {
        $css_class = array_filter($css_class, function($el) {
            return $el !== "current_page_parent";
        });
        $template = get_page_template_slug($item->object_id);
        if (!empty($template) && preg_match("/^page(-[^-]+)*-$post_type/", $template) === 1)
            array_push($css_class, 'current_page_parent');
    }
    return $css_class;
}
add_filter('nav_menu_css_class', 'theme_current_type_nav_class', 1, 2);

add_filter('paginate_links', function($link) {
    $pos = strpos($link, 'page/1/');
    if($pos !== false) {
        $link = substr($link, 0, $pos);
    }
    return $link;
});

function projects() {
		// Регистрируем новый тип записи
		$labels = array(
			'name' => 'Проекты',
			'menu_name' => 'Проекты',
			'singular_name' => 'Проект',
			'add_new' => 'Добавить Проект',
			'menu_icon'   => 'dashicons-format-chat',
			'add_new_item' => 'Добавить новый проект',
			'edit_item' => 'Редактировать проект',
			'new_item' => 'Новый проект',
			'all_items' => 'Все проекты',
			'view_item' => 'Смотреть проект',
			'search_items' => 'Просмотр',
			'not_found' =>  'Не найдено',
			'not_found_in_trash' => 'В корзине пусто'
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 2,
			'show_in_rest' => true,
			'menu_icon'   => 'dashicons-format-chat',
			'supports' => array('title', 'editor', 'thumbnail', 'post-formats', 'excerpt')
		);
		register_post_type( 'projects', $args );
	}
projects();




if ( function_exists( 'pll_register_string' ) ) {
						/*header*/
	pll_register_string('header_btn_write_to_us', 'header_btn_write_to_us');
						/*page main*/
	/*slider*/
	pll_register_string('btn_slider', 'btn_slider');

	/*block why_us*/
	pll_register_string('title_why_us', 'title_why_us');

	/*block start investing with Phoenix*/
	pll_register_string('title_how_to_start_investing_with_Phoenix', 'title_how_to_start_investing_with_Phoenix');

	/*maximum protection*/
	pll_register_string('title_maximum_protection', 'title_maximum_protection');

	/*investment_plan_table*/
	pll_register_string('title_average_monthly_profitability', 'title_average_monthly_profitability');
	pll_register_string('btn_start_investing', 'btn_start_investing');

	/*calc*/
	pll_register_string('title_profit_calculator', 'title_profit_calculator');
	pll_register_string('subtitle_description_calculator', 'subtitle_description_calculator');

	pll_register_string('deposit_accrual_scheme', 'deposit_accrual_scheme');
	pll_register_string('year', 'year');
	pll_register_string('base_amount_of_charges', 'base_amount_of_charges');
	pll_register_string('deposit_interest', 'deposit_interest');
	pll_register_string('total_amount_including_interest', 'total_amount_including_interest');
	pll_register_string('total_calc', 'total_calc');

	pll_register_string('total_accrued', 'total_accrued');
	pll_register_string('general_contributions', 'general_contributions');
	pll_register_string('initial_amount', 'initial_amount');
	pll_register_string('schedule_month', 'schedule_month');
	pll_register_string('schedule_year', 'schedule_year');  //***********************************************


	pll_register_string('investment_growth_over_time', 'investment_growth_over_time');
	pll_register_string('investment_balance_for_year', 'investment_balance_for_year');

	/*project*/
	pll_register_string('title_our_projects', 'title_our_projects');
	pll_register_string('btn_learn_more', 'btn_learn_more');

	/*faq*/
	pll_register_string('title_faq', 'title_faq');
	pll_register_string('subtitle_faq', 'subtitle_faq');
	
	/*methods*/
	pll_register_string('title_methods', 'title_methods');
	pll_register_string('title_method_1', 'title_method_1');
	pll_register_string('title_method_2', 'title_method_2');
	pll_register_string('title_method_3', 'title_method_3');
	pll_register_string('subtitle_method_3', 'subtitle_method_3');
	

	/*risk_info*/
	pll_register_string('title_risk_information', 'title_risk_information');
	//pll_register_string('description_risk_information', 'description_risk_information');


						/*page about*/

	/*title about us in numbers*/
	pll_register_string('title_about_us_in_numbers', 'title_about_us_in_numbers');
	pll_register_string('signature_about_us_in_numbers', 'signature_about_us_in_numbers');
	pll_register_string('company_registration_data', 'company_registration_data');
	pll_register_string('download_official_reg_file', 'download_official_reg_file');
	

	/*title company registration data*/
	pll_register_string('title_company_reg_data', 'title_company_reg_data');


						/*page projects*/
	/*title projects*/
	pll_register_string('title_projects', 'title_projects');
	pll_register_string('description_projects', 'description_projects');
	pll_register_string('btn_submit_your_application', 'btn_submit_your_application');


						/*page contacts*/
	/*title contacts*/
	pll_register_string('title_contacts', 'title_contacts');
	pll_register_string('email_contacts', 'email_contacts');
	pll_register_string('subtitle_for_investors', 'subtitle_for_investors');
	pll_register_string('description_for_investors', 'description_for_investors');



						/*page forest business*/
	/*title forest business*/
	pll_register_string('title_forest_business', 'title_forest_business');
	pll_register_string('description_forest_business', 'description_forest_business');

	/*title As of 2020*/
	pll_register_string('title_as_of_the_year', 'title_as_of_the_year');
	pll_register_string('description_as_of_the_year', 'description_as_of_the_year');

	/*title Lumber supply*/
	pll_register_string('title_lumber_supply', 'title_lumber_supply');
	pll_register_string('description_lumber_supply', 'description_lumber_supply');

	/*title Under existing contracts*/
	pll_register_string('title_under_existing_contracts', 'title_under_existing_contracts');

	/*title GreenHouse */
	pll_register_string('title_GreenHouse', 'title_GreenHouse');
	pll_register_string('subtitle_GreenHouse', 'subtitle_GreenHouse');

	/*title Woodenhouse */
	pll_register_string('title_Woodenhouse', 'title_Woodenhouse');
	pll_register_string('description_Woodenhouse', 'description_Woodenhouse');	
	pll_register_string('subtitle_Woodenhouse', 'subtitle_Woodenhouse');


						/*page groundwater business*/
	/*title Groundwater development */
	pll_register_string('title_groundwater_business', 'title_groundwater_business');
	pll_register_string('description_groundwater_business', 'description_groundwater_business');

	/*title Phoenix_group*/
	pll_register_string('title_Phoenix_group', 'title_Phoenix_group');
	pll_register_string('description_Phoenix_group', 'description_Phoenix_group');

	/*title Increased consumption of drinking water.*/
	pll_register_string('title_increased_consumption', 'title_increased_consumption');
	pll_register_string('description_increased_consumption', 'description_increased_consumption');

	/*title Drinking water consumption projections*/
	pll_register_string('title_consumption_projections', 'title_under_existing_contracts');
	pll_register_string('description_consumption_projections', 'description_consumption_projections');

	/*title Phoenix Investments plans*/
	pll_register_string('title_investments_plans', 'title_investments_plans');
	pll_register_string('subtitle_investments_plans', 'subtitle_investments_plans');

						/*footer*/
	pll_register_string('f_COMPANY', 'f_COMPANY');
	pll_register_string('f_PROJECTS', 'f_PROJECTS');
	pll_register_string('f_CONTACTS', 'f_CONTACTS');
	pll_register_string('f_Privacy_Policy', 'f_Privacy_Policy');
	pll_register_string('f_website_development', 'f_website_development');
	pll_register_string('f_footer_signature', 'f_footer_signature');

	pll_register_string('popup_Thanks', 'popup_Thanks');
	pll_register_string('popup_our_manager_will_contact_you', 'popup_our_manager_will_contact_you');
	pll_register_string('popup_Close_window', 'popup_Close_window');


}



