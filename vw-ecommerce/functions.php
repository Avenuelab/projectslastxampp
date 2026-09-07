<?php
/**
 * VW Ecommerce Shop functions and definitions
 *
 * @package VW Ecommerce Shop
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

/* Breadcrumb Begin */
function vw_ecommerce_shop_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			echo "<span> ";
				the_title();
		}
	}
}

/* Theme Setup */
if ( ! function_exists( 'vw_ecommerce_shop_setup' ) ) :
 
function vw_ecommerce_shop_setup() {

	$GLOBALS['content_width'] = apply_filters( 'vw_ecommerce_shop_content_width', 640 );
	
	load_theme_textdomain( 'vw-ecommerce-shop', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('vw-ecommerce-shop-homepage-thumb',240,145,true);
	
       register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'vw-ecommerce-shop' ),
	) );

    /*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	//selective refresh for sidebar and widgets
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', vw_ecommerce_shop_font_url() ) );

	// Theme Activation Notice
	global $pagenow;

	if (is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] )) {
		add_action('admin_notices', 'vw_ecommerce_shop_activation_notice');
	}

}
endif;
add_action( 'after_setup_theme', 'vw_ecommerce_shop_setup' );

// Notice after Theme Activation
function vw_ecommerce_shop_activation_notice() {
	echo '<div class="notice notice-success is-dismissible welcome-notice">';
		echo '<p>'. esc_html__( 'Thank you for choosing VW Ecommerce theme. Would like to have you on our Welcome page so that you can reap all the benefits of our VW Ecommerce theme.', 'vw-ecommerce-shop' ) .'</p>';
		echo '<span><a href="'. esc_url( admin_url( 'themes.php?page=vw_ecommerce_shop_guide' ) ) .'" class="button button-primary">'. esc_html__( 'DEMO IMPORT', 'vw-ecommerce-shop' ) .'</a></span>';
		echo '<span class="demo-btn"><a href="'. esc_url( 'https://preview.themescaliber.com/tc-ecommerce-pro/' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'VIEW DEMO', 'vw-ecommerce-shop' ) .'</a></span>';
		echo '<span class="upgrade-btn"><a href="'. esc_url( 'https://www.themescaliber.com/products/ecommerce-wordpress-theme' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'UPGRADE PRO', 'vw-ecommerce-shop' ) .'</a></span>';
		echo '<span class="bundle-btn"><a href="'. esc_url( ' https://www.themescaliber.com/products/wordpress-theme-bundle' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'THEME BUNDLE', 'vw-ecommerce-shop' ) .'</a></span>';
	echo '</div>';
}
/* Theme Widgets Setup */
function vw_ecommerce_shop_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'vw-ecommerce-shop' ),
		'description'   => __( 'Appears on blog page sidebar', 'vw-ecommerce-shop' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'vw-ecommerce-shop' ),
		'description'   => __( 'Appears on page sidebar', 'vw-ecommerce-shop' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'vw-ecommerce-shop' ),
		'description'   => __( 'Appears on blog page sidebar', 'vw-ecommerce-shop' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 1', 'vw-ecommerce-shop' ),
		'description'   => __( 'Appears on footer', 'vw-ecommerce-shop' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 2', 'vw-ecommerce-shop' ),
		'description'   => __( 'Appears on footer', 'vw-ecommerce-shop' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 3', 'vw-ecommerce-shop' ),
		'description'   => __( 'Appears on footer', 'vw-ecommerce-shop' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 4', 'vw-ecommerce-shop' ),
		'description'   => __( 'Appears on footer', 'vw-ecommerce-shop' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Social Icon', 'vw-ecommerce-shop' ),
		'description'   => __( 'Appears on topbar', 'vw-ecommerce-shop' ),
		'id'            => 'social-icon',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'vw-ecommerce-shop' ),
		'description'   => __( 'Appears on shop page', 'vw-ecommerce-shop' ),
		'id'            => 'woocommerce-shop-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Single Product Sidebar', 'vw-ecommerce-shop' ),
		'description'   => __( 'Appears on shop page', 'vw-ecommerce-shop' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Social Icon', 'vw-ecommerce-shop' ),
		'description'   => __( 'Appears on right side footer', 'vw-ecommerce-shop' ),
		'id'            => 'footer-icon',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-3 py-2">',
		'after_title'   => '</h3>',
	) );  

	register_sidebar( array(
		'name'          => __( 'Footer Social Icon', 'vw-ecommerce-shop' ),
		'description'   => __( 'Appears on right side footer', 'vw-ecommerce-shop' ),
		'id'            => 'footer-icon',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-3 py-2">',
		'after_title'   => '</h3>',
	) );  
}
add_action( 'widgets_init', 'vw_ecommerce_shop_widgets_init' );

/* Theme Font URL */
function vw_ecommerce_shop_font_url() {
	$font_family   = array(
		'Abril Fatface',
		'Acme',
		'Anton',
		'Architects Daughter',
		'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
		'Arvo:ital,wght@0,400;0,700;1,400;1,700',
		'Alegreya Sans:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900',
		'Alfa Slab One',
		'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Bangers',
		'Boogaloo',
		'Bad Script',
		'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Bree Serif',
		'BenchNine:wght@300;400;700',
		'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cardo:ital,wght@0,400;0,700;1,400',
		'Courgette',
		'Caveat Brush',
		'Cherry Swash:wght@400;700',
		'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
		'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
		'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cookie',
		'Coming Soon',
		'Charm:wght@400;700',
		'Chewy',
	 	'Rosario:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
	 	'Berkshire Swash',
	 	'Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800'
	);

	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_family ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
	return $contents;
}

/* Theme enqueue scripts */
function vw_ecommerce_shop_scripts() {
	wp_enqueue_style( 'vw-ecommerce-shop-font', vw_ecommerce_shop_font_url(), array() );
	wp_enqueue_style( 'vw-ecommerce-shop-block-style', get_theme_file_uri('/css/blocks.css') );
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'vw-ecommerce-shop-block-patterns-style-frontend', get_theme_file_uri('/inc/block-patterns/css/block-frontend.css') );
	wp_enqueue_style( 'vw-ecommerce-shop-basic-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/inline-style.php' );
	wp_add_inline_style( 'vw-ecommerce-shop-basic-style',$vw_ecommerce_shop_custom_css );
	wp_enqueue_style( 'vw-ecommerce-shop-effect', get_template_directory_uri().'/css/effect.css' );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'jquery-superfish-js', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery') ,'',true);
	wp_enqueue_script( 'vw-ecommerce-shop-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );

	if (get_theme_mod('vw_ecommerce_shop_animation', true) == true){
		wp_enqueue_script( 'jquery-wow', get_template_directory_uri() . '/js/wow.js', array('jquery') );
		wp_enqueue_style( 'animate-css', get_template_directory_uri().'/css/animate.css' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/* Enqueue the Dashicons script */
	wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'vw_ecommerce_shop_scripts' );

/**
 * Enqueue block editor style
 */
function vw_ecommerce_shop_block_editor_styles() {
	wp_enqueue_style( 'vw-ecommerce-shop-font', vw_ecommerce_shop_font_url(), array() );
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/css/bootstrap.css' );
    wp_enqueue_style( 'vw-ecommerce-shop-block-patterns-style-editor', get_theme_file_uri( '/inc/block-patterns/css/block-editor.css' ), false, '1.0', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'vw_ecommerce_shop_block_editor_styles' );

function vw_ecommerce_shop_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/*radio button sanitization*/
function vw_ecommerce_shop_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function vw_ecommerce_shop_sanitize_float( $input ) {
	return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

function vw_ecommerce_shop_sanitize_number_range( $number, $setting ) {
	$number = absint( $number );
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function vw_ecommerce_shop_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'vw_ecommerce_shop_loop_columns');
	if (!function_exists('vw_ecommerce_shop_loop_columns')) {
	function vw_ecommerce_shop_loop_columns() {
		return get_theme_mod( 'vw_ecommerce_shop_products_per_row', '3' ); 
		// 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'vw_ecommerce_shop_products_per_page' );
function vw_ecommerce_shop_products_per_page( $cols ) {
  	return  get_theme_mod( 'vw_ecommerce_shop_products_per_page',9);
}

define('VW_ECOMMERCE_SHOP_FREE_THEME_DOC',__('https://preview.themescaliber.com/doc/free-ecommerce/','vw-ecommerce-shop'));
define('VW_ECOMMERCE_SHOP_REVIEW',__('https://wordpress.org/support/theme/vw-ecommerce-shop/reviews/','vw-ecommerce-shop'));
define('VW_ECOMMERCE_SHOP_BUY_NOW',__('https://www.themescaliber.com/products/ecommerce-wordpress-theme','vw-ecommerce-shop'));
define('VW_ECOMMERCE_SHOP_LIVE_DEMO',__('https://preview.themescaliber.com/tc-ecommerce-pro/','vw-ecommerce-shop'));
define('VW_ECOMMERCE_SHOP_PRO_DOC',__('https://preview.themescaliber.com/doc/ecommerce-pro/','vw-ecommerce-shop'));
define('VW_ECOMMERCE_SHOP_FAQ',__('https://www.vwthemes.com/faqs/','vw-ecommerce-shop'));
define('VW_ECOMMERCE_SHOP_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','vw-ecommerce-shop'));
define('VW_ECOMMERCE_SHOP_CONTACT',__('https://www.vwthemes.com/contact/','vw-ecommerce-shop'));
define('VW_ECOMMERCE_SHOP_SUPPORT',__('https://wordpress.org/support/theme/vw-ecommerce-shop/','vw-ecommerce-shop'));
define('VW_ECOMMERCE_SHOP_CREDIT',__('https://www.themescaliber.com/products/free-ecommerce-wordpress-theme','vw-ecommerce-shop'));
define('VW_ECOMMERCE_SHOP_THEME_BUNDLE_BUY_NOW',__('https://www.vwthemes.com/products/wp-theme-bundle','vw-ecommerce-shop'));
define('VW_ECOMMERCE_SHOP_THEME_BUNDLE_DOC',__('https://preview.vwthemesdemo.com/docs/theme-bundle/','vw-ecommerce-shop'));


if ( ! function_exists( 'vw_ecommerce_shop_credit' ) ) {
	function vw_ecommerce_shop_credit(){
		echo "<a href=".esc_url(VW_ECOMMERCE_SHOP_CREDIT)." target='_blank'>".esc_html__('Ecommerce WordPress Theme','vw-ecommerce-shop')."</a>";
	}
}

/* Excerpt Limit Begin */
function vw_ecommerce_shop_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit+1));
	if (count($words) > $word_limit) {
		array_pop($words);
	}
	return implode(' ', $words);
}

function vw_ecommerce_shop_logo_title_hide_show(){
	if(get_theme_mod('vw_ecommerce_shop_logo_title_hide_show') == '1' ) {
		return true;
	}
	return false;
}

function vw_ecommerce_shop_tagline_hide_show(){
	if(get_theme_mod('vw_ecommerce_shop_tagline_hide_show',0) == '1' ) {
		return true;
	}
	return false;
}

add_action( 'wp_ajax_vw_ecommerce_shop_reset_all_settings', 'vw_ecommerce_shop_reset_all_settings' );
function vw_ecommerce_shop_reset_all_settings() {
	remove_theme_mod( 'vw_ecommerce_shop_slider_hide_show' );
	remove_theme_mod( 'vw_ecommerce_shop_slider_button_text' );
	remove_theme_mod( 'vw_ecommerce_shop_slider_content_hide_show' );
	remove_theme_mod( 'vw_ecommerce_shop_slider_content_option' );
	remove_theme_mod( 'vw_ecommerce_shop_slider_content_padding_top_bottom' );
	remove_theme_mod( 'vw_ecommerce_shop_slider_content_padding_left_right' );
	remove_theme_mod( 'vw_ecommerce_shop_slider_excerpt_number' );
	remove_theme_mod( 'vw_ecommerce_shop_slider_opacity_color' );
	remove_theme_mod( 'vw_ecommerce_shop_slider_height' );
	remove_theme_mod( 'vw_ecommerce_shop_slider_speed' );
	remove_theme_mod( 'vw_ecommerce_shop_footer_background_color' );
	remove_theme_mod( 'vw_ecommerce_shop_footer_text' );
	remove_theme_mod( 'vw_ecommerce_shop_copyright_font_size' );
	remove_theme_mod( 'vw_ecommerce_shop_copyright_alingment' );
	remove_theme_mod( 'vw_ecommerce_shop_copyright_padding_top_bottom' );
	remove_theme_mod( 'vw_ecommerce_shop_hide_show_scroll' );
	remove_theme_mod( 'vw_ecommerce_shop_scroll_top_icon' );
	remove_theme_mod( 'vw_ecommerce_shop_scroll_to_top_font_size' );
	remove_theme_mod( 'vw_ecommerce_shop_scroll_to_top_padding' );
	remove_theme_mod( 'vw_ecommerce_shop_scroll_to_top_width' );
	remove_theme_mod( 'vw_ecommerce_shop_scroll_to_top_height' );
	remove_theme_mod( 'vw_ecommerce_shop_scroll_to_top_border_radius' );
	remove_theme_mod( 'vw_ecommerce_shop_scroll_top_alignment' );
	wp_send_json_success(
		array(
			'success' => true,
			'message' => "Reset Completed",
		)
	);
}

//Active Callback
function vw_ecommerce_shop_default_slider(){
	if(get_theme_mod('vw_ecommerce_shop_slider_type', 'Default slider') == 'Default slider' ) {
		return true;
	}
	return false;
}

function vw_ecommerce_shop_advance_slider(){
	if(get_theme_mod('vw_ecommerce_shop_slider_type', 'Default slider') == 'Advance slider' ) {
		return true;
	}
	return false;
}

function vw_ecommerce_shop_blog_post_featured_image_dimension(){
	if(get_theme_mod('vw_ecommerce_shop_blog_post_featured_image_dimension') == 'custom' ) {
		return true;
	}
	return false;
}


if (!function_exists('vw_ecommerce_shop_edit_link')) :

    function vw_ecommerce_shop_edit_link($view = 'default')
    {
        global $post;
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'vw-ecommerce-shop'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link"><i class="fas fa-edit"></i>',
                '</span>'
            );

    }
endif;

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Implement the About theme page */
require get_template_directory() . '/inc/getting-started/getting-started.php';

/* Social Custom Widgets */
require get_template_directory() . '/inc/themes-widgets/social-icon.php';

/* Customizer additions. */
require get_template_directory() . '/inc/themes-widgets/about-us-widget.php';

/* Customizer additions. */
require get_template_directory() . '/inc/themes-widgets/contact-us-widget.php';

/* typography */
require get_template_directory() . '/inc/typography/ctypo.php';

/* Block Pattern */
require get_template_directory() . '/inc/block-patterns/block-patterns.php';

/* TGM Plugin Activation */
require get_template_directory() . '/inc/tgm/tgm.php';

/* Webfonts */
require get_template_directory() . '/inc/wptt-webfont-loader.php';