
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php bloginfo('template_url'); ?>/scripts/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php bloginfo('template_url'); ?>/scripts/plugins.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/scripts/holder.js"></script>
    <script>

     var jsonSemblanza = $.ajax({
           url: "http://jglnuevo.vincoorbisdev.com/wp-content/themes/jgl/scripts/json/search.json.php",
           data: {busqueda: 1},
           dataType: "json",
           async: false
       }).responseText;
 
  </script>
    <script src="<?php bloginfo('template_url'); ?>/scripts/main.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/scripts/vendor/jquery-ui.min.js"></script>    

 <script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-5289294-11");
pageTracker._trackPageview();
} catch(err) {}</script>   
</body>
</html>