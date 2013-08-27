<?php
/*
Template Name: Chat
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="contentleft">
	
<?	
	if ( is_page('ataudes') ) {
?>		
<div id="homepagetop">  
<div class="featuredtop">
            
	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_ataudes.php'); ?>
                 
</div>
<img src=http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/slogan.jpg border="0">
</div>    

<?
} elseif ( is_page('campanas-publicitarias') && !$post->post_parent ) {
?>  

<div id="homepagetop">  
<div class="featuredtop">
            
	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_campanas_publicitarias.php'); ?>
                
</div>
<img src=http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/slogan.jpg border="0">
</div> 

<?	
} elseif ( is_page('pedregal') ) {
?>  

<div id="homepagetop">  
<div class="featuredtop">
            
	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_casa_pedregal.php'); ?>
                
</div>
<img src=http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/slogan.jpg border="0">
</div> 

<?	
} elseif ( is_page('urnas')) {
?>  

<div id="homepagetop">  
<div class="featuredtop">
            
	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_urnas.php'); ?>
                
</div>
<img src=http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/slogan.jpg border="0">
</div> 

<?	
} elseif ( is_page('quienes-somos') && !$post->post_parent ) {
?>  

<div id="homepagetop">  
<div class="featuredtop">
            
	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_experiencia.php'); ?>
                
</div>
<img src=http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/slogan.jpg border="0">
</div> 

<?	
} elseif ( is_page('servicio-al-cliente') && !$post->post_parent ) {
?>  

<div id="homepagetop">  
<div class="featuredtop">
            
	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_servicio_cliente.php'); ?>
                
</div>
<img src=http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/slogan.jpg border="0">
</div> 

<?	
} elseif ( is_page('sucursales') && !$post->post_parent ) {
?>  

<div id="homepagetop">  
<div class="featuredtop">
            
	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_sucursales.php'); ?>
                
</div>
<img src=http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/slogan.jpg border="0">
</div> 

<?	
} elseif ( is_page('esquelas') && !$post->post_parent ) {
?>  

<div id="homepagetop">  
<div class="featuredtop">
            
	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_esquelas.php'); ?>
                
</div>
<img src=http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/slogan.jpg border="0">
</div> 

<?	
} elseif ( is_page('la-cristina-blog') && !$post->post_parent ) {
?>  

<div id="homepagetop">  
<div class="featuredtop">
            
	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_blog.php'); ?>
                
</div>
</div> 

<?	
} else {
	$uri= $_SERVER['REQUEST_URI'];
	$post_id = get_post($post->ID); 
    $slug = $post_id->post_name; 
//	echo $slug;

	if ($slug=='contact-us') {
		
	} else {
?>	

<div id="homepagetop">  
<div class="featuredtop">

	<img src="<?php echo bloginfo('template_url'); ?>/images_pages/<? echo $slug; ?>.jpg">
	

</div>
<img src=http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/slogan.jpg border="0">
</div>
<?
	}
}
?>

	
	
	
		<div class="postarea">
	
		<?php include(TEMPLATEPATH."/breadcrumb.php");?>
		
		
		<?php
			
			if (is_page('127')) {
			
			?>	
				
              
				<div id="homebox">
                <? query_posts('cat=10'); ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                
                    <div class="boxitem">
						<h5><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h5>
                        <span class="itemdets">
                        
                            Posted On: <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_time('F j, Y'); ?></a><br />
                            Posted In: <?php the_category(', ') ?><br />
                            Comments: <a href="<?php the_permalink() ?>#comments" title="<?php the_title() ?>"><?php comments_number('No Responses','One Response','% Responses'); ?></a>
                        </span>
                        <?
                        $key="thumbnail";
                        if (!get_post_meta($post->ID, $key, true)=='') {
                        ?>	
                        <img class="alignleft size-thumbnail wp-image-1785" src="<?php echo get_post_meta($post->ID, $key, true); ?>" alt="<?php the_title() ?>" width = "85"  />
                        <?
                        }
                        ?>
                        <?php the_content_rss('', TRUE, '', 50); ?>
                        <?php //the_content(); ?>
						<span class="morelink">
                        	<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">Read More...</a>
                        </span>
                    </div>
                    
                <?php endwhile; else: ?>
                <?php endif; ?>    
                
                </div>   
                
                <div id="pagination">
            		<?php next_posts_link('<span class="navforward"></span>') ?><?php previous_posts_link('<span class="navback"></span>') ?>
            		<ul>
<?php //get_archives('monthly'); ?>
</ul>
            		
            	</div>
			
            <?php	
            			
			} else {
		
			?>		
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1><br />
		
			<?php the_content(__('Read more'));?><div style="clear:both;"></div><?php //edit_post_link('(Edit)', '', ''); ?>
			
<!--<IFRAME SRC="http://www.jgarcialopez.com.mx/contenidos.php?modo=subcontenido&idsubcontenido=16" WIDTH="460" HEIGHT="420" frameborder="0">
Su navegador necesita soportar Iframes
</IFRAME>-->

<div id="centrar">
<span class=textogeneral><script language="javascript">
	if (AC_FL_RunContent == 0) {
		alert("Esta página requiere el archivo AC_RunActiveContent.js.");
	} else {
		AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0','width','452','height','400','align','middle','src','chatcliente','quality','high','bgcolor','#000000','allowscriptaccess','sameDomain','allowfullscreen','false','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','chat/chatcliente' ); //end AC code
	}
</script>
<noscript>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="452" height="400" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="movie" value="chat/chatcliente.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#000000" />	<embed src="chatcliente.swf" quality="high" bgcolor="#000000" width="452" height="400" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
  </object>
</noscript></span>
</div>			
			<?php endwhile; else: ?>
			
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?><?php } ?>
		
		</div>
		
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>