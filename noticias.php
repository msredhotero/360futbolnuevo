<?php


include ('includes/funcionesUsuarios.php');
include ('includes/funcionesHTML.php');
include ('includes/funcionesFUNC.php');
include ('includes/funciones.php');
include ('includes/funcionesGrupos.php');
include ('includes/funcionesDATOS.php');
include ('includes/funcionesNoticias.php');

$serviciosUsuario = new ServiciosUsuarios();
$serviciosHTML = new ServiciosHTML();
$serviciosFUNC = new ServiciosFUNC();
$serviciosFunciones = new Servicios();
$serviciosZonas = new ServiciosG();
$serviciosDatos = new ServiciosDatos();
$serviciosNoticias = new ServiciosNoticias();

$fecha = date('Y-m-d');

/////////////////////////////////////////////////***    NOTICIAS   *******////////////////////////////////////////////////

if (isset($_GET['id'])) {
	$id = $_GET['id'];	
} else {
	$id = 0;
}

if ($id == 0) {
	
	$resNoticia = $serviciosNoticias->traerNoticias();
		
} else {
	$resNoticia = $serviciosNoticias->traerNoticiasPorId($id);

	$TituloNoticia 	= (mysql_result($resNoticia,0,'titulo'));	
	$CuerpoNoticia 	= (mysql_result($resNoticia,0,'parrafo'));	
	$FechaNoticia 	= (mysql_result($resNoticia,0,'fechacreacion'));
	$GaleriaNoticia = (mysql_result($resNoticia,0,'galeria'));
	$idNoticia		= (mysql_result($resNoticia,0,'idnoticia'));
	
	$resLstNoticia		= $serviciosNoticias->traerNoticiasMenosHasta(mysql_result($resNoticia,0,0),5);
	
}


////////////////////////////////////////////////////////////////////////////////////////////////

?>


<!DOCTYPE HTML>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta http-equiv='refresh' content='1000' />

<meta name='title' content='Predio 98' />

<meta name='description' content='Canchas de Fútbol 11, Canchas de Fútbol 7, Torneos de Fútbol' />

<meta name='keywords' content='Fútbol, Torneos, Canchas, Fútbol 11, Fútbol 7' />

<meta name='distribution' content='Global' />

<meta name='language' content='es' />

<meta name='identifier-url' content='http://www.predio98.com.ar' />

<meta name='rating' content='General' />

<meta name='reply-to' content='' />

<meta name='author' content='Webmasters' />

<meta http-equiv='Pragma' content='no-cache/cache' />

<link rel="predio98" href="imagenes/predio98icon.ico" />


<meta http-equiv='Cache-Control' content='no-cache' />

<meta name='robots' content='all' />

<meta name='revisit-after' content='7 day' />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">



<title>Predio 98 | Fúlbol 11 | Fútbol 7</title>


<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>

 <link rel="stylesheet" href="css/jquery-ui.css">

<script src="js/jquery-ui.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>
     
<link rel="stylesheet" href="css/normalize.min.css">   

<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>     

<style>
    label {
        padding-bottom:6px;
		padding-top:6px;
    }
	
	

	
	#foot p {
		text-align:center;	
	}
	
	#content {
	float: left; width: 526px;
	margin: 0 98px 0 0;
}

	#content2 article {
		margin: 0 0 67px 0;
		border-bottom:4px solid #CCC;	
	}
		#content2 article h2 {
			font-size: 30px; margin: 0 0 29px 0;
			font-weight: normal;
		}

		#content2 p {
			margin: 0 0 24px 0;
		}
		
		#content2 .postinfo {
			list-style: none; overflow: hidden;
		} 
			#content2 .postinfo li {
				float: left; width: 136px; margin: 0 20px 0 0;
				font-style: italic; color: #a2a2a2;
			}
		#least ul li { display: inline; }
            
            .wide {
                border-bottom: 1px #000 solid;
                width: 4000px;
            }
            
            .fleft { float: left; margin: 20px; }
            
            .cboth { clear: both; }
            
            #main {
                background: #fff;
                margin: 0 auto;
                padding: 30px;
                width: 1000px;
            }
	
</style>

<link rel="stylesheet" href="css/responsiveslides.css">
<script src="js/responsiveslides.min.js"></script>

  <script>
    // You can also use "$(window).load(function() {"
    $(function () {


      // Slideshow 4
      $("#slider4").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        before: function () {
          $('.events2').append("<li>before event fired.</li>");
        },
        after: function () {
          $('.events2').append("<li>after event fired.</li>");
        }
      });

    });
  </script>
     
     
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
</head>



