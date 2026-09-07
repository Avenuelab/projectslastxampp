<div class="theme-offer">
	<?php
        // Check if the demo import has been completed
        $vw_ecommerce_shop_demo_import_completed = get_option('vw_ecommerce_shop_demo_import_completed', false);

        // If the demo import is completed, display the "View Site" button
        if ($vw_ecommerce_shop_demo_import_completed) {
        echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'vw-ecommerce-shop') . '</p>';
        echo '<span><a href="' . esc_url(home_url()) . '" class="button button-primary site-btn" target="_blank">' . esc_html__('VIEW SITE', 'vw-ecommerce-shop') . '</a></span>';
        }

		//POST and update the customizer and other related data of POLITICAL CAMPAIGN
        if (isset($_POST['submit'])) {

             // Check if woocommerce is installed and activated
            if (!is_plugin_active('woocommerce/woocommerce.php')) {
                // Install the plugin if it doesn't exist
                $vw_ecommerce_shop_plugin_slug = 'woocommerce';
                $vw_ecommerce_shop_plugin_file = 'woocommerce/woocommerce.php';
    
                // Check if plugin is installed
                $vw_ecommerce_shop_installed_plugins = get_plugins();
                if (!isset($vw_ecommerce_shop_installed_plugins[$vw_ecommerce_shop_plugin_file])) {
                    include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
                    include_once(ABSPATH . 'wp-admin/includes/file.php');
                    include_once(ABSPATH . 'wp-admin/includes/misc.php');
                    include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');
    
                    // Install the plugin
                    $vw_ecommerce_shop_upgrader = new Plugin_Upgrader();
                    $vw_ecommerce_shop_upgrader->install('https://downloads.wordpress.org/plugin/woocommerce.latest-stable.zip');
                }
                // Activate the plugin
                activate_plugin($vw_ecommerce_shop_plugin_file);
            }
  


            // ------- Create Nav Menu --------
            $vw_ecommerce_shop_menuname = 'Main Menus';
            $vw_ecommerce_shop_bpmenulocation = 'primary';
            $vw_ecommerce_shop_menu_exists = wp_get_nav_menu_object($vw_ecommerce_shop_menuname);

            if (!$vw_ecommerce_shop_menu_exists) {
                $vw_ecommerce_shop_menu_id = wp_create_nav_menu($vw_ecommerce_shop_menuname);

                // Create Home Page
                $vw_ecommerce_shop_home_title = 'Home';
                $vw_ecommerce_shop_home = array(
                    'post_type' => 'page',
                    'post_title' => $vw_ecommerce_shop_home_title,
                    'post_content' => '',
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'home'
                );
                $vw_ecommerce_shop_home_id = wp_insert_post($vw_ecommerce_shop_home);
                // Assign Home Page Template
                add_post_meta($vw_ecommerce_shop_home_id, '_wp_page_template', 'page-template/custom-home-page.php');
                // Update options to set Home Page as the front page
                update_option('page_on_front', $vw_ecommerce_shop_home_id);
                update_option('show_on_front', 'page');
                // Add Home Page to Menu
                wp_update_nav_menu_item($vw_ecommerce_shop_menu_id, 0, array(
                    'menu-item-title' => __('Home', 'vw-ecommerce-shop'),
                    'menu-item-classes' => 'home',
                    'menu-item-url' => home_url('/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $vw_ecommerce_shop_home_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));


                // Create Pages Page with Dummy Content
                $vw_ecommerce_shop_pages_title = 'Pages';
                $vw_ecommerce_shop_pages_content = '
                <p>Explore all the pages we have on our website. Find information about our services, company, and more.</p>

                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>

                  All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
                $vw_ecommerce_shop_pages = array(
                    'post_type' => 'page',
                    'post_title' => $vw_ecommerce_shop_pages_title,
                    'post_content' => $vw_ecommerce_shop_pages_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'pages'
                );
                $vw_ecommerce_shop_pages_id = wp_insert_post($vw_ecommerce_shop_pages);
                // Add Pages Page to Menu
                wp_update_nav_menu_item($vw_ecommerce_shop_menu_id, 0, array(
                    'menu-item-title' => __('Pages', 'vw-ecommerce-shop'),
                    'menu-item-classes' => 'pages',
                    'menu-item-url' => home_url('/pages/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $vw_ecommerce_shop_pages_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Create About Us Page with Dummy Content
                $vw_ecommerce_shop_about_title = 'About Us';
                $vw_ecommerce_shop_about_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

                         Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>

                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br>

                            All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
                $vw_ecommerce_shop_about = array(
                    'post_type' => 'page',
                    'post_title' => $vw_ecommerce_shop_about_title,
                    'post_content' => $vw_ecommerce_shop_about_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'about-us'
                );
                $vw_ecommerce_shop_about_id = wp_insert_post($vw_ecommerce_shop_about);
                // Add About Us Page to Menu
                wp_update_nav_menu_item($vw_ecommerce_shop_menu_id, 0, array(
                    'menu-item-title' => __('About Us', 'vw-ecommerce-shop'),
                    'menu-item-classes' => 'about-us',
                    'menu-item-url' => home_url('/about-us/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $vw_ecommerce_shop_about_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));


                // Set the menu location if it's not already set
                if (!has_nav_menu($vw_ecommerce_shop_bpmenulocation)) {
                    $locations = get_theme_mod('nav_menu_locations'); // Use 'nav_menu_locations' to get locations array
                    if (empty($locations)) {
                        $locations = array();
                    }
                    $locations[$vw_ecommerce_shop_bpmenulocation] = $vw_ecommerce_shop_menu_id;
                    set_theme_mod('nav_menu_locations', $locations);
                }

            }


            // Set the demo import completion flag
    		update_option('vw_ecommerce_shop_demo_import_completed', true);
    		// Display success message and "View Site" button
    		echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'vw-ecommerce-shop') . '</p>';
    		echo '<span><a href="' . esc_url(home_url()) . '" class="button button-primary site-btn" target="_blank">' . esc_html__('VIEW SITE', 'vw-ecommerce-shop') . '</a></span>';
            //end


            // Top Bar //
          
            set_theme_mod( 'vw_ecommerce_shop_shipping_icon', 'fa fa-car' );
            set_theme_mod( 'vw_ecommerce_shop_shipping', 'Free Shipping' );
            set_theme_mod( 'vw_ecommerce_shop_return_icon', 'fas fa-sync-alt' );
            set_theme_mod( 'vw_ecommerce_shop_return', 'Free Return' );
            set_theme_mod( 'vw_ecommerce_shop_payment_icon', 'fas fa-dollar-sign' );
            set_theme_mod( 'vw_ecommerce_shop_cash', 'Cash On Delivery' );
            set_theme_mod( 'vw_ecommerce_shop_phone_no_icon', 'fa fa-phone' );
            set_theme_mod( 'vw_ecommerce_shop_contact', '+00 123 456 7890' );
          
            // slider section start //
            set_theme_mod( 'vw_ecommerce_shop_slider_button_text', 'Read More' );
            set_theme_mod( 'vw_ecommerce_shop_top_button_url', '#' );
            

            for($vw_ecommerce_shop_i=1;$vw_ecommerce_shop_i<=3;$vw_ecommerce_shop_i++){
               $vw_ecommerce_shop_slider_title = 'LOREM IPSUM IS SIMPLY';
               $vw_ecommerce_shop_slider_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.';
                  // Create post object
               $my_post = array(
               'post_title'    => wp_strip_all_tags( $vw_ecommerce_shop_slider_title ),
               'post_content'  => $vw_ecommerce_shop_slider_content,
               'post_status'   => 'publish',
               'post_type'     => 'page',
               );

               // Insert the post into the database
               $vw_ecommerce_shop_post_id = wp_insert_post( $my_post );

               if ($vw_ecommerce_shop_post_id) {
                 // Set the theme mod for the slider page
                set_theme_mod('vw_ecommerce_shop_slider_page' . $vw_ecommerce_shop_i, $vw_ecommerce_shop_post_id);

                $vw_ecommerce_shop_image_url = get_template_directory_uri().'/images/slider'.$vw_ecommerce_shop_i.'.png';

                $vw_ecommerce_shop_image_id = media_sideload_image($vw_ecommerce_shop_image_url, $vw_ecommerce_shop_post_id, null, 'id');

                    if (!is_wp_error($vw_ecommerce_shop_image_id)) {
                        // Set the downloaded image as the post's featured image
                        set_post_thumbnail($vw_ecommerce_shop_post_id, $vw_ecommerce_shop_image_id);
                    }
                }
            }

            // products //
            set_theme_mod( 'vw_ecommerce_shop_maintitle', 'Lorem Ipsum is simply' );

            $vw_ecommerce_shop_title_array = array(
                array("Product Title 1",
                      "Product Title 2",
                      "Product Title 3",
                      "Product Title 4")
                );

            foreach ($vw_ecommerce_shop_title_array as $vw_ecommerce_shop_titles) {
                // Loop to create only 4 products
                for ($vw_ecommerce_shop_i = 0; $vw_ecommerce_shop_i < 4; $vw_ecommerce_shop_i++) {
                    // Create product content
                    $vw_ecommerce_shop_title = $vw_ecommerce_shop_titles[$vw_ecommerce_shop_i];
                    $vw_ecommerce_shop_content = 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.';

                    // Create product post object
                    $vw_ecommerce_shop_my_post = array(
                        'post_title'    => wp_strip_all_tags($vw_ecommerce_shop_title),
                        'post_content'  => $vw_ecommerce_shop_content,
                        'post_status'   => 'publish',
                        'post_type'     => 'product',
                    );
                    
                    set_theme_mod('vw_ecommerce_shop_page', esc_url($vw_ecommerce_shop_post_id));
                    // Insert the product into the database
                    $vw_ecommerce_shop_post_id = wp_insert_post($vw_ecommerce_shop_my_post);

                    if (is_wp_error($vw_ecommerce_shop_post_id)) {
                        error_log('Error creating product: ' . $vw_ecommerce_shop_post_id->get_error_message());
                        continue; // Skip to the next product if creation fails
                    }

                    // Add product meta (price, etc.)
                    update_post_meta($vw_ecommerce_shop_post_id, '_regular_price', '120.98'); // Regular price
                    update_post_meta($vw_ecommerce_shop_post_id, '_sale_price', '99.00'); // Sale price
                    update_post_meta($vw_ecommerce_shop_post_id, '_price', '99.00'); // Active price

                    // Handle the featured image using media_sideload_image
                    $vw_ecommerce_shop_image_url = get_template_directory_uri() . '/images/product' . ($vw_ecommerce_shop_i + 1) . '.png';
                    $vw_ecommerce_shop_image_id = media_sideload_image($vw_ecommerce_shop_image_url, $vw_ecommerce_shop_post_id, null, 'id');

                    if (is_wp_error($vw_ecommerce_shop_image_id)) {
                        error_log('Error downloading image: ' . $vw_ecommerce_shop_image_id->get_error_message());
                        continue; // Skip to the next product if image download fails
                    }

                    // Assign featured image to product
                    set_post_thumbnail($vw_ecommerce_shop_post_id, $vw_ecommerce_shop_image_id);
                    // Save the product ID in theme mod for later use
                    // set_theme_mod('vw_ecommerce_shop_page'. $vw_ecommerce_shop_i, $vw_ecommerce_shop_post_id);
                }
            }

            // Create track order page
            $vw_ecommerce_shop_page_query = new WP_Query(array(
                'post_type'      => 'page',
                'title'          => 'Products',
                'post_status'    => 'publish',
                'posts_per_page' => 1
            ));

            if (!$vw_ecommerce_shop_page_query->have_posts()) {
                $food_grocery_store_page_title = 'Product Page';
                $productpage = '[products limit="4" columns="4"]';

                // Append the WooCommerce products shortcode to the content
                $vw_ecommerce_shop_content = '';
                $vw_ecommerce_shop_content .= do_shortcode($productpage);

                // Create the new page
                $vw_ecommerce_shop_page = array(
                    'post_type'    => 'page',
                    'post_title'   => $food_grocery_store_page_title,
                    'post_content' => $vw_ecommerce_shop_content,
                    'post_status'  => 'publish',
                    'post_author'  => 1,
                    'post_slug'    => 'products'
                );

                // Insert the page and get its ID
                $vw_ecommerce_shop_page_id = wp_insert_post($vw_ecommerce_shop_page);

                // Store the page ID in theme mod
                if (!is_wp_error($vw_ecommerce_shop_page_id)) {
                    set_theme_mod('vw_ecommerce_shop_page', $vw_ecommerce_shop_page_id);
                }
            }


            //Copyright Text
            set_theme_mod( 'vw_ecommerce_shop_footer_text', 'By VWThemes' );

        }
    ?>

	
    <form action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=vw_ecommerce_shop_guide" method="POST" onsubmit="return validate(this);">
    <?php if (!get_option('vw_ecommerce_shop_demo_import_completed')) : ?>
        <form method="post">
        <p><?php esc_html_e('Please back up your website if it’s already live with data. This importer will overwrite your existing settings with the new customizer values for The VW Ecommerce Shop','vw-ecommerce-shop'); ?></p>
            <input class= "run-import" type="submit" name="submit" value="<?php esc_attr_e('Run Importer','vw-ecommerce-shop'); ?>" class="button button-primary button-large">
        </form>
    <?php endif; ?>
    </form>
	<script type="text/javascript">
		function validate(valid) {
			 if(confirm("Do you really want to import the theme demo content?")){
			    document.forms[0].submit();
			}
		    else {
			    return false;
		    }
		}
	</script>
</div>
