<?php
    function pagina_quienes_somos($content){
        global $post;
        $id_type = get_cat_ID('Quiénes Somos');
        $array_category = array($id_type);
        $args = array('category__and' => $array_category, 'numberposts' => 4, 'order' => 'ASC');
        $myposts = get_posts( $args );
?>
<div class="content">
            <div class="container">
                <section class="section-1 intro" id="about-intro">
                    <?php echo $content; ?>
                    <div class="bg">
                        <img src="<?php bloginfo('template_url'); ?>/images/about/dandelion.png">
                    </div>
                    <div class="end">
                        <a href="#about-statement" class="new"></a>
                    </div>
                </section>
                <section class="section-2 statement" id="about-statement">
                    <?php echo $myposts[0]->post_content; ?>
                    <div class="end">
                        <a href="#about-values" class="new"></a>
                    </div>
                </section>
                <section class="section-3 values" id="about-values">
                    <?php echo $myposts[1]->post_content; ?>
                    <div class="end">
                        <a href="#about-history" class="new"></a>
                    </div>
                </section>
                <section class="section-4 history" id="about-history">
                    <?php
                        $imgs = history_images($myposts[2]->ID);
                    ?>
                    <h2>Historia</h2>
                    <div class="photos">
                        <div class="photo">
                            <?php
                                $img = $imgs["imagen"];
                                $c = 0;
                                foreach ($img as $i):
                            ?>
                                <a class="fancybox <?php if($c > 0) echo "hidden"; ?>" href="<?php echo $i; ?>" data-fancybox-group="history-photo"><!-- Link to image, and thumbnail in the img -->
                                    <img src="<?php echo $imgs["portada"]; ?>"><!-- Actual size is 268x133 px -->
                                </a>
                            <?php 
                                $c++;
                                endforeach;
                            ?>
                            <p class="caption">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh.</p>
                        </div>
                        <div class="video">
                            <a class="fancybox" href="http://www.youtube-nocookie.com/embed/5Y6a64hGXTg?rel=0"><!-- YouTube embed URL -->
                                <img src="<?php echo $imgs["video"]; ?>"><!-- Actual size is 268x133 -->
                            </a>
                            <p class="caption">Video: “Conoce J. García López”</p>
                        </div>
                    </div>
                    <div class="details">
                        <?php echo $myposts[2]->post_content; ?>
                    </div>
                    <div class="end">
                        <a href="#about-campaigns" class="new"></a>
                    </div>
                </section>
                <section class="section-5 campaigns" id="about-campaigns">
                    <?php echo $myposts[3]->post_content; ?>
                    <div class="categories">
                        <div class="category photo">
                            <h3><i class="icon-chevron-down bullet change"></i>Campañas publicitarias</h3>
                            <div class="details">
                                <div class="carousel">
                                    <ul class="gallery">
                                        <?php $count = campings_li_exteriores(); ?>
                                    </ul>
                                </div>
                                <div class="pager"></div>
                            </div>
                        </div>
                        <div class="category audio">
                            <h3><i class="icon-chevron-down bullet"></i> Publicaciones</h3>
                            <div class="details">
                                <div class="carousel">
                                    <ul class="gallery">
                                        <?php campings_li_publicaciones($count); ?>
                                    </ul>
                                </div>
                                <div class="pager"></div>
                            </div>
                        </div>
                        <!--<div class="category video">
                            <h3><i class="icon-chevron-down bullet"></i> Videos</h3>
                            <div class="details">
                                <div class="carousel">
                                    <ul class="gallery">
                                        <?php campings_li_videos(); ?>
                                    </ul>
                                </div>
                                <div class="pager"></div>
                            </div>
                        </div>
                    </div>
                    <?php black_footer(); ?>
                </section>
                
            </div>-->
        </div>
        <script type="text/javascript"> document.getElementsByTagName('body')[0].setAttribute('class','about'); </script>
<?php
    }
    function history_images($id_post){
        $dev = array();
        $args = array(
            'post_type' => 'attachment',
            'numberposts' => null,
            'post_status' => null,
            'post_parent' => $id_post
        ); 
        $attachments = get_posts($args);
        if ($attachments) {
            foreach ($attachments as $attachment) {
                if(strcmp($attachment->post_title, "video") == 0)
                    $ret["video"] = wp_get_attachment_url($attachment->ID);
                else if (strcmp($attachment->post_title, "portada")==0)
                    $ret["portada"] = wp_get_attachment_url($attachment->ID);
                else
                    array_push($dev, wp_get_attachment_url($attachment->ID));
            }
        }
        $ret["imagen"] = $dev;
        return $ret;
    }
    function campings_li_exteriores(){
        global $post;
        $id_type = 30;
        $array_category = array($id_type);
        $args = array('category__and' => $array_category, 'numberposts' => -1, 'order' => 'ASC');
        $myposts = get_posts( $args );
        $c = 0;
        foreach ($myposts as $post):
            ?>
            <li class="item">
                <?php
                    $c1 = 0;
                    $img = get_uniq_img_($post->ID, "chica");
                    $lista = list_imgs_wout_title($post->ID, "chica");
                    foreach ($lista as $l):
                ?>
                
                <a href="<?php echo $l; ?>" class="fancybox1 grouped_elements<?php echo $c; ?>" data-fancybox-group="campaigns-photo" <?php if($c1 > 0): ?>style="display:none;"<?php endif; ?> rel="group<?php echo $post->ID; ?>">
                        <img src="<?php echo $img; ?>" alt="01">
                </a>
                <?php
                    
                    $c1++;
                    endforeach;
                ?>
                </li>
            <?php
            $c++;
        endforeach;
        return $c;
    }
    function campings_li_publicaciones($cpunt){
        global $post;
        $id_type = 31;
        $array_category = array($id_type);
        $args = array('category__and' => $array_category, 'numberposts' => -1, 'order' => 'ASC');
        $myposts = get_posts( $args );
        $c = $cpunt;
        foreach ($myposts as $post):
            ?>
                                        <li class="item">
                                            <?php
                                                $c1 = 0;
                                                $img = get_uniq_img_($post->ID, "chica");
                                                $lista = list_imgs_wout_title($post->ID, "chica");
                                                foreach ($lista as $l):
                                            ?>
                                            <a href="<?php echo $l; ?>" class="fancybox1 grouped_elements<?php echo $c; ?>" data-fancybox-group="campaigns-photo" <?php if($c1 > 0): ?>style="display:none;"<?php endif; ?> rel="group<?php echo $post->ID; ?>">
                                                <img src="<?php echo $img; ?>" alt="01">
                                            </a>
                                            <?php
                                                $c1++;
                                                endforeach;
                                            ?>
                                        </li>
            <?php
            $c++;
        endforeach;
    }
    function campings_li_videos(){
        global $post;
        $id_type = 32;
        $array_category = array($id_type);
        $args = array('category__and' => $array_category, 'numberposts' => -1, 'order' => 'ASC');
        $myposts = get_posts( $args );
        foreach ($myposts as $post):
            ?>
                <li class="item">
                    <a href="<?php echo $post->post_content; ?>" class="fancybox3" data-fancybox-group="campaigns-photo">
                        <img src="<?php echo get_uniq_img_($post->ID, "chica"); ?>" alt="01">
                    </a>
                </li>
            <?php
        endforeach;
    }
?>