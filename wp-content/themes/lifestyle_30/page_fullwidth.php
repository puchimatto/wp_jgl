<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="contentwide">
	
		<div class="postareawide">
	
		<?php include(TEMPLATEPATH."/breadcrumbwide.php");?>
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1><br />
		
			<?php the_content(__('Read more'));?><div style="clear:both;"></div><?php edit_post_link('(Edit)', '', ''); ?>
			<?php endwhile; else: ?>
			
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
		
		</div>
		
	</div>
			
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>