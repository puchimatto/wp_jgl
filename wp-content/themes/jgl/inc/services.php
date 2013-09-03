<?php
    function pagina_nuestros_servicios(){
        global $post;
        $id_type = get_cat_ID('Nuestros Servicios');
        $array_category = array($id_type);
        $args = array('category__and' => $array_category, 'numberposts' => 8, 'order' => 'ASC');
        $myposts = get_posts( $args );
?>
<div class="content">
            <div class="container">
                <div id="sticky-note-addr"></div>
                <section class="section-1 intro" id="services-intro">
                    <?php echo $myposts[0]->post_content; ?>
                    <div class="end">
                        <a href="#services-enterprise" class="new"></a>
                    </div>
                </section>
                <section class="section-2 enterprise" id="services-enterprise">
                    <?php echo $myposts[1]->post_content; ?>
                    <div class="pages">
                        <?php
                            $id_type = get_cat_ID('Planes Empresariales');
                            $array_category = array($id_type);
                            $args = array('category__and' => $array_category, 'numberposts' => 3, 'order' => 'ASC');
                            $myplans = get_posts( $args );
                        ?>
                        <article class="main plan-total-40">
                            <div class="frame" style="padding:20px;">
                                <div class="ribbon">Plan del mes</div>
                                <?php echo $myplans[0]->post_content; ?>
                                <p class="more">
                                    <a class="button" href="<?php hurl(); ?>contacto/?id=<?php echo $myplans[0]->ID; ?>">Solicite información</a>
                                </p>
                            </div>
                        </article>
                        <article class="left plan-total-20">
                            <div class="frame">
                                <?php echo $myplans[1]->post_content; ?>
                                <p class="more">
                                    <a class="button" href="<?php hurl(); ?>contacto/?id=<?php echo $myplans[1]->ID; ?>">Solicite información</a>
                                </p>
                            </div>
                        </article>
                        <article class="right plan-total-60">
                            <div class="frame">
                                <?php echo $myplans[2]->post_content; ?>
                                <p class="more">
                                    <a class="button" href="<?php hurl(); ?>contacto/?id=<?php echo $myplans[2]->ID; ?>">Solicite información</a>
                                </p>
                            </div>
                        </article>
                    </div>
                    <div class="newsletter">
                        <h4>Reciba las promociones</h4>
                        <?php
                            $n1 = rand(1,10);
                            $n2 = rand(1,10);
                        ?>
                        <form id="newsletter" data-sum="<?php printf("¿Cuánto es %s + %s?", $n1, $n2); ?>">
                            <p>Sólo proporcione su e-mail para mantenerlo al tanto</p>
                            <input type="text" placeholder="Su nombre" required name="name" id="name-news">
                            <input type="mail" placeholder="Su e-mail" required name="email" id="email-news">
                            <input type="hidden" name="as" value="<?php printf("%s_%s", $n1, $n2); ?>">
                            <button type="submit">Enviar</button>
                        </form>
                    </div>
                    <div class="end">
                        <a href="#services-network" class="new"></a>
                    </div>
                </section>
                <section class="section-3 network" id="services-network">
                    <?php echo $myposts[2]->post_content; ?>
                    <div class="map">
                        <div class="static-map">
                            <!-- This div is for a static image of a map only, in the img tag that follows -->
                            <img src="<?php uniq_img($myposts[2]->ID); ?>">
                        </div>
                        <!--<p class="quote">Funeral Net cuenta con más de 150 corresponsales a nivel nacional e internacional, lo que permite ofrecerle el mejor servicio en donde sea que se encuentre.</p>-->
                    </div>
                    <div class="end">
                        <a href="#services-cremation" class="new"></a>
                    </div>
                </section>
                <section class="section-4 cremation" id="services-cremation" data-id="<?php echo $myposts[3]->ID; ?>">
                    <?php echo $myposts[3]->post_content; ?>
                    <div class="end">
                        <a href="#services-embalming" class="new"></a>
                    </div>
                </section>
                <section class="section-5 embalming" id="services-embalming" data-id="<?php echo $myposts[4]->ID; ?>">
                    <?php echo $myposts[4]->post_content; ?>
                    <div class="end">
                        <a href="#services-urns" class="new"></a>
                    </div>
                </section>
                <section class="section-6 urns" id="services-urns">
                    <?php echo $myposts[5]->post_content; ?>
                    <div class="gallery">
                        <div class="focused">
                            <img src="<?php uniq_img($myposts[5]->ID); ?>">
                            <!-- Actual image size 602x296 -->
                            <p class="caption"></p>
                        </div>
                        <div class="list">
                            <a href="#" class="galleryNav prev"><i class="icon-chevron-left"></i></a>
                            <div class="carousel">
                                <ul>
                                    <?php obtener_urnas(); ?>
                                </ul>
                            </div>
                            <a href="#" class="galleryNav next"><i class="icon-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="end">
                        <a href="#services-caskets" class="new"></a>
                    </div>
                </section>
                <section class="section-7 caskets" id="services-caskets" data-r="<?php uniq_img($myposts[6]->ID); ?>">
                    <?php echo $myposts[6]->post_content; ?>
                    <div class="gallery">
                        <div class="focused">
                            <img src="<?php uniq_img($myposts[6]->ID); ?>">
                            <!-- Actual image size 602x296 -->
                            <p class="caption"></p>
                        </div>
                        <div class="list">
                            <a href="#" class="galleryNav prev"><i class="icon-chevron-left"></i></a>
                            <div class="carousel">
                                <ul>
                                    <?php obtener_ataudes(); ?>
                                </ul>
                            </div>
                            <a href="#" class="galleryNav next"><i class="icon-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="end">
                        <a href="#services-additional" class="new"></a>
                    </div>
                </section>
                <section class="section-8 additional" id="services-additional" style="height:788px;">
                    <?php echo $myposts[7]->post_content; ?>
                    <div class="choose">
                        <h3>Seleccione el servicio que le interesa</h3>
                        <?php
                            $id_type = get_cat_ID('Servicios Adicionales');
                            $array_category = array($id_type);
                            $args = array('category__and' => $array_category, 'numberposts' => -1, 'order' => 'ASC');
                            $myservices = get_posts( $args );
                        ?>
                        <select id="choose-service">
                            <option>Seleccione un servicio</option>
                            <?php for($i = 1; $i <= count($myservices); $i++): ?>
                            <option value="<?php echo $i ?>"><?php echo $myservices[$i-1]->post_title; ?></option>
                            <?php endfor; ?>
                        </select>
                        <div class="details">
                            <div class="item">
                            </div>
                            <?php foreach ($myservices as $post): setup_postdata($post);?>
                            <div class="item">
                                <img src="<?php uniq_img(get_the_ID()); ?>" class="photo">
                                <h4><?php the_title(); ?></h4>
                                <?php the_content(); ?>
                                <p class="more"><a href="<?php hurl(); ?>contacto/?id=<?php the_ID(); ?>" class="button">Solicite información</a><!-- All these buttons should indicate that the user comes from this section --></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php black_footer(); ?>
                </section>
            </div>
        </div>
        <script type="text/javascript"> document.getElementsByTagName('body')[0].setAttribute('class','services'); </script>
<?php
    }
    function obtener_ataudes(){
        global $post;
        $id_type = 29;
        $array_category = array($id_type);
        $args = array('category__and' => $array_category, 'numberposts' => -1, 'order' => 'ASC', 'orderby' => 'title');
        $myposts = get_posts( $args );
        $c = 0;
        foreach ($myposts as $post): setup_postdata($post);
        ?>
            <li>
                                        <a><img src="<?php echo get_uniq_img_(get_the_ID(), "chica"); ?>"><!-- Actual image size 120x116 --></a>
                                        <div class="details">
                                            <!-- This is the image and caption that will show up in the focused frame -->
                                            <img src="<?php echo get_uniq_img_(get_the_ID(), "grande"); ?>">
                                            <p class="caption"><?php echo $myposts[$c]->post_content; ?></p>
                                        </div>
                                    </li>
        <?php
            $c++;
        endforeach;
    }
    function obtener_urnas(){
        global $post;
        $id_type = 28;
        $array_category = array($id_type);
        $args = array('category__and' => $array_category, 'numberposts' => -1, 'order' => 'ASC', 'orderby' => 'title');
        $myposts = get_posts( $args );
        $c = 0;
        foreach ($myposts as $post): setup_postdata($post);
        ?>
            <li>
                                        <a><img src="<?php echo get_uniq_img_(get_the_ID(), "chica"); ?>"><!-- Actual image size 120x116 --></a>
                                        <div class="details">
                                            <!-- This is the image and caption that will show up in the focused frame -->
                                            <img src="<?php echo get_uniq_img_(get_the_ID(), "grande"); ?>">
                                            <p class="caption"><?php echo $myposts[$c]->post_content; ?></p>
                                        </div>
                                    </li>
        <?php
        $c++;
        endforeach;
    }
?>