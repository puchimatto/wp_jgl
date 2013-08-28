<?php
	get_header();
/*
    $category = "-60,-1,-62,-58,-26,-59";*/
    $s = $_GET['s']; 
    $search_counter = 0;
    
    if(isset($_GET['pag']))
        $pag = $_GET['pag'];
    else $pag = 1;
    if(!$wp_query) global $wp_query;
    $category = "-9,-10,-7,-30,-31,-32,-27";
    $args = array( 'cat' => $category, 's' => $s, 'posts_per_page' => -1);
    $args = array_merge( $args , $wp_query->query);
    $posts = query_posts( $args );

    $query = new WP_Query($args);

    $tot = count($posts);
?>
		<div class="content">
            <div class="container">
                <section>
                    <h2>Resultados</h2>
                    <div class="result-list">
                        <h3>Resultados para la búsqueda: “<?php echo $s ?>”</h3>
                        <!-- <?php echo "::".$pag; ?> -->
                        <?php
                        $pos = ($pag == 1)?0:($pag-1)*10+1;
                        for ($x = $pos; $x < $pag * 10 && $x < $tot; $x++): setup_postdata($posts[$x]);
                        /*if(strcmp("", get_the_content())==0){ 
                            $search_counter++;
                            continue;
                        }*/
                        ?>
                        <article>
                            <?php $url = get_URL_link_search($posts[$x]->ID, $posts[$x]->post_title); ?>
                            <h4><a href="<?php echo $url; ?>"><?php echo $posts[$x]->post_title; ?></a></h4>
                            <div class="excerpt">
                            	<?php 
                            	$content = strip_tags($posts[$x]->post_content);
                            	echo "<p>" . substr($content, 0, 200) . "</p>";
                            	?>
                            </div>
                            <p class="url"><a href="<?php echo $url; ?>"><?php echo $url; ?></a></p>
                        </article>
                        <?php 
							endfor; 
						?>
                        <div class="pager">
                            <ul>
                            <?php
                            $mostrar_total = $tot;
                            $p = ceil($tot/10);
                            if($tot > 10) $mostrar_total = 10;

                            ?>
                                <li class="count"><?php echo $mostrar_total ?> de <?php echo $tot; ?></li>
                                <?php if($mostrar_total >= $tot){ ?>
                                <li class="page"><a class="active" href="#"><?php echo $mostrar_total ?> de <?php echo $tot; ?></a></li>
                            <?php } else{ 
                                $pos++;
                                    for ($i = ($page == 1)?1:($page -1); $i <= $p; $i++):
                                        $a = ($i==1)?1:($i-1)*10+1;//1
                                        if($i*10 <= $tot) $b = ($i*10);
                                        else $b = $tot;//10
                                ?>
                                    <li class="page" data-p="<?php echo ($pos); ?>">
                                        <a class="<?php if($pos >= $a && $pos <= $b) echo 'active'; ?>" href="<?php hurl(); echo "?s=".$s."&pag="; echo ceil($b/10); ?>"><?php printf("%s-%s",$a,$b); ?></a>
                                    </li>
                                <?php 
                                    endfor;
                                } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="related">
                        <h3>Búsquedas relacionadas:</h3>
                        <p>Las personas que buscaron “<?php echo $s; ?>” también consultaron:</p>
                        <ul>
                            <?php
                            $pal = busqueda_items($s);
                            for ($i=0; $i < count($pal) ; $i++) {
                            	$p = slugify($pal[$i]);
                            	if(strcmp($p, $s) == 0 || strcmp($p, "n-a") == 0)
                            		continue;
                            	?><li><a href="<?php echo esc_url( home_url( '/' ) ) . "?s=" . $p; ?>"><?php echo "- " . $p; ?></a></li><?php
                            }
                            ?>
                        </ul>
                    </div>
                    <?php black_footer(); ?>
                </section>
            </div>
        </div>
        <script type="text/javascript"> document.getElementsByTagName("body")[0].setAttribute('class', 'results');</script>
<?php    
	get_footer();
?>