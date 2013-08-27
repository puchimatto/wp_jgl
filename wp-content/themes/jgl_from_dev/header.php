<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title> <?php wp_title(''); ?> <?php if(wp_title('', false)) { echo ' | '; } bloginfo('name'); ?> </title>
        <meta name="description" content="Funerarias J. Garc�a L�pez, 20 a�os de experiencia en ofrecer servicios funerarios de alta calidad, contamos con capillas, ata�des y urnas, cremaci�n y traslados nacionales e internacionales." />
<meta name="keywords" content="Funerarias, Velatorios, Capillas, Servicios funerarios, Garc�a L�pez, Cremaciones" />

        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="<?php bloginfo("template_url"); ?>/images/favicon.ico" />
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/main.css">
        <script src="<?php bloginfo('template_url'); ?>/scripts/vendor/modernizr.min.js"></script>
        <script type="text/javascript"> var homeURL = "<?php echo hurl(); ?>"; </script>
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/jquery/jquery-ui.css">

    </head>
    <?php  ?>
    <body class="home">
        <header class="site-header">
            <div class="container">
                <a class="site-title" href="<?php hurl(); ?>">
                    <h2>J. García López</h2>
                    <h3>La vida merece un homenaje</h3>
                </a>
                <div class="phone">
                    <p>Asistencia inmediata:<br>
                        <strong>5705 6000</strong></p>
                    <p>Planes a futuro:<br>
                        <strong>5546 7858</strong></p>
                </div>
                <div class="social">
                    <p>Síguenos en:</p>
                    <ul>
                        <li class="tw">
                            <a href="https://twitter.com/FunerariasJGL" title="twitter" target="blank">Twitter</a>
                        </li>
                        <li class="fb">
                            <a href="http://www.facebook.com/funerariasjgarcialopez" title="Facebook" target="blank">Facebook</a>
                        </li>
                        <li class="yt">
                            <a href="https://www.youtube.com/user/FJGarciaLopez?feature=watch" title="YouTube" target="blank">YouTube</a>
                        </li>
                        <li class="mail">
                            <a href="<?php hurl(); ?>contacto" title="e-mail">E-mail</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="site-nav">
            <nav class="container">
                <ul class="main">
                    <li>
                        <a href="<?php hurl(); ?>quienes-somos">¿Quiénes somos?</a>
                        <ul class="sub" style="display:none; opacity: 1;">
                            <li><a href="<?php hurl(); ?>quienes-somos/#about-statement">Misión y visión</a></li>
                            <li><a href="<?php hurl(); ?>quienes-somos/#about-values">Filosofía y valores</a></li>
                            <li><a href="<?php hurl(); ?>quienes-somos/#about-history">Historia</a></li>
                            <li><a href="<?php hurl(); ?>quienes-somos/#about-campaigns">Campa&ntilde;as Publicitarias</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php hurl(); ?>nuestros-servicios">Nuestros servicios</a>
                        <ul class="sub" style="display:none; opacity: 1;">
                            <li><a href="<?php hurl(); ?>nuestros-servicios/">Plan de necesidad inmediata</a></li>
                            <li><a href="<?php hurl(); ?>nuestros-servicios/#services-enterprise">Planes Empresariales</a></li>                            
                            <li><a href="<?php hurl(); ?>nuestros-servicios/#services-network">Funeral NET</a></li>
                            <li><a href="<?php hurl(); ?>nuestros-servicios/#services-cremation">Cremación</a></li>
                            <li><a href="<?php hurl(); ?>nuestros-servicios/#services-embalming">Embalsamamiento</a></li>
                            <li><a href="<?php hurl(); ?>nuestros-servicios/#services-urns">Urnas</a></li>
                            <li><a href="<?php hurl(); ?>nuestros-servicios/#services-caskets">Ataúdes</a></li>
                            <li><a href="<?php hurl(); ?>nuestros-servicios/#services-additional">Servicios Adicionales</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php hurl(); ?>planes-a-futuro">Planes a futuro</a>
                        <ul class="sub" style="display:none; opacity: 1;">
                            <?php obtener_li_planes(); ?>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php hurl(); ?>sucursales">Sucursales</a>
                        <ul class="sub obituaries" style="display:none; opacity: 1;">
                            <?php obtener_li_sucursales(); ?>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php hurl(); ?>esquelas">Esquelas</a>
                        <ul class="sub obituaries" style="display:none; opacity: 1;">
                            <?php obtener_li_esquelas(); ?>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php hurl();?>semblanza-digita">Semblanza digital</a>
                        <ul class="sub" style="display:none; opacity: 1;">
                            <li><a href="<?php hurl(); ?>semblanza-digital/#semblanza-intro">¿Qué es Semblanza Digital?</a></li>
                            <li><a href="<?php hurl(); ?>semblanza-digital/#semblanza-find">Localiza semblanzas Digitales</a></li>
                            <li><a href="<?php hurl(); ?>semblanza-digital/#semblanza-interactive">Esquelas Interactivas</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php hurl(); ?>blog">Blog</a></li>
                    <li class="search">
                        <form action="<?php hurl(); ?>" >
                            <label for="search-q">Buscar</label>
                            <input id="search-q" type="text" name="s">
                            <button type="submit" class="search-button">Buscar</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>