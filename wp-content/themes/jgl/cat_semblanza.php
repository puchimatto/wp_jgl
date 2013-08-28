<?php get_header(); ?>

        <div class="content">
            <div class="container">
                <section>
                    <h2><?php echo get_the_date( _x( 'F Y', 'monthly archives date format', 'jgl' ) ); ?></h2>
                    <?php 

                    if(in_category(26)){
                        query_posts('cat=26&showposts=10'); ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <div class="post">
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

                    <?php endwhile ?>
 <div class="calendaralgo">
                   
                            <?php calendario(sprintf("%s-01-01", ultimo_post()), sprintf("%s-12-31", ultimo_post()));?>

                </div>

                    <?php } else if(in_category(34)){
                        query_posts('cat=34&showposts=10');?>

                        <?php while ( have_posts() ) : the_post(); ?>
                        <div class="post">
                        <div class="text-semblanza">
                            <h3><?php the_title(); ?></h3>
                            <div class="post-content">
                                <?php  echo get_the_content();?>                            </div>
                        </div>                            
                        </div>
                    <div class="separator"></div>

                         <?php endwhile ?>
                        <div class="calendaralgo">
                  

                        
                            <?php calendar(sprintf("%s-01-01", ultima_semblanza()), sprintf("%s-12-31", ultima_semblanza()));?>

                    
                </div>
                    <?php } ?>
                    
                    
                   
                    <?php black_footer(); ?>
                </section>

            
                
            </div>
        </div>
        <script type="text/javascript"> document.getElementsByTagName("body")[0].setAttribute("class", "archive"); </script>

<?php get_footer(); ?>
