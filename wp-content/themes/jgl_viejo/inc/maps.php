<?php
function pagina_sucursales($contenido, $id){
?>
<div class="content">
            <div class="container">
                <section class="section-1 intro" id="maps-intro">
                    <h2>Estamos Cerca de Ti</h2>
                    
                    <div id="carousel">
                    	<?php $att = img_sucursales_carousel($id); ?>
                            <div class="arrow-carousel">
                                <a class="prev-arrow"></a>
                                <a class="next-arrow"></a>
                            </div>
                    </div>
                    <div id="carousel-controls">
                        <?php a_sucursales_carousel($att); ?>
                    </div>
                    <?php echo $contenido; ?>
                    <div class="end">
                        <a href="#about-statement" class="new"></a>
                    </div>
                </section>
                <?php obtener_sucursales(); ?>
                
            </div>
        </div>
        <script type="text/javascript"> document.getElementsByTagName('body')[0].setAttribute('class','maps'); </script>
<?php
}
	function img_sucursales_carousel($id_post){
        $args = array(
            'post_type' => 'attachment',
            'numberposts' => null,
            'post_status' => null,
            'post_parent' => $id_post
        ); 
        $attachments = get_posts($args);
        $c = 0;
        if ($attachments) {
            foreach ($attachments as $attachment) {
                    if(strcmp($attachment->post_title, "home") == 0)
                        continue;
                    if(strcmp($attachment->post_title, "primera") == 0){
                    $dev = wp_get_attachment_url($attachment->ID);
            ?>
                        <img src="<?php echo $dev; ?>" class="<?php if($c==0) echo 'active'; ?>" data-d="<?php echo $c ?>">
            <?php        
                        $c++;
                    }
            }
            foreach ($attachments as $attachment) {
            		if(strcmp($attachment->post_title, "home") == 0)
            			continue;
                    $dev = wp_get_attachment_url($attachment->ID);
            ?>
                        <img src="<?php echo $dev; ?>" class="<?php if($c==0) echo 'active'; ?>" data-d="<?php echo $c ?>">
            <?php        
            	$c++;
            }
        }
        return count($attachments);
	}
	function a_sucursales_carousel($ic){
		for ($i=0; $i < $ic; $i++) { 
			?>
			<a href="#" class="<?php if($i == 0) echo 'active'; ?>"></a>
			<?php
		}
	}
	function obtener_sucursales(){
		global $post;
		$id_type = 12; //Sucursales
		$array_category = array($id_type);
		$args = array('category__and' => $array_category, 'numberposts' => -1);
		$myposts = get_posts( $args );
		$c = 0;
		$n = count($myposts) - 1;
		foreach ($myposts as $post): setup_postdata($post);
?>
                <section class="sucursal" id="<?php echo $post->post_name; ?>" <?php if($c >= $n) echo "style='height:850px'" ?>>
                    <h2><?php the_title(); ?></h2>
                    <div class="details">
                        <div class="padding-details">
                            <?php the_content(); ?>
                        </div>
                        <div class="descripcion">
	                    </div>
                    </div>
                    <div class="images">
                        <?php obtener_carousel_sucursal(get_the_ID()); ?>
                        <div class="map">
                            <div id="map<?php echo $c; ?>" class="map_canvas"></div>
                        </div>
                        <div class="directions">
                            <h4>¿Cómo llegar?</h4>
                            <form action="#">
                                <input type="text" placeholder="Escribe la calle, colonia o delegación de origen" class="from" name="from">
                                <button type="submit" class="go"><i class="icon-chevron-right"></i></button>
                            </form>
                        </div>
                    </div>
                    <?php if($c < $n){ ?>
                    <div class="end">
                        <a href="" class="new"></a>
                    </div>
                    <?php } else black_footer(); ?>
                </section>
<?php
			$c++;
		endforeach;
	}
	function obtener_carousel_sucursal($id_post){
		$args = array(
            'post_type' => 'attachment',
            'numberposts' => null,
            'post_status' => null,
            'post_parent' => $id_post
        ); 
        $attachments = get_posts($args);
        $c = 0;
        $controls = 0;
        $n = count($attachments);
?>
		<div class="carousel">
<?php
        if ($attachments) {
            foreach ($attachments as $attachment) {
                if(strcmp($attachment->post_title, "primera") == 0):
                    $dev = wp_get_attachment_url($attachment->ID);
                    $imgDato = 1;
                    $controls++;
                ?>
                <img src="<?php echo $dev; ?>" class="<?php if($c == 0) echo 'active'; ?>" data-image="<?php echo $imgDato ?>">
            <?php
                $imgDato++;

                $c++;
                endif;
            }
            foreach ($attachments as $attachment) {
                    if(strcmp($attachment->post_title, "primera") == 0 || strcmp($attachment->post_title, "home") == 0)
                        continue;
                    $dev = wp_get_attachment_url($attachment->ID);
                    $controls++;
?>
                <img src="<?php echo $dev; ?>" class="<?php if($c == 0) echo 'active'; ?>"data-image="<?php echo $imgDato ?>">
<?php
                $imgDato++;

				$c++;
			}
		}
?>
                <div class="arrow-carousel">
                    <a class="prev-arrow"></a>
                    <a class="next-arrow"></a>
                </div>
                        </div>
                        <div class="carousel-controls">
<?php
						for ($i=0; $i < $controls; $i++):
?>
                            <a href="#" class="<?php if($i == 0) echo 'active'; ?>"></a>
<?php
						endfor;
?>
                        </div>
<?php
	}
?>