<?php


include ('includes/funcionesUsuarios.php');
include ('includes/funcionesHTML.php');
include ('includes/funcionesFUNC.php');
include ('includes/funciones.php');
include ('includes/funcionesGrupos.php');
include ('includes/funcionesDATOS.php');

$serviciosUsuario = new ServiciosUsuarios();
$serviciosHTML = new ServiciosHTML();
$serviciosFUNC = new ServiciosFUNC();
$serviciosFunciones = new Servicios();
$serviciosZonas = new ServiciosG();
$serviciosDatos = new ServiciosDatos();

$fecha = date('Y-m-d');


$resUltimaFechaTorneoA = $serviciosFunciones->TraerUltimaFechaPorTorneo(1);
$resUltimaFechaTorneoB = $serviciosFunciones->TraerUltimaFechaPorTorneo(2);
$resUltimaFechaTorneoC = $serviciosFunciones->TraerUltimaFechaPorTorneo(3);

if (mysql_num_rows($resUltimaFechaTorneoA)>0) {
	$UltimaFecha = mysql_result($resUltimaFechaTorneoA,0,1);
	$IdUltimaFecha = mysql_result($resUltimaFechaTorneoA,0,0);
} else {
	$UltimaFecha = "Fecha 1";
	$IdUltimaFecha = 23;
}


if (mysql_num_rows($resUltimaFechaTorneoB)>0) {
	$UltimaFechaB = mysql_result($resUltimaFechaTorneoB,0,1);
	$IdUltimaFechaB = mysql_result($resUltimaFechaTorneoB,0,0);
} else {
	$UltimaFechaB = "Fecha 1";
	$IdUltimaFechaB = 23;
}


if (mysql_num_rows($resUltimaFechaTorneoC)>0) {
	$UltimaFechaC = mysql_result($resUltimaFechaTorneoC,0,1);
	$IdUltimaFechaC = mysql_result($resUltimaFechaTorneoC,0,0);
} else {
	$UltimaFechaC = "Fecha 1";
	$IdUltimaFechaC = 23;
}



$resNuevaFehca = $serviciosFunciones->NuevaFecha($IdUltimaFecha );

if (mysql_num_rows($resNuevaFehca)>0) {
	$dia = mysql_result($resNuevaFehca,0,1);
	$mes = mysql_result($resNuevaFehca,0,0);
} else {
	$dia = "0";
	$mes = "------";
}

if (!isset($_GET['zona'])) {
	$idZona = 19;
} else {
	$idZona = $_GET['zona'];
}

if (!isset($_GET['idtorneo'])) {
	$idTorneo = 1;
} else {
	if ($_GET['idtorneo'] == '') {
		$idTorneo = 1;
	} else {
		$idTorneo = $_GET['idtorneo'];
	}
}

$nombreTipoTorneo = mysql_result($serviciosFunciones->traerTipoTorneoPorId($idTorneo),0,1);


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
	
	.centered-pills {  
    text-align: center
}
.centered-pills ul.nav-pills {
    display: inline-block
}
.centered-pills li {
    display: inline
}
.centered-pills a {
    float: left
}
* html .centered-pills ul.nav-pills, *+html .centered-pills ul.nav-pills {
    display: inline
}
</style>

