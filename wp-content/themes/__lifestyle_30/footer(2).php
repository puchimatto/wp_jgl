<!-- begin footer -->

<div style="clear:both;"></div>

<div id="footer_centro"> 
<div id="homepagefooter"> 
 <div id="homebox_footer">
 				
				<?php
$uri= $_SERVER['REQUEST_URI']; 
?>

<? if ($uri=='/') { ?>
	


                <?php query_posts('category_name=Blog&showposts=1'); ?>

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                From our blog > Tessoro at Las Conchas Blog 
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
</div>  

<div id="homepagefooter"> 
 <div id="homebox_footer">
 				
				<?php
$uri= $_SERVER['REQUEST_URI']; 
?>

<? if ($uri=='/') { ?>
	


                <?php query_posts('category_name=Available&showposts=1&orderby=rand'); ?>

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                Available 
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
</div> 

</div>  

<div id="footer">

	<p>Tessoro at Las Conchas is the most impressive Real Estate in Rocky Point, Puerto Penasco.
The Sketches, Renderings, Graphic Material, Plans, Dimensions, Specifications, Availability, Terms, Conditions and Statements contained in this website are proposed only, and the developer reserves the right to modify, revise or withdraw any or all of the same in its sole discretion and without prior notice. Architecture and Interior Design by ar+k ARQUITECTOS</p>

<a href="http://www.ark.com.mx" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/ARK.png"></a>
				<!--<img src="<?php bloginfo('template_url'); ?>/images/mibanl.png">-->
				<img src="<?php bloginfo('template_url'); ?>/images/CIlogo.png">
				<img src="<?php bloginfo('template_url'); ?>/images/friendly.png">
				
                <div id="linkage">
                </div>
                <br><a href="http://kleinundgross.net/" target="_blank">Powered by Klein und Gross</a>

</div>

<?php do_action('wp_footer'); ?>

</div>

</body>
</html>