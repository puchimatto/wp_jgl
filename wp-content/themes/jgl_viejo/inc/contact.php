<?php
    function pagina_contacto($title, $content){
        ?>
        <div class="content">
            <div class="container">
                <section>
                    <div id="info">
                        <?php echo $content; ?>
                        <!--<h3>Compartir un testimonio</h3>-->
                        <?php
                            $n1 = rand(1,10);
                            $n2 = rand(1,10);
                        ?>
                        <form method="post" id="comment-form-contact" data-sum="<?php printf("¿Cuánto es %s + %s?", $n1, $n2); ?>">
                            <input type="hidden" name="as" value="<?php printf("%s_%s", $n1, $n2); ?>">
                            <ul>
                                <li>
                                    <label for="nombre">Nombre*</label>
                                    <input type="text" placeholder="Ejemplo: Mario" name="name" id="name">
                                    <div class="error">
                                        <div class="icon-error">
                                            <i>&nbsp;</i>
                                        </div>
                                        <p>Es necesario completar este campo</p>
                                    </div>
                                </li>
                                <li>
                                    <label for="correo">Correo*</label>
                                    <input type="text" placeholder="Ejemplo: mario09@correo.com" name="email" id="email">
                                    <div class="error">
                                        <div class="icon-error">
                                            <i>&nbsp;</i>
                                        </div>
                                        <p>Es necesario ingresar el correo electrónico completo</p>
                                    </div>
                                </li>
                                <li>
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" placeholder="Ejemplo: 53614255" name="tel" id="tel">
                                    <div class="error">
                                        <div class="icon-error">
                                            <i>&nbsp;</i>
                                        </div>
                                        <p>Debe escribir un número telefónico correcto</p>
                                    </div>
                                </li>
                                <li style="z-index:999;">
                                    <label for="asesor">Te interesa en particular un servicio de:</label>
                                    <?php
                                        $value = "";
                                        if(isset($_GET["id"])){
                                            $p = get_post($_GET["id"]);
                                            $value = $p->post_title;
                                        }
                                    ?>
                                    <input type="text" placeholder="Elige el servicio que te interese" value="<?php echo $value; ?>" name="plan" id="plan" disabled>
                                    <div id="key">
                                    </div>
                                    <div id="plan-options">
                                        <?php obtener_a_planes(); ?>
                                        <a href="#">Planes empresariales</a>
                                        <a href="#">Planes a futuro</a>
                                        <a href="#">Cremación</a>
                                        <a href="#">Embalsamamiento</a>
                                        <a href="#">Urnas</a>
                                        <a href="#">Ataudes</a>
                                        <a href="#">Floreria</a>
                                        <a href="#">Servicios Religiosos</a>
                                        <a href="#">Publicación de esquelas en periódicos</a>
                                        <a href="#">Traslado de acompañantes y ejecutivo</a>
                                        <a href="#">Servicio personalizado de cafeteria</a>
                                        <a href="#">Esquelas en linea</a>
                                        <a href="#">Semblanza digital</a>
                                        <a href="#">Traslados digitales e internacionales</a>
                                        <a href="#">Cuarteto musical</a>
                                        <a href="#">Exhumación</a>
                                    </div>
                                </li>
                                <li>
                                    <label for="mensaje">Mensaje</label>
                                    <textarea id="messaje" name="message"></textarea>
                                </li>
                                <li>
                                    <p>*Los campos marcados con asterisco son obligatorios</p>
                                </li>
                                <li>
                                    <button type="submit">Enviar</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <?php black_footer(); ?>
                </section>
            </div>
        </div>
        <div id="fondo"></div>
        <div id="cuadro">
        </div>
        <script type="text/javascript"> document.getElementsByTagName("body")[0].setAttribute("class", "contact"); </script>
        <?php
    }
?>