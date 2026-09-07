<?php
/**
 * The template part for displaying grid layout
 *
 * @package VW Ecommerce Shop
 * @subpackage vw-ecommerce-shop
 * @since VW Ecommerce Shop 1.0
 */
?>
<?php 
  $vw_ecommerce_shop_archive_year  = get_the_time('Y'); 
  $vw_ecommerce_shop_archive_month = get_the_time('m'); 
  $vw_ecommerce_shop_archive_day   = get_the_time('d'); 
?>
<div class="col-lg-4 col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="grid-post-main-box wow zoomInDown delay-1000" data-wow-duration="2s">
	    	<?php if( get_theme_mod( 'vw_ecommerce_shop_grid_image_hide_show',true) == 1) { ?>
		      	<div class="box-image">
		          <?php 
		            if(has_post_thumbnail()) { 
		              the_post_thumbnail(); 
		            }
		          ?>  
		        </div>
		    <?php } ?>
	        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
	        <div class="content-vw">
        		<?php if( get_theme_mod( 'vw_ecommerce_shop_grid_postdate',true) == 1 || get_theme_mod( 'vw_ecommerce_shop_grid_author',true) == 1 || get_theme_mod( 'vw_ecommerce_shop_grid_comments',true) == 1) { ?>
            	<div class="metabox">
	                <?php if(get_theme_mod('vw_ecommerce_shop_grid_postdate',true)==1){ ?>
	                  <span class="entry-date"><i class="<?php echo esc_attr(get_theme_mod('vw_ecommerce_shop_grid_postdate_icon','fas fa-calendar-alt')); ?>"></i><a href="<?php echo esc_url( get_day_link( $vw_ecommerce_shop_archive_year, $vw_ecommerce_shop_archive_month, $vw_ecommerce_shop_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span><?php echo esc_html(get_theme_mod('vw_ecommerce_shop_grid_post_meta_field_separator'));?></span>
	                <?php } ?>

	                <?php if(get_theme_mod('vw_ecommerce_shop_grid_author',true)==1){ ?>
	                  <span class="entry-author"><i class="<?php echo esc_attr(get_theme_mod('vw_ecommerce_shop_grid_author_icon','far fa-user')); ?>"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span><?php echo esc_html(get_theme_mod('vw_ecommerce_shop_grid_post_meta_field_separator'));?></span>
	                <?php } ?>

	                <?php if(get_theme_mod('vw_ecommerce_shop_grid_comments',true)==1){ ?>
	                  <span class="entry-comments"><i class="<?php echo esc_attr(get_theme_mod('vw_ecommerce_shop_grid_comments_icon','fas fa-comments')); ?>"></i><?php comments_number( __('0 Comments','vw-ecommerce-shop'), __('0 Comments','vw-ecommerce-shop'), __('% Comments','vw-ecommerce-shop')); ?></span>
	                <?php } ?>
	                <?php echo esc_html (vw_ecommerce_shop_edit_link()); ?>
            	</div>
        	<?php } ?>
    	</div>
	        <div class="new-text">
	          <div class="entry-content">
	          	<p>
	          		<?php $vw_ecommerce_shop_theme_lay = get_theme_mod( 'vw_ecommerce_shop_grid_excerpt_settings','Excerpt');
                  			if($vw_ecommerce_shop_theme_lay == 'Content'){ ?>
                    		<?php the_content(); ?>
                 		<?php }
                  		if($vw_ecommerce_shop_theme_lay == 'Excerpt'){ ?>
                    		<?php if(get_the_excerpt()) { ?>
	              					<?php $vw_ecommerce_shop_excerpt = get_the_excerpt(); echo esc_html( vw_ecommerce_shop_string_limit_words( $vw_ecommerce_shop_excerpt, esc_attr(get_theme_mod('vw_ecommerce_shop_related_posts_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('vw_ecommerce_shop_grid_excerpt_suffix','') ); ?>  
	              		<?php }?>
              	<?php }?>			
	            </p>
	          </div>
	        </div>
	        <?php if( get_theme_mod('vw_ecommerce_shop_grid_button_text', 'Read More') != ''){ ?>
		        <div class="content-bttn">
		            <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right" title="<?php esc_attr_e( 'Read More', 'vw-ecommerce-shop' ); ?>"><?php echo esc_html(get_theme_mod('vw_ecommerce_shop_grid_button_text',__('Read More','vw-ecommerce-shop')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_ecommerce_shop_grid_button_text',__('Read More','vw-ecommerce-shop')));?></span></a>
		        </div>
		    <?php } ?>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>