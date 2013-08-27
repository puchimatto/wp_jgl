<?php get_header(); ?>

<div id="content">

	<div id="homepage">
    
    	<?php /*Check for the 'gallery_styles' function. if it's there, then include it. If not, do nothing*/ ?>
		<?php if (function_exists('gallery_styles')) : ?>
		
        <div id="homepagetop">
			
            <div class="featuredtop">
            
				<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery.php'); ?>
               
			</div>
             <img src=http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/slogan.jpg border="0">
		</div>
        
		<?php endif; ?>

		<div id="homepagebottom">
		<div class="hpbottom">
		
<p>En Funerarias J. Garc&iacute;a L&oacute;pez trabajamos bajo la filosof&iacute;a 
de &#8220;Hacer m&aacute;s f&aacute;ciles los momentos dif&iacute;ciles&#8221;, 
enfoc&aacute;ndonos en brindar la m&aacute;s alta calidad en servicios funerarios, 
ofreci&eacute;ndole el mejor servicio con calidez humana.</p>
	
</div>	
</div>	

<div id="homepagefooter"> 
 <div id="homebox_footer">

<?php
$uri= $_SERVER['REQUEST_URI']; 
?>

<? if ($uri=='/') { ?>
	


                <?php query_posts('cat=8&showposts=1'); ?>

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                Art&iacute;culos de inter&eacute;s > 
                    <div class="boxitem">
                     
						<h5><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h5>
                        <span class="itemdets">
                            Escrito: <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_time('F j, Y'); ?></a><br />
                            Dentro de: <?php the_category(', ') ?><br />
                            Comentarios: <a href="<?php the_permalink() ?>#comments" title="<?php the_title() ?>"><?php comments_number('Sin Respuestas','Una Respuesta','% Respuestas'); ?></a>
                        </span>
                        
                        <?php the_content('Leer M&aacute;s...'); ?>
						
                    </div>
                <?php endwhile; else: ?>
                <?php endif; ?>    
                 
               

<? } ?>

</div>	
</div>	


<div id="homepagefooter"> 
 <div id="homebox_footer">

<?php
$uri= $_SERVER['REQUEST_URI']; 
?>

<? if ($uri=='/') { ?>
	


                <?php query_posts('cat=8&showposts=1&offset=1'); ?>

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                Art&iacute;culos de inter&eacute;s >
                    <div class="boxitem">
                     
						<h5><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h5>
                        <span class="itemdets">
                            Posted On: <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_time('F j, Y'); ?></a><br />
                            Posted In: <?php the_category(', ') ?><br />
                            Comments: <a href="<?php the_permalink() ?>#comments" title="<?php the_title() ?>"><?php comments_number('No Responses','One Response','% Responses'); ?></a>
                        </span>
                        
                        <?php the_content('Leer M&aacute;s...'); ?>
						
                    </div>
                <?php endwhile; else: ?>
                <?php endif; ?>    
                 
               

<? } ?>

</div>	
</div>	

<div id="homepagefooter" style="margin-top:18px;"> 
 <div id="homebox_footer">

<?php
$uri= $_SERVER['REQUEST_URI']; 
?>

<? if ($uri=='/') { ?>
	


                <?php query_posts('cat=8&showposts=1&offset=2'); ?>

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                Art&iacute;culos de inter&eacute;s >
                    <div class="boxitem">
                     
						<h5><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h5>
                        <span class="itemdets">
                            Posted On: <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_time('F j, Y'); ?></a><br />
                            Posted In: <?php the_category(', ') ?><br />
                            Comments: <a href="<?php the_permalink() ?>#comments" title="<?php the_title() ?>"><?php comments_number('No Responses','One Response','% Responses'); ?></a>
                        </span>
                        
                        <?php the_content('Leer M&aacute;s...'); ?>
						
                    </div>
                <?php endwhile; else: ?>
                <?php endif; ?>    
                 
               

<? } ?>

</div>	
</div>	



<!--
<div id="homepagefooter"> 
 <div id="homebox_footer">

<?php
$uri= $_SERVER['REQUEST_URI']; 
?>

<? if ($uri=='/') { ?>
	


                <?php query_posts('category_name=Post en Portada&showposts=1'); ?>

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <!--Available--> 
                    <div class="boxitem">
                     
						<h5><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h5>
                        <span class="itemdets">
                            Posted On: <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_time('F j, Y'); ?></a><br />
                            Posted In: <?php the_category(', ') ?><br />
                            Comments: <a href="<?php the_permalink() ?>#comments" title="<?php the_title() ?>"><?php comments_number('No Responses','One Response','% Responses'); ?></a>
                        </span>
                        
                        <?php the_content('Read More...'); ?>
						
                    </div>
                <?php endwhile; else: ?>
                <?php endif; ?>    
                 
               

<? } ?>

</div>	
</div>	-->

	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>