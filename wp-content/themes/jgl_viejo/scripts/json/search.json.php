<?php
header('Content-type: application/json; charset=utf-8');
include('../../../../../wp-load.php');
  $args = array( 'category_name' => 'esquelas-digitales', 'showposts'=>-1);
  $loop = new WP_Query( $args );
  $comaAux = 0;
  echo '[';
   $attachments = get_posts($args);
  
  while ( $loop->have_posts() ) : $loop->the_post();
  $attachments = get_posts($args);
      $imgPost = '';
       $argsImg = array(
             'post_type' => 'attachment',
             'numberposts' => null,
             'post_status' => null,
             'post_parent' => $id
       ); 
       $attachments = get_posts($argsImg);
       if ($attachments) {
           foreach ($attachments as $attachment) {
                   $dev = wp_get_attachment_url($attachment->ID);
           }
       }
       $imgPost = $dev;

    $id= get_the_ID();
    $title = parse(($post->post_title));
    $url= get_permalink();
    $enlace = get_post_meta($post->ID, "url", $single = true);
    $content = parse(($post->post_content));
    $date = get_the_date('Y-m-d');

    if ($comaAux) echo ",";
    echo '{ "idpost": "'.$id.'","label":"'.$title.'", "titulo":"'.$titulo.'",  "enlace":"'.$enlace.'","url":"'.$url.'", "imagen":"'.$imgPost.'", "contenido":"'.$content.'", "fecha":"'.$date.'"}';
    $comaAux++;
  endwhile;
  echo ']';

?>