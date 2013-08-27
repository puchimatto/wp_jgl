<?php get_header(); ?>

<div id="content">

	<div id="homepage">
    
    	<?php /*Check for the 'gallery_styles' function. if it's there, then include it. If not, do nothing*/ ?>
		<?php if (function_exists('gallery_styles')) : ?>
		
        <div id="homepagetop">
			
            <div class="featuredtop">
            
				<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery.php'); ?>
                
			</div>
            
		</div>
        
		<?php endif; ?>

		<div id="homepagebottom">
		<div class="hpbottom">
		<p>Tessoro at Las Conchas is the newest and most exclusive <strong>Residential 
  Real Estate</strong> in Puerto Penasco, Rocky Point, Mexico. The lavish features 
  and amenities of <strong>Tessoro at Las Conchas</strong>, coupled with the soft 
  sand of Las Conchas, the warm breezes of the <strong>Sea of Cortez</strong>, 
  and the inviting atmosphere of Rocky Point, will provide you and your family 
  with immeasurable pleasure and endless memories.</p><br>
<p>The Tessoro at Las Conchas philosophy is simple: utilize Tessoro's strengths 
  of location, amenities and features to provide our owners with the <strong>luxury, 
  privacy and exclusivity</strong> available only at the finest condominium community 
  in Rocky Point. Located at the edge of the gated, residential community of Las 
  Conchas, and situated on seven acres of Puerto Penasco's finest beachfront, 
  it is clear that Tessoro is more than worthy of its namesake <strong>&#8211;</strong> 
  <strong><em>&quot;Treasure&quot;</em></strong>.</p><br>
<p>
  Each of <strong>Tessoro's</strong> units has unobstructed views of the <em>Sea 
  of Cortez</em> and <em>The Morua Estuary</em> and direct access to more than 
  five miles of beach and estuary. The developers of Tessoro have taken extensive 
  measures to ensure that every detail of this luxurious condominium development 
  accommodates the upscale yet relaxed <strong>experience you deserve</strong>.
</p><br>

<div class="centro_iconos">
<!--<a href="<?php echo get_settings('home'); ?>/tessoro-today/testimonials/"><IMG src="<?php echo bloginfo('template_url'); ?>/images/meet-our-proud-owners.png"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="<?php echo get_settings('home'); ?>/construction-status/photos/">  <IMG src="<?php echo bloginfo('template_url'); ?>/images/DELIVERY_STATUS.jpg"> </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="<?php echo get_settings('home'); ?>/tessoro-calendar/"><IMG src="<?php echo bloginfo('template_url'); ?>/images/Tessoro_CALENDAR.jpg"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://tessoro4canada.com"><IMG src="<?php echo bloginfo('template_url'); ?>/images/boton_canada_tessoro.jpg"></a> -->
</div>
		
</div>	
</div>	
		<!--<div id="homepageleft">
				
			<div class="hpfeatured">
			<?php $feature_cat_1 = get_option('lifestyle_feature_cat_1'); $feature_cat_1_num = get_option('lifestyle_feature_cat_1_num'); if(!$feature_cat_1) $feature_cat_1 = 1; //setting a default ?>
			<h3><?php echo cat_id_to_name($feature_cat_1); ?></h3>
			
			
                
				<?php $recent = new WP_Query("cat=".$feature_cat_1."&showposts=".$feature_cat_1_num); while($recent->have_posts()) : $recent->the_post();?>
				<?php if( get_post_meta($post->ID, "thumbnail", true) ): ?>
				    <a href="<?php the_permalink() ?>" rel="bookmark"><img style="float:left;margin:0px 10px 0px 0px;" src="<?php echo get_post_meta($post->ID, "thumbnail", true); ?>" alt="<?php the_title(); ?>" /></a>
				<?php else: ?>
				<?php endif; ?>				
				<b><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></b>
				<?php the_content_limit(80, ""); ?>
				
				<div style="border-bottom:1px dotted #94B1DF; margin-bottom:10px; padding:0px 0px 10px 0px; clear:both;"></div>
				
				<?php endwhile; ?>
				
				<b><a href="<?php echo get_category_link($feature_cat_1); ?>" rel="bookmark">Read More Posts From This Category</a></b>
				
			</div>			
				
		</div>-->
		
		<!--<div id="homepageright">
		
			<div class="hpfeatured">
			<?php $feature_cat_2 = get_option('lifestyle_feature_cat_2'); $feature_cat_2_num = get_option('lifestyle_feature_cat_2_num'); if(!$feature_cat_2) $feature_cat_2 = 1; //setting a default ?>
			<h3><?php echo cat_id_to_name($feature_cat_2); ?></h3>
			
			
				<?php $recent = new WP_Query("cat=".$feature_cat_2."&showposts=".$feature_cat_2_num); while($recent->have_posts()) : $recent->the_post();?>
				<?php if( get_post_meta($post->ID, "thumbnail", true) ): ?>
				    <a href="<?php the_permalink() ?>" rel="bookmark"><img style="float:left;margin:0px 10px 0px 0px;" src="<?php echo get_post_meta($post->ID, "thumbnail", true); ?>" alt="<?php the_title(); ?>" /></a>
				<?php else: ?>
				<?php endif; ?>				
				<b><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></b>				
				<?php the_content_limit(80, ""); ?>
								
				<div style="border-bottom:1px dotted #94B1DF; margin-bottom:10px; padding:0px 0px 10px 0px; clear:both;"></div>
				
				<?php endwhile; ?>
								
				<b><a href="<?php echo get_category_link($feature_cat_2); ?>" rel="bookmark">Read More Posts From This Category</a></b>
				
			</div>		
			
		</div>-->
		
		<!--<div id="homepagebottom">
		
			<div class="hpbottom">
			<?php $feature_cat_3 = get_option('lifestyle_feature_cat_3'); $feature_cat_3_num = get_option('lifestyle_feature_cat_3_num'); if(!$feature_cat_3) $feature_cat_3 = 1; //setting a default ?>
			<h3><?php echo cat_id_to_name($feature_cat_3); ?></h3>
	
		
				
				<?php $recent = new WP_Query("cat=".$feature_cat_3."&showposts=".$feature_cat_3_num); while($recent->have_posts()) : $recent->the_post();?>
				<?php if( get_post_meta($post->ID, "hpbottom", true) ): ?>
				    <a href="<?php the_permalink() ?>" rel="bookmark"><img style="float:left;margin:0px 10px 0px 0px;" src="<?php echo get_post_meta($post->ID, "hpbottom", true); ?>" alt="<?php the_title(); ?>" /></a>
				<?php else: ?>
				<?php endif; ?>				
				<b><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></b>
				<?php the_content_limit(350, "[Read more of this review]"); ?>
					
				<div style="border-bottom:1px dotted #94B1DF; margin-bottom:10px; padding:0px 0px 10px 0px; clear:both;"></div>
					
				<?php endwhile; ?>
						
				<b><a href="<?php echo get_category_link($feature_cat_3); ?>" rel="bookmark">Read More Posts From This Category</a></b>
			
			</div>
		
		</div>-->
		
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>