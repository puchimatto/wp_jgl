<?php
    function pagina_esquelas($content){
?>
        <div class="content">
            <div class="container">
                <section id="obituaries-intro">
                    <div class="text-intro">
                        <?php echo $content; ?>
                    </div>
                    <div class="end">
                        <a href="#casa-pedregal" class="new"></a>
                    </div>
                </section>
                <?php obtener_lugares_esquelas(); ?>
                <?php black_footer(); ?>
            </div>
        </div>
        <script type="text/javascript"> document.getElementsByTagName('body')[0].setAttribute('class','obituaries'); </script>
<?php
    }
    function obtener_categoria_lugar($post_id){
        $post_categories = wp_get_post_categories( $post_id );

    }
    function obtener_lugares_esquelas(){
        global $post;
        $c = 0;
        $categories = get_categories(array('hide_empty' => 0, 'child_of' => 12)); 
        $n = count($categories) -1;
        foreach ($categories as $category) {

            $id_type = $category->term_id;
            $array_category = array($id_type, 12);
            $args = array('category__and' => $array_category, 'numberposts' => 1, 'order' => 'ASC');
            $myposts = get_posts( $args );
            foreach($myposts as $post): setup_postdata($post); 
?>
                <section class="places" id="<?php echo slugify(get_the_title()); ?>" <?php if($c == $n) echo "style='height:888px;'"; ?>>
                    <div class="places-info">
                        <h2><?php the_title(); ?></h2>
                        <h3>Dirección</h3>
                        <?php the_content(); ?>
                    </div>
                    <?php //obtener_esquelas($category->term_id); ?>
                    <?php obtener_esquelas2(get_the_title()); ?>
                </section>
<?php
            endforeach;
            $c++;
        }
    }
    function obtener_esquelas($term_id){
        $array_category = array($term_id, 11);
        $args = array('category__and' => $array_category, 'numberposts' => -1, 'order' => 'ASC');
        $myposts = get_posts( $args );
        $px = (int)(count($myposts)/3) * 892 + ((count($myposts)%3>0?1:0)*892);
?>
                    <div class="carousel">
                        <div class="overview">
                            <div class="tnetnoc" style="width:<?php print( $px==0?892:$px )?>px;">
<?php   $c = 1; $band = 0;
        foreach($myposts as $post): setup_postdata($post); if($c==4) $c=1;
?>
                                <?php if($c==1): ?><div class="slide-group visible"><?php endif; ?>
                                    <div class="slide <?php if($c==2) echo "middle"; ?>">
                                        <div class="slide-content">
                                            <i class="god">&nbsp;</i>
                                            <div class="desc">
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $c++; ?>
                                <?php if($c == 4): ?></div> <?php endif; ?>
                                <!-- -------- -->
        <?php endforeach; ?>
                            <?php if(count($myposts) == 0): ?>
                                    <div class="slide-group visible">
                            <?php endif; ?>
                            <?php for($x = $c; $x < 4; $x++): $band = 1;?>
                                    <div class="slide <?php if($x==2) echo "middle"; ?>">
                                        <div class="slide-content">
                                            <i class="god">&nbsp;</i>
                                            <div class="empty">
                                                <p>Por el momento no hay esquela publicada</p>
                                            </div>
                                        </div>
                                    </div>
                            <?php endfor; ?>
                                <?php if($band == 1): ?></div><?php endif; ?>
                            </div>
                        </div>
                        <div class="controls">
                            <div class="carousel-controls">
                                <?php
                                    $num = (int)(count($myposts)/3) + (count($myposts)%3>0?1:0);
                                    for ($i = 1; $i <= $num ; $i++):
                                ?>
                                <a href="#"  <?php if($i == 1): ?>class="active"<?php endif; ?>></a>
                                <?php
                                    endfor;
                                ?>
                            </div>
                        </div>
                        <div class="end">
                            <a href="" class="new"></a>
                        </div>
                    </div>
<?php
    }



    function obtener_esquelas2($title){
        global $wpdb;
        $sql = sprintf("SELECT id_post FROM esquela WHERE location = '%s' AND date >= NOW()", $title );
        $myposts = $wpdb->get_results($sql);

        $px = (int)(count($myposts)/3) * 892 + ((count($myposts)%3>0?1:0)*892);
?>
                    <div class="carousel">
                        <div class="overview">
                            <div class="tnetnoc" style="width:<?php print( $px==0?892:$px )?>px;">
<?php   $c = 1; $band = 0;
        foreach($myposts as $post): 
            $sql = sprintf("SELECT post_content FROM wp_posts WHERE id = '%s'", $post->id_post);
            $dev = $wpdb->get_results($sql);
            if($c==4) $c=1;
?>
                                <?php if($c==1): ?><div class="slide-group visible"><?php endif; ?>
                                    <div class="slide <?php if($c==2) echo "middle"; ?>">
                                        <div class="slide-content">
                                            <i class="god">&nbsp;</i>
                                            <div class="desc">
                                                <?php echo $dev[0]->post_content; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $c++; ?>
                                <?php if($c == 4): ?></div> <?php endif; ?>
                                <!-- -------- -->
        <?php endforeach; ?>
                            <?php if(count($myposts) == 0): ?>
                                    <div class="slide-group visible">
                            <?php endif; ?>
                            <?php for($x = $c; $x < 4; $x++): $band = 1;?>
                                    <div class="slide <?php if($x==2) echo "middle"; ?>">
                                        <div class="slide-content">
                                            <i class="god">&nbsp;</i>
                                            <div class="empty">
                                                <p>Por el momento no hay esquela publicada</p>
                                            </div>
                                        </div>
                                    </div>
                            <?php endfor; ?>
                                <?php if($band == 1): ?></div><?php endif; ?>
                            </div>
                        </div>
                        <div class="controls">
                            <div class="carousel-controls">
                                <?php
                                    $num = (int)(count($myposts)/3) + (count($myposts)%3>0?1:0);
                                    for ($i = 1; $i <= $num ; $i++):
                                ?>
                                <a href="#"  <?php if($i == 1): ?>class="active"<?php endif; ?>></a>
                                <?php
                                    endfor;
                                ?>
                            </div>
                        </div>
                        <div class="end">
                            <a href="" class="new"></a>
                        </div>
                    </div>
<?php
    }
?>