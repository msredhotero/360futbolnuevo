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

if (!isset($_GET['idtorneo'])) {
	$idTorneo = 1;
} else {
	$idTorneo = $_GET['idtorneo'];
}

$resUltimaFechaTorneoA = $serviciosFunciones->TraerUltimaFechaPorTorneo($idTorneo);
$resUltimaFechaTorneoB = $serviciosFunciones->TraerUltimaFechaPorTorneo(2);
$resUltimaFechaTorneoC = $serviciosFunciones->TraerUltimaFechaPorTorneo(3);

if (!isset($_GET['fecha'])) {
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
} else {
	$UltimaFecha = "Fecha 1";
	$IdUltimaFecha = $_GET['fecha'];
	$UltimaFechaB = "Fecha 1";
	$IdUltimaFechaB = $_GET['fecha'];
	$UltimaFechaC = "Fecha 1";
	$IdUltimaFechaC = $_GET['fecha'];
}



$resNuevaFecha = $serviciosFunciones->NuevaFecha($IdUltimaFecha + 1);

if (mysql_num_rows($resNuevaFecha)>0) {
	$dia = mysql_result($resNuevaFecha,0,1);
	$mes = mysql_result($resNuevaFecha,0,0);
} else {
	$dia = "0";
	$mes = "------";
}

if (!isset($_GET['zona'])) {
	$idZona = 19;
} else {
	$idZona = $_GET['zona'];
}

switch ($idZona) {
	case 19:
		$zona = "'Zona A'";
		break;
	case 20:
		$zona = "'Zona B'";
		break;
	case 21:
		$zona = "'Zona C'";
		break;	
}


$resProximaFecha = $serviciosFunciones->TraerUltimaFechaPorTorneoInactiva($idTorneo);

if (mysql_num_rows($resProximaFecha)>0) {
	$idProximaFecha	= mysql_result($resProximaFecha,0,0);	
} else {
	$idProximaFecha	= 0;
}