<body>
<div style="background-color:#000; height:auto; margin-top:-20px; padding-top:20px; padding-bottom:5px;">
    <div class="clearfix content">
    	<div class="row">
        
        </div>
    	<div class="header-container">
            <header class="wrapper clearfix">
                <div align="center" style="margin-bottom:-55px; margin-left:-25px;">
                <a href="index.php"><img src="imagenes/logo2.png"></a>
                </div>
               
                
                <nav id="menu">
                    <ul class="clearfix contenedorMenu">
                        <li class="menuA"><a href="index.php">Inicio</a></li>
                        <li class="torneoMenu"><a href="#">Torneos</a></li>
                        <li class="menuA"><a href="reglamento.html">Reglamento</a></li>
                        <li class="menuA"><a href="desarrollo.html">Desarrollo</a></li>                        
                        <li id="separar" style="margin-right:60px; padding-right:60px; display:block;"> </li>
                        <li class="menuA"><a href="premios.html">Premios</a></li>
                        <li class="menuA"><a href="servicios.html">Servicios</a></li>
                        <li class="menuA"><a href="fotos.html">Fotos</a></li>
                        <li class="menuA"><a href="contacto.html">Contacto</a></li>
                    </ul>
                    <a href="#" id="pull">Menú</a>
                </nav>
            </header>
        </div>
    	
        <div class="row" style=" background-color:#dadada; z-index:9999999px; display:block; margin-left:10px; margin-right:10px;">
        	<div id="submenu" style="display:none; z-index:9999999px;">
            <div style="height:auto; position:relative; ">
            	<div class="col-md-4" style="padding-top:10px;">
                	<div class="alert alert-predio alert-dismissible submenu" id="futbolco">
                    	<p style="font-size:1.3em; cursor:pointer;"> Torneo de Fútbol 11 con Off-side</p> 
                    </div>
                    <div class="alert alert-predio alert-dismissible submenu" id="futbolso">
                    	<p style="font-size:1.3em; cursor:pointer;"> Torneo de Fútbol 11 sin Off-side</p> 
                    </div>
                    <div class="alert alert-predio alert-dismissible submenu" id="futbol">
                    	<p style="font-size:1.3em; cursor:pointer;"> Torneo de Fútbol 7</p> 
                    </div>
                </div>
                <!--<div class="col-md-4 foncecoE" style="display:none;">
                	<div class="col-md-6" align="center">
                    	
                        <h4 class="textoTrazoTitulos"> Estadísticas</h4>
                    </div>
                    <div class="col-md-6" style="border-left:1px dashed #333;" id="submenuestadisticas">
                    	<ul>
                        	<li><span class="glyphicon glyphicon-plus-sign"></span> <a href="posiciones.php?idtorneo=1">Posiciones</a></li>
                            <li><span class="glyphicon glyphicon-plus-sign"></span> <a href="resultados.php?idtorneo=1">Resultados</a></li>
                            <li><span class="glyphicon glyphicon-plus-sign"></span> <a href="goleadores.php?idtorneo=1">Goleadores</a></li>
                            <li><span class="glyphicon glyphicon-plus-sign"></span> <a href="fairplay.php?idtorneo=1">Fair Play</a></li>
                            <li><span class="glyphicon glyphicon-plus-sign"></span> <a href="suspendidos.php?idtorneo=1">Suspendidos</a></li>
                            <li><span class="glyphicon glyphicon-plus-sign"></span> <a href="amonestados.php?idtorneo=1">Amonestados</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 foncesoE" style="display:none;">
                	<div class="col-md-6" align="center">
                    	
                        <h4 class="textoTrazoTitulos"> Estadísticas</h4>
                    </div>
                    <div class="col-md-6" style="border-left:1px dashed #333;" id="submenuestadisticas">
                    	<ul>
                        	<li><span class="glyphicon glyphicon-plus-sign"></span> <a href="posiciones.php?idtorneo=2">Posiciones</a></li>
                            <li><span class="glyphicon glyphicon-plus-sign"></span> <a href="resultados.php?idtorneo=2">Resultados</a></li>
                            <li><span class="glyphicon glyphicon-plus-sign"></span> <a href="goleadores.php?idtorneo=2">Goleadores</a></li>
                            <li><span class="glyphicon glyphicon-plus-sign"></span> <a href="fairplay.php?idtorneo=2">Fair Play</a></li>
                            <li><span class="glyphicon glyphicon-plus-sign"></span> <a href="suspendidos.php?idtorneo=2">Suspendidos</a></li>
                            <li><span class="glyphicon glyphicon-plus-sign"></span> <a href="amonestados.php?idtorneo=2">Amonestados</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 fsieteE" style="display:none;">
                	<div class="col-md-6" align="center">
                    	
                        <h4 class="textoTrazoTitulos"> Estadísticas</h4>
                    </div>
                    <div class="col-md-6" style="border-left:1px dashed #333;" id="submenuestadisticas">
                    	<ul>
                        	<li><span class="glyphicon glyphicon-plus-sign"></span> <a href="posiciones.php?idtorneo=1">Posiciones</a></li>
                            <li><span class="glyphicon glyphicon-plus-sign"></span> <a href="resultados.php?idtorneo=1">Resultados</a></li>
                            <li><span class="glyphicon glyphicon-plus-sign"></span> <a href="goleadores.php?idtorneo=1">Goleadores</a></li>
                            <li><span class="glyphicon glyphicon-plus-sign"></span> <a href="fairplay.php?idtorneo=1">Fair Play</a></li>
                            <li><span class="glyphicon glyphicon-plus-sign"></span> <a href="suspendidos.php?idtorneo=1">Suspendidos</a></li>
                            <li><span class="glyphicon glyphicon-plus-sign"></span> <a href="amonestados.php?idtorneo=1">Amonestados</a></li>
                        </ul>
                    </div>
                </div>-->
                <div class="col-md-4 foncecoI" style="display:none;">
                	<div class="col-md-6" align="center">
                    	
                        <h4 class="textoTrazoTitulos"> Información</h4>
                    </div>
                    <div class="col-md-6" style="border-left:1px dashed #333;" id="submenuestadisticas">
                    	<ul>
                        	<li><span class="glyphicon glyphicon-calendar"></span> <a href="fixture.php">Fixture</a></li>
                        </ul>
                    </div>
                    <br>
                    <div class="col-md-6" align="center" style="margin-top:15px;">
                    	
                        <h4 class="textoTrazoTitulos"> Zonas</h4>
                    </div>
                    <div class="col-md-6" style="border-left:1px dashed #333;margin-top:15px;" id="submenuestadisticas">
                    	<ul>
                        	<li><span class="glyphicon glyphicon-th"></span> <a href="zonas.php?zona=19&idtorneo=1">Zona A</a></li>
                            <li><span class="glyphicon glyphicon-th"></span> <a href="zonas.php?zona=20&idtorneo=1">Zona B</a></li>
                            <li><span class="glyphicon glyphicon-th"></span> <a href="zonas.php?zona=21&idtorneo=1">Zona C</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 foncesoI" style="display:none;">
                	<div class="col-md-6" align="center">
                    	
                        <h4 class="textoTrazoTitulos"> Información</h4>
                    </div>
                    <div class="col-md-6" style="border-left:1px dashed #333;" id="submenuestadisticas">
                    	<ul>
                        	<li><span class="glyphicon glyphicon-calendar"></span> <a href="fixture.php">Fixture</a></li>
                        </ul>
                    </div>
                    <br>
                    <div class="col-md-6" align="center" style="margin-top:15px;">
                    	
                        <h4 class="textoTrazoTitulos"> Zonas</h4>
                    </div>
                    <div class="col-md-6" style="border-left:1px dashed #333;margin-top:15px;" id="submenuestadisticas">
                    	<ul>
                        	<li><span class="glyphicon glyphicon-th"></span> <a href="zonas.php?zona=19&idtorneo=2">Zona A</a></li>
                            <li><span class="glyphicon glyphicon-th"></span> <a href="zonas.php?zona=20&idtorneo=2">Zona B</a></li>
                            <li><span class="glyphicon glyphicon-th"></span> <a href="zonas.php?zona=21&idtorneo=2">Zona C</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 fsieteI" style="display:none;">
                	<div class="col-md-6" align="center">
                    	
                        <h4 class="textoTrazoTitulos"> Información</h4>
                    </div>
                    <div class="col-md-6" style="border-left:1px dashed #333;" id="submenuestadisticas">
                    	<ul>
                        	<li><span class="glyphicon glyphicon-calendar"></span> <a href="fixture.php">Fixture</a></li>
                        </ul>
                    </div>
                    
                    <div class="col-md-6" align="center" style="margin-top:15px;">
                    	
                        <h4 class="textoTrazoTitulos"> Zonas</h4>
                    </div>
                    <div class="col-md-6" style="border-left:1px dashed #333;margin-top:15px;" id="submenuestadisticas">
                    	<ul>
                        	<li><span class="glyphicon glyphicon-th"></span> <a href="zonas.php?zona=19&idtorneo=3">Zona A</a></li>
                            <li><span class="glyphicon glyphicon-th"></span> <a href="zonas.php?zona=20&idtorneo=3">Zona B</a></li>
                            <li><span class="glyphicon glyphicon-th"></span> <a href="zonas.php?zona=21&idtorneo=3">Zona C</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
            </div>
        </div>
        
        <div class="main-container">
            <div class="main wrapper clearfix">
                    <div class="row" align="center" style="margin-top:20px;">
                    	<img src="imagenes/pagina/noticias.png"/>
                    </div>
                    
                    <div class="row" style="margin-top:20px; padding-left:40px; padding-right:40px;">
                    	<div align="center">
                        	<h1>PREDIO 98</h1>
                        	<h3>Noticias</h3>
                        </div>
                        
                        
                        <?php 
							if (mysql_num_rows($resNoticia)>0) {
								if ($id != 0) {
						?>
                        		
                                <div id="reglamento" class="row" style="margin-top:20px; padding-left:40px; padding-right:40px;">
                                    <h1><?php echo $TituloNoticia; ?></h1>
                                    <h3><?php 
											$date = new DateTime($FechaNoticia);
											$date->setTimezone( new \DateTimeZone( 'America/Buenos_Aires' ) );
											echo "Publicado: ".$date->format('Y-m-d');
											//echo $FechaNoticia; 
										?></h3>
                                    <div style="text-align:justify">
                                    	<?php echo $CuerpoNoticia; ?>
                                    </div>
                                </div>
							
                            <!-- Least Gallery -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-11" align="center">
                            <section id="least">
                                

                                
                                <ul class="gallery clearfix">
                                <?php 
									///////*****   PARA LA GALERIA DE LA NOTICIAS  *******/////////////////
									if ($GaleriaNoticia == 1) {
										$resImagenes = $serviciosNoticias->TraerFotosNoticias($idNoticia);
										
										while ($rowGaleria = mysql_fetch_array($resImagenes)) {
								?>
                                    <!-- 1 || Imagenes ||-->
                                     <li>
                                     	<a href="archivos/<?php echo $rowGaleria[0]."/".$rowGaleria[1]."/".$rowGaleria[2]; ?>" rel="prettyPhoto[gallery1]"><img style="margin:20px;" src="archivos/<?php echo $rowGaleria[0]."/".$rowGaleria[1]."/".$rowGaleria[2]; ?>" width="20%" height="20%" alt="Pelota Oficial" /></a>
                                     </li>
                                    
                                <?php } ?>
                                    
                                </ul>
                    
                            </section>
                            </div>
                            <div class="col-md-1">

                            </div>
                            <!-- Least Gallery end -->
                        
                        	<?php 
								} 
							?>
                            
                        <?php } else {  ///*** If de si hay una solo noticia  ******/////////?>
                            
                            <?php
								while ($rowLstNoticias = mysql_fetch_array($resNoticia)) {
							?>
                            <div id="content2" role="main">
                            	<article>
                                    <h2><?php echo $rowLstNoticias['titulo']; ?></h2>
                                    
                                    <div style="max-height:220px; overflow:hidden;"><?php echo $rowLstNoticias['parrafo']; ?></div>
                                    
                                    <ul class="postinfo">
                                        <li><?php 
											$date2 = new DateTime($rowLstNoticias['fechacreacion']);
											$date2->setTimezone( new \DateTimeZone( 'America/Buenos_Aires' ) );
											echo "Publicado: ".$date2->format('Y-m-d');
											//echo $FechaNoticia; 
										?></li>
                                        <li><a href="noticias.php?id=<?php echo $rowLstNoticias['idnoticia']; ?>">Continuar leyendo.</a></li>
                                    </ul>
                                </article>
                            </div>
                            <?php
								}
							?>
                            
                        <?php 
							} 
						?>
                        
                        <?php } else { ///*** If de si hay noticias  ******/////////?>
                        	<h4><span class="glyphicon glyphicon-exclamation-sign"></span> No hay noticias cargadas!!</h4>
                        <?php 
							} 
						?>
                    
                    <div align="center">
                    	<button type="button" style="padding:10px 10%;background-color: #ffab23;border-radius: 7px 7px 7px 7px;display: inline-block;margin-bottom: 0px!important; box-shadow: 0 -4px 0 #bd750a inset; -webkit-box-shadow: 0 -4px 0 #bd750a inset; -moz-box-shadow: 0 -4px 0 #bd750a inset; border:none; color:#fff; font-size:1.2em; text-shadow:1px 1px 1px #A68502;" id="noticiasanteriores"><span class="glyphicon glyphicon-th-list"></span> Ver Noticias Anteriores</button>
                    </div>
                    <div style="height:100px;">
                    
                    </div>
                </div>

                

            </div> <!-- #main -->
            <aside style=" text-align:center; font-size:1.2em; margin-left:5px; margin-bottom:-12px;
