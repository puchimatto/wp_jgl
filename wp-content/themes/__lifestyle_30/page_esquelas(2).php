<?php

?>

<?php get_header(); ?>

<div id="content">

	<div id="contentleft">
	
<?	
	if ( is_page('ataudes') ) {
?>		
<div id="homepagetop">  
<div class="featuredtop">
            
	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_ataudes.php'); ?>
                 
</div>
<img src=http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/slogan.jpg border="0">
</div>    

<?
} elseif ( is_page('campanas-publicitarias') && !$post->post_parent ) {
?>  

<div id="homepagetop">  
<div class="featuredtop">
            
	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_campanas_publicitarias.php'); ?>
                
</div>
<img src=http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/slogan.jpg border="0">
</div> 

<?	
} elseif ( is_page('pedregal') ) {
?>  

<div id="homepagetop">  
<div class="featuredtop">
            
	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_casa_pedregal.php'); ?>
                
</div>
<img src=http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/slogan.jpg border="0">
</div> 

<?	
} elseif ( is_page('urnas')) {
?>  

<div id="homepagetop">  
<div class="featuredtop">
            
	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_urnas.php'); ?>
                
</div>
<img src=http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/slogan.jpg border="0">
</div> 

<?	
} elseif ( is_page('quienes-somos') && !$post->post_parent ) {
?>  

<div id="homepagetop">  
<div class="featuredtop">
            
	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_experiencia.php'); ?>
                
</div>
<img src=http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/slogan.jpg border="0">
</div> 

<?	
} elseif ( is_page('servicio-al-cliente') && !$post->post_parent ) {
?>  

<div id="homepagetop">  
<div class="featuredtop">
            
	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_servicio_cliente.php'); ?>
                
</div>
<img src=http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/slogan.jpg border="0">
</div> 

<?	
} elseif ( is_page('sucursales') && !$post->post_parent ) {
?>  

<div id="homepagetop">  
<div class="featuredtop">
            
	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_sucursales.php'); ?>
                
</div>
<img src=http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/slogan.jpg border="0">
</div> 

<?	
} elseif ( is_page('esquelas') && !$post->post_parent ) {
?>  

<div id="homepagetop">  
<div class="featuredtop">
            
	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_esquelas.php'); ?>
                
</div>
<img src=http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/slogan.jpg border="0">
</div> 

<?	
} elseif ( is_page('la-cristina-blog') && !$post->post_parent ) {
?>  

<div id="homepagetop">  
<div class="featuredtop">
            
	<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery_blog.php'); ?>
                
</div>
</div> 

<?	
} else {
	$uri= $_SERVER['REQUEST_URI'];
	$post_id = get_post($post->ID); 
    $slug = $post_id->post_name; 
//	echo $slug;

	if ($slug=='contact-us') {
		
	} else {
?>	

<div id="homepagetop">  
<div class="featuredtop">

	<img src="<?php echo bloginfo('template_url'); ?>/images_pages/<? echo $slug; ?>.jpg">
	

</div>
<img src=http://www.jgarcialopez.com.mx/wp-content/themes/lifestyle_30/images/slogan.jpg border="0">
</div>
<?
	}
}
?>

	
	
	
		<div class="postarea">
	
		<?php include(TEMPLATEPATH."/breadcrumb.php");?>
		
		
		<?php
			
			if (is_page('127')) {
			
			?>	
				
              
				<div id="homebox">
                <? query_posts('cat=10'); ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                
                    <div class="boxitem">
						<h5><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h5>
                        <span class="itemdets">
                        
                            Posted On: <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_time('F j, Y'); ?></a><br />
                            Posted In: <?php the_category(', ') ?><br />
                            Comments: <a href="<?php the_permalink() ?>#comments" title="<?php the_title() ?>"><?php comments_number('No Responses','One Response','% Responses'); ?></a>
                        </span>
                        <?
                        $key="thumbnail";
                        if (!get_post_meta($post->ID, $key, true)=='') {
                        ?>	
                        <img class="alignleft size-thumbnail wp-image-1785" src="<?php echo get_post_meta($post->ID, $key, true); ?>" alt="<?php the_title() ?>" width = "85"  />
                        <?
                        }
                        ?>
                        <?php the_content_rss('', TRUE, '', 50); ?>
                        <?php //the_content(); ?>
						<span class="morelink">
                        	<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">Read More...</a>
                        </span>
                    </div>
                    
                <?php endwhile; else: ?>
                <?php endif; ?>    
                
                </div>   
                
                <div id="pagination">
            		<?php next_posts_link('<span class="navforward"></span>') ?><?php previous_posts_link('<span class="navback"></span>') ?>
            		<ul>
<?php //get_archives('monthly'); ?>
</ul>
            		
            	</div>
			
            <?php	
            			
			} else {
		
			?>		
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1><br />
		
			<?php the_content(__('Read more'));?><div style="clear:both;"></div><?php //edit_post_link('(Edit)', '', ''); ?>
			
<!--<IFRAME SRC="http://www.jgarcialopez.com.mx/?page_id=15&idsucursalobituario=0&modoreal=todos" WIDTH="600" HEIGHT="1700" frameborder="0">
Su navegador necesita soportar Iframes
</IFRAME>-->

<? // Inicia Esquelas ?>
 
<?

if (is_page('70')) { $pagina_id='70'; }
elseif (is_page('72')) { $pagina_id='72'; }
elseif (is_page('74')) { $pagina_id='74'; }
elseif (is_page('76')) { $pagina_id='76'; }
elseif (is_page('78')) { $pagina_id='78'; }
elseif (is_page('80')) { $pagina_id='80'; }
else { $pagina_id='15'; }

//echo "page ".get_page();

$idsucursalobituario = (isset($_POST['idsucursalobituario'])) ? $_POST['idsucursalobituario'] : ((isset($_GET['idsucursalobituario'])) ? $_GET['idsucursalobituario'] : '');

$modoreal = (isset($_POST['modoreal'])) ? $_POST['modoreal'] : ((isset($_GET['modoreal'])) ? $_GET['modoreal'] : '');
$pagina = (isset($_POST['pagina'])) ? $_POST['pagina'] : ((isset($_GET['pagina'])) ? $_GET['pagina'] : '');
$palabra = (isset($_POST['palabra'])) ? $_POST['palabra'] : ((isset($_GET['palabra'])) ? $_GET['palabra'] : '');

//echo "sucursal ".$idsucursalobituario;

include("include/connection.php"); 
include("include/funciones.php"); 
$meshoy=date("m");
$anohoy=date("Y");

$anofinal=$anohoy;
$archivoactual="?page_id=15&";
$tituloanimado=11;
$idcontenido=3;
$titulolateral="Esquelas";
$imagengrande="/finales/ESQUELAS.jpg";
if($idsucursalobituario<>0)
{
  $resultx = @mysql_query("select nombresubcontenido,imagen1subcontenido,introsubcontenido from subcontenidos where id=".$idsucursalobituario);
  while($rowx = mysql_fetch_array($resultx))
  {
     $imagengrande="/finales/ESQUELAS.jpg";
	 $domicilio=$rowx["introsubcontenido"];
     $tituloprincipal="Obituario. ".$rowx["nombresubcontenido"];
	 $titulo_esquela_indice="J GARCIA LOPEZ ".$rowx["nombresubcontenido"];
	 $titulo_pagina="Obituario. ".$rowx["nombresubcontenido"];
  }
  $idsubcontenido=$idsucursalobituario;
  $modo="subcontenido";
  $sqli=" and isucursalesquela=".$idsucursalobituario;
}
else
{
  $modo="contenido";
  if($modoreal=="todos")
  {
    $tituloprincipal="Todos los Obituarios";
    $titulo_pagina="Todos los Obituarios";
	$sqli="";
  }	
  else if($modoreal=="detalles")
  {
    $esquelaencontrada=1;
    $tituloprincipal="Esquela";
    $titulo_pagina="Esquela";
	$sqli="";
    $resultx = @mysql_query("select id,introdolienteesquela,dolienteesquela,participacionesquela,nombrepersonaesquela,ciudadesquela,fechadecesoesquela,agradecimientoesquela,itemplateesquela,isucursalesquela,textocomplementarioesquela,emailcondolenciasesquela,nombrescondolenciasesquela,aceptarcondolenciasesquela from esquelas where activo=1 and id=".$idesquela);
    if(mysql_num_rows($resultx)>0)
    {	    
      while($rowx = mysql_fetch_array($resultx))
      {
	    @mysql_query("update esquelas set visitasesquela=visitasesquela+1 where id=".$idesquela);
    	$tituloprincipal=$rowx["nombrepersonaesquela"];		
		
		$aceptarcondolenciasesquela=$rowx["aceptarcondolenciasesquela"];	
		
		$idesquela=$rowx["id"];
		$introdoliente=$rowx["introdolienteesquela"];
		$dolienteesquela=$rowx["dolienteesquela"];
		
		$participacionesquela=$rowx["participacionesquela"];
   	    if($participacionesquela=="") $participacionesquela="le comunica el fallecimiento de";	
		
		$ciudadesquela=$rowx["ciudadesquela"];
	    if($ciudadesquela=="") $ciudadesquela="acaecido el";	
		
		$fechadecesoesquela=$rowx["fechadecesoesquela"];
		
		$agradecimientoesquela=$rowx["agradecimientoesquela"];
   	    if($agradecimientoesquela=="") $agradecimientoesquela="agradecemos una oración en su memoria";

		$isucursalesquela=$rowx["isucursalesquela"]; 
		
		$emailcondolenciasesquela=$rowx["emailcondolenciasesquela"]; 
		$nombrescondolenciasesquela=$rowx["nombrescondolenciasesquela"]; 
		
		$textocomplementarioesquela=$rowx["textocomplementarioesquela"]; 		
		
		
		
		$resultx = @mysql_query("select nombresubcontenido,imagen1subcontenido,introsubcontenido from subcontenidos where id=".$isucursalesquela);
	    while($rowx = mysql_fetch_array($resultx))
		{
		  $imagengrande=$rowx["imagen1subcontenido"];
		  $titulo_pagina="Obituario. ".$rowx["nombresubcontenido"].". ".$tituloprincipal;
		  $titulo_esquela="J. GARCIA LOPEZ ".$rowx["nombresubcontenido"];
		  $domicilio=$rowx["introsubcontenido"];
		}  
		  
		$idsubcontenido=$isucursalesquela;
        $modo="subcontenido";  
	  }	
	}
	else 
	  $esquelaencontrada=0;  
  }	
  else
  {
    $tituloprincipal="Búsqueda de Obituarios";
    $titulo_pagina="Búsqueda de Obituarios";
	$sqli="and (dolienteesquela like '%".$palabra."%' or nombrepersonaesquela like '%".$palabra."%') ";
  }

}  

?>

<table width="40%" border="0" cellpadding="0" bgcolor="#262626">
  <!--<tr>
    <td width=241 align=center valign=top background=recursos/imagenespagina/boton.jpg><img src=recursos/imagenespagina/spacer.gif width=1 height=2><br>
      <a href=?page_id=15&idsucursalobituario=18#destino class=textogeneral>Casa 
      Pedregal</a></td>
  </tr>
  <tr>
    <td width=241 align=center valign=top background=recursos/imagenespagina/boton.jpg><img src=recursos/imagenespagina/spacer.gif width=1 height=2><br>
      <a href=?page_id=15&idsucursalobituario=7#destino class=textogeneral>Coyoac&aacute;n</a></td>
  </tr>
  <tr>
    <td width=241 align=center valign=top background=recursos/imagenespagina/boton.jpg><img src=recursos/imagenespagina/spacer.gif width=1 height=2><br>
      <a href=?page_id=15&idsucursalobituario=9#destino class=textogeneral>Pericentro</a></td>
  </tr>
  <tr>
    <td width=241 align=center valign=top background=recursos/imagenespagina/boton.jpg><img src=recursos/imagenespagina/spacer.gif width=1 height=2><br>
      <a href=?page_id=15&idsucursalobituario=8#destino class=textogeneral>Perisur</a></td>
  </tr>
  <tr>
    <td width=241 align=center valign=top background=recursos/imagenespagina/boton.jpg><img src=recursos/imagenespagina/spacer.gif width=1 height=2><br>
      <a href=?page_id=15&idsucursalobituario=10#destino class=textogeneral>Sat&eacute;lite</a></td>
  </tr>
  <tr>
    <td width=241 align=center valign=top background=recursos/imagenespagina/boton.jpg><img src=recursos/imagenespagina/spacer.gif width=1 height=2><br>
      <a href=?page_id=15&idsucursalobituario=6#destino class=textogeneral>Zona Rosa</a></td>
  </tr>-->
  <tr> 
    <td width=236 align=center valign=top background=recursos/imagenespagina/boton.jpg><img src=recursos/imagenespagina/spacer.gif width=6 height=2><br>
      <a href=?page_id=15&idsucursalobituario=0&modoreal=todos class=textogeneral>Ver todos</a></td>
  </tr>
  <tr></tr><tr></tr><tr></tr>
  <form action="http://www.jgarcialopez.com.mx?page_id=15&modoreal=buscar" name=formbusqueda method="post">
    <tr> 
      <td width=236 align=center valign=top> <input name="palabra" type="text" class="textogeneralform" size="25" width="200px" /> 
        &nbsp;&nbsp; </td>
    </tr>
    <tr>
      <td width=236 align=center valign=top background=recursos/imagenespagina/boton.jpg><img src=recursos/imagenespagina/spacer.gif width=6 height=2><br>
        <!--<input type="submit" value="Submit" />-->
        <a href="javascript: void(0);" onclick="document.formbusqueda.submit();return false;">Buscar</a>
        </td>
    </tr>
  </form>
</table>

<br>			
				<table width="100%" border="0" cellpadding="0"  bgcolor="#262626">
  <tr>
    <td><img src="recursos/imagenespagina/spacer.gif" width="10" height="1" /></td>
    <td width=471 class=textogeneral>
	<?
if($modoreal<>"detalles")
{
    $porpagina=6;
	if(!isset($pagina)) $pagina=0;
	
	$paginainicio=($pagina)*$porpagina;
	$paginafin=($pagina+1)*$porpagina;
	
	$resultx = @mysql_query("select count(id) from esquelas where activo=1 ".$sqli." and fechaaperturaesquela<='".$fechahoy."' and fechasalidaesquela>='".$fechahoy."' order by nombrepersonaesquela asc");
	while($rowx = mysql_fetch_array($resultx)) $totalesquelas=$rowx[0];
	
	 $resultx = @mysql_query("select id,introdolienteesquela,dolienteesquela,participacionesquela,nombrepersonaesquela,ciudadesquela,fechadecesoesquela,agradecimientoesquela,itemplateesquela from esquelas where activo=1 ".$sqli." and fechaaperturaesquela<='".$fechahoy."' and (fechasalidaesquela>'".$fechahoy."' or (fechasalidaesquela='".$fechahoy."' and horaaltaesquela<='".$horaactual."')) order by nombrepersonaesquela asc limit ".$paginainicio.",".$porpagina);
  if(mysql_num_rows($resultx)>0)
  {	 
    if($modoreal=="busqueda") echo("Búsqueda : ".$palabra);
    echo("<table cellpadding=5 cellspacing=0 border=0>");
	$cuenta=0;
    while($rowx = mysql_fetch_array($resultx))
    {
		$cuenta=$cuenta+1;
		if($cuenta==1) echo("<tr>");
		echo("<td>");
		$cadena="?id=".$rowx["id"];
		$cadena.="&dato1=".urlencode(utf8_encode($rowx["introdolienteesquela"]));
		$cadena.="&dato2=".urlencode(utf8_encode($rowx["dolienteesquela"]));
		
		$participacion=$rowx["participacionesquela"];
   	    if($participacion=="") $participacion="le comunica el fallecimiento de";
		$cadena.="&dato3=".urlencode(utf8_encode($participacion));
		
		$cadena.="&dato4=".urlencode(utf8_encode($rowx["nombrepersonaesquela"]));
		
		$acaecido=$rowx["ciudadesquela"];
	    if($acaecido=="") $acaecido="acaecido el";	
		$cadena.="&dato5=".urlencode(utf8_encode($acaecido));
		
		$cadena.="&dato6=".conviertedia($rowx["fechadecesoesquela"]);
		
		$agradecimiento=$rowx["agradecimientoesquela"];
   	    if($agradecimiento=="") $agradecimiento="agradecemos una oración en su memoria";
		$cadena.="&dato7=".urlencode(utf8_encode($agradecimiento)); 		
		
		$cadena.="&template=".$rowx["itemplateesquela"]; 	
		
//		echo "CADENA ".$cadena;	
	?>
	<script type="text/javascript">startIeFix();</script><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="210" height="257">
                  <param name="movie" value="obituariointerior.swf<?=$cadena?>&" />
                  <param name="quality" value="high" />
                  <embed src="obituariointerior.swf<?=$cadena?>&" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="210" height="257"></embed>
</object><!-- --><script type="text/javascript">endIeFix();</script><br />
	<?
	    echo("</td>");
	    if($cuenta==2) 
		{
		  $cuenta=0;
		  echo("</tr>");
		} 
      } 
	  echo("<tr><td></td><td align=center>");
	  $paginaanterior=$pagina-1;
	  if($pagina>0) echo("<a href=?page_id=".$pagina_id."&idsucursalobituario=".$idsucursalobituario."&modoreal=".$modoreal."&pagina=".$paginaanterior."&#esquela class=textogeneral>Anterior</a>");
	  if($paginafin<=$totalesquelas)
	  {
  	     $paginasiguiente=$pagina+1;
		 echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=?page_id=".$pagina_id."&idsucursalobituario=".$idsucursalobituario."&modoreal=".$modoreal."&pagina=".$paginasiguiente."&#esquela class=textogeneral>Siguiente</a>");
	  }
	  echo("</td></tr>");
	  if($domicilio<>"")	  	
	  {
	    $titulo_esquela=$titulo_esquela_indice;
	  }	
	  	
	  echo("</table>"); 
	}  
	else echo("No se encontraron obituarios");
}
else
{
  echo("<br><center>");
  if($esquelaencontrada==1)
  {
	  echo("<span class=texto12>".$introdoliente."</span><span class=texto8><br><br></span>");
	  echo("<span class=texto16>".$dolienteesquela."</span><span class=texto8><br><br></span>");  
	  echo("<span class=texto10>".$participacionesquela."</span><span class=texto8><br><br></span>");
	  echo("<span class=texto17>".$tituloprincipal."</span><span class=texto8><br><br></span>");
	  echo("<span class=texto10>".$ciudadesquela."</span><br>");
	  echo("<span class=texto10>".conviertedia($fechadecesoesquela)."</span><span class=texto8><br><br></span>");
	  echo("<span class=texto8>".$agradecimientoesquela."</span><span class=texto8><br><br></span>");
	  if($textocomplementarioesquela<>"")	  
		echo("<br><span class=texto6> --------- <br><br>".$textocomplementarioesquela."</span>");  
  }
  else
  {
    echo("Esquela no encontrada");
  }	  
  echo("</center>");
}	
	?>	</td>
    <td><img src="recursos/imagenespagina/spacer.gif" width="10" height="1" /></td>
  </tr>
   <tr>
    <td colspan="3"><img src="recursos/imagenespagina/spacer.gif" width="1" height="10" /></td>
  </tr>
</table>

			    </td>
              </tr>
			  <?  if($domicilio<>"")	{ $titulo_esquela=urlencode(utf8_encode($titulo_esquela)); ?>
			   <tr>
                <td><img src="recursos/imagenespagina/spacer.gif" width="1" height="44" /></td>
              </tr> 
			  <tr>
                    <td><a name="anchor"></a><script type="text/javascript">startIeFix();</script><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="491" height="25">
                          <param name="movie" value="recursos/imagenespagina/tituloproductos.swf?titulo=<?=$titulo_esquela?>&" />
                          <param name="quality" value="high" />
                          
                          <embed src="recursos/imagenespagina/tituloproductos.swf?titulo=<?=$titulo_esquela?>&" width="491" height="25" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
                        </object>
                    <!-- --><script type="text/javascript">endIeFix();</script></td>
				</tr>
									  
				<tr>
				<td bgcolor="#262626" class=textogeneral align=center>
				<? echo("<div align=center><span class=texto6>".$domicilio."</span></div>"); ?><br /></td></tr>
							  
			  <? } ?>
			  
              <tr>
                <td><img src="recursos/imagenespagina/spacer.gif" width="1" height="44" /></td>
              </tr>              
                 
<? include("icondolencias.php"); ?>			 
				 
				
			   
                 
                            </table></td>
          </tr>
        </table></td>
        <td>&nbsp;</td>
      </tr>
    </table>






<? // Termina Esquelas ?>




			
			<?php endwhile; else: ?>
			
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?><?php } ?>
		
		</div>
		
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>