$lstFechas = $serviciosFunciones->TraerFechasPorTorneoZona($idTorneo,$idZona);

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
<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
<style>
    label {
        padding-bottom:6px;
		padding-top:6px;
    }
	
	.main a {
		color:#17A8F6;
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
                        <div class="col-md-12" align="center" style="text-align:center;">
                        	<h3><img src="imagenes/logo2-chico.png" ><span class="lbltorneo"></span><span class="lblzona"></span>
                            <?php
								switch ($idZona) {
									case 19:
										$Subtitulo = " - Zona A";
										break;
									case 20:	
										$Subtitulo = " - Zona B";
										break;
									case 21:
										$Subtitulo = " - Zona c";
										break;
									
								}
								
							?>
                            </h3>
                            
                        </div>
                        
                        <div class="col-md-12" align="center" style="text-align:center;">
                        	<ul class="list-inline" id="lstFechas">
                            	<?php while ($row = mysql_fetch_array($lstFechas)) { ?>
                                <li style="padding-bottom:8px;">
                                    <a href="zonas.php?idtorneo=<?php echo $idTorneo; ?>&zona=<?php echo $idZona; ?>&fecha=<?php echo $row[0]; ?>"><button type="button" class="btn btn-info" style="margin-left:0px;"><?php echo $row[1]; ?></button></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                       
                        
                        <div class="col-md-12" id="load" align="center" style="text-align:center;">
                        	
                            
                        </div>
                        
                    <div class="row" style="margin:0; padding:0;">
                        <div id="resultados" class="col-md-8" style="margin:0; padding-left:10px; padding-right:5px;">
                        	
                            
                        </div>
                        
                        <div class="col-md-4" style="margin:0; padding-left:5px; padding-right:10px;">
                        	<div id="resultadosFixture">
                            
                            </div>
                            <div id="resultadosFixture2">
                            
                            </div>
                        </div>
					</div>
                        
                        
                        <div class="row" style="margin:0; padding:0;">
                        	<div class="col-md-4" id="resultadosAmarillas" style="margin:0; padding-left:10px; padding-right:5px;">
                        	
                            
                        	</div>
                            
                            <!--<div class="col-md-4" id="resultadosRojas" style="margin:0; padding:0;">
                        	
                            
                        	</div>-->
                            
                            <div class="col-md-4" id="resultadosGoles" style="margin:0; padding-left:5px; padding-right:5px;">
                        	
                            
                        	</div>
                            
                            <div class="col-md-4" id="resultadosSuspendidos" style="margin:0; padding-left:5px; padding-right:10px;">
                        	
                            
                        	</div>
                            <!--<div class="col-md-12" id="resultadosSuspendidos" style="margin:0; padding:0;">
                        	
                            
                        	</div>-->
                            
                        </div>
                        
                        <!--<div class="col-md-4" id="resultadosFixture" style="margin:0; padding:0;">
                        	
                            
                        </div>-->
                        
                        
                        
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
				<table class="table table-responsive table-striped table-bordered">
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
				<table class="table table-responsive table-striped table-bordered">
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
	
	function traerFechas(reftorneo, refzona) {
		$.ajax({
				data:  {reftorneo: reftorneo,
						refzona: refzona,
						accion: 'TraerFechasPorTorneoZona'},
				url:   'ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
					
					$("#load").html('<img src="imagenes/LoadingWheel.gif" />');  	
				},
				success:  function (response) {
						$('#lstFechas').html(response);
						$("#load").html('');
				}
		});	
	}
	
	
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
						accion: 'TraerFixturePorZonaTorneoPagina'},
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
	
	TraerResultados(<?php echo $idTorneo; ?>,<?php echo $idZona; ?>,<?php echo $IdUltimaFecha; ?>,<?php echo $zona; ?>);
	
	function TraerResultadosFixture(reftorneo, refzona, reffecha, zona) {
		$.ajax({
				data:  {reftorneo: reftorneo,
						refzona: refzona,
						reffecha: reffecha,
						zona: zona,
						accion: 'FixturePaginaChicoDos'},
				url:   'ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
						$('#resultadosFixture2').html(response);
						
				}
		});
	}
	
	function TraerResultadosFixtureProximo(reftorneo, refzona, reffecha, zona) {
		$.ajax({
				data:  {reftorneo: reftorneo,
						refzona: refzona,
						reffecha: reffecha,
						zona: zona,
						accion: 'FixturePaginaChicoDosInactivo'},
				url:   'ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
						$('#resultadosFixture').html(response);
						
				}
		});
	}
	
	TraerResultadosFixture(<?php echo $idTorneo; ?>,<?php echo $idZona; ?>,<?php echo $IdUltimaFecha; ?>,<?php echo $zona; ?>);
	TraerResultadosFixtureProximo(<?php echo $idTorneo; ?>,<?php echo $idZona; ?>,<?php echo $idProximaFecha; ?>,<?php echo $zona; ?>);
	
	function TraerResultadosGoles(reftorneo, refzona, reffecha, zona) {
		$.ajax({
				data:  {reftorneo: reftorneo,
						refzona: refzona,
						reffecha: reffecha,
						zona: zona,
						accion: 'GoleadoresPagina'},
				url:   'ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
						$('#resultadosGoles').html(response);
						
				}
		});
	}
	
	TraerResultadosGoles(<?php echo $idTorneo; ?>,<?php echo $idZona; ?>,<?php echo $IdUltimaFecha; ?>,<?php echo $zona; ?>);
	
	
	
	function TraerResultadosAmarillasAcumuladas(reftorneo, refzona, reffecha, zona) {
		$.ajax({
				data:  {reftorneo: reftorneo,
						refzona: refzona,
						reffecha: reffecha,
						zona: zona,
						accion: 'AmarillasAcumuladasPagina'},
				url:   'ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
						$('#resultadosAmarillas').html(response);
						
				}
		});
	}
	
	TraerResultadosAmarillasAcumuladas(<?php echo $idTorneo; ?>,<?php echo $idZona; ?>,<?php echo $IdUltimaFecha; ?>,<?php echo $zona; ?>);
	
	
	function TraerResultadosSuspendidos(reftorneo, refzona, reffecha, zona) {
		$.ajax({
				data:  {reftorneo: reftorneo,
						refzona: refzona,
						reffecha: reffecha,
						zona: zona,
						accion: 'SuspendidosPagina'},
				url:   'ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
						$('#resultadosSuspendidos').html(response);
						
				}
		});
	}
	
	TraerResultadosSuspendidos(<?php echo $idTorneo; ?>,<?php echo $idZona; ?>,<?php echo $IdUltimaFecha; ?>,<?php echo $zona; ?>);
	
	
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
		$('#zonaExp').html('Zona C');
	});
	
	
	$('#zonaAtoneoB').click(function() {
		TraerResultados(2,19,<?php echo $IdUltimaFecha; ?>,'Zona A');
		$('#zonaExp').html('Zona A');
	});
	
	
	$('#zonaBtoneoB').click(function() {
		TraerResultados(2,20,<?php echo $IdUltimaFecha; ?>,'Zona B');
		$('#zonaExp').html('Zona B');
	});
	
	$('#zonaCtoneoB').click(function() {
		TraerResultados(2,21,<?php echo $IdUltimaFecha; ?>,'Zona C');
		$('#zonaExp').html('Zona C');
	});
	
	
	$('#zonaAtoneoC').click(function() {
		TraerResultados(3,19,<?php echo $IdUltimaFecha; ?>,'Zona A');
		$('#zonaExp').html('Zona A');
	});
	
	
	$('#zonaBtoneoC').click(function() {
		TraerResultados(3,20,<?php echo $IdUltimaFecha; ?>,'Zona B');
		$('#zonaExp').html('Zona B');
	});
	
	$('#zonaCtoneoC').click(function() {
		TraerResultados(3,21,<?php echo $IdUltimaFecha; ?>,'Zona C');
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
	
	
	$("#resultadosFixture2").on("click",'.varModificar', function(){

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