<?php get_header(); ?>

<div id="content">

	<div id="contentleft">
	
		<div class="postarea">
		
		<?php include(TEMPLATEPATH."/breadcrumb.php");?>
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			
			<div class="date">
			
				<div class="dateleft">
					<p><span class="time"><?php the_time('F j, Y'); ?></span> por <?php the_author_posts_link(); ?> &nbsp;<?php edit_post_link('(Edit)', '', ''); ?> <br /> Escrito bajo <?php the_category(', ') ?></p> 
				</div>
				
				<div class="dateright">
					<p><span class="icomment"><a href="<?php the_permalink(); ?>#respond"><?php comments_number('Deje un Comentario', '1 Comentario', '% Comentarios'); ?></a></span></p> 
				</div>
				
			</div>
			
			<div style="clear:both;"></div>

			<?php the_content(__('Leer m&aacutes;'));?><div style="clear:both;"></div>
			
			<div class="postmeta">
				<p><span class="tags">Etiquetas: <?php the_tags('') ?></span></p>
			</div>
		 			
			<!--
			<?php trackback_rdf(); ?>
			-->
			
			<?php endwhile; else: ?>
			
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
			
		</div>
	
		<!--To define the 468x60 ad, go to your WP dashboard and go to Appearance > Widgets. Select 468x60 Post Banner and then enter your add code into a text widget-->
                
        <!--<div class="postwidget">
			<ul id="postwidgeted">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('468x60 Post Banner') ) : ?>  
					<li><a href="http://www.winsorpilates.com"><img src="<?php bloginfo('template_url'); ?>/images/468x60.gif" alt="Winsor Pilates" /></a></li>
                <?php endif; ?>
            </ul>
        </div>-->
			
		<div class="comments">
			<?php comments_template('',true); ?>
		</div>
		
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>