<?php 
	function pagina_semblanza($title, $content){
        global $post;
        $id_type = get_cat_ID('semblanza digital');
        $array_category = array($id_type);
        $args = array('category__and' => $array_category, 'numberposts' => 2, 'order' => 'DESC');
        $posts = get_posts( $args );
?>
    <div class="content">
        <div class="container">
            <div id="sticky-note-addr"></div>
            <section class="section-1 intro" id="semblanza-intro">
                <?php echo $content; ?>
                <div class="map">                    
                    <div class="static-map">
                        <?php echo $posts[0]->post_content;?>                    
                    </div>
				</div>	
				<div class="end">
                        <a href="#semblanza-find" class="new"></a>
                </div>
            </section>
            <section class="section2" id="semblanza-find">
                <h2 style="text-transform:capitalize;">Localice las semblanzas digitales</h2>
                <h3>Porque la vida merece un homenaje</h3>
                <img src="<?php bloginfo('template_url')?>/images/semblanza/qr-hand.png" class="qr-hand">
                <div class="semblanzas">
                    <div id="find-semblanza">
                        <h4>Localice semblanzas por nombre</h4>
                        <input type="text" id="dateField" placeholder="Escriba aquí el nombre que desea encontrar" >
                        <input type="hidden" id="autocomplete_selected" />                             
                        <form id="semblanza-finder">
                            <a class="semblanza-button" type="submit"></a>                            

                            <input type="text" placeholder="Escriba aquí el nombre que deseas encontrar" id="search-semblanza" style="display:none;">
                        </form>

                    </div>
                    <script>                
                    </script>
                    <div id="find">
                        <h3></h3>
                    </div>                    
                    <div id="semblanzas-recientes">
                        <h3>SEMBLANZAS RECIENTES</h3>
                        <div class="recientes-content">
                        <?php 
                            global $post;
                            $id_type = 34;
                            $array_category = array($id_type);
                            $args = array('category__and' => $array_category, 'numberposts' => 4, 'orderby' => 'post_date',
    'order' => 'DESC');
                            $myposts = get_posts( $args );
                            $c = 0;
                            foreach ($myposts as $post): setup_postdata($post);
                        ?>

                            <div class="separate"></div>
                            <div class="item-semblanza">
                                <div class="text-semblanza">
                                    <h2><?php the_title();?></h2>
                                    <p><?php echo $myposts[$c]->post_content; ?></p>
                                </div>
                                <?php $enlace = get_post_meta($post->ID, "url", $single = true);  ?>                                
                                <?php if($enlace !== '') { ?>
                                    <a href="<?php echo $enlace; ?>" target="_blank"><img src="<?php echo get_uniq_img(get_the_ID()); ?>" class="img-qr"></a>                                  
                                <?php } else {?>
                                    <img src="<?php echo get_uniq_img(get_the_ID()); ?>" class="img-qr">                              
                                <?php }?>

                            
                            </div>
                             <?php
                                $c++;
                                endforeach;
                            ?> 
                        </div>
                    </div>
                    
                    
                    <div class="separate"></div>
                </div>
                <div id="calendario-semblanzas">
                        <?php  calendar(sprintf("%s-01-01", ultima_semblanza()), sprintf("%s-12-31", ultima_semblanza())); ?>
                    
                </div>
                <div class="end">
                    <a href="#semblanza-interactive" class="new"></a>
                </div>
            </section>
            <section class="section3" id="semblanza-interactive">
                <h2 style="text-transform:capitalize;">Esquelas interactivas</h2>
                <h3>Porque la vida merece un homenaje</h3>
                
                    <div class="text">
                        <?php echo $posts[1]->post_content; ?>
                    </div>
                    <div class="map">                    
                    <div class="static-map">
                        <img src="<?php bloginfo('template_url')?>/images/semblanza/esqueladigital01.png">
                    </div>
                </div>   

            <script type="text/javascript">document.getElementsByTagName('body')[0].setAttribute('class','digital');</script>                
                 <?php black_footer(); ?>
                 
            </section>

        </div>
    </div>

<?php 
}       
?>