" class="clearfix">
                    <ul class="list-inline" style="background-color:#fff; padding-top:15px; padding-bottom:15px;-moz-border-radius: 0em 0em 0.6em 0.6em;
-webkit-border-radius: 0em 0em 0.6em 0.6em;
border-radius: 0em 0em 0.6em 0.6em;">
                    	<li><a href="#">Inicio</a></li>
                        <li><a href="#">Reglamento</a></li>
                        <li><a href="#">Servicios</a></li>
                        <li><a href="#">Fotos</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </aside>
        </div> <!-- #main-container -->
        
        
    </div>
    
    
    
    
        
        
    
    <!--
	<div class="footer-container">
        <footer class="wrapper">
            <h3>footer</h3>
        </footer>
    </div>  -->
</div>
    <footer class="clearfix">
    
    
        <div id="foot" align="center">
            <p><strong>Copyright © 2015 Predio98. Diseño Web: Saupurein Marcos.</strong></p>
        </div>


	</footer>

        
<script type="text/javascript">
$(document).ready(function(){
	
	$('#btnfixture').click(function() {
		url = "fixture.php";
		$(location).attr('href',url);
	});
	
	
	
	$('.torneoMenu').hover(function(e) {
        $('#submenu').show(600);
		$('.torneoMenu').addClass('cambioT');
    });
	
	$('#noticiasanteriores').click(function() {
		url = "noticias.php";
		$(location).attr('href',url);
	});
	
	$('#submenu').mouseover(function(e) {
        
    });
	
	$('#submenu').mouseleave(function(e) {
		e.preventDefault();
        $('#submenu').hide(500);
    });
	
	$('#futbolco').hover(function(e) {
        /*$('.foncecoI').removeClass('hidden');
		$('.foncecoE').removeClass('hidden');*/
		$('.foncecoI').show(430);
		$('.foncecoE').show(460);
		$('#futbolso').css('opacity','0.7');
		$('#futbol').css('opacity','0.7');
		$('.foncesoI').hide(300);
		$('.foncesoE').hide(300);
		$('.fsieteI').hide(300);
		$('.fsieteE').hide(300);
    });
	
	$('#futbolco').mouseleave(function(e) {
        $('#futbolso').css('opacity','1');
		$('#futbol').css('opacity','1');
		
    });
	
	
	$('#futbolso').hover(function(e) {
        $('.foncesoI').show(430);
		$('.foncesoE').show(450);
		$('#futbolco').css('opacity','0.7');
		$('#futbol').css('opacity','0.7');
		$('.foncecoI').hide(300);
		$('.foncecoE').hide(300);
		$('.fsieteI').hide(300);
		$('.fsieteE').hide(300);
    });
	
	$('#futbolso').mouseleave(function(e) {
		$('#futbolco').css('opacity','1');
		$('#futbol').css('opacity','1');
    });
	
	$('#futbol').hover(function(e) {
        $('.fsieteI').show(430);
		$('.fsieteE').show(450);
		$('#futbolso').css('opacity','0.7');
		$('#futbolco').css('opacity','0.7');
		$('.foncesoI').hide(300);
		$('.foncesoE').hide(300);
		$('.foncecoI').hide(300);
		$('.foncecoE').hide(300);
    });
	
	$('#futbol').mouseleave(function(e) {
		$('#futbolso').css('opacity','1');
		$('#futbolco').css('opacity','1');
    });
	
	
});
</script>
<script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $("area[rel^='prettyPhoto']").prettyPhoto();
                
                $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
                $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
        
                $("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
                    custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
                    changepicturecallback: function(){ initialize(); }
                });

                $("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
                    custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
                    changepicturecallback: function(){ _bsap.exec(); }
                });
            });
            </script>

</body>

</html>