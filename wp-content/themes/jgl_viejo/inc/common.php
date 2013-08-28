<?php
    function uniq_img($id_post){
        $args = array(
            'post_type' => 'attachment',
            'numberposts' => null,
            'post_status' => null,
            'post_parent' => $id_post
        ); 
        $attachments = get_posts($args);
        if ($attachments) {
            foreach ($attachments as $attachment) {
                    $dev = wp_get_attachment_url($attachment->ID);
            }
        }
        echo $dev;
    }
    function get_uniq_img($id_post){
        $args = array(
            'post_type' => 'attachment',
            'numberposts' => null,
            'post_status' => null,
            'post_parent' => $id_post
        ); 
        $attachments = get_posts($args);
        if ($attachments) {
            foreach ($attachments as $attachment) {
                    $dev = wp_get_attachment_url($attachment->ID);
            }
        }
        return $dev;
    }
    function parse($text) {
        $text = str_replace("\r\n", "\n", $text);
        $text = str_replace("\r", "\n", $text);
        $text = str_replace("\n", "<br />", $text);
        $text = str_replace('"', '\\"', $text);
        return $text;
    }
    function uniq_imgs($id_post, $first_class){
        $args = array(
            'post_type' => 'attachment',
            'numberposts' => null,
            'post_status' => null,
            'post_parent' => $id_post
        ); 
        $c = 0;
        $attachments = get_posts($args);
        if ($attachments) {
            foreach ($attachments as $attachment) {
                    $dev = wp_get_attachment_url($attachment->ID);
                    if(strcmp($attachment->post_title, "carrusel") != 0)
                        continue;
?>
            <img src="<?php echo $dev; ?>" width="429" height="331" <?php if($c == 0) echo 'class="'.$first_class.'"'; ?>>
<?php
            $c++;
            }
        }
        return $c + 1;
    }
    function list_imgs_wout_title($id_post, $title){
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
                    if(strcmp($attachment->post_title, $title) != 0)
                        array_push($dev, wp_get_attachment_url($attachment->ID));
            }
        }
        return $dev;
    }
    function get_uniq_img_($id_post, $title){
        $args = array(
            'post_type' => 'attachment',
            'numberposts' => null,
            'post_status' => null,
            'post_parent' => $id_post
        ); 
        $attachments = get_posts($args);
        if ($attachments) {
            foreach ($attachments as $attachment) {
                    if(strcmp($attachment->post_title, $title)!= 0)
                        continue;
                    $dev = wp_get_attachment_url($attachment->ID);
            }
        }
        return $dev;
    }
    function get_uniq_img_not($id_post, $title){
        $args = array(
            'post_type' => 'attachment',
            'numberposts' => null,
            'post_status' => null,
            'post_parent' => $id_post
        ); 
        $attachments = get_posts($args);
        if ($attachments) {
            foreach ($attachments as $attachment) {
                    if(strcmp($attachment->post_title, $title)== 0)
                        continue;
                    $dev = wp_get_attachment_url($attachment->ID);
            }
        }
        return $dev;
    }
    function obtener_pagina($title, $content, $id){
        echo "<!-- :::$title:::-->";
        switch ($title) {
            case 'esquelas':
                pagina_esquelas($content);
                break;
            case 'quienes-somos':
                pagina_quienes_somos($content);
                break;
            case 'nuestros-servicios':
                pagina_nuestros_servicios();
                break;
            case 'planes-a-futuro':
                pagina_planes_a_futuro($content);
                break;
            case 'sucursales':
                pagina_sucursales($content, $id);
                break;
            case 'politica-de-privacidad':
                pagina_privacidad($content);
                break;
            case 'blog':
                pagina_blog();
                break;
            case 'contacto':
                pagina_contacto($title, $content);
                break;
            case 'semblanza-digital':
                pagina_semblanza($title, $content, $id);
                break;
            default:
                global $wp_query;
                $wp_query->set_404();
                status_header( 404 );
                get_template_part( 404 ); exit();
        }
    }
    function slugify($text){
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        //if (function_exists('iconv'))
        //{
            setlocale(LC_ALL, 'en_US.UTF8');
            $text = iconv('UTF-8', 'ascii//TRANSLIT//IGNORE', $text);
        //}
        $text = strtolower($text);
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text))
        {
            return 'n-a';
        }
        return $text;
    }
    function obtener_li_planes(){
        global $post;
        $id_type = get_cat_ID('Planes a Futuro');
        $array_category = array($id_type);
        $args = array('category__and' => $array_category, 'numberposts' => -1, 'order' => 'DESC');
        $myposts = get_posts( $args );
        $c = 1;
        foreach( $myposts as $post ) :  setup_postdata($post); ?>
        <li><a href="<?php hurl(); ?>planes-a-futuro/#plan-<?php echo $c ?>"><?php the_title(); ?></a></li>
        <?php
        $c++;
        endforeach;
    }
    function obtener_a_planes(){
        global $post;
        $id_type = get_cat_ID('Planes a Futuro');
        $array_category = array($id_type);
        $args = array('category__and' => $array_category, 'numberposts' => -1, 'order' => 'DESC');
        $myposts = get_posts( $args );
        $c = 1;
        foreach( $myposts as $post ) :  setup_postdata($post); ?>
        <a href="#"><?php the_title(); ?></a>
        <?php
        $c++;
        endforeach;
    }
    function obtener_li_esquelas(){
        global $post;
        $array_category = array(12);
        $args = array('category__and' => $array_category, 'numberposts' => -1, 'order' => 'ASC', 'orderby' => 'title');
        $myposts = get_posts( $args );
        foreach($myposts as $post): setup_postdata($post);
        ?>
        <li><a href="<?php hurl(); ?>esquelas/#<?php echo slugify(get_the_title()); ?>"><?php the_title(); ?></a></li>
        <?php
        endforeach;
    }
    function obtener_post($id){
        /*switch ($id) {
            case 'value':
                # code...
                break;
            
            default:
                # code...
                break;
        }*/
        blog_post($id);
    }
    function hurl(){
        echo esc_url(home_url( '/' ));
    }
    function black_footer(){
        ?>
                    <div class="footer">
                        <p>Funerarias J. García López. Todos los derechos reservados.</p>
                        <p>Trabajamos para hacer más fáciles los momentos difíciles®. <a href="<?php hurl(); ?>politica-de-privacidad">Ver política de privacidad</a></p>
                        <p class="by">Powered by Klein und Gross</p>
                    </div>
        <?php
    }
    function pagina_privacidad($content){
?>
        <div class="content">
            <div class="container">
                <section style="padding-top:50px; padding-bottom:180px; height:auto;">
                    <?php echo $content; ?>
                    <?php black_footer(); ?>
                </section>
            </div>
        </div>
        <script type="text/javascript"> document.getElementsByTagName("body")[0].setAttribute("class","privacy"); </script>
<?php
    }
    function obtener_li_sucursales(){
        global $post;
        $array_category = array(12);
        $args = array('category__and' => $array_category, 'numberposts' => -1);
        $myposts = get_posts( $args );
        $c = 1;

        foreach($myposts as $post): setup_postdata($post);
        ?>
        <li><a href="<?php hurl(); ?>sucursales/#<?php echo slugify(get_the_title()); ?>"><span><?php echo $c ?>.  </span> <?php the_title(); ?></a></li>
        <?php $c++; ?>
        <?php
        endforeach;
    }
    function guardar_comentario($name, $email, $content, $post_id){
        $time = current_time('mysql');

        $data = array(
            'comment_post_ID' => $post_id,
            'comment_author' => $name,
            'comment_author_email' => $email,
            'comment_content' => $content,
            'comment_type' => '',
            'comment_parent' => 0,
            'user_id' => 1,
            'comment_author_IP' => $_SERVER['REMOTE_ADDR'],
            'comment_date' => $time,
            'comment_approved' => 0,
        );
        wp_insert_comment($data);
        ?>
        <h3>¡Gracias!</h3>
        <p>Hemos recibido tu comentario. En breve aparecerá publicado en este post</p>
        <?php
    }
    function guardar_promociones($name, $email){
        global $wpdb;
        $sql = sprintf("INSERT INTO promociones VALUES (NULL, '%s', '%s', NOW())", $name, $email);
        $dev = $wpdb->get_results($sql);
        add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));
        wp_mail('operaciones@jgarcialopez.com.mx', 'JGL Suscripción a promociones', sprintf('<ul><li><strong>Name: </strong>%s</li><li><strong>Correo: </strong>%s</li></ul>', $name, $email));
        wp_mail('zu.kleinundgross@gmail.com', 'JGL Suscripción a promociones', sprintf('<ul><li><strong>Name: </strong>%s</li><li><strong>Correo: </strong>%s</li></ul>', $name, $email));
        wp_mail('oscarpadillag@gmail.com', 'JGL Suscripción a promociones', sprintf('<ul><li><strong>Name: </strong>%s</li><li><strong>Correo: </strong>%s</li></ul>', $name, $email));
        wp_mail('jades@kleinundgross.net', 'JGL Suscripción a promociones', sprintf('<ul><li><strong>Name: </strong>%s</li><li><strong>Correo: </strong>%s</li></ul>', $name, $email));
        echo "¡Tus datos han sido recibidos!";
    }
    function get_URL_link_search($post_id, $title){
        $post_categories = wp_get_post_categories( $post_id );
        $dev = "no";
        foreach($post_categories as $c){
            $cat = get_category( $c );
            switch($cat->slug){
                case 'blog-2':
                    $dev = sprintf('%sblog/',esc_url( home_url( '/' ) ));
                    break;
                case 'esquelas':
                    $dev = sprintf('%sesquelas/',esc_url( home_url( '/' ) ));
                    break;
                case 'nuestros-servicios':
                    $dev = sprintf('%snuestros-servicios',esc_url( home_url( '/' ) ) );
                    break;
                case 'planes-a-futuro':
                    $dev = sprintf('%splanes-a-futuro',esc_url( home_url( '/' ) ) );
                    break;
                case 'quienes-somos':
                    $dev = sprintf('%squienes-somos',esc_url( home_url( '/' ) ) );
                    break;
                case 'sucursales-2':
                    $dev = sprintf('%ssucursales',esc_url( home_url( '/' ) ) );
                    break;
                default:
                    $dev = sprintf('%s',esc_url( home_url( '/' ) ) );
                    break;
            }
        }
        if(strcmp($dev, "no") == 0)
            $dev = sprintf("%s%s", esc_url(home_url('/')), slugify($title));
        return $dev;
    }
    function busqueda_items($query){
        $ar = array();
        if(!$wp_query) global $wp_query;
        $args = array('s' => $query);
        $args = array_merge( $args , $wp_query->query);
        $the_query = new WP_Query($args);
        while ( $the_query->have_posts() ) : $the_query->the_post();
            $ex = explode(' ', get_the_title());
            foreach ($ex as $key) {
                $k = $key;// slugify($key);
                if(isset($ar[$k])) $ar[$k]++;
                else $ar[$k] = 1;
            }
        endwhile;
        
        $aux = array();
        foreach ($ar as $var)
            array_push($aux, $var);
        rsort($aux);
        $dev = array();
        foreach ($aux as $val){
            foreach ($ar as $k => $v)
                if($v === $val && strlen($k) > 3 && strcmp($query,$k) != 0) array_push($dev, $k);
        }
        return  array_unique($dev);
    }
    function guardar_newsletter($name, $email){
        global $wpdb;
        $sql = sprintf("INSERT INTO newsletter VALUES (NULL, '%s', '%s', NOW())", $name, $email);
        $wpdb->get_results($sql);
        add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));
        wp_mail('operaciones@jgarcialopez.com.mx', 'JGL Suscripción a Newsletter', sprintf('<ul><li><strong>Name: </strong>%s</li><li><strong>Correo: </strong>%s</li></ul>', $name, $email));
        wp_mail('zu.kleinundgross@gmail.com', 'JGL Suscripción a Newsletter', sprintf('<ul><li><strong>Name: </strong>%s</li><li><strong>Correo: </strong>%s</li></ul>', $name, $email));
        wp_mail('oscarpadillag@gmail.com', 'JGL Suscripción a Newsletter', sprintf('<ul><li><strong>Name: </strong>%s</li><li><strong>Correo: </strong>%s</li></ul>', $name, $email));
        wp_mail('jades@kleinundgross.net', 'JGL Suscripción a Newsletter', sprintf('<ul><li><strong>Name: </strong>%s</li><li><strong>Correo: </strong>%s</li></ul>', $name, $email));
        ?>
        <p>Tus datos han sido recibidos. Pronto comenzarás a recibir noticias de nosotros.</p>
        <?php
    }
    function guardar_planes($name, $email){
        global $wpdb;
        $sql = sprintf("INSERT INTO planes VALUES (NULL, '%s', '%s', NOW())", $name, $email);
        $wpdb->get_results($sql);
        add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));
        wp_mail('operaciones@jgarcialopez.com.mx', 'JGL Suscripción a Planes', sprintf('<ul><li><strong>Name: </strong>%s</li><li><strong>Correo: </strong>%s</li></ul>', $name, $email));
        wp_mail('zu.kleinundgross@gmail.com', 'JGL Suscripción a Planes', sprintf('<ul><li><strong>Name: </strong>%s</li><li><strong>Correo: </strong>%s</li></ul>', $name, $email));
        wp_mail('oscarpadillag@gmail.com', 'JGL Suscripción a Planes', sprintf('<ul><li><strong>Name: </strong>%s</li><li><strong>Correo: </strong>%s</li></ul>', $name, $email));
        wp_mail('jades@kleinundgross.net', 'JGL Suscripción a Planes', sprintf('<ul><li><strong>Name: </strong>%s</li><li><strong>Correo: </strong>%s</li></ul>', $name, $email));
        ?>
        <p>Tus datos han sido recibidos. Pronto uno de nuestros asesores se pondrá en contacto contigo.</p>
        <?php
    }
    function guardar_comment($name, $email, $tel, $plan, $message){
        global $wpdb;
        $sql = sprintf("INSERT INTO contacto VALUES (NULL, '%s', '%s', '%s', '%s', '%s', NOW())", $name, $email, $tel, $plan, $message);
        $wpdb->get_results($sql);
        add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));
        wp_mail('operaciones@jgarcialopez.com.mx', 'JGL Mensaje de contacto', sprintf('<ul><li><strong>Name: </strong>%s</li><li><strong>Correo: </strong>%s</li><li><strong>Teléfono: </strong>%s</li><li><strong>Plan: </strong>%s</li><li><strong>Mensaje: </strong>%s</li></ul>', $name, $email, $tel, $plan, $message));
        wp_mail('oscarpadillag@gmail.com', 'JGL Mensaje de contacto', sprintf('<ul><li><strong>Name: </strong>%s</li><li><strong>Correo: </strong>%s</li><li><strong>Teléfono: </strong>%s</li><li><strong>Plan: </strong>%s</li><li><strong>Mensaje: </strong>%s</li></ul>', $name, $email, $tel, $plan, $message));
        wp_mail('zu.kleinundgross@gmail.com', 'JGL Mensaje de contacto', sprintf('<ul><li><strong>Name: </strong>%s</li><li><strong>Correo: </strong>%s</li><li><strong>Teléfono: </strong>%s</li><li><strong>Plan: </strong>%s</li><li><strong>Mensaje: </strong>%s</li></ul>', $name, $email, $tel, $plan, $message));
        wp_mail('jades@kleinundgross.net', 'JGL Mensaje de contacto', sprintf('<ul><li><strong>Name: </strong>%s</li><li><strong>Correo: </strong>%s</li><li><strong>Teléfono: </strong>%s</li><li><strong>Plan: </strong>%s</li><li><strong>Mensaje: </strong>%s</li></ul>', $name, $email, $tel, $plan, $message));
        ?>
        <div id="support"><i class="icon-close"></i></div>
        <h3>¡Tu mensaje ha sido enviado con éxito!</h3>
        <p>En breve te contactará un asesor de J. García López</p>
        <?php
    }
    function calendario($inicio, $fin){
        global $wpdb;
        $sql = sprintf("SELECT a.post_date FROM wp_posts AS a INNER JOIN wp_term_relationships AS b ON a.ID = b.object_id WHERE b.term_taxonomy_id = '26' AND a.post_date > '%s' AND a.post_date <= '%s' GROUP BY MONTH(a.post_date)", $inicio, $fin);
        $dev = $wpdb->get_results($sql);
        $fecha = new DateTime($dev[0]->post_date);
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        echo "<!--calendario:".$sql."-->";
        ?>
            <div class="archives">
                <div class="year func_calendario">
                    <a class="move" data-year="<?php echo date("Y", strtotime($inicio . " -1 year")); ?>"  data-category="26"><</a>
                    <a class="current"><?php echo $fecha->format("Y"); ?></a>
                    <a class="move" data-year="<?php echo date("Y", strtotime($inicio . " +1 year")); ?>"  data-category="26">></a>
                </div>
        <?php
        foreach ($dev as $d):
            $fecha = new DateTime($d->post_date);
            ?>
            <?php 
          $wibblyWobblyURL = site_url().'/'.$fecha->format("Y").'/'.$fecha->format("m");
            $new_url = add_query_arg(array('categoria' => 26), $wibblyWobblyURL);?>
<a href="<?php echo $new_url; ?>" data-date="<?php printf("%s_%s", $fecha->format("Y"), $fecha->format("m")); ?>" data-category="26"><?php echo $meses[$fecha->format("n")-1]; ?></a>
            <?php
        endforeach;
        ?>
            </div>
        <?php
    }
    function guardar_testimonio($name, $email, $content){
        global $wpdb;
        $sql = sprintf("INSERT INTO testimonios VALUES (NULL, '%s', '%s', '%s', NOW())", $name, $email, $content);
        $wpdb->get_results($sql);
        add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));
        wp_mail('ac@manoderecha.mx', 'JGL Mensaje de testimonio', sprintf('<ul><li><strong>Nombre: </strong>%s</li><li><strong>Correo: </strong>%s</li><li><strong>Mensaje: </strong>%s</li></ul>', $name, $email, $content));
        wp_mail('zu.kleinundgross@gmail.com', 'JGL Mensaje de testimonio', sprintf('<ul><li><strong>Nombre: </strong>%s</li><li><strong>Correo: </strong>%s</li><li><strong>Mensaje: </strong>%s</li></ul>', $name, $email, $content));
        ?>

        <p>Tu testimonial ha sido recibido. Muchas gracias por compartir tu opinión.</p>
        <?php
    }
    function ver_archivo($year, $category){
        global $wpdb;
        $inicio = sprintf("%s-01-01", $year);
        $fin = sprintf("%s-12-31", $year);
        $sql = sprintf("SELECT a.post_date FROM wp_posts AS a INNER JOIN wp_term_relationships AS b ON a.ID = b.object_id WHERE b.term_taxonomy_id = '%s' AND a.post_date > '%s' AND a.post_date <= '%s' GROUP BY MONTH(a.post_date)", $category, $inicio, $fin);
        $dev = $wpdb->get_results($sql);
        $fecha = new DateTime($dev[0]->post_date);
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        echo '<!-- Categoria: '.$category.' SQL: '.$sql.'-->';
        ?>
            <div class="year calendario">
                <a class="move" data-year="<?php print((int)$year - 1); ?>" data-category="<?php echo $category; ?>"><</a>
                <a class="current"><?php echo $year ?></a>
                <a class="move" data-year="<?php print((int)$year + 1); ?>" data-category="<?php echo $category; ?>">></a>
            </div>
        <?php
        foreach ($dev as $d):
            $fecha = new DateTime($d->post_date);
            ?>
            <?php $wibblyWobblyURL = site_url().'/'.$fecha->format("Y").'/'.$fecha->format("m");
            $new_url = add_query_arg(array('categoria' => $category), $wibblyWobblyURL);?>
<a href="<?php echo $new_url; ?>" data-date="<?php printf("%s_%s", $fecha->format("Y"), $fecha->format("m")); ?>" data-category="<?echo $category ?>"><?php echo $meses[$fecha->format("n")-1]; ?></a>
            <?php
        endforeach;
    }
    function view_archive($year){
        global $wpdb;
        $start = sprintf("%s-01-01", $year);
        $end = sprintf("%s-12-31", $year);
        $sql = sprintf("SELECT a.post_date FROM wp_posts AS a INNER JOIN wp_term_relationships AS b ON a.ID = b.object_id WHERE b.term_taxonomy_id = '%s' AND a.post_date > '%s' AND a.post_date <= '%s' GROUP BY MONTH(a.post_date)", $category, $inicio, $fin);        
        $dev = $wpdb-> get_results($sql);
        $fecha = new DataTime($dev[0]->post_date);
        $meses= array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        ?>
        <div class="year calendar">
            <a class="move" data-year="<?php print((int)$year -1);?>" data-category="26"><</a>
            <a class="current"><?php echo $year ?></a>
            <a class="move" data-year="<?php print((int)$year +1);?>" data-category="26">></a>
        </div>
        <?php
        foreach ($dev as $d):
            $fecha = new DateTime($d->post_date);
            ?>
             <?php $wibblyWobblyURL = site_url().'/'.$fecha->format("Y").'/'.$fecha->format("m");
            $new_url = add_query_arg(array('categoria' => 26), $wibblyWobblyURL);?>

<a href="<?php echo $new_url; ?>" data-date="<?php printf("%s_%s", $fecha->format("Y"), $fecha->format("m")); ?>" data-category="26"><?php echo $meses[$fecha->format("n")-1]; ?></a>
            <?php
        endforeach;
    }
    function ultimo_post(){
        global $wpdb;
        $sql = "SELECT DATE_FORMAT(MAX( a.post_date ), '%Y') as year FROM wp_posts AS a INNER JOIN wp_term_relationships AS b ON a.ID = b.object_id WHERE b.term_taxonomy_id = '26'";
        $dev = $wpdb->get_results($sql);
        return $dev[0]->year;
    }
    function ultimo_test(){
        global $wpdb;
        $sql = "SELECT DATE_FORMAT(MAX( a.post_date ), '%Y') as year FROM wp_posts AS a INNER JOIN wp_term_relationships AS b ON a.ID = b.object_id WHERE b.term_taxonomy_id = '27'";
        $dev = $wpdb->get_results($sql);
        return $dev[0]->year;
    }
    function calendario_test($inicio, $fin){
        global $wpdb;
        $sql = sprintf("SELECT a.post_date FROM wp_posts AS a INNER JOIN wp_term_relationships AS b ON a.ID = b.object_id WHERE b.term_taxonomy_id = '27' AND a.post_date > '%s' AND a.post_date <= '%s' GROUP BY MONTH(a.post_date)", $inicio, $fin);
        $dev = $wpdb->get_results($sql);
        $fecha = new DateTime($dev[0]->post_date);
        ?>
                    <div class="archives" data-d="<?php echo $sql; ?>">
                        <div class="year">
                            <a class="move" data-year="<?php echo date("Y", strtotime($inicio . " -1 year")); ?>"><</a>
                            <a class="current"><?php echo $fecha->format("Y"); ?></a>
                            <a class="move" data-year="<?php echo date("Y", strtotime($inicio . " +1 year")); ?>">></a>
                        </div>
        <?php
        foreach ($dev as $d):
            $fecha = new DateTime($d->post_date);
            ?>
                        <a href="#" data-year="<?php echo $fecha->format("Y"); ?>" data-month="<?php echo $fecha->format("m"); ?>" class="test"><?php echo $fecha->format("F"); ?></a>
            <?php
        endforeach;
        ?>
                    </div>
        <?php
    }
    function ver_test($year){
        global $wpdb;
        $inicio = sprintf("%s-01-01", $year);
        $fin = sprintf("%s-12-31", $year);
        $sql = sprintf("SELECT a.post_date FROM wp_posts AS a INNER JOIN wp_term_relationships AS b ON a.ID = b.object_id WHERE b.term_taxonomy_id = '27' AND a.post_date > '%s' AND a.post_date <= '%s' GROUP BY MONTH(a.post_date)", $inicio, $fin);
        $dev = $wpdb->get_results($sql);
        $fecha = new DateTime($dev[0]->post_date);
        ?>
                        <div class="year" data-d="<?php echo $year; ?>">
                            <a class="move" data-year="<?php print((int)$year - 1); ?>" ><</a>
                            <a class="current"><?php echo $year ?></a>
                            <a class="move" data-year="<?php print((int)$year + 1); ?>">></a>
                        </div>
        <?php
        foreach ($dev as $d):
            $fecha = new DateTime($d->post_date);
            ?>
                        <a href="#" data-year="<?php echo $year ?>" data-month="<?php echo $fecha->format("m"); ?>" class="test"><?php echo $fecha->format("F"); ?></a>
            <?php
        endforeach;
    }
    function test_post($year, $month){
        global $wpdb;
        $date = sprintf("%s-%s-01", $year, $month);
        $sql = "SELECT a.ID, a.post_content, a.post_title FROM wp_posts AS a INNER JOIN wp_term_relationships AS b ON a.ID = b.object_id WHERE b.term_taxonomy_id = '27' AND a.post_date BETWEEN '".$date."' AND DATE_ADD( '".$date."', INTERVAL 1 MONTH)";
        $dev = $wpdb->get_results($sql);
        foreach ($dev as $post):
        ?>
                        <div class="item">
                            <img src="<?php uniq_img($post->ID); ?>" class="photo">
                            <h3><?php echo $post->post_title; ?></h3>
                            <?php echo $post->post_content; ?>
                        </div>
        <?php
        endforeach;
    }
    function enviar_esquela($from, $to, $mail, $content){
        add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));
        //wp_mail('ac@manoderecha.mx', "<!DOCTYPE html><head><meta charset='utf-8'><title></title></head><body class='compra'><p>%s te ha enviado una esquela</p><div class='slide'>%s</div></body></html>", sprintf('', $to, urldecode(base64_decode($content))));
        wp_mail('ac@manoderecha.mx', 'Mensaje de JGL',sprintf("<!DOCTYPE html><head><meta charset='utf-8'><title></title></head><body class='compra'><p>%s te ha enviado una esquela</p><div class='slide'>%s</div></body></html>", $to, urldecode(base64_decode($content))));
        echo "enviado";
    }
    function calendar($start, $end){
        global $wpdb;
        $sql = sprintf("SELECT a.post_date FROM wp_posts AS a INNER JOIN wp_term_relationships AS b ON a.ID = b.object_id WHERE b.term_taxonomy_id= '34' AND a.post_date > '%s' AND a.post_date <= '%s' GROUP BY MONTH(a.post_date)", $start, $end);
        $dev = $wpdb->get_results($sql);
        $fecha = new DateTime($dev[0]->post_date);
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    ?>
            <div class="archives">
                <div class="year func_calendar">
                    <a class="move" data-year="<?php echo date("Y", strtotime($start . " -1 year")); ?>"  data-category="34"><</a>
                    <a class="current"><?php echo $fecha->format("Y"); ?></a>
                    <a class="move" data-year="<?php echo date("Y", strtotime($end . " +1 year")); ?>"  data-category="34">></a>
                </div>
        <?php
            foreach ($dev as $d):
            $fecha = new DateTime($d->post_date);
        ?>
        <?php 
            $wibblyWobblyURL = site_url().'/'.$fecha->format("Y").'/'.$fecha->format("m");
            $new_url = add_query_arg(array('categoria' => 34), $wibblyWobblyURL);?>
<a href="<?php echo $new_url; ?>" data-date="<?php printf("%s_%s", $fecha->format("Y"), $fecha->format("m")); ?>" data-category="34"><?php echo $meses[$fecha->format("n")-1]; ?></a>
        <?php
            endforeach;
        ?>
            </div>
        <?php
    }
    function ultima_semblanza(){
        global $wpdb;
        $sql = "SELECT DATE_FORMAT(MAX(a.post_date), '%Y') as year FROM wp_posts AS a INNER JOIN wp_term_relationships AS b ON a.ID = b.object_id WHERE b.term_taxonomy_id = '34'";
        $dev = $wpdb->get_results($sql);
        return $dev[0]->year;
    }
?>