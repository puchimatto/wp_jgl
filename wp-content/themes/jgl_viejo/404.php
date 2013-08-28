<?php 
    get_header();
?>
        <div class="content">
            <div class="container">
                <section id="not-found">
                    <h1>Error 404</h1>
                    <h2>Al parecer no<br>encontramos resultados.</h2>
                    <p class="f404">Lo sentimos, no hemos encontrado<br>ningún resultado que coincida con tu<br>búsqueda.</p>
                    <p class="f404">¿Te gustaría reportarlo?<br><a href="#">Envíamos un correo</a></p>
                    <?php black_footer(); ?>
                </section>
            </div>
        </div>
        <script type="text/javascript"> document.getElementsByTagName('body')[0].setAttribute('class','not-found'); </script>
<?php 
    get_footer();
?>