<link rel="stylesheet" href="css/responsiveslides.css">
<script src="js/responsiveslides.min.js"></script>

  <script>
    // You can also use "$(window).load(function() {"
    $(function () {


      // Slideshow 4
      $("#slider4").responsiveSlides({
        auto: false,
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
<link rel="stylesheet" type="text/css" href="css/estilo.css"/>     
     

</head>



<body>
<div style="background-color:#000; height:auto; margin-top:-20px; padding-top:20px;">
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
    	
        <?php echo $serviciosHTML->menuHTML(); ?>
        
        <div class="main-container">
            <div class="main wrapper clearfix">

                <article>
                    
                    <section>
                        <div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                        
                        	
                              <div align="center">
                       
                                <img src="imagenes/tentativas/fair-play.jpg" width="200" height="200"/>
                                <h4 style="padding-top:3px; padding-bottom:20px; color: #CCC; font-size:2em; text-shadow:1px 1px 1px #131313; font-family: 'box';"><span class="lbltorneo"></span><span class="lblzona"></span></h4>

                              	<div class="centered-pills">
                                <ul class="nav nav-pills">
                            
                                    <li class="dropdown">
                            
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle" style="padding:15px; color: #000099; font-size: 1.4em;text-shadow: 1px 1px 1px #333333;"">Fútbol 11 con Off-Side <b class="caret"></b></a>
                            
                                        <ul class="dropdown-menu">
                            
                                            <li id="zonaAtoneoA" class="zona">Zona A</li>
                            
                                            <li id="zonaBtoneoA" class="zona">Zona B</li>
                                            
                                            <li id="zonaCtoneoA" class="zona">Zona C</li>
                            
                                        </ul>
                            
                                    </li>
                            
                                    <li class="dropdown">
                            
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle" style="padding:15px; color: #000099; font-size: 1.4em;text-shadow: 1px 1px 1px #333333;"">Fútbol 11 sin Off-Side <b class="caret"></b></a>
                            
                                        <ul class="dropdown-menu">
                            
                                            <li id="zonaAtoneoB" class="zona">Zona A</li>
                            
                                            <li id="zonaBtoneoB" class="zona">Zona B</li>
                                            
                                            <li id="zonaCtoneoB" class="zona">Zona C</li>
                            
                                        </ul>
                            
                                    </li>
                            
                                    <li class="dropdown">
                            
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle" style="padding:15px; color: #000099; font-size: 1.4em;text-shadow: 1px 1px 1px #333333;"">Fútbol 7<b class="caret"></b></a>
                            
                                        <ul class="dropdown-menu">
                            
                                            <li id="zonaAtoneoC" class="zona">Zona A</li>
                            
                                            <li id="zonaBtoneoC" class="zona">Zona B</li>
                                            
                                            <li id="zonaCtoneoC" class="zona">Zona C</li>
                            
                                        </ul>
                            
                                    </li>
                            
                                </ul>
                                </div>
							</div>
								<div style="height:40px;">
                                
                                </div>	


                              </div>
                            </div>

                        
                        <div class="col-md-12" id="load" align="center" style="text-align:center;">
                        	
                            
                        </div>

                        <div align="center">
                        	<div id="resultados" style="font-size:1.1em; width:60%;">
                        	
                            
                        	</div>
                        </div>
                    </section>
                </article>        
				
                

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





<div id="dialogModificar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width:70%;">
    	<div class="modal-content">	
        	<div class="modal-header">
            	<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Detalle del Partido</h4>
            </div>
            
            <div class="modal-body">
            	<div class="row">
            	<div class="col-md-6">
				<table class="table table-responsive table-striped">
                	<thead>
                    	<tr>
                        	<th><img src="imagenes/icoRoja.png"></th>
                            <th><img src="imagenes/icoAmarilla.png"></th>
                            <th><img src="imagenes/pelotaweb.png"></th>
                            <th id="equipoA"></th>
                            <th id="resA" style="width:20px; background-color:#36F; color:#FFF; padding:3px 8px;"></th>
                        </tr>
                    </thead>
                    <tbody id="resultadosDetallesA">
                    
                    </tbody>
                
                </table>
				</div>
                <div class="col-md-6">
				<table class="table table-responsive table-striped">
                	<thead>
                    	<tr>

                            <th id="resB" style="width:20px; background-color:#36F; color:#FFF; padding:3px 8px;"></th>
                            <th id="equipoB"></th>
                            <th><img src="imagenes/pelotaweb.png"></th>
                            <th><img src="imagenes/icoAmarilla.png"></th>
                            <th><img src="imagenes/icoRoja.png"></th>
                        </tr>
                    </thead>
                    <tbody id="resultadosDetallesB">
                    
                    </tbody>
                
                </table>
				</div>
                </div>

            </div><!-- fin del body -->
      </div><!-- fin del content -->
        
      </div><!-- fin del dialog -->
</div><!-- fin del dialogCrear -->







    <footer class="clearfix">
    
    
        <div align="center">
            <p><strong>Copyright © 2015 Predio98. Diseño Web: Saupurein Marcos.</strong></p>
        </div>


	</footer>
<script type="text/javascript">
$(document).ready(function(){
	
	function TraerResultados(reftorneo, refzona, reffecha, zona) {
		switch(reftorneo) {
			case 1:
				$('.lbltorneo').html('Torneo Fútbol 11 con Off-Side');
				break;
			case 2:
				$('.lbltorneo').html('Torneo Fútbol 11 sin Off-Side');
				break;
			case 3:
				$('.lbltorneo').html('Torneo Fútbol 7');
				break;
		}
		
		switch(refzona) {
			case 19:
				$('.lblzona').html(' - Zona A');
				break;
			case 20:
				$('.lblzona').html(' - Zona B');
				break;
			case 21:
				$('.lblzona').html(' - Zona C');
				break;
		}
		
		$.ajax({
				data:  {reftorneo: reftorneo,
						refzona: refzona,
						reffecha: reffecha,
						zona: zona,
						accion: 'FairPlayPagina'},
				url:   'ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
					
					$("#load").html('<img src="imagenes/LoadingWheel.gif" />');  	
				},
				success:  function (response) {
						$('#resultados').html(response);
						$("#load").html('');
				}
		});
	}
	
	TraerResultados(<?php echo $idTorneo; ?>,19,<?php echo $IdUltimaFecha; ?>,'Zona A');
	
	$('#zonaAtoneoA').click(function() {
		TraerResultados(1,19,<?php echo $IdUltimaFecha; ?>,'Zona A');
		$('#zonaExp').html('Zona A');
	});
	
	
	$('#zonaBtoneoA').click(function() {
		TraerResultados(1,20,<?php echo $IdUltimaFecha; ?>,'Zona B');
		$('#zonaExp').html('Zona B');
	});
	
	$('#zonaCtoneoA').click(function() {
		TraerResultados(1,21,<?php echo $IdUltimaFecha; ?>,'Zona C');
		$('#zonaExp').html('Zona B');
	});
	
	
	$('#zonaAtoneoB').click(function() {
		TraerResultados(2,19,<?php echo $IdUltimaFechaB; ?>,'Zona A');
		$('#zonaExp').html('Zona A');
	});
	
	
	$('#zonaBtoneoB').click(function() {
		TraerResultados(2,20,<?php echo $IdUltimaFechaB; ?>,'Zona B');
		$('#zonaExp').html('Zona B');
	});
	
	$('#zonaCtoneoB').click(function() {
		TraerResultados(2,21,<?php echo $IdUltimaFechaB; ?>,'Zona C');
		$('#zonaExp').html('Zona C');
	});
	
	
	$('#zonaAtoneoC').click(function() {
		TraerResultados(3,19,<?php echo $IdUltimaFechaC; ?>,'Zona A');
		$('#zonaExp').html('Zona A');
	});
	
	
	$('#zonaBtoneoC').click(function() {
		TraerResultados(3,20,<?php echo $IdUltimaFechaC; ?>,'Zona B');
		$('#zonaExp').html('Zona B');
	});
	
	$('#zonaCtoneoC').click(function() {
		TraerResultados(3,21,<?php echo $IdUltimaFechaC; ?>,'Zona C');
		$('#zonaExp').html('Zona C');
	});
	
	$('.torneoMenu').hover(function(e) {
        $('#submenu').show(600);
		$('.torneoMenu').addClass('cambioT');
    });
	
	$('#submenu').mouseover(function(e) {
        
    });
	
	$('#submenu').mouseleave(function(e) {
		e.preventDefault();
        $('#submenu').hide(500);
    });
	
	
	$("#resultados").on("click",'.varModificar', function(){

		idfixture =  $(this).attr("id");
		$.ajax({
				data:  {idfixture: idfixture,
						accion: 'TraerJugadoresFixtureA'},
				url:   'ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
					$("#load").html('<img src="imagenes/LoadingWheel.gif" />');  	
				},
				success:  function (response) {
						$('#resultadosDetallesA').html(response);
						$("#load").html('');
						$('#equipoA').html($('#equipoA'+idfixture).text());
						$('#equipoB').html($('#equipoB'+idfixture).text());
						$('#resA').html($('#resA'+idfixture).text());
						$('#resB').html($('#resB'+idfixture).text());
				}
		});
		
		$.ajax({
				data:  {idfixture: idfixture,
						accion: 'TraerJugadoresFixtureB'},
				url:   'ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
						$('#resultadosDetallesB').html(response);
						
				}
		});
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


</body>

</html>