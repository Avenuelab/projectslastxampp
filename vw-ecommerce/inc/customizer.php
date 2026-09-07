<?php
/**
 * VW Ecommerce Shop Theme Customizer
 *
 * @package VW Ecommerce Shop
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_ecommerce_shop_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_ecommerce_shop_custom_controls' );

function vw_ecommerce_shop_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial( 'blogname', array( 
        'selector' => '.logo .site-title a', 
        'render_callback' => 'vw_ecommerce_shop_customize_partial_blogname', 
    )); 
 
    $wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
        'selector' => 'p.site-description', 
        'render_callback' => 'vw_ecommerce_shop_customize_partial_blogdescription', 
    ));

   	//add home page setting pannel
	$VWEcommerceShopParentPanel = new VW_Ecommerce_Shop_WP_Customize_Panel( $wp_customize, 'vw_ecommerce_shop_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-ecommerce-shop' ),
		'priority' => 10,
	));

	$wp_customize->add_panel( $VWEcommerceShopParentPanel );

	$HomePageParentPanel = new VW_Ecommerce_Shop_WP_Customize_Panel( $wp_customize, 'vw_ecommerce_shop_homepage_panel', array(
		'title' => __( 'Homepage Settings', 'vw-ecommerce-shop' ),
		'panel' => 'vw_ecommerce_shop_panel_id',
	));

	$wp_customize->add_panel( $HomePageParentPanel );
   
	//Topbar section
	$wp_customize->add_section('vw_ecommerce_shop_topbar',array(
		'title'	=> __('Topbar Section','vw-ecommerce-shop'),
		'description'	=> __('Add Header Content here','vw-ecommerce-shop'),
		'priority'	=> null,
		'panel' => 'vw_ecommerce_shop_homepage_panel',
	));

   	// Header Background color
	$wp_customize->add_setting('vw_ecommerce_shop_header_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_ecommerce_shop_header_background_color', array(
		'label'    => __('header Background Color', 'vw-ecommerce-shop'),
		'section'  => 'header_image',
	)));

	$wp_customize->add_setting('vw_ecommerce_shop_header_img_position',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_header_img_position',array(
		'type' => 'select',
		'label' => __('Header Image Position','vw-ecommerce-shop'),
		'section' => 'header_image',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-ecommerce-shop' ),
			'center top'   => esc_html__( 'Top', 'vw-ecommerce-shop' ),
			'right top'   => esc_html__( 'Top Right', 'vw-ecommerce-shop' ),
			'left center'   => esc_html__( 'Left', 'vw-ecommerce-shop' ),
			'center center'   => esc_html__( 'Center', 'vw-ecommerce-shop' ),
			'right center'   => esc_html__( 'Right', 'vw-ecommerce-shop' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-ecommerce-shop' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-ecommerce-shop' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-ecommerce-shop' ),
		),
	));

	$wp_customize->add_setting( 'vw_ecommerce_shop_topbar_hide_show',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_topbar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Topbar','vw-ecommerce-shop' ),
      	'section' => 'vw_ecommerce_shop_topbar'
    )));

    $wp_customize->add_setting('vw_ecommerce_shop_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_ecommerce_shop_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_sticky_header',array(
        'label' => esc_html__( 'Show / Hide Sticky Header','vw-ecommerce-shop' ),
        'section' => 'vw_ecommerce_shop_topbar'
    )));

     $wp_customize->add_setting('vw_ecommerce_shop_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_topbar',
		'type'=> 'text'
	));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_ecommerce_shop_shipping', array( 
        'selector' => '.top-contact span.free', 
        'render_callback' => 'vw_ecommerce_shop_customize_partial_vw_ecommerce_shop_shipping', 
    ));

    $wp_customize->add_setting('vw_ecommerce_shop_shipping_icon',array(
		'default'	=> 'fa fa-car',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Ecommerce_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_ecommerce_shop_shipping_icon',array(
		'label'	=> __('Add Shipping Icon','vw-ecommerce-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_ecommerce_shop_topbar',
		'setting'	=> 'vw_ecommerce_shop_shipping_icon',
		'type'		=> 'icon'
	)));
	
	$wp_customize->add_setting('vw_ecommerce_shop_shipping',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_shipping',array(
		'label'	=> __('Add Shipping Text','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_topbar',
		'setting'	=> 'vw_ecommerce_shop_shipping',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_return_icon',array(
		'default'	=> 'fas fa-sync-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Ecommerce_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_ecommerce_shop_return_icon',array(
		'label'	=> __('Add Return Icon','vw-ecommerce-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_ecommerce_shop_topbar',
		'setting'	=> 'vw_ecommerce_shop_return_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_ecommerce_shop_return',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_return',array(
		'label'	=> __('Add Return Text','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_topbar',
		'setting'	=> 'vw_ecommerce_shop_return',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_payment_icon',array(
		'default'	=> 'fas fa-dollar-sign',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Ecommerce_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_ecommerce_shop_payment_icon',array(
		'label'	=> __('Add Payment Icon','vw-ecommerce-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_ecommerce_shop_topbar',
		'setting'	=> 'vw_ecommerce_shop_payment_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_ecommerce_shop_cash',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_cash',array(
		'label'	=> __('Add Payment Text','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_topbar',
		'setting'	=> 'vw_ecommerce_shop_cash',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_phone_no_icon',array(
		'default'	=> 'fa fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Ecommerce_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_ecommerce_shop_phone_no_icon',array(
		'label'	=> __('Add Phone Number Icon','vw-ecommerce-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_ecommerce_shop_topbar',
		'setting'	=> 'vw_ecommerce_shop_phone_no_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_ecommerce_shop_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'vw_ecommerce_shop_sanitize_phone_number'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_contact',array(
		'label'	=> __('Add Phone Number','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_topbar',
		'setting'	=> 'vw_ecommerce_shop_contact',
		'type'		=> 'text'
	));

	//Menus Settings
	$wp_customize->add_section( 'vw_ecommerce_shop_menu_section' , array(
    	'title' => __( 'Menus Settings', 'vw-ecommerce-shop' ),
		'panel' => 'vw_ecommerce_shop_homepage_panel'
	) );

	$wp_customize->add_setting('vw_ecommerce_shop_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_navigation_menu_font_weight',array(
        'default' => 700,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_menu_section',
        'choices' => array(
        	'100' => __('100','vw-ecommerce-shop'),
            '200' => __('200','vw-ecommerce-shop'),
            '300' => __('300','vw-ecommerce-shop'),
            '400' => __('400','vw-ecommerce-shop'),
            '500' => __('500','vw-ecommerce-shop'),
            '600' => __('600','vw-ecommerce-shop'),
            '700' => __('700','vw-ecommerce-shop'),
            '800' => __('800','vw-ecommerce-shop'),
            '900' => __('900','vw-ecommerce-shop'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('vw_ecommerce_shop_menu_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menu Text Transform','vw-ecommerce-shop'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-ecommerce-shop'),
            'Capitalize' => __('Capitalize','vw-ecommerce-shop'),
            'Lowercase' => __('Lowercase','vw-ecommerce-shop'),
        ),
		'section'=> 'vw_ecommerce_shop_menu_section',
	));

	$wp_customize->add_setting('vw_ecommerce_shop_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_menus_item_style',array(
        'type' => 'select',
        'section' => 'vw_ecommerce_shop_menu_section',
		'label' => __('Menu Item Hover Style','vw-ecommerce-shop'),
		'choices' => array(
            'None' => __('None','vw-ecommerce-shop'),
            'Zoom In' => __('Zoom In','vw-ecommerce-shop'),
        ),
	) );

	$wp_customize->add_setting('vw_ecommerce_shop_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_ecommerce_shop_header_menus_color', array(
		'label'    => __('Menus Color', 'vw-ecommerce-shop'),
		'section'  => 'vw_ecommerce_shop_menu_section',
	)));

	$wp_customize->add_setting('vw_ecommerce_shop_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_ecommerce_shop_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'vw-ecommerce-shop'),
		'section'  => 'vw_ecommerce_shop_menu_section',
	)));

	$wp_customize->add_setting('vw_ecommerce_shop_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_ecommerce_shop_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'vw-ecommerce-shop'),
		'section'  => 'vw_ecommerce_shop_menu_section',
	)));

	$wp_customize->add_setting('vw_ecommerce_shop_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_ecommerce_shop_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'vw-ecommerce-shop'),
		'section'  => 'vw_ecommerce_shop_menu_section',
	)));

	//Social links
	$wp_customize->add_section(
		'vw_ecommerce_shop_social_links', array(
			'title'		=>	__('Social Links', 'vw-ecommerce-shop'),
			'priority'	=>	null,
			'panel'		=>	'vw_ecommerce_shop_homepage_panel'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_social_icons',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_social_icons',array(
		'label' =>  __('Steps to setup social icons','vw-ecommerce-shop'),
		'description' => __('<p>1. Go to Dashboard >> Appearance >> Widgets</p>
			<p>2. Add Vw Social Icon Widget in Social Icon Widget area.</p>
			<p>3. Add social icons url and save.</p>','vw-ecommerce-shop'),
		'section'=> 'vw_ecommerce_shop_social_links',
		'type'=> 'hidden'
	));
	$wp_customize->add_setting('vw_ecommerce_shop_social_icon_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_social_icon_btn',array(
		'description' => "<a target='_blank' href='". admin_url('widgets.php') ." '>Setup Social Icons</a>",
		'section'=> 'vw_ecommerce_shop_social_links',
		'type'=> 'hidden'
	));

	//home page slider
    $wp_customize->add_section( 'vw_ecommerce_shop_slidersettings' , array(
      	'title'      => __( 'Slider Settings', 'vw-ecommerce-shop' ),
		'description' => __('Free theme has 3 slides options, For unlimited slides and more options <a class="go-pro-btn" target="blank" href="https://www.themescaliber.com/products/ecommerce-wordpress-theme">GO PRO</a>','vw-ecommerce-shop'),
      	'priority'   => null,
      	'panel' => 'vw_ecommerce_shop_homepage_panel'
    ) );

    $wp_customize->add_setting( 'vw_ecommerce_shop_slider_hide_show',
       array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-ecommerce-shop' ),
      'section' => 'vw_ecommerce_shop_slidersettings'
    )));

    $wp_customize->add_setting('vw_ecommerce_shop_slider_type',array(
        'default' => 'Default slider',
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	) );
	$wp_customize->add_control('vw_ecommerce_shop_slider_type', array(
        'type' => 'select',
        'label' => __('Slider Type','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_slidersettings',
        'choices' => array(
            'Default slider' => __('Default slider','vw-ecommerce-shop'),
            'Advance slider' => __('Advance slider','vw-ecommerce-shop'),
        ),
	));

	$wp_customize->add_setting('vw_ecommerce_shop_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','vw-ecommerce-shop'),
		'section'=> 'vw_ecommerce_shop_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_ecommerce_shop_advance_slider'
	));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_ecommerce_shop_slider_hide_show',array(
        'selector'        => '.slider .inner_carousel h1',
        'render_callback' => 'vw_ecommerce_shop_customize_partial_vw_ecommerce_shop_slider_hide_show',
    ));

    for ( $count = 1; $count <= 3; $count++ ) {
	    // Add color scheme setting and control.
	    $wp_customize->add_setting( 'vw_ecommerce_shop_slider_page' . $count, array(
	      'default'           => '',
	      'sanitize_callback' => 'vw_ecommerce_shop_sanitize_dropdown_pages'
	    ) );
	    $wp_customize->add_control( 'vw_ecommerce_shop_slider_page' . $count, array(
	      'label'    => __( 'Select Slide Image Page', 'vw-ecommerce-shop' ),
	      'description' => __( 'Size of image should be (900 x 367)', 'vw-ecommerce-shop' ),
	      'section'  => 'vw_ecommerce_shop_slidersettings',
	      'type'     => 'dropdown-pages',
	      'active_callback' => 'vw_ecommerce_shop_default_slider'
	    ) );
    }

    $wp_customize->add_setting('vw_ecommerce_shop_slider_button_text',array(
		'default'=> 'Read More',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Read More', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_ecommerce_shop_default_slider'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_top_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vw_ecommerce_shop_top_button_url',array(
		'label'	=> __('Add Button URL','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_slidersettings',
		'setting'	=> 'vw_ecommerce_shop_top_button_url',
		'type'	=> 'url',
		'active_callback' => 'vw_ecommerce_shop_default_slider'
	));

	$wp_customize->add_setting( 'vw_ecommerce_shop_slider_content_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_slider_content_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Content','vw-ecommerce-shop' ),
		'section' => 'vw_ecommerce_shop_slidersettings',
		'active_callback' => 'vw_ecommerce_shop_default_slider'
    )));

    //content layout
	$wp_customize->add_setting('vw_ecommerce_shop_slider_content_option',array(
        'default' => __('Left','vw-ecommerce-shop'),
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Ecommerce_Shop_Image_Radio_Control($wp_customize, 'vw_ecommerce_shop_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/images/slider-content3.png',
    ),'active_callback' => 'vw_ecommerce_shop_default_slider'
    )));

    //Slider content padding
    $wp_customize->add_setting('vw_ecommerce_shop_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in %. Example:20%','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_ecommerce_shop_default_slider'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in %. Example:20%','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_ecommerce_shop_default_slider'
	));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_ecommerce_shop_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_ecommerce_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_ecommerce_shop_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt Length','vw-ecommerce-shop' ),
		'section'     => 'vw_ecommerce_shop_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_ecommerce_shop_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),'active_callback' => 'vw_ecommerce_shop_default_slider'
	) );

	//Slider height
	$wp_customize->add_setting('vw_ecommerce_shop_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_slider_height',array(
		'label'	=> __('Slider Height','vw-ecommerce-shop'),
		'description'	=> __('Specify the slider height (px).','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_ecommerce_shop_default_slider'
	));

	$wp_customize->add_setting( 'vw_ecommerce_shop_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'vw_ecommerce_shop_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_ecommerce_shop_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-ecommerce-shop'),
		'section' => 'vw_ecommerce_shop_slidersettings',
		'type'  => 'number',
		'active_callback' => 'vw_ecommerce_shop_default_slider'
	) );

	//Opacity
	$wp_customize->add_setting('vw_ecommerce_shop_slider_opacity_color',array(
      'default'              => 0.7,
      'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_ecommerce_shop_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','vw-ecommerce-shop' ),
		'section'     => 'vw_ecommerce_shop_slidersettings',
		'type'        => 'select',
		'settings'    => 'vw_ecommerce_shop_slider_opacity_color',
		'choices' => array(
	      '0' =>  esc_attr(__('0','vw-ecommerce-shop')),
	      '0.1' =>  esc_attr(__('0.1','vw-ecommerce-shop')),
	      '0.2' =>  esc_attr(__('0.2','vw-ecommerce-shop')),
	      '0.3' =>  esc_attr(__('0.3','vw-ecommerce-shop')),
	      '0.4' =>  esc_attr(__('0.4','vw-ecommerce-shop')),
	      '0.5' =>  esc_attr(__('0.5','vw-ecommerce-shop')),
	      '0.6' =>  esc_attr(__('0.6','vw-ecommerce-shop')),
	      '0.7' =>  esc_attr(__('0.7','vw-ecommerce-shop')),
	      '0.8' =>  esc_attr(__('0.8','vw-ecommerce-shop')),
	      '0.9' =>  esc_attr(__('0.9','vw-ecommerce-shop')),
		),'active_callback' => 'vw_ecommerce_shop_default_slider'
	));

	$wp_customize->add_setting( 'vw_ecommerce_shop_slider_image_overlay',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_slider_image_overlay',array(
      	'label' => esc_html__( 'Show / Hide Slider Image Overlay','vw-ecommerce-shop' ),
      	'section' => 'vw_ecommerce_shop_slidersettings',
      	'active_callback' => 'vw_ecommerce_shop_default_slider'
    )));

    $wp_customize->add_setting('vw_ecommerce_shop_slider_image_overlay_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_ecommerce_shop_slider_image_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'vw-ecommerce-shop'),
		'section'  => 'vw_ecommerce_shop_slidersettings',
		'active_callback' => 'vw_ecommerce_shop_default_slider'
	)));

	//featured pro Section
	$wp_customize->add_section('vw_ecommerce_shop_featured_pro', array(
		'title'       => __('Featured Pro Section', 'vw-ecommerce-shop'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-ecommerce-shop'),
		'priority'    => null,
		'panel'       => 'vw_ecommerce_shop_homepage_panel',
	));

	$wp_customize->add_setting('vw_ecommerce_shop_featured_pro_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_featured_pro_text',array(
		'description' => __('<p>1. More options for featured pro section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for featured pro section.</p>','vw-ecommerce-shop'),
		'section'=> 'vw_ecommerce_shop_featured_pro',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_featured_pro_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_featured_pro_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_ECOMMERCE_SHOP_BUY_NOW).">More Info</a>",
		'section'=> 'vw_ecommerce_shop_featured_pro',
		'type'=> 'hidden'
	));

	//men product Section
	$wp_customize->add_section('vw_ecommerce_shop_men_product', array(
		'title'       => __('Men Product Section', 'vw-ecommerce-shop'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-ecommerce-shop'),
		'priority'    => null,
		'panel'       => 'vw_ecommerce_shop_homepage_panel',
	));

	$wp_customize->add_setting('vw_ecommerce_shop_men_product_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_men_product_text',array(
		'description' => __('<p>1. More options for men product section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for men product section.</p>','vw-ecommerce-shop'),
		'section'=> 'vw_ecommerce_shop_men_product',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_men_product_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_men_product_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_ECOMMERCE_SHOP_BUY_NOW).">More Info</a>",
		'section'=> 'vw_ecommerce_shop_men_product',
		'type'=> 'hidden'
	));

	//counter sale Section
	$wp_customize->add_section('vw_ecommerce_shop_sale_pack', array(
		'title'       => __('Counter Sale Section', 'vw-ecommerce-shop'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-ecommerce-shop'),
		'priority'    => null,
		'panel'       => 'vw_ecommerce_shop_homepage_panel',
	));

	$wp_customize->add_setting('vw_ecommerce_shop_sale_pack_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_sale_pack_text',array(
		'description' => __('<p>1. More options for counter sale section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for counter sale section.</p>','vw-ecommerce-shop'),
		'section'=> 'vw_ecommerce_shop_sale_pack',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_sale_pack_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_sale_pack_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_ECOMMERCE_SHOP_BUY_NOW).">More Info</a>",
		'section'=> 'vw_ecommerce_shop_sale_pack',
		'type'=> 'hidden'
	));

	//trending pro Section
	$wp_customize->add_section('vw_ecommerce_shop_trending_pro', array(
		'title'       => __('Trending Pro Section', 'vw-ecommerce-shop'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-ecommerce-shop'),
		'priority'    => null,
		'panel'       => 'vw_ecommerce_shop_homepage_panel',
	));

	$wp_customize->add_setting('vw_ecommerce_shop_trending_pro_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_trending_pro_text',array(
		'description' => __('<p>1. More options for trending pro section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for trending pro section.</p>','vw-ecommerce-shop'),
		'section'=> 'vw_ecommerce_shop_trending_pro',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_trending_pro_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_trending_pro_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_ECOMMERCE_SHOP_BUY_NOW).">More Info</a>",
		'section'=> 'vw_ecommerce_shop_trending_pro',
		'type'=> 'hidden'
	));

	//Trending Product
	$wp_customize->add_section('vw_ecommerce_shop_products',array(
		'title'	=> __('Trending Products','vw-ecommerce-shop'),
		'description' => __('For more options of the product section </br><a class="go-pro-btn" target="blank" href="https://www.themescaliber.com/products/ecommerce-wordpress-theme">GO PRO</a>','vw-ecommerce-shop'),
		'panel' => 'vw_ecommerce_shop_homepage_panel',
	));	

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial( 'vw_ecommerce_shop_maintitle', array( 
        'selector' => '.our-products h2', 
        'render_callback' => 'vw_ecommerce_shop_customize_partial_vw_ecommerce_shop_maintitle',
    ));
	
	$wp_customize->add_setting('vw_ecommerce_shop_maintitle',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_maintitle',array(
		'label'	=> __('Section Title','vw-ecommerce-shop'),
		'section'=> 'vw_ecommerce_shop_products',
		'setting'=> 'vw_ecommerce_shop_maintitle',
		'type'=> 'text'
	));	


	$wp_customize->add_setting( 'vw_ecommerce_shop_page', array(
		'default'           => '',
		'sanitize_callback' => 'vw_ecommerce_shop_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'vw_ecommerce_shop_page', array(
		'label'    => __( 'Select Page', 'vw-ecommerce-shop' ),
		'section'  => 'vw_ecommerce_shop_products',
		'type'     => 'dropdown-pages'
	));
	

	//services Section
	$wp_customize->add_section('vw_ecommerce_shop_services', array(
		'title'       => __('Services Section', 'vw-ecommerce-shop'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-ecommerce-shop'),
		'priority'    => null,
		'panel'       => 'vw_ecommerce_shop_homepage_panel',
	));

	$wp_customize->add_setting('vw_ecommerce_shop_services_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_services_text',array(
		'description' => __('<p>1. More options for services section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for services section.</p>','vw-ecommerce-shop'),
		'section'=> 'vw_ecommerce_shop_services',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_services_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_services_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_ECOMMERCE_SHOP_BUY_NOW).">More Info</a>",
		'section'=> 'vw_ecommerce_shop_services',
		'type'=> 'hidden'
	));

	//feedback sec Section
	$wp_customize->add_section('vw_ecommerce_shop_feedback_sec', array(
		'title'       => __('Men Product Section', 'vw-ecommerce-shop'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-ecommerce-shop'),
		'priority'    => null,
		'panel'       => 'vw_ecommerce_shop_homepage_panel',
	));

	$wp_customize->add_setting('vw_ecommerce_shop_feedback_sec_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_feedback_sec_text',array(
		'description' => __('<p>1. More options for feedback sec section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for feedback sec section.</p>','vw-ecommerce-shop'),
		'section'=> 'vw_ecommerce_shop_feedback_sec',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_feedback_sec_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_feedback_sec_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_ECOMMERCE_SHOP_BUY_NOW).">More Info</a>",
		'section'=> 'vw_ecommerce_shop_feedback_sec',
		'type'=> 'hidden'
	));

	//subscribe Section
	$wp_customize->add_section('vw_ecommerce_shop_subscribe', array(
		'title'       => __('Subscribe Section', 'vw-ecommerce-shop'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-ecommerce-shop'),
		'priority'    => null,
		'panel'       => 'vw_ecommerce_shop_homepage_panel',
	));

	$wp_customize->add_setting('vw_ecommerce_shop_subscribe_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_subscribe_text',array(
		'description' => __('<p>1. More options for subscribe section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for subscribe section.</p>','vw-ecommerce-shop'),
		'section'=> 'vw_ecommerce_shop_subscribe',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_subscribe_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_subscribe_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_ECOMMERCE_SHOP_BUY_NOW).">More Info</a>",
		'section'=> 'vw_ecommerce_shop_subscribe',
		'type'=> 'hidden'
	));

	//blog Section
	$wp_customize->add_section('vw_ecommerce_shop_blog', array(
		'title'       => __('Blog Section', 'vw-ecommerce-shop'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-ecommerce-shop'),
		'priority'    => null,
		'panel'       => 'vw_ecommerce_shop_homepage_panel',
	));

	$wp_customize->add_setting('vw_ecommerce_shop_blog_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_blog_text',array(
		'description' => __('<p>1. More options for blog section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for blog section.</p>','vw-ecommerce-shop'),
		'section'=> 'vw_ecommerce_shop_blog',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_blog_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_blog_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_ECOMMERCE_SHOP_BUY_NOW).">More Info</a>",
		'section'=> 'vw_ecommerce_shop_blog',
		'type'=> 'hidden'
	));

	//sponsers sec Section
	$wp_customize->add_section('vw_ecommerce_shop_sponsers_sec', array(
		'title'       => __('Sponsers Sec Section', 'vw-ecommerce-shop'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-ecommerce-shop'),
		'priority'    => null,
		'panel'       => 'vw_ecommerce_shop_homepage_panel',
	));

	$wp_customize->add_setting('vw_ecommerce_shop_sponsers_sec_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_sponsers_sec_text',array(
		'description' => __('<p>1. More options for sponsers sec section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for sponsers sec section.</p>','vw-ecommerce-shop'),
		'section'=> 'vw_ecommerce_shop_sponsers_sec',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_sponsers_sec_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_sponsers_sec_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_ECOMMERCE_SHOP_BUY_NOW).">More Info</a>",
		'section'=> 'vw_ecommerce_shop_sponsers_sec',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('vw_ecommerce_shop_footer',array(
		'title'	=> __('Footer','vw-ecommerce-shop'),
		'description' => __('For more options of the footer section <a class="go-pro-btn" target="blank" href="https://www.themescaliber.com/products/ecommerce-wordpress-theme">GO PRO</a>','vw-ecommerce-shop'),
		'panel' => 'vw_ecommerce_shop_homepage_panel',
	));	

	$wp_customize->add_setting( 'vw_ecommerce_shop_footer_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ));
    $wp_customize->add_control( new vw_ecommerce_shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_footer_hide_show',array(
		'label' => esc_html__( 'Show / Hide Footer','vw-ecommerce-shop' ),
		'section' => 'vw_ecommerce_shop_footer'
    )));

 	// font size
	$wp_customize->add_setting('vw_ecommerce_shop_button_footer_font_size',array(
		'default'=> 25,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_button_footer_font_size',array(
		'label'	=> __('Footer Heading Font Size','vw-ecommerce-shop'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_ecommerce_shop_footer',
	));

	$wp_customize->add_setting('vw_ecommerce_shop_button_footer_heading_letter_spacing',array(
		'default'=> 1,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_button_footer_heading_letter_spacing',array(
		'label'	=> __('Heading Letter Spacing','vw-ecommerce-shop'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'vw_ecommerce_shop_footer',
	));

	// text trasform
	$wp_customize->add_setting('vw_ecommerce_shop_button_footer_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_button_footer_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Heading Text Transform','vw-ecommerce-shop'),
		'choices' => array(
      'Uppercase' => __('Uppercase','vw-ecommerce-shop'),
      'Capitalize' => __('Capitalize','vw-ecommerce-shop'),
      'Lowercase' => __('Lowercase','vw-ecommerce-shop'),
    ),
		'section'=> 'vw_ecommerce_shop_footer',
	));

	$wp_customize->add_setting('vw_ecommerce_shop_footer_heading_weight',array(
        'default' => 600,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_footer_heading_weight',array(
        'type' => 'select',
        'label' => __('Heading Font Weight','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_footer',
        'choices' => array(
        	'100' => __('100','vw-ecommerce-shop'),
            '200' => __('200','vw-ecommerce-shop'),
            '300' => __('300','vw-ecommerce-shop'),
            '400' => __('400','vw-ecommerce-shop'),
            '500' => __('500','vw-ecommerce-shop'),
            '600' => __('600','vw-ecommerce-shop'),
            '700' => __('700','vw-ecommerce-shop'),
            '800' => __('800','vw-ecommerce-shop'),
            '900' => __('900','vw-ecommerce-shop'),
        ),
	) );

  	$wp_customize->add_setting('vw_ecommerce_shop_footer_template',array(
	    'default'	=> esc_html('vw-ecommerce-shop-footer-one'),
	    'sanitize_callback'	=> 'vw_ecommerce_shop_sanitize_choices'
  	));
 	$wp_customize->add_control('vw_ecommerce_shop_footer_template',array(
        'label'	=> esc_html__('Footer style','vw-ecommerce-shop'),
        'section'	=> 'vw_ecommerce_shop_footer',
        'setting'	=> 'vw_ecommerce_shop_footer_template',
        'type' => 'select',
        'choices' => array(
            'vw-ecommerce-shop-footer-one' => esc_html__('Style 1', 'vw-ecommerce-shop'),
            'vw-ecommerce-shop-footer-two' => esc_html__('Style 2', 'vw-ecommerce-shop'),
            'vw-ecommerce-shop-footer-three' => esc_html__('Style 3', 'vw-ecommerce-shop'),
            'vw-ecommerce-shop-footer-four' => esc_html__('Style 4', 'vw-ecommerce-shop'),
            'vw-ecommerce-shop-footer-five' => esc_html__('Style 5', 'vw-ecommerce-shop'),
        )
  	));

	$wp_customize->add_setting('vw_ecommerce_shop_footer_background_color', array(
		'default'           => '#222222',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_ecommerce_shop_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-ecommerce-shop'),
		'section'  => 'vw_ecommerce_shop_footer',
	)));

	$wp_customize->add_setting('vw_ecommerce_shop_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_ecommerce_shop_footer_background_image',array(
        'label' => __('Footer Background Image','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_footer'
	)));

	$wp_customize->add_setting('vw_ecommerce_shop_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','vw-ecommerce-shop'),
		'section' => 'vw_ecommerce_shop_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-ecommerce-shop' ),
			'center top'   => esc_html__( 'Top', 'vw-ecommerce-shop' ),
			'right top'   => esc_html__( 'Top Right', 'vw-ecommerce-shop' ),
			'left center'   => esc_html__( 'Left', 'vw-ecommerce-shop' ),
			'center center'   => esc_html__( 'Center', 'vw-ecommerce-shop' ),
			'right center'   => esc_html__( 'Right', 'vw-ecommerce-shop' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-ecommerce-shop' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-ecommerce-shop' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-ecommerce-shop' ),
		), 
	));

	// Footer
	$wp_customize->add_setting('vw_ecommerce_shop_img_footer',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_img_footer',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','vw-ecommerce-shop'),
		'choices' => array(
            'fixed' => __('fixed','vw-ecommerce-shop'),
            'scroll' => __('scroll','vw-ecommerce-shop'),
        ),
		'section'=> 'vw_ecommerce_shop_footer',
	));

	$wp_customize->add_setting('vw_ecommerce_shop_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_footer',
        'choices' => array(
        	'Left' => __('Left','vw-ecommerce-shop'),
            'Center' => __('Center','vw-ecommerce-shop'),
            'Right' => __('Right','vw-ecommerce-shop')
        ),
	) );

	$wp_customize->add_setting('vw_ecommerce_shop_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_footer',
        'choices' => array(
        	'Left' => __('Left','vw-ecommerce-shop'),
            'Center' => __('Center','vw-ecommerce-shop'),
            'Right' => __('Right','vw-ecommerce-shop')
        ),
	) );

	// footer padding
	$wp_customize->add_setting('vw_ecommerce_shop_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
    ),
		'section'=> 'vw_ecommerce_shop_footer',
		'type'=> 'text'
	));

	// footer social icon
  	$wp_customize->add_setting( 'vw_ecommerce_shop_footer_icon',array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_footer_icon',array(
		'label' => esc_html__( 'Show / Hide Footer Social Icon','vw-ecommerce-shop' ),
		'section' => 'vw_ecommerce_shop_footer'
    )));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_ecommerce_shop_footer_text', array( 
        'selector' => '.footer-2 .copyright p', 
        'render_callback' => 'vw_ecommerce_shop_customize_partial_vw_ecommerce_shop_footer_text', 
    ));

	$wp_customize->add_setting( 'vw_ecommerce_shop_copyright_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ));
    $wp_customize->add_control( new vw_ecommerce_shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_copyright_hide_show',array(
      'label' => esc_html__( 'Show / Hide Copyright','vw-ecommerce-shop' ),
      'section' => 'vw_ecommerce_shop_footer'
    )));

	$wp_customize->add_setting('vw_ecommerce_shop_copyright_background_color', array(
		'default'           => '#222222',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_ecommerce_shop_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'vw-ecommerce-shop'),
		'section'  => 'vw_ecommerce_shop_footer',
	)));
	
	$wp_customize->add_setting('vw_ecommerce_shop_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_ecommerce_shop_footer_text',array(
		'label'	=> __('Copyright Text','vw-ecommerce-shop'),
		'section'=> 'vw_ecommerce_shop_footer',
		'setting'=> 'vw_ecommerce_shop_footer_text',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_ecommerce_shop_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_copyright_alingment',array(
        'default' => __('center','vw-ecommerce-shop'),
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Ecommerce_Shop_Image_Radio_Control($wp_customize, 'vw_ecommerce_shop_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_footer',
        'settings' => 'vw_ecommerce_shop_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_ecommerce_shop_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_ecommerce_shop_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-ecommerce-shop' ),
      	'section' => 'vw_ecommerce_shop_footer'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_ecommerce_shop_scroll_top_icon', array( 
        'selector' => '.scrollup i', 
        'render_callback' => 'vw_ecommerce_shop_customize_partial_vw_ecommerce_shop_scroll_top_icon', 
    ));

    $wp_customize->add_setting('vw_ecommerce_shop_scroll_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Ecommerce_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_ecommerce_shop_scroll_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-ecommerce-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_ecommerce_shop_footer',
		'setting'	=> 'vw_ecommerce_shop_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_ecommerce_shop_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_ecommerce_shop_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_ecommerce_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_ecommerce_shop_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-ecommerce-shop' ),
		'section'     => 'vw_ecommerce_shop_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_ecommerce_shop_scroll_top_alignment',array(
        'default' => __('Right','vw-ecommerce-shop'),
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Ecommerce_Shop_Image_Radio_Control($wp_customize, 'vw_ecommerce_shop_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_footer',
        'settings' => 'vw_ecommerce_shop_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/images/layout3.png'
    ))));

	//Blog Post
	$wp_customize->add_panel( $VWEcommerceShopParentPanel );

	$BlogPostParentPanel = new VW_Ecommerce_Shop_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-ecommerce-shop' ),
		'panel' => 'vw_ecommerce_shop_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_ecommerce_shop_post_settings', array(
		'title' => __( 'Post Settings', 'vw-ecommerce-shop' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Blog layout
    $wp_customize->add_setting('vw_ecommerce_shop_blog_layout_option',array(
        'default' => __('Default','vw-ecommerce-shop'),
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Ecommerce_Shop_Image_Radio_Control($wp_customize, 'vw_ecommerce_shop_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/images/blog-layout3.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_ecommerce_shop_theme_options',array(
        'default' => __('Right Sidebar','vw-ecommerce-shop'),
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_ecommerce_shop_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-ecommerce-shop'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_post_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-ecommerce-shop'),
            'Right Sidebar' => __('Right Sidebar','vw-ecommerce-shop'),
            'One Column' => __('One Column','vw-ecommerce-shop'),
            'Three Columns' => __('Three Columns','vw-ecommerce-shop'),
            'Four Columns' => __('Four Columns','vw-ecommerce-shop'),
            'Grid Layout' => __('Grid Layout','vw-ecommerce-shop')
        ),
	));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_ecommerce_shop_toggle_postdate', array( 
        'selector' => '.post-main-box h2 a', 
        'render_callback' => 'vw_ecommerce_shop_customize_partial_vw_ecommerce_shop_toggle_postdate', 
    ));

	$wp_customize->add_setting( 'vw_ecommerce_shop_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_toggle_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','vw-ecommerce-shop' ),
        'section' => 'vw_ecommerce_shop_post_settings'
    )));

    $wp_customize->add_setting( 'vw_ecommerce_shop_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','vw-ecommerce-shop' ),
		'section' => 'vw_ecommerce_shop_post_settings'
    )));

    $wp_customize->add_setting( 'vw_ecommerce_shop_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_ecommerce_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_ecommerce_shop_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vw-ecommerce-shop' ),
		'section'     => 'vw_ecommerce_shop_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_ecommerce_shop_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_ecommerce_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_ecommerce_shop_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','vw-ecommerce-shop' ),
		'section'     => 'vw_ecommerce_shop_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('vw_ecommerce_shop_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'vw_ecommerce_shop_sanitize_choices'
	));
  	$wp_customize->add_control('vw_ecommerce_shop_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_post_settings',
		'choices' => array(
		'default' => __('Default','vw-ecommerce-shop'),
		'custom' => __('Custom Image Size','vw-ecommerce-shop'),
      ),
  	));

	$wp_customize->add_setting('vw_ecommerce_shop_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('vw_ecommerce_shop_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'vw-ecommerce-shop' ),),
		'section'=> 'vw_ecommerce_shop_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_ecommerce_shop_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('vw_ecommerce_shop_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'vw-ecommerce-shop' ),),
		'section'=> 'vw_ecommerce_shop_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_ecommerce_shop_blog_post_featured_image_dimension'
	));

    $wp_customize->add_setting( 'vw_ecommerce_shop_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_ecommerce_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_ecommerce_shop_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-ecommerce-shop' ),
		'section'     => 'vw_ecommerce_shop_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_ecommerce_shop_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_ecommerce_shop_meta_field_separator',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-ecommerce-shop'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-ecommerce-shop'),
		'section'=> 'vw_ecommerce_shop_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('vw_ecommerce_shop_blog_page_posts_settings',array(
        'default' => 'Into Blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_blog_page_posts_settings',array(
        'type' => 'select',
        'label' => __('Display Blog Posts','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_post_settings',
        'choices' => array(
        	'Into Blocks' => __('Into Blocks','vw-ecommerce-shop'),
            'Without Blocks' => __('Without Blocks','vw-ecommerce-shop')
        ),
	) );

    $wp_customize->add_setting('vw_ecommerce_shop_excerpt_settings',array(
        'default' => __('Excerpt','vw-ecommerce-shop'),
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
    ));
    $wp_customize->add_control('vw_ecommerce_shop_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_post_settings',
        'choices' => array(
            'Content' => __('Content','vw-ecommerce-shop'),
            'Excerpt' => __('Excerpt','vw-ecommerce-shop'),
            'No Content' => __('No Content','vw-ecommerce-shop')
        ),
    ) );

    $wp_customize->add_setting('vw_ecommerce_shop_excerpt_suffix',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_ecommerce_shop_excerpt_suffix',array(
        'label' => __('Add Excerpt Suffix','vw-ecommerce-shop'),
        'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-ecommerce-shop' ),
        ),
        'section'=> 'vw_ecommerce_shop_post_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting( 'vw_ecommerce_shop_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-ecommerce-shop' ),
      'section' => 'vw_ecommerce_shop_post_settings'
    )));

	$wp_customize->add_setting( 'vw_ecommerce_shop_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_ecommerce_shop_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_ecommerce_shop_blog_pagination_type', array(
        'section' => 'vw_ecommerce_shop_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-ecommerce-shop' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-ecommerce-shop' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-ecommerce-shop' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_ecommerce_shop_button_settings', array(
		'title' => __( 'Button Settings', 'vw-ecommerce-shop' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_ecommerce_shop_button_text', array( 
        'selector' => '.post-main-box .content-bttn a', 
        'render_callback' => 'vw_ecommerce_shop_customize_partial_vw_ecommerce_shop_button_text', 
    ));

	$wp_customize->add_setting('vw_ecommerce_shop_button_text',array(
		'default'=> 'Read More',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_button_text',array(
		'label'	=> __('Add Button Text','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Read More', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('vw_ecommerce_shop_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_button_font_size',array(
		'label'	=> __('Button Font Size','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_ecommerce_shop_button_settings',
	));

	$wp_customize->add_setting( 'vw_ecommerce_shop_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_ecommerce_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_ecommerce_shop_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-ecommerce-shop' ),
		'section'     => 'vw_ecommerce_shop_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_ecommerce_shop_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_ecommerce_shop_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('vw_ecommerce_shop_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','vw-ecommerce-shop'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-ecommerce-shop'),
            'Capitalize' => __('Capitalize','vw-ecommerce-shop'),
            'Lowercase' => __('Lowercase','vw-ecommerce-shop'),
        ),
		'section'=> 'vw_ecommerce_shop_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_ecommerce_shop_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-ecommerce-shop' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_ecommerce_shop_related_post_title', array( 
        'selector' => '.related-post h3', 
        'render_callback' => 'vw_ecommerce_shop_customize_partial_vw_ecommerce_shop_related_post_title', 
    ));

    $wp_customize->add_setting( 'vw_ecommerce_shop_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_related_post',array(
		'label' => esc_html__( 'Show / Hide Related Post','vw-ecommerce-shop' ),
		'section' => 'vw_ecommerce_shop_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_ecommerce_shop_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_ecommerce_shop_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_ecommerce_shop_sanitize_float'
	));
	$wp_customize->add_control('vw_ecommerce_shop_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'vw_ecommerce_shop_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_ecommerce_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_ecommerce_shop_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','vw-ecommerce-shop' ),
		'section'     => 'vw_ecommerce_shop_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'vw_ecommerce_shop_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Single Posts Settings
	$wp_customize->add_section( 'vw_ecommerce_shop_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-ecommerce-shop' ),
		'panel' => 'blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_ecommerce_shop_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Ecommerce_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_ecommerce_shop_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-ecommerce-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_ecommerce_shop_single_blog_settings',
		'setting'	=> 'vw_ecommerce_shop_single_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_ecommerce_shop_single_postdate',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_single_postdate',array(
	    'label' => esc_html__( 'Show / Hide Date','vw-ecommerce-shop' ),
	   'section' => 'vw_ecommerce_shop_single_blog_settings'
	)));

	$wp_customize->add_setting('vw_ecommerce_shop_single_author_icon',array(
		'default'	=> 'far fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Ecommerce_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_ecommerce_shop_single_author_icon',array(
		'label'	=> __('Add Author Icon','vw-ecommerce-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_ecommerce_shop_single_blog_settings',
		'setting'	=> 'vw_ecommerce_shop_single_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_ecommerce_shop_single_author',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_single_author',array(
	    'label' => esc_html__( 'Show / Hide Author','vw-ecommerce-shop' ),
	    'section' => 'vw_ecommerce_shop_single_blog_settings'
	)));

   	$wp_customize->add_setting('vw_ecommerce_shop_single_comments_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Ecommerce_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_ecommerce_shop_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-ecommerce-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_ecommerce_shop_single_blog_settings',
		'setting'	=> 'vw_ecommerce_shop_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_ecommerce_shop_single_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_single_comments',array(
	    'label' => esc_html__( 'Show / Hide Comments','vw-ecommerce-shop' ),
	    'section' => 'vw_ecommerce_shop_single_blog_settings'
	)));

  	$wp_customize->add_setting('vw_ecommerce_shop_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Ecommerce_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_ecommerce_shop_single_time_icon',array(
		'label'	=> __('Add Time Icon','vw-ecommerce-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_ecommerce_shop_single_blog_settings',
		'setting'	=> 'vw_ecommerce_shop_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_ecommerce_shop_single_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_single_time',array(
	    'label' => esc_html__( 'Show / Hide Time','vw-ecommerce-shop' ),
	    'section' => 'vw_ecommerce_shop_single_blog_settings'
	)));

	$wp_customize->add_setting( 'vw_ecommerce_shop_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','vw-ecommerce-shop' ),
		'section' => 'vw_ecommerce_shop_single_blog_settings'
    )));

    // Single Posts Category
  	$wp_customize->add_setting( 'vw_ecommerce_shop_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','vw-ecommerce-shop' ),
		'section' => 'vw_ecommerce_shop_single_blog_settings'
    )));

    $wp_customize->add_setting( 'vw_ecommerce_shop_singlepost_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_ecommerce_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_ecommerce_shop_singlepost_image_box_shadow', array(
		'label'       => esc_html__( 'Single post Image Box Shadow','vw-ecommerce-shop' ),
		'section'     => 'vw_ecommerce_shop_single_blog_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_ecommerce_shop_single_post_meta_field_separator',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-ecommerce-shop'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-ecommerce-shop'),
		'section'=> 'vw_ecommerce_shop_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_ecommerce_shop_toggle_tags',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','vw-ecommerce-shop' ),
		'section' => 'vw_ecommerce_shop_single_blog_settings'
    )));

	$wp_customize->add_setting( 'vw_ecommerce_shop_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Show / Hide Post Navigation','vw-ecommerce-shop' ),
		'section' => 'vw_ecommerce_shop_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_ecommerce_shop_single_blog_prev_navigation_text',array(
		'default'=> 'PREVIOUS',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_single_blog_next_navigation_text',array(
		'default'=> 'NEXT',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_single_blog_comment_title',array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_ecommerce_shop_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_single_blog_comment_button_text',array(
		'default'=> 'Post Comment',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_ecommerce_shop_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in %. Example:50%','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_single_blog_settings',
		'type'=> 'text'
	));

	// Grid layout setting
	$wp_customize->add_section( 'vw_ecommerce_shop_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'vw-ecommerce-shop' ),
		'panel' => 'blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_ecommerce_shop_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Ecommerce_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_ecommerce_shop_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-ecommerce-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_ecommerce_shop_grid_layout_settings',
		'setting'	=> 'vw_ecommerce_shop_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_ecommerce_shop_grid_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_grid_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','vw-ecommerce-shop' ),
        'section' => 'vw_ecommerce_shop_grid_layout_settings'
    )));

	$wp_customize->add_setting('vw_ecommerce_shop_grid_author_icon',array(
		'default'	=> 'far fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Ecommerce_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_ecommerce_shop_grid_author_icon',array(
		'label'	=> __('Add Author Icon','vw-ecommerce-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_ecommerce_shop_grid_layout_settings',
		'setting'	=> 'vw_ecommerce_shop_grid_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_ecommerce_shop_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-ecommerce-shop' ),
		'section' => 'vw_ecommerce_shop_grid_layout_settings'
    )));

   	$wp_customize->add_setting('vw_ecommerce_shop_grid_comments_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Ecommerce_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_ecommerce_shop_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-ecommerce-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_ecommerce_shop_grid_layout_settings',
		'setting'	=> 'vw_ecommerce_shop_grid_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_ecommerce_shop_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-ecommerce-shop' ),
		'section' => 'vw_ecommerce_shop_grid_layout_settings'
    )));

    $wp_customize->add_setting( 'vw_ecommerce_shop_grid_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
	));
  	$wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_grid_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','vw-ecommerce-shop' ),
		'section' => 'vw_ecommerce_shop_grid_layout_settings'
  	)));

 	$wp_customize->add_setting('vw_ecommerce_shop_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-ecommerce-shop'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-ecommerce-shop'),
		'section'=> 'vw_ecommerce_shop_grid_layout_settings',
		'type'=> 'text'
	));  

	 $wp_customize->add_setting('vw_ecommerce_shop_display_grid_posts_settings',array(
	    'default' => 'Into Blocks',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_display_grid_posts_settings',array(
	    'type' => 'select',
	    'label' => __('Display Grid Posts','vw-ecommerce-shop'),
	    'section' => 'vw_ecommerce_shop_grid_layout_settings',
	    'choices' => array(
	    	'Into Blocks' => __('Into Blocks','vw-ecommerce-shop'),
	      'Without Blocks' => __('Without Blocks','vw-ecommerce-shop')
      ),
	) );

	$wp_customize->add_setting('vw_ecommerce_shop_grid_button_text',array(
		'default'=> esc_html__('Read More','vw-ecommerce-shop'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_grid_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-ecommerce-shop'),
		'input_attrs' => array(
        'placeholder' => esc_html__( 'Read More', 'vw-ecommerce-shop' ),
      ),
		'section'=> 'vw_ecommerce_shop_grid_layout_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_grid_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_grid_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_grid_layout_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_grid_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_grid_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Grid Post Content','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_grid_layout_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','vw-ecommerce-shop'),
            'Excerpt' => esc_html__('Excerpt','vw-ecommerce-shop'),
            'No Content' => esc_html__('No Content','vw-ecommerce-shop')
        ),
	) );

	$wp_customize->add_setting( 'vw_ecommerce_shop_grid_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_ecommerce_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_ecommerce_shop_grid_featured_image_border_radius', array(
		'label'       => esc_html__( 'Grid Featured Image Border Radius','vw-ecommerce-shop' ),
		'section'     => 'vw_ecommerce_shop_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_ecommerce_shop_grid_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_ecommerce_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_ecommerce_shop_grid_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Grid Featured Image Box Shadow','vw-ecommerce-shop' ),
		'section'     => 'vw_ecommerce_shop_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

   // other settings
	$OtherParentPanel = new VW_Ecommerce_Shop_WP_Customize_Panel( $wp_customize, 'vw_ecommerce_shop_other_panel_id', array(
		'title' => __( 'Others Settings', 'vw-ecommerce-shop' ),
		'panel' => 'vw_ecommerce_shop_panel_id',
	));

	$wp_customize->add_panel( $OtherParentPanel );

	$wp_customize->add_section( 'vw_ecommerce_shop_left_right', array(
    	'title'      => __( 'General Settings', 'vw-ecommerce-shop' ),
		'priority'   => 30,
		'panel' => 'vw_ecommerce_shop_other_panel_id'
	) );

	$wp_customize->add_setting('vw_ecommerce_shop_width_option',array(
        'default' => __('Full Width','vw-ecommerce-shop'),
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Ecommerce_Shop_Image_Radio_Control($wp_customize, 'vw_ecommerce_shop_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-ecommerce-shop'),
        'description' => __('Here you can change the width layout of Website.','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('vw_ecommerce_shop_page_layout',array(
        'default' => __('One Column','vw-ecommerce-shop'),
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-ecommerce-shop'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-ecommerce-shop'),
            'Right Sidebar' => __('Right Sidebar','vw-ecommerce-shop'),
            'One Column' => __('One Column','vw-ecommerce-shop')
        ),
	) );

	$wp_customize->add_setting( 'vw_ecommerce_shop_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_single_page_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Page Breadcrumb','vw-ecommerce-shop' ),
		'section' => 'vw_ecommerce_shop_left_right'
    )));

    $wp_customize->add_setting('vw_ecommerce_shop_bradcrumbs_alignment',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_bradcrumbs_alignment',array(
        'type' => 'select',
        'label' => __('Bradcrumbs Alignment','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_left_right',
        'choices' => array(
            'Left' => __('Left','vw-ecommerce-shop'),
            'Right' => __('Right','vw-ecommerce-shop'),
            'Center' => __('Center','vw-ecommerce-shop'),
        ),
	) );

	//Wow Animation
	$wp_customize->add_setting( 'vw_ecommerce_shop_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_animation',array(
        'label' => esc_html__( 'Show / Hide Animations','vw-ecommerce-shop' ),
        'description' => __('Here you can disable overall site animation effect','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_left_right'
    )));

    $wp_customize->add_setting('vw_ecommerce_shop_reset_all_settings',array(
      'sanitize_callback'	=> 'sanitize_text_field',
   	));
   	$wp_customize->add_control(new VW_Ecommerce_Shop_Reset_Custom_Control($wp_customize, 'vw_ecommerce_shop_reset_all_settings',array(
      'type' => 'reset_control',
      'label' => __('Reset All Settings', 'vw-ecommerce-shop'),
      'description' => 'vw_ecommerce_shop_reset_all_settings',
      'section' => 'vw_ecommerce_shop_left_right'
   	)));

    //Pre-Loader
	$wp_customize->add_setting( 'vw_ecommerce_shop_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_loader_enable',array(
        'label' => esc_html__( 'Show / Hide Pre-Loader','vw-ecommerce-shop' ),
        'section' => 'vw_ecommerce_shop_left_right'
    )));

    $wp_customize->add_setting('vw_ecommerce_shop_preloader_bg_color', array(
		'default'           => '#e1261c',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_ecommerce_shop_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-ecommerce-shop'),
		'section'  => 'vw_ecommerce_shop_left_right',
	)));

	$wp_customize->add_setting('vw_ecommerce_shop_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_ecommerce_shop_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-ecommerce-shop'),
		'section'  => 'vw_ecommerce_shop_left_right',
	)));

	$wp_customize->add_setting('vw_ecommerce_shop_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_ecommerce_shop_preloader_bg_img',array(
        'label' => __('Preloader Background Image','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_left_right'
	)));
 
	
    //404 Page Setting
	$wp_customize->add_section('vw_ecommerce_shop_404_page',array(
		'title'	=> __('404 Page Settings','vw-ecommerce-shop'),
		'panel' => 'vw_ecommerce_shop_other_panel_id',
	));	

	$wp_customize->add_setting('vw_ecommerce_shop_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_ecommerce_shop_404_page_title',array(
		'label'	=> __('Add Title','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_ecommerce_shop_404_page_content',array(
		'label'	=> __('Add Text','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('vw_ecommerce_shop_no_results_page',array(
		'title'	=> __('No Results Page Settings','vw-ecommerce-shop'),
		'panel' => 'vw_ecommerce_shop_other_panel_id',
	));	

	$wp_customize->add_setting('vw_ecommerce_shop_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_ecommerce_shop_no_results_page_title',array(
		'label'	=> __('Add Title','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_ecommerce_shop_no_results_page_content',array(
		'label'	=> __('Add Text','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_ecommerce_shop_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-ecommerce-shop'),
		'panel' => 'vw_ecommerce_shop_other_panel_id',
	));	

	$wp_customize->add_setting('vw_ecommerce_shop_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_social_icon_width',array(
		'label'	=> __('Icon Width','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_social_icon_height',array(
		'label'	=> __('Icon Height','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_ecommerce_shop_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_ecommerce_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_ecommerce_shop_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-ecommerce-shop' ),
		'section'     => 'vw_ecommerce_shop_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_ecommerce_shop_responsive_media',array(
		'title'	=> __('Responsive Media','vw-ecommerce-shop'),
		'panel' => 'vw_ecommerce_shop_other_panel_id',
	));

	$wp_customize->add_setting('vw_ecommerce_shop_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_ecommerce_shop_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'vw-ecommerce-shop'),
		'section'  => 'vw_ecommerce_shop_responsive_media',
	)));

	$wp_customize->add_setting( 'vw_ecommerce_shop_responsive_preloader_hide',array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_responsive_preloader_hide',array(
        'label' => esc_html__( 'Show / Hide Preloader','vw-ecommerce-shop' ),
        'section' => 'vw_ecommerce_shop_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_ecommerce_shop_resp_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-ecommerce-shop' ),
      'section' => 'vw_ecommerce_shop_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_ecommerce_shop_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_stickyheader_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sticky Header','vw-ecommerce-shop' ),
      'section' => 'vw_ecommerce_shop_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_ecommerce_shop_resp_slider_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-ecommerce-shop' ),
      'section' => 'vw_ecommerce_shop_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_ecommerce_shop_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-ecommerce-shop' ),
      'section' => 'vw_ecommerce_shop_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_ecommerce_shop_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-ecommerce-shop' ),
      'section' => 'vw_ecommerce_shop_responsive_media'
    )));

    $wp_customize->add_setting('vw_ecommerce_shop_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Ecommerce_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_ecommerce_shop_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-ecommerce-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_ecommerce_shop_responsive_media',
		'setting'	=> 'vw_ecommerce_shop_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_ecommerce_shop_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Ecommerce_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_ecommerce_shop_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-ecommerce-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_ecommerce_shop_responsive_media',
		'setting'	=> 'vw_ecommerce_shop_res_close_menu_icon',
		'type'		=> 'icon'
	)));

   //Woocommerce settings
	$wp_customize->add_section('vw_ecommerce_shop_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-ecommerce-shop'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

    //Shop Page Featured Image
	$wp_customize->add_setting( 'vw_ecommerce_shop_shop_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_ecommerce_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_ecommerce_shop_shop_featured_image_border_radius', array(
		'label'       => esc_html__( 'Shop Page Featured Image Border Radius','vw-ecommerce-shop' ),
		'section'     => 'vw_ecommerce_shop_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_ecommerce_shop_shop_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_ecommerce_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_ecommerce_shop_shop_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Shop Page Featured Image Box Shadow','vw-ecommerce-shop' ),
		'section'     => 'vw_ecommerce_shop_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_ecommerce_shop_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product .sidebar', 
		'render_callback' => 'vw_ecommerce_shop_customize_partial_vw_ecommerce_shop_woocommerce_shop_page_sidebar', ) );

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_ecommerce_shop_woocommerce_shop_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Shop Page Sidebar','vw-ecommerce-shop' ),
		'section' => 'vw_ecommerce_shop_woocommerce_section'
    )));

    $wp_customize->add_setting('vw_ecommerce_shop_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-ecommerce-shop'),
            'Right Sidebar' => __('Right Sidebar','vw-ecommerce-shop'),
        ),
	) );

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_ecommerce_shop_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product .sidebar', 
		'render_callback' => 'vw_ecommerce_shop_customize_partial_vw_ecommerce_shop_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_ecommerce_shop_woocommerce_single_product_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','vw-ecommerce-shop' ),
		'section' => 'vw_ecommerce_shop_woocommerce_section'
    )));

    $wp_customize->add_setting('vw_ecommerce_shop_single_product_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_single_product_layout',array(
        'type' => 'select',
        'label' => __('Single Product Sidebar Layout','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-ecommerce-shop'),
            'Right Sidebar' => __('Right Sidebar','vw-ecommerce-shop'),
        ),
	) );

    //Products per page
    $wp_customize->add_setting('vw_ecommerce_shop_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_ecommerce_shop_sanitize_float'
	));
	$wp_customize->add_control('vw_ecommerce_shop_products_per_page',array(
		'label'	=> __('Products Per Page','vw-ecommerce-shop'),
		'description' => __('Display on shop page','vw-ecommerce-shop'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_ecommerce_shop_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_ecommerce_shop_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_products_per_row',array(
		'label'	=> __('Products Per Row','vw-ecommerce-shop'),
		'description' => __('Display on shop page','vw-ecommerce-shop'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_ecommerce_shop_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_ecommerce_shop_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_ecommerce_shop_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_ecommerce_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_ecommerce_shop_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-ecommerce-shop' ),
		'section'     => 'vw_ecommerce_shop_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_ecommerce_shop_products_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_ecommerce_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_ecommerce_shop_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-ecommerce-shop' ),
		'section'     => 'vw_ecommerce_shop_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_ecommerce_shop_products_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_ecommerce_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_ecommerce_shop_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-ecommerce-shop' ),
		'section'     => 'vw_ecommerce_shop_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products Sale Badge
	$wp_customize->add_setting('vw_ecommerce_shop_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_ecommerce_shop_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','vw-ecommerce-shop'),
        'section' => 'vw_ecommerce_shop_woocommerce_section',
        'choices' => array(
            'left' => __('Left','vw-ecommerce-shop'),
            'right' => __('Right','vw-ecommerce-shop'),
        ),
	) );

	$wp_customize->add_setting('vw_ecommerce_shop_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_ecommerce_shop_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','vw-ecommerce-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-ecommerce-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-ecommerce-shop' ),
        ),
		'section'=> 'vw_ecommerce_shop_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_ecommerce_shop_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_ecommerce_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_ecommerce_shop_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vw-ecommerce-shop' ),
		'section'     => 'vw_ecommerce_shop_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

  	// Related Product
    $wp_customize->add_setting( 'vw_ecommerce_shop_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_ecommerce_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Ecommerce_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_ecommerce_shop_related_product_show_hide',array(
        'label' => esc_html__( 'Show / Hide Related product','vw-ecommerce-shop' ),
        'section' => 'vw_ecommerce_shop_woocommerce_section'
    )));

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Ecommerce_Shop_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Ecommerce_Shop_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_ecommerce_shop_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Ecommerce_Shop_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_ecommerce_shop_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Ecommerce_Shop_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_ecommerce_shop_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_ecommerce_shop_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_ecommerce_shop_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Ecommerce_Shop_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Ecommerce_Shop_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new VW_Ecommerce_Shop_Customize_Section_Pro($manager,'vw_ecommerce_shop_upgrade_pro_link', array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW Ecommerce Pro', 'vw-ecommerce-shop' ),
			'pro_text' => esc_html__( 'Upgrade Pro','vw-ecommerce-shop' ),
			'pro_url'  => esc_url('https://www.themescaliber.com/products/ecommerce-wordpress-theme')
		)));

		// Register sections.
		$manager->add_section(new VW_Ecommerce_Shop_Customize_Section_Pro($manager,'vw_ecommerce_shop_get_started_link',array(
			'priority'   =>1,
			'title'    => esc_html__( 'Documentation', 'vw-ecommerce-shop' ),
			'pro_text' => esc_html__( 'Docs', 'vw-ecommerce-shop' ),
			'pro_url'  => esc_url( 'https://preview.themescaliber.com/doc/free-ecommerce/')
		)));

		$manager->add_section(new VW_Ecommerce_Shop_Customize_Section_Pro($manager,'vw_ecommerce_shop_get_bundle_link',array(
			'priority'   => 1,
			'title'    => esc_html__( '250+ Themes Bundle at $99', 'vw-ecommerce-shop' ),
			'pro_text' => esc_html__( 'Get Bundle', 'vw-ecommerce-shop' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/products/wp-theme-bundle')
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-ecommerce-shop-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-ecommerce-shop-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );

		wp_localize_script(
		'vw-ecommerce-shop-customize-controls',
		'vw_ecommerce_shop_customizer_params',
		array(
			'ajaxurl' =>	admin_url( 'admin-ajax.php' )
		));
	}
}

// Doing this customizer thang!
VW_Ecommerce_Shop_Customize::get_instance();