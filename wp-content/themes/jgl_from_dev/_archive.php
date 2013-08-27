<?php get_header(); ?>

        <div class="content">
            <div class="container">
                <section>
                <?php 
                    if(in_category(26)){
  echo "Wibbly Wobbly";
  query_posts('cat=-34,26&showpost=10'); 
  }else if(in_category(34)){
  echo "Timey Wimey";
  query_posts('cat=-26,34&showpost=10');
  }
                ?>
                <?php if(is_post_type_archive('esquelas-digitales')){?>
                <div class="holo"></div>
                <?php }?>
                <?php if(have_posts()):?>
                <?php while ( have_posts() ) : the_post(); ?>
                <h2><?php echo get_the_date( _x( 'F Y', 'monthly archives date format', 'jgl' ) ); ?></h2>
                   
                        <?php 
                            if(in_category(26)){
                                query_posts('cat=-34');
                        ?>
                        <div class="post archive-blog">

                            <div class="image">                            
                                <img src="<?php echo get_uniq_img_(get_the_ID(), "portada"); ?>" width="269" height="181">
                            </div>
                       
                            <div class="text">
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_date('F m, Y'); ?> por <?php echo get_the_author(); ?><br>Escrito bajo. <a href="#">Artículo de interés</a></p>                    
                                <div class="post-content">
                                    <?php the_content(); ?>
                                    <p class="more">
                                        <a class="button" href="<?php the_permalink(); ?>">Leer más</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="separator"></div>                        
                         <?php 
                            } else if(in_category(34)){
                            ?>
                            <div class="post archive-semblanza">
                                <div class="text-semblanza">
                                    <h3><?php the_title(); ?></h3>
                                    <div class="post-content">
                                        <?php  echo get_the_content();?>                                    
                                    </div>
                                </div>
                            </div>
                            <div class="separator"></div>
                            <?php } else {?>
                            <div class="text-vacio">
                            </div>
                    <?php }?>
                    <?php endwhile; endif;?>
                    <div class="calendaralgo">
                    <?php 
                        if(in_category(26)){
                            calendario(sprintf("%s-01-01", ultimo_post()), sprintf("%s-12-31", ultimo_post()));

                         } else if(in_category(34)){ 
                             calendar(sprintf("%s-01-01", ultima_semblanza()), sprintf("%s-12-31", ultima_semblanza()));

                         }else {
                            calendar(sprintf("%s-01-01", ultima_semblanza()), sprintf("%s-12-31", ultima_semblanza()));
                        } ?>
                </div>
                    <?php black_footer(); ?>
                </section>                
            </div>
        </div>
        <script type="text/javascript"> document.getElementsByTagName("body")[0].setAttribute("class", "archive"); </script>

<?php get_footer(); ?>
