<?php

	get_header();

  /*  if(isset($_GET['catalogo'])){
        get_template_part( 'loop', 'index' );
    } else {*/
        echo "<!-- ::single.php -->";
?>
<?php while ( have_posts() ) : the_post(); ?>
    <?php 
        $title = slugify( get_the_title() );
        //obtener_pagina($title, get_the_content());
        obtener_post(get_the_ID());
    ?>
<?php endwhile; // end of the loop. ?>

<?php
    //}
	get_footer();
?>