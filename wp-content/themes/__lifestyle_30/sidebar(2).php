<!-- begin sidebar -->

<div id="sidebar">
		
	<ul id="sidebarwidgeted">
	
<? if (is_home() || !$post->post_parent || !$post->post_child) {

	if ( is_single()) {
//		echo 'pag';
	}  else {
	echo	'<div id="espacio"></div>';
	} 
}
?>

<!--<div class="widget">
	<object width="550" height="220"><param name="movie" value="http://www.youtube.com/v/7Id3KkbAVD8&hl=en&fs=1&"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/7Id3KkbAVD8&hl=en&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="550" height="220"></embed></object>
</div>-->

<!--<div class="widget">
	<object width="550" height="240"><param name="movie" value="http://www.youtube.com/v/lpS4NGPnNHQ&hl=en&fs=1&"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/lpS4NGPnNHQ&hl=en&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="550" height="240"></embed></object>
</div>-->

<!--<div class="widget">
Planes desde $550 mensuales<br>
Precio Total $16,500<br>
<a href="http://www.jgarcialopez.com.mx/servicios/">M&aacute;s</a>
</div>-->



<!--<div class="widget">-->
	<? //listings(); ?>
<!--</div>-->

<!--<div class="widget">-->
	<? //obituarios(); ?>
<!--</div>-->

<!--<div class="no_widget">
	<object width="300" height="100">
	<param name="movie" value="http://lacristina.kglabs.net//wp-content/themes/lifestyle_30/images/boton_lacristina.swf">
	<embed src="http://lacristina.kglabs.net//wp-content/themes/lifestyle_30/images/boton_lacristina.swf" width="300" height="100">
	</embed>
	</object>
</div>-->

<!--<div class="no_widget">
	<div align="center"><div style="width:200px;margin-top:10px;"><a href="http://www.jamendo.com/"><img alt="Jamendo" src="http://widgets.jamendo.com/f/myspace_linkoutheader.gif" border="0" /></a><object type="application/x-shockwave-flash" allowScriptAccess="never" height="235" width="200" align="middle" data="http://widgets.jamendo.com/es/track/?playerautoplay=1&playertype=myspace&track_id=109962" /><param name="allowScriptAccess" value="never" /><param name="movie" value="http://widgets.jamendo.com/es/track/?playerautoplay=1&playertype=myspace&track_id=109962" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><param name="bgcolor" value="#FFFFFF" /></object><div style="height:48px;padding-top:10px;background:url(http://widgets.jamendo.com/f/myspace_linkoutbgfooter.gif) no-repeat top left;font-family:Arial, sans-serif;font-size:9px !important;text-align:center;color:#CBC6BC;"><a href="http://www.jamendo.com/download/track/109962" style="color:#7E3C7E;font-size:1em !important;font-weight:normal;text-decoration:none">Download this</a> | <a href="http://www.jamendo.com/widgets/create" style="color:#7E3C7E;font-size:1em !important;font-weight:normal;text-decoration:none">Create my own widget</a><br/><a href="http://www.jamendo.com/track/109962" style="color:#7E3C7E;font-size:1em !important;font-weight:bold;text-decoration:none">This track on jamendo</a></div></div></div>
</div>-->

<? if (is_home()) { ?>
<div class="widget">
	<object width="200" height="220">
	<param name="movie" value="http://www.cometorockypoint.com/fla/weather_8.swf">
	<embed src="http://www.cometorockypoint.com/fla/weather_8.swf" width="200" height="220">
	</embed>
	</object>
</div>

<?}?>
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Top') ) : ?>
	
		<!--<li id="recent-posts">
            <div class="widget">
                <h2>Recent Posts</h2>
                    <ul>
                        <?php wp_get_archives('type=postbypost&limit=5'); ?> 
                    </ul>
            </div>
		</li>-->
		
	<?php endif; ?>
	
	</ul>
<div class="no_widget">
<object width="320" height="175">
<param name="movie" value="http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/contacto_2.swf">
<embed src="http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/contacto_2.swf" width="320" height="175">
</embed>
</object>

</div>

<div class="no_widget">
<object width="320" height="175">
<param name="movie" value="http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/planes.swf">
<embed src="http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/planes.swf" width="320" height="175">
</embed>
</object>
	
</div>

<div class="no_widget">
<object width="320" height="175">
<param name="movie" value="http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/obituarios.swf">
<embed src="http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/obituarios.swf" width="320" height="175">
</embed>
</object>
	
</div>	
	<?php include(TEMPLATEPATH."/sidebar_left.php");?>
	
	<?php include(TEMPLATEPATH."/sidebar_right.php");?>
	
</div>

<!-- end sidebar -->