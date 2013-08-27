<?php 
	get_header();
?>
<?php while ( have_posts() ) : the_post(); ?>
    <?php 
    	$title = slugify(get_the_title());
    	obtener_pagina($title, get_the_content(), get_the_ID());
    ?>
<?php endwhile; // end of the loop. ?>
<?php  
    get_footer();
?>