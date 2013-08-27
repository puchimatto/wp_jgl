<!-- begin footer -->

<div style="clear:both;"></div>

<? if (is_home()) { ?>

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

<? } ?>

<div id="footer">

	<p> Funerarias J. Garc&iacute;a L&oacute;pez Todos los derechos reservados.<br>
   Trabajamos para hacer m&aacute;s f&aacute;ciles los momentos m&aacute;s dif&iacute;ciles, 
  ofreciendo el apoyo que requiere una familia en duelo durante los servicios 
  funerarios, velatorio y cremaci&oacute;n de un ser querido.</p>

<!--<div id="red_comercial">
	<ul id="horizontal">
		<li>
			<a href="http://www.ark.com.mx" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/ark.jpg"></a>
		</li>
		<li>
			<img src="<?php bloginfo('template_url'); ?>/images/absolutfenix.jpg">
		</li>
		
	</ul>
</div>
-->				
                <div id="linkage">
                
                <br><a href="http://kleinundgross.net/" target="_blank">Powered by Klein und Gross</a>

</div>

<?php do_action('wp_footer'); ?>

</div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-5289294-11");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>