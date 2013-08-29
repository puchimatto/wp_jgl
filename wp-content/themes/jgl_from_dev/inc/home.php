<?php
    function home_intro(){
?>
<div id="sticky">sticky</div>
    <section class="section-1 intro" id="home-intro" style="padding:0;">
                   <!-- Dimensions: 795×497px -->
                    <div class="carousel-controls"></div>
                    <div class="arrow-carousel">
                        <a class="prev-arrow"></a>
                        <a class="next-arrow"></a>                            
                    </div>                    
                    <div class="carousel-bg">
                        <?php
                            global $post;
                            $id_type = get_cat_ID('Carousel');
                            $array_category = array($id_type);
                            $args = array('category__and' => $array_category, 'numberposts' => -1, 'order' => 'ASC');
                            $myposts = get_posts( $args );
                            $c = 0;
                            foreach( $myposts as $post ) :  setup_postdata($post); 
                        ?>
                        <div <?php if($c == 0): ?>class="active"<?php endif; ?>><img src="<?php uniq_img(get_the_ID()); ?>" data-src="holder.js/940x563"  width="960" height="563"></div>
                        <?php
                            $c++;
                            endforeach;
                        ?>
                        <div id="youtubevideo" class="video">
                            <!-- YouTube video <iframe width="795" height="497" src="http://www.youtube.com/embed/QW2AvuWRbfk" frameborder="0" allowfullscreen></iframe>-->
                        
                            <img src="" data-yt="QW2AvuWRbfk">

                            <div id="player"></div>

                            <script>
                              var tag = document.createElement('script');

                              tag.src = "https://www.youtube.com/iframe_api";
                              var firstScriptTag = document.getElementsByTagName('script')[0];
                              firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                              var player;
                              function onYouTubeIframeAPIReady() {
                                player = new YT.Player('player', {
                                  height: '497',
                                  width: '795',
                                  videoId: 'QW2AvuWRbfk',
                                  events: {
                                    'onReady': onPlayerReady,
                                    'onStateChange': onPlayerStateChange
                                  }
                                });
                              }

                              function onPlayerReady(event) {
                                event.target.playVideo();
                              }

                       
                               function onPlayerStateChange(event) {
                                
                              }
                              
                            </script>
                        </div>
                        
                    </div>
                    <div class="carousel-text">
                        <?php
                            global $post;
                            $id_type = get_cat_ID('Carousel');
                            $array_category = array($id_type);
                            $args = array('category__and' => $array_category, 'numberposts' => -1, 'order' => 'ASC');
                            $myposts = get_posts( $args );
                            $c = 0;
                            foreach( $myposts as $post ) :  setup_postdata($post); 
                        ?>
                        <div <?php if($c == 0): ?>class="active"<?php endif; ?>>
                            <?php the_content(); ?>
                        </div>
                        <?php
                            $c++;
                            endforeach;
                        ?>
                        <div class="">
                        </div>
                    </div>
                    <div class="end">
                        <a href="#home-intro" class="new"></a>
                    </div>
                </section>
<?php
    }
    function home_about(){
?>
                <section class="section-2 about" id="home-about">
                    <!-- About Us, with spinning carousel and fading phases -->
                    <?php
                        global $post;
                        $id_type = get_cat_ID('Quienes');
                        $array_category = array($id_type);
                        $args = array('category__and' => $array_category, 'numberposts' => 4);
                        $myposts = get_posts( $args );
                        $c = 0;
                        foreach ($myposts as $post) {
                            setup_postdata($post);
                            $posts["id_post"][$c] = get_the_ID();                            
                            $posts["title"][$c] = get_the_title();
                            $posts["url_img"][$c] = get_uniq_img(get_the_ID());
                            $posts["content"][$c] = get_the_content();
                            $posts["url"][$c] = get_permalink();
                            $c++;
                        }
                    ?>
                    <h2>¿Quiénes somos?</h2>
                    <h3>Una historia de servicio</h3>
                    <div class="carousel-rotate">
                        <div class="stage" data-d="<?php echo $c; ?>">
                            <?php
                                for($c2 = 0; $c2 < $c; $c2++ ):
                            ?>
                            <div class="item <?php if($c2 == 0) echo "active";?>">
                                <a class="rotate">
                                    
                                      <a href="quienes-somos/#<?php
                                        switch ($posts["id_post"][$c2] ) {
                                            case '26':
                                                echo 'about-statement';                                                
                                                break;
                                             case '29':
                                                echo 'about-history';                                                
                                                break;
                                             case '23':
                                                echo 'about-campaigns';                                                
                                                break;
                                             case '16':
                                                echo 'about-values';                                                
                                                break;            
                                            
                                            default:
                                                echo '';
                                                break;
                                        }
                                       
                                     ?>">

                                     <div class="tb">
                                        <div class="back"></div>
                                        <img src="<?php echo $posts["url_img"][$c2]; ?>">
                                    </div><?php echo $posts["title"][$c2]; ?></a>
                                </a>
                            </div>
                            <?php
                                endfor;
                            ?>
                        </div>
                    </div>
                    <div class="carousel-details">
                        <?php
                            for($c2 = 0; $c2 < $c; $c2++ ):
                        ?>
                        <div class="item <?php if($c2 == 0) echo "active"; ?>">
                            <?php echo $posts["content"][$c2] ?>
                        </div>
                        <?php
                            endfor;
                        ?>
                    </div>
                   <!-- DESACTIVADO -->
                    <div class="carousel-phrase">
                         <?php 
                            global $post;
                            $id_type = get_cat_ID('Testimonio');
                            $array_category = array($id_type);
                            $args = array('category__and' => $array_category, 'numberposts' => -1);
                            $myposts = get_posts( $args );
                            $c = 0;
                            foreach ($myposts as $post):
                                setup_postdata($post);
                        ?>
                        <div class="phrase <?php if($c == 0) echo "active"; ?>">
                            <?php //the_content(); ?>
                        </div>
                        <?php
                            $c++;
                            endforeach;
                        ?>
                    </div>
                    <div class="end">
                        <a href="#home-about" class="new"></a>
                    </div>

                    <!-- DESACTIVADO -->
                </section>
<?php
    }
    function home_services(){
        global $post;
        $id_type = get_cat_ID('Servicios');
        $array_category = array($id_type);
        $args = array('category__and' => $array_category, 'numberposts' => 9);
        $myposts = get_posts( $args );
?>
                <section class="section-3 services" id="home-services">
                    <!-- Services, each square flies into the centre -->
                    <h2>Nuestros servicios</h2>
                    <h3>Ponemos a tus órdenes nuestros servicios para ayudarte en momentos</h3>
                    <div class="cells">
                        <ul>
                            <li class="nw">
                                <div class="tb">
                                    <img src="<?php uniq_img($myposts[0]->ID); ?>">
                                    <div class="info">
                                        <?php echo $myposts[0]->post_content; ?>
                                    </div>
                                </div>
                                <span><?php echo $myposts[0]->post_title; ?></span>
                            </li>
                            <li class="n">
                                <div class="tb">
                                    <img src="<?php uniq_img($myposts[1]->ID); ?>">
                                    <div class="info">
                                        <?php echo $myposts[1]->post_content; ?>
                                    </div>
                                </div>
                                <span><?php echo $myposts[1]->post_title; ?></span>
                            </li>
                            <li class="ne">
                                <div class="tb">
                                    <img src="<?php uniq_img($myposts[2]->ID); ?>">
                                    <div class="info">
                                        <?php echo $myposts[2]->post_content; ?>
                                    </div>
                                </div>
                                <span><?php echo $myposts[2]->post_title; ?></span>
                            </li>
                            <li class="w">
                                <div class="tb">
                                    <img src="<?php uniq_img($myposts[3]->ID); ?>">
                                    <div class="info">
                                        <?php echo $myposts[3]->post_content; ?>
                                    </div>
                                </div>
                                <span><?php echo $myposts[3]->post_title; ?></span>
                            </li>
                            <li class="c">
                                <?php echo $myposts[4]->post_content; ?>
                            </li>
                            <li class="e">
                                <div class="tb">
                                    <img src="<?php uniq_img($myposts[5]->ID); ?>">
                                    <div class="info">
                                        <?php echo $myposts[5]->post_content; ?>
                                    </div>
                                </div>
                                <span><?php echo $myposts[5]->post_title; ?></span>
                            </li>
                            <li class="sw">
                                <div class="tb">
                                    <img src="<?php uniq_img($myposts[6]->ID); ?>">
                                    <div class="info">
                                        <?php echo $myposts[6]->post_content; ?>
                                    </div>
                                </div>
                                <span><?php echo $myposts[6]->post_title; ?></span>
                            </li>
                            <li class="s">
                                <div class="tb">
                                    <img src="<?php uniq_img($myposts[7]->ID); ?>">
                                    <div class="info">
                                        <?php echo $myposts[7]->post_content; ?>
                                    </div>
                                </div>
                                <span><?php echo $myposts[7]->post_title; ?></span>
                            </li>
                            <li class="se">
                                <div class="tb">
                                    <img src="<?php uniq_img($myposts[8]->ID); ?>">
                                    <div class="info">
                                        <?php echo $myposts[8]->post_content; ?>
                                    </div>
                                </div>
                                <span><?php echo $myposts[8]->post_title; ?></span>
                            </li>
                        </ul>
                    </div>

                    <div class="end">
                        <a href="#about-services" class="new"></a>
                    </div>
                    <!--<div class="end">
                        <a href="#home-services"><i class="icon-chevron-up"></i></a>
                    </div>-->
                </section>
<?php
    }
    function home_plans(){
        global $post;
        $id_type = get_cat_ID('Planes');
        $array_category = array($id_type);
        $args = array('category__and' => $array_category, 'numberposts' => 3);
        $myposts = get_posts( $args );
?>
                <section class="section-4 plans" id="home-plans">
                    <!-- Plans, center fades in first -->
                    <h2>Planes a futuro</h2>
                    <h3>Ponemos a tus órdenes nuestros servicios para ayudarte desde la primera llamada</h3>
                    <div class="pages">
                        <article class="main plan-total-40">
                            <div class="frame">
                                <div class="ribbon">Plan del mes</div>
                                <h2><?php echo $myposts[0]->post_title; ?></h2>
                                <?php echo $myposts[0]->post_content; ?>
                            </div>
                        </article>
                        <article class="left plan-total-20">
                            <div class="frame">
                                <h2><?php echo $myposts[1]->post_title ?></h2>
                                <?php echo $myposts[1]->post_content; ?>
                            </div>
                        </article>
                        <article class="right plan-total-60">
                            <div class="frame">
                                <h2><?php echo $myposts[2]->post_title; ?></h2>
                                <?php echo $myposts[2]->post_content; ?>
                            </div>
                        </article>
                    </div>
                    <div class="contact">
                        <h4>Plan a tu medida</h4>
                        <?php
                            $n1 = rand(1,10);
                            $n2 = rand(1,10);
                        ?>
                        <form id="planes" data-sum="<?php printf("¿Cuánto es %s + %s?", $n1, $n2); ?>">
                            <p>Contacta a un asesor para obtener una cotización a tu medida</p>
                            <input type="text" placeholder="Tu nombre" name="name" id="name-plan" required>
                            <input type="mail" placeholder="Tu e-mail" name="email" id="email-plan" required>
                            <input type="hidden" name="as" value="<?php printf("%s_%s", $n1, $n2); ?>">
                            <button type="submit">Enviar</button>
                            <div class="error_plan"><p>Es necesario completar este campo.</p></div>
                            <div class="icon-error"></div>
                        </form>
                    </div>
                    <div class="icon-chevron-upsletter">
                        <h4>Recibe las promociones</h4>
                        <?php
                            $n1 = rand(1,10);
                            $n2 = rand(1,10);
                        ?>
                        <form id="promociones" data-sum="<?php printf("¿Cuánto es %s + %s?", $n1, $n2); ?>">
                            <p>Sólo proporciona tu e-mail para mantenerte al tanto</p>
                            <input type="text" placeholder="Tu nombre" name="name" id="name-promo" required>
                            <input type="mail" placeholder="Tu e-mail" name="email" id="email-promo" required>
                            <input type="hidden" name="as" value="<?php printf("%s_%s", $n1, $n2); ?>">
                            <button type="submit">Enviar</button>
                            <div class="error_promo"><p>Es necesario completar este campo.</p></div>
                        </form>
                    </div>
                    <div class="end">
                        <a href="#home-plans" class="new"></a>
                    </div>
                </section>
<?php
    }
    function home_locations(){
        global $post;
        $id_type = 12; //Sucursales
        $array_category = array($id_type);
        $args = array('category__and' => $array_category, 'numberposts' => -1, 'orderby' => 'title', 'order' => 'ASC');
        $myposts = get_posts( $args );
?>
                <section class="section-5 locations" id="home-locations">
                    <!-- Locations, google maps and changing photos, fades in -->
                    <h2>Sucursales</h2>
                    <h3>Para estar cerca de ti</h3>
                    <div id="hide-locations">
                        <div class="location-list">
                            <div id="hidden-locations">
                                <?php foreach ($myposts as $post): setup_postdata($post);
                                    //$ex = explode("<br>", get_the_content());
                                    //echo $ex[0] . "<br>" . $ex[1] . "<br>" . $ex[3];
                                    the_content();
                                    ?>
                                    <img src="<?php echo get_uniq_img_(get_the_ID(), "home"); ?>" class="image-map">
                                    <?php 
                                ?>
                                <?php endforeach; ?>
                            </div>
                            <ul class="location-list-li">
                                <?php
                                    foreach ($myposts as $post):
                                ?>
                                <li>
                                    <i class="bullet"></i>
                                    <h4><?php echo $post->post_title; ?></h4>
                                </li>
                                <?php
                                    endforeach;
                                ?>
                            </ul>
                            <p class="more">
                                <a class="button" href="sucursales">Ver todas</a>
                            </p>
                        </div>

                        <div class="photo home-brillo-sucursal">
                            <img id="photo-map" src="<?php uniq_img(575); ?>">
                        </div>
                        <div class="gmap">
                            <div id="map-canvas"></div>
                            <div class="directions">
                                <h4>¿Cómo llegar?</h4>
                                <form action="#">
                                    <input type="text" placeholder="Escribe la calle, colonia o delegación de origen" class="from" name="from">
                                    <button type="submit" class="go"><i class="icon-chevron-right"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="end">
                            <a href="#home-locations"class="new"></a>
                        </div>
                    </div>
                </section>
<?php
    }
    function home_blog(){
        global $post;
        $post_img = array();
        $id_type = 26;
        $array_category = array($id_type);
        $args = array('category__and' => $array_category, 'numberposts' => 3);
        $myposts = get_posts( $args );
?>
                <section class="section-6 blog" id="home-blog">
                    <!-- Blog entries, slide in from bottom, includes footer -->
                    <h2>Notas del mundo funerario</h2>

                    <div class="columns" data-d="<?php echo count($myposts); ?>">
                        <?php for($c = 0; $c < count($myposts); $c++): ?>
                        <article class="col<?php print ($c + 1); ?>">
                            <img src="<?php echo get_uniq_img_($myposts[$c]->ID, "portada"); ?>" width="290">
                            <h4><?php echo $myposts[$c]->post_title; ?></h4>
                            <?php echo $myposts[$c]->post_content; ?>
                            <p class="more">
                                <a href="<?php hurl(); echo $myposts[$c]->post_name; ?>" class="button">Leer más</a>
                            </p>
                        </article>
                        <?php endfor; ?>
                        <p class="blog">
                            <a href="#">Ver notas anteriores &gt;</a>
                        </p>
                    </div>
                    <?php black_footer(); ?>
                </section>
<?php
    }
?>