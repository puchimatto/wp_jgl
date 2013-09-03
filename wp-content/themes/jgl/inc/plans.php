<?php
    function pagina_planes_a_futuro($content){
?>
<div class="content">
            <div class="container">
                <div id="sticky-note-addr"></div>
                <section class="section-1 intro" id="plans-intro">
                    <?php echo $content; ?>
                    <div class="newsletter">
                        <h4>Reciba las promociones</h4>
                        <?php
                            $n1 = rand(1,10);
                            $n2 = rand(1,10);
                        ?>
                        <form id="promociones" data-sum="<?php printf("¿Cuánto es %s + %s?", $n1, $n2); ?>">
                            <p>Sólo proporcione su e-mail para mantenerlo al tanto.</p>
                            <input type="text" placeholder="Su nombre" name="name" id="name" required>
                            <input type="email" placeholder="Su e-mail" name="email" id="email" required>
                            <input type="hidden" name="as" value="<?php printf("%s_%s", $n1, $n2); ?>">
                            <button type="submit">Enviar</button>
                        </form>
                    </div>
                    <div class="end">
                        <a href="#plan-1" class="new"></a>
                    </div>
                </section>
                <?php
                    global $post;
                    $id_type = get_cat_ID('Planes a Futuro');
                    $array_category = array($id_type);
                    $args = array('category__and' => $array_category, 'numberposts' => -1, 'order' => 'DESC');
                    $myposts = get_posts( $args );
                    $c = 1;
                    $n = count($myposts);
                    foreach( $myposts as $post ) :  setup_postdata($post); 
                ?>
                <section class="plan" id="plan-<?php echo $c; ?>" <?php if($n == $c) echo 'style="height:790px;"'; ?>>
                    <!-- This element should have an ID such that links from home and services link directly to the correct plan, e.g. plans.html#plan-total-20. Also make sure the arrow link from the previous section (div.end a) is updated as well -->
                    <!-- Basic plan structure is the same, alternating layout is done with CSS/Javascript -->
                    <h2><?php the_title(); ?></h2>
                    <div class="details">
                        <?php the_content(); ?>
                    </div>
                    <div class="infobox">
                        <img src="<?php uniq_img(get_the_ID()); ?>" class="photo"><!-- Actual image size 440x286 -->
                        <div class="financing">
                            <h4>Plazos</h4>
                            <a href="<?php hurl(); ?>contacto/?id=<?php the_ID(); ?>" class="button">Contacte a un asesor</a>
                        </div>
                    </div>
                    <?php if($n == $c)
                        black_footer();
                     else{ ?>
                    <div class="end">
                        <a href="#" class="new"></a>
                    </div>
                    <?php } $c++; ?>
                </section>
            <?php endforeach; ?>
            </div>
        </div>
        <script type="text/javascript"> document.getElementsByTagName('body')[0].setAttribute('class','plans'); </script>
<?php
    }
?>