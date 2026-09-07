<?php
//about theme info
add_action( 'admin_menu', 'vw_ecommerce_shop_gettingstarted' );
function vw_ecommerce_shop_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Ecommerce Theme', 'vw-ecommerce-shop'), esc_html__('Theme Demo Import', 'vw-ecommerce-shop'), 'edit_theme_options', 'vw_ecommerce_shop_guide', 'vw_ecommerce_shop_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_ecommerce_shop_admin_theme_style() {
   wp_enqueue_style('vw-ecommerce-shop-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getting-started/getting-started.css');
   wp_enqueue_script('vw-ecommerce-shop-tabs', esc_url(get_template_directory_uri()) . '/inc/getting-started/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_ecommerce_shop_admin_theme_style');

//guidline for about theme
function vw_ecommerce_shop_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$vw_ecommerce_shop_theme = wp_get_theme( 'vw-ecommerce-shop' );
?>

<div class="wrapper-info">
    <div class="tab-sec">
		<div class="tab">
		    <div class="demo-content">
				<h3><?php esc_html_e( 'Click the below run importer button to import demo content', 'vw-ecommerce-shop' ); ?></h3>
				<?php
					/* Get Started. */
					require get_parent_theme_file_path( '/inc/getting-started/demo-content.php');
					?>
			</div>
			<button role="tab" class="tablinks home" onclick="vw_ecommerce_shop_openCity(event, 'tc_index')"><?php esc_html_e( 'Free Theme Information', 'vw-ecommerce-shop' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="vw_ecommerce_shop_openCity(event, 'tc_pro')"><?php esc_html_e( 'Premium Theme Information', 'vw-ecommerce-shop' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="vw_ecommerce_shop_openCity(event, 'tc_create')"><?php esc_html_e( 'Theme Support', 'vw-ecommerce-shop' ); ?></button>
		</div>

		<div  id="tc_index" class="tabcontent open">
			<h2><?php esc_html_e( 'Welcome to VW Ecommerce Shop WordPress Theme', 'vw-ecommerce-shop' ); ?> <span class="version">Version: <?php echo esc_html($vw_ecommerce_shop_theme['Version']);?></span></h2>
			<hr>
			<div class="info-link">
				<a href="<?php echo esc_url( VW_ECOMMERCE_SHOP_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-ecommerce-shop' ); ?></a>
				<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-ecommerce-shop'); ?></a>
				<a class="get-pro" href="<?php echo esc_url( VW_ECOMMERCE_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-ecommerce-shop'); ?></a>
			</div>
			<div class="col-tc-6">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/screenshot.png" alt="" />
			</div>
			<div class="col-tc-6">
			<P><?php esc_html_e( 'VW E-commerce Shop theme is the one that can check all the boxes relating to every need of your store. Our multipurpose E-commerce WordPress theme is social media integrated & highly responsive. It is built on bootstrap 4 with using clean coding standards. It is cross-browser & woo commerce compatible, It has unique post formats, custom menu, typography features, Theme Options, product catalog, shopping cart, multiple customization options, has Call to action button, its SEO & user-friendly and works at its optimal best across all platforms. You may be a business owner, electronic, interior, car workshop, barber shop, baby store, affiliate store, toy store, decorative stores,kitchen online shop, home appliances site, informative firm, interior, car workshop, make up accessories, retail, online store, shopping, digital marketplace, Home Exercise Equipment, Natural Feminine Care Products, organic pet food, hand sanitizers, artist, restaurant owner, construction agency, healthcare firm, digital marketing agency, blogger, corporate business, freelancers, shopkeeper, Skateboards, Subscription Boxes, retail Store, book depot, E bazar, jewelry shop, eCommerce Market, online food delivering website, Technology store, gadgets store, online apparel, fashion accessories store, sports equipment shop, digital Storefront, online bookstore, mobile & tablet store, apparel store, fashion store, shoes store, watch, sport equipment, furniture shop, supermarket, grocery store, sport store, handbags store, cosmetics shop, electronics, minimal, online store, woothemes, jewellery store and etc. You can set all kinds of stores up with much ease using our theme, as it is made for people like you. You could be a freelancer or a corporate entity or a sole proprietor. Our theme will boost your business and improve your revenue with the aid of seamless features and exclusive functionalities. Running an online E-commerce store along with your physical store is a hectic task. Your trouble is doubled, when you are not only supposed to take care of the physical presence of the store but you are also required to bring the online store up to speed. That is much like running two branches of a single business. This theme is compatible with YITH WooCommerce Wishlist, WooCommerce Variation Swatches and many more popular plugins. You cannot possibly put your faith into sub-standard things and expect results. E-commerce store should have a theme that is both impressive and lucrative. This medium attracts customers from so many platforms that it becomes important for the theme and the webpage to perform at its 100% at all times.', 'vw-ecommerce-shop' ); ?></P></div>
    	</div>

		

		<div id="tc_pro" class="tabcontent open">
			<h3><?php esc_html_e( 'VW Ecommerce Shop Theme Information', 'vw-ecommerce-shop' ); ?></h3>
			<hr>
			<div class="pro-image">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/Ecommerce-Responsive-min.png" alt="" />
			</div>
			<div class="info-link-pro">
				<p><a href="<?php echo esc_url( VW_ECOMMERCE_SHOP_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'vw-ecommerce-shop' ); ?></a></p>
				<p><a href="<?php echo esc_url( VW_ECOMMERCE_SHOP_LIVE_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Live Demo', 'vw-ecommerce-shop' ); ?></a></p>
				<p><a href="<?php echo esc_url( VW_ECOMMERCE_SHOP_PRO_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Pro Documentation', 'vw-ecommerce-shop' ); ?></a></p>
			</div>
			<div class="col-pro-5">
				<h4><?php esc_html_e( 'VW Ecommerce Shop Pro Theme', 'vw-ecommerce-shop' ); ?></h4>
				<P><?php esc_html_e( 'E-commerce WordPress theme is for the people of the business world. Setting up a store is a tricky task and an online store requires suitable E-commerce WordPress theme. Not any theme is going to do the job, in the online world. You are needed to have not only a stunning website but you are also required to have a webpage that user-friendly & functional.Our Best woommerce theme is here to save you all from the miserable themes. We only provide you with the best product possible and we have never settled for anything lesser than that.', 'vw-ecommerce-shop' ); ?></P>
			</div>
			<div class="col-pro-6">
				<h4><?php esc_html_e( 'Theme Features', 'vw-ecommerce-shop' ); ?></h4>
				<ul>
					<li><?php esc_html_e( 'Theme Customization', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Responsive Design', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Logo Upload', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Social Media Links', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Slider Settings', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Number of Slides', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Template Pages', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Home Page Template', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Theme sections', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Contact us Page Template', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Blog Templates & Layout', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Page Templates & Layout', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Color Pallete For Particular Sections ', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Global Color Option', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Section Reordering', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Demo Importer', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Allow To Set Site Title, Tagline, Logo', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Enable Disable Options On All Sections, Logo', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Full Documentation', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Latest WordPress Compatibility', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Woo-Commerce Compatibility', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Support 3rd Party Plugins', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Secure and Optimized Code', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Exclusive Functionalities', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Section Enable / Disable', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Section Google Font Choices', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Gallery', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Simple & Mega Menu Option', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Support to add custom CSS / JS', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Shortcodes', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Custom Background, Colors, Header, Logo & Menu', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Premium Membership', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Budget Friendly Value', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Priority Error Fixing', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Custom Feature Addition', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'All Access Theme Pass', 'vw-ecommerce-shop' ); ?></li>
					<li><?php esc_html_e( 'Seamless Customer Support', 'vw-ecommerce-shop' ); ?></li>
				</ul>
			</div>
		</div>

		<div id="tc_create" class="tabcontent">
			<h3><?php esc_html_e( 'Support', 'vw-ecommerce-shop' ); ?></h3>
			<hr>
			<div class="tab-cont">
		  		<h4><?php esc_html_e( 'Need Support?', 'vw-ecommerce-shop' ); ?></h4>
				<div class="info-link-support">
					<P><?php esc_html_e( 'Our team is obliged to help you in every way possible whenever you face any type of difficulties and doubts.', 'vw-ecommerce-shop' ); ?></P>
					<a href="<?php echo esc_url( VW_ECOMMERCE_SHOP_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support Forum', 'vw-ecommerce-shop' ); ?></a>
				</div>
			</div>
			<div class="tab-cont">
				<h4><?php esc_html_e('Reviews', 'vw-ecommerce-shop'); ?></h4>
				<div class="info-link-support">
					<P><?php esc_html_e( 'It is commendable to have such a theme inculcated with amazing features and robust functionalities. I feel grateful to recommend this theme to one and all.', 'vw-ecommerce-shop' ); ?></P>
					<a href="<?php echo esc_url( VW_ECOMMERCE_SHOP_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-ecommerce-shop'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>