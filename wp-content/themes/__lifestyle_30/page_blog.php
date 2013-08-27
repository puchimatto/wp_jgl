<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="contentleft">
	
		<div class="postarea">
	
		<?php include(TEMPLATEPATH."/breadcrumb.php");?>
				
			<?php $blog_cat_1 = get_option('lifestyle_blog_cat_1'); $blog_cat_1_num = get_option('lifestyle_blog_cat_1_num'); if(!$blog_cat_1) $blog_cat_1 = 1; //setting a default ?>
				
			<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=".$blog_cat_1."&showposts=".$blog_cat_1_num."&paged=$page"); while ( have_posts() ) : the_post() ?>
            
			<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				
			<div class="date">
			
				<div class="dateleft">
					<p><span class="time"><?php the_time('F j, Y'); ?></span> by <?php the_author_posts_link(); ?> &nbsp;<?php edit_post_link('(Edit)', '', ''); ?> <br /> Filed under <?php the_category(', ') ?></p> 
				</div>
				
				<div class="dateright">
					<p><span class="icomment"><a href="<?php the_permalink(); ?>#comments"><?php comments_number('Leave a Comment', '1 Comment', '% Comments'); ?></a></span></p> 
				</div>
				
			</div>
				
			<?php the_content(__('[Read more]'));?><div style="clear:both;"></div>
				
			<div class="postmeta2">
				Filed Under: <?php the_category(', ') ?><br />Tagged: <?php the_tags('') ?>
			</div>
							
			<?php endwhile; ?>
			
			<p><?php posts_nav_link(); ?></p>
		
		</div>
		
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>