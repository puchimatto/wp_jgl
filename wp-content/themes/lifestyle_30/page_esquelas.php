<?php
/*
Template Name: Esquelas
*/
?>

<?php get_header(); ?>
<div id="content">

	<div id="contentleft">
	
<?
	$categoryID= 0;
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

	<?php //include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_campanas_publicitarias.php'); ?>
                
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
            
	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery.php'); ?>
	<?php //include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_esquelas.php'); ?>
                
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
			
<!--<IFRAME SRC="http://www.jgarcialopez.com.mx/?page_id=15&idsucursalobituario=0&modoreal=todos" WIDTH="600" HEIGHT="1700" frameborder="0">
Su navegador necesita soportar Iframes
</IFRAME>-->


			<?php endwhile; else: ?>
			
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?><?php } ?>
		<?php // if (is_user_logged_in() ){ ?>
		<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url'); ?>/esquelas/style.css">
		<div id="esquelas_r">
<!--			<h2>Esquelas</h2> -->
<?php

if (is_page('70')) { $pagina_id='70';$categoryID = 143;}
elseif (is_page('72')) { $pagina_id='72'; $categoryID = 137;}
elseif (is_page('74')) { $pagina_id='74'; $categoryID = 138;}
elseif (is_page('76')) { $pagina_id='76'; $categoryID = 139;}
elseif (is_page('78')) { $pagina_id='78'; $categoryID = 140;}
elseif (is_page('80')) { $pagina_id='80'; $categoryID = 142;}
elseif (is_page('536')) { $pagina_id='536'; $categoryID = 141;}
//elseif (is_page('61')) { $pagina_id='61'; $categoryID = 137;}
else { $pagina_id='15'; }

			function getMonthName($month){
				switch ($month) {
					case '1': $month = 'Enero'; break;
					case '2': $month = 'Febrero'; break;
					case '3': $month = 'Marzo'; break;
					case '4': $month = 'Abril'; break;
					case '5': $month = 'Mayo'; break;
					case '6': $month = 'Junio'; break;
					case '7': $month = 'Julio'; break;
					case '8': $month = 'Agosto'; break;
					case '9': $month = 'Septiembre'; break;
					case '10': $month = 'Octubre'; break;
					case '11': $month = 'Noviembre'; break;
					case '12': $month = 'Diciembre'; break;
					default: break;
				}
				return $month;
			}
			wp_reset_query();
			global $wp_query;
			$args = 'post_type=esquelas&cat='.$categoryID;
			query_posts( $args );
			while ( have_posts() ) : the_post();
				$hoy = date('Y-m-d');
				$vigencia = get('vigencia');
				//echo $hoy.' // '.$vigencia;
				if($hoy <= $vigencia){
			?>
					<div class="esquela">
						<div class="content-esquela">
								<p class="comunicado"><?php echo get('comunica'); ?> le comunica el sensible fallecimiento
									<?php
										if (get('titulo')=='Sr.')
											echo 'del Sr.';
										else if (get('titulo')=='Sra.') {
										  	echo 'de la Sra.';
										}else if(get('titulo') == 'Sin Titulo'){
											echo 'de';
										}
									?></p>
							
								<h3 class="nombre"><?php echo get('difunto'); ?></h3>
								<?php
									$date = get('fecha');
									list($month, $day, $year) = split('[/.-]', $date);
								?>
								<p class="lugar-fecha">Ocurrido en <?php echo get('ocurrio'); ?>, el <?php echo $day.' de '.getMonthName($month).' de '.$year;  ?></p>
								<?php if(get('mensaje_extra')!=''){ ?>
									<p class="esquela-mensaje-extra"><?php echo get('mensaje_extra'); ?></p>
								<?php } ?>
								<?php if(get('servicio_lugar')!=''){
									$date = get('servicio_fecha');
									list($month, $day, $year) = split('[/.-]', $date);
								?>
									<p class="servicio_esquela">Servicio de <?php echo get('servicio_tipo'); ?><br />
										<?php echo get('servicio_lugar'); ?>, <?php echo $day.' de '.getMonthName($month).' de '.$year;  ?> a las <?php echo get('servicio_hora'); ?></p>
								<?php } ?>
								<?php if (get('datos_misa')) ?>
									<p class="servicio_misa">Misa: <?php echo get('datos_misa'); ?></p>
								<?php ?>
						</div>
					</div>
			<?php 
				}
			endwhile;
			?>

		</div>
		<?php //} ?>
		</div>

	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>