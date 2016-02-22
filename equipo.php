<?php


include ('includes/funcionesUsuarios.php');
include ('includes/funciones.php');
include ('includes/funcionesHTML.php');
include ('includes/funcionesJugadores.php');
include ('includes/funcionesEquipos.php');
include ('includes/funcionesGrupos.php');
include ('includes/funcionesZonasEquipos.php');
include ('includes/funcionesNoticias.php');
include ('includes/funcionesDATOS.php');


$serviciosUsuarios  = new ServiciosUsuarios();
$serviciosFunciones = new Servicios();
$serviciosHTML		= new ServiciosHTML();
$serviciosJugadores = new ServiciosJ();
$serviciosEquipos	= new ServiciosE();
$serviciosGrupos	= new ServiciosG();
$serviciosZonasEquipos	= new ServiciosZonasEquipos();
$serviciosNoticias = new ServiciosNoticias();
$serviciosDatos = new ServiciosDatos();


$fecha = date('Y-m-d');

$id = $_GET['eq'];

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

///******   DATOS DEL EQUIPO *****////////////////////////////////////

$resEquipo = $serviciosEquipos->TraerIdEquipo($id);


//////////////////////////////////////////////////////////////////////

///******   PROXIMO PARTIDO *****////////////////////////////////////

$resProximoPartido = $serviciosEquipos->TraerUltimaFechaPorEquipo($id);


//////////////////////////////////////////////////////////////////////


///******   PARTIDOS JUGADOS *****////////////////////////////////////

$resPartidos = $serviciosEquipos->TraerFechasPorEquipo($id);


//////////////////////////////////////////////////////////////////////


///******   Resultados DEL EQUIPO *****////////////////////////////////////

$resResultados = $serviciosEquipos->traerResultadoPorEquipo($id);


//////////////////////////////////////////////////////////////////////


///******   JUGADORES DEL EQUIPO *****////////////////////////////////////

//Panilla
$resJugadores = $serviciosJugadores->TraerJugadoresGolesPorEquipo($id);

//invitados
$resJugadoresInvitados = $serviciosJugadores->TraerJugadoresGolesPorEquipoFiltro($id,1,0);

//expulsados
$resJugadoresExpulsados = $serviciosJugadores->TraerJugadoresGolesPorEquipoFiltro($id,0,1);

//////////////////////////////////////////////////////////////////////
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
                    <div align="center" style="height:auto; background:url(imagenes/tentativas/equipos.jpg); background-size:cover; background-position: top; margin-top:-20px; border-bottom:1px solid #CCC;">
                    	<h3 style="padding-top:30px; color:#FFF; font-size:8em; text-shadow:2px 2px 2px #131313; font-family: 'box';">Equipos</h3>
                        <h4 style="padding-top:3px; padding-bottom:20px; color:#FFF; font-size:2em; text-shadow:1px 1px 1px #131313; font-family: 'box';"><span class="lbltorneo"></span><span class="lblzona"></span></h4>
                    </div>
                    
                    <section>

                        
                        <div class="col-md-12" id="load" align="center" style="text-align:center;">
                        	
                            
                        </div>
                        
                        <div class="col-md-12" id="resultados">
                        	<div class="row" style="padding-left:20px; padding-right:20px;">
                            	<h3 style="padding:15px; background-color:#CCC; text-shadow:1px 1px 1px #FFFFFF;">Datos del Equipo</h3>
                                
                            	<div class="form-group col-md-4">
                                <label class="control-label" style="text-align:left" for="nombre">Nombre</label>
                                <div class="input-group col-md-12">
                                <h4><?php echo mysql_result($resEquipo,0,'nombre'); ?></h4>
                                </div>
                                </div>
                                
                                <div class="form-group col-md-4">
                                <label class="control-label" style="text-align:left" for="nombrecapitan">Nombre Capitán</label>
                                <div class="input-group col-md-12">
                                <h4><?php echo mysql_result($resEquipo,0,'nombrecapitan'); ?></h4>
                                </div>
                                </div>
                                
                                <div class="form-group col-md-4">
                                <label class="control-label" style="text-align:left" for="telefonocapitan">Telefono Capitán</label>
                                <div class="input-group col-md-12">
                                <h4><?php echo mysql_result($resEquipo,0,'telefonocapitan'); ?></h4>
                                </div>
                                </div>
                                
                               
                                
                                <div class="form-group col-md-4">
                                <label class="control-label" style="text-align:left" for="facebookcapitan">Facebook Capitán</label>
                                <div class="input-group col-md-12">
                                <h4><?php echo mysql_result($resEquipo,0,'facebookcapitan'); ?></h4>
                                </div>
                                </div>
                                
                                <div class="form-group col-md-4">
                                <label class="control-label" style="text-align:left" for="nombresubcapitan">Nombre SubCapitán</label>
                                <div class="input-group col-md-12">
                                <h4><?php echo mysql_result($resEquipo,0,'nombresubcapitan'); ?></h4>
                                </div>
                                </div>
                                
                                <div class="form-group col-md-4">
                                <label class="control-label" style="text-align:left" for="telefonosubcapitan">Telefono SubCapitán</label>
                                <div class="input-group col-md-12">
                                <h4><?php echo mysql_result($resEquipo,0,'telefonosubcapitan'); ?></h4>
                                </div>
                                </div>
                                
                               
                                
                                <div class="form-group col-md-4">
                                <label class="control-label" style="text-align:left" for="facebooksubcapitan">Facebook SubCapitán</label>
                                <div class="input-group col-md-12">
                                <h4><?php echo mysql_result($resEquipo,0,'facebooksubcapitan'); ?></h4>
                                </div>
                                </div>
                                
                                <div class="form-group col-md-4">
                                <label class="control-label" style="text-align:left" for="emailcapitan">Email Capitán</label>
                                <div class="input-group col-md-12">
                                <h4><?php echo mysql_result($resEquipo,0,'emailcapitan'); ?></h4>
                                </div>
                                </div>
                                
                                <div class="form-group col-md-4">
                                <label class="control-label" style="text-align:left" for="emailsubcapitan">Email SubCapitán</label>
                                <div class="input-group col-md-12">
                                <h4><?php echo mysql_result($resEquipo,0,'emailsubcapitan'); ?></h4>
                                </div>
                                </div>
                                
                                
                            </div>
                            
                            <div class="row" style="padding-left:20px; padding-right:20px;">
                            	<h3 style="padding:15px; background-color:#CCC; text-shadow:1px 1px 1px #FFFFFF;">Proxima Fecha</h3>
                                <table class="table table-responsive table-striped table-bordered">
                                	<tbody>
                                		<tr>
                                        	<th>Equipo A</th>
                                            <th></th>
                                            <th>Equipo B</th>
                                            <th><div align="center">Fecha</div></th>
                                            <th><div align="center">Fecha de Juego</div></th>
                                            <th><div align="center">hora</div></th>
                                        </tr>
                                        <?php if (mysql_num_rows($resProximoPartido)>0) { ?>
                                        <tr>
                                        	<td><?php echo mysql_result($resProximoPartido,0,'equipoa'); ?></td>
                                            <td align="center">Vs.</td>
                                            <td><?php echo mysql_result($resProximoPartido,0,'equipob'); ?></td>
                                            <td align="center"><?php echo mysql_result($resProximoPartido,0,'tipofecha'); ?></td>
                                            <td align="center"><?php echo mysql_result($resProximoPartido,0,'fechajuego'); ?></td>
                                            <td align="center"><?php echo mysql_result($resProximoPartido,0,'hora'); ?></td>
                                        </tr>
                                        <?php } else { ?>
                                        <tr colspan='6'>
                                        	<td>No hay fecha cargada.</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            	
                                
                                
                            </div>
                            
                            
                            <div class="row" style="padding-left:20px; padding-right:20px;">
                            	<h3 style="padding:15px; background-color:#CCC; text-shadow:1px 1px 1px #FFFFFF;">Partidos Jugados</h3>
                                <table class="table table-responsive table-striped table-bordered">
                                	<tbody>
                                		<tr>
                                        	<th>Equipo A</th>
                                            <th><div align="center">Resultado A</div></th>
                                            <th></th>
                                            <th><div align="center">Resultado B</div></th>
                                            <th>Equipo B</th>
                                            <th><div align="center">Fecha</div></th>
                                            <th><div align="center">Fecha de Juego</div></th>
                                            <th><div align="center">hora</div></th>
                                            <th>Torneo</th>
                                            
                                        </tr>
                                        <?php if (mysql_num_rows($resPartidos)>0) { ?>
                                        <?php while ($rowP = mysql_fetch_array($resPartidos)) { ?>
                                        <tr>
                                        	<td><?php echo $rowP['equipoa']; ?></td>
                                            <td align="center"><?php echo $rowP['resultado_a']; ?></td>
                                            <td align="center">Vs.</td>
                                            <td align="center"><?php echo $rowP['resultado_b']; ?></td>
                                            <td><?php echo $rowP['equipob']; ?></td>
                                            <td align="center"><?php echo $rowP['tipofecha']; ?></td>
                                            <td align="center"><?php echo $rowP['fechajuego']; ?></td>
                                            <td align="center"><?php echo $rowP['hora']; ?></td>
                                            <td><?php echo $rowP['nombre'].' - '.$rowP['descripciontorneo']; ?></td>
                                        </tr>
                                        <?php } ?>
                                        <?php } else { ?>
                                        <tr colspan='6'>
                                        	<td>No hay fecha cargada.</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            	
                                
                                
                            </div>
                            
                            
                            <div class="row" style="padding-left:20px; padding-right:20px;">
                            	<h3 style="padding:15px; background-color:#CCC; text-shadow:1px 1px 1px #FFFFFF;">Estadísticas del Equipo</h3>
                                <table class="table table-responsive table-striped table-bordered">
                                	<tbody>
                                		<tr>
                                        	<th><div align="center">Partidos</div></th>
                                            <th><div align="center">Ganados</div></th>
                                            <th><div align="center">Empatados</div></th>
                                            <th><div align="center">Perdidos</div></th>
                                            <th><div align="center">Goles a Favor</div></th>
                                            <th><div align="center">Goles en Contra</div></th>
                                            <th><div align="center">Diferencia</div></th>
                                            <th><div align="center">Puntos</div></th>
                                        </tr>
                                        <?php if (mysql_num_rows($resResultados)>0) { ?>
                                        <tr>
                                        	<td align="center"><?php echo mysql_result($resResultados,0,'partidos'); ?></td>
                                            <td align="center"><?php echo mysql_result($resResultados,0,'ganados'); ?></td>
                                            <td align="center"><?php echo mysql_result($resResultados,0,'empatados'); ?></td>
                                            <td align="center"><?php echo mysql_result($resResultados,0,'perdidos'); ?></td>
                                            <td align="center"><?php echo mysql_result($resResultados,0,'golesafavor'); ?></td>
                                            <td align="center"><?php echo mysql_result($resResultados,0,'golesencontra'); ?></td>
                                            <td align="center"><?php echo mysql_result($resResultados,0,'diferencia'); ?></td>
                                            <td align="center"><?php echo mysql_result($resResultados,0,'pts'); ?></td>
                                        </tr>
                                        <?php } else { ?>
                                        <tr colspan='8'>
                                        	<td>No existen resultados cargados.</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            	
                                <h5>% Ganados</h5>
                                <?php
									////////////// PORCENTAJES ////////////////////
									$partidos		= mysql_result($resResultados,0,'partidos');
									$porcGanados 	= round((mysql_result($resResultados,0,'ganados')*100)/$partidos,2);
									switch ($porcGanados) {
										case $porcGanados >= 0 && $porcGanados < 34:
											$labelGanados = "progress-bar-success";
											break;
										case $porcGanados >= 34 && $porcGanados < 67:
											$labelGanados = "progress-bar-success";
											break;
										case $porcGanados >= 67 && $porcGanados <= 100:
											$labelGanados = "progress-bar-success";
											break;
										default:
											$labelGanados = "";
											break;
									}
									$porcEmpatados 	= round((mysql_result($resResultados,0,'empatados')*100)/$partidos,2);
									switch ($porcEmpatados) {
										case $porcEmpatados >= 0 && $porcEmpatados < 34:
											$labelEmpatados = "progress-bar-warning";
											break;
										case $porcEmpatados >= 34 && $porcEmpatados < 67:
											$labelEmpatados = "progress-bar-warning";
											break;
										case $porcEmpatados >= 67 && $porcEmpatados <= 100:
											$labelEmpatados = "progress-bar-warning";
											break;
										default:
											$labelEmpatados = "";
											break;
									}
									$porcPerdidos 	= round((mysql_result($resResultados,0,'perdidos')*100)/$partidos,2);
									switch ($porcPerdidos) {
										case $porcPerdidos >= 0 && $porcPerdidos < 34:
											$labelPerdidos = "progress-bar-danger";
											break;
										case $porcPerdidos >= 34 && $porcPerdidos < 67:
											$labelPerdidos = "progress-bar-danger";
											break;
										case $porcPerdidos >= 67 && $porcPerdidos <= 100:
											$labelPerdidos = "progress-bar-danger";
											break;
										default:
											$labelPerdidos = "";
											break;
									}
								
								?>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped <?php echo $labelGanados; ?>" role="progressbar" aria-valuenow="<?php echo $porcGanados; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcGanados; ?>%; font-family:Verdana, Geneva, sans-serif;">
                                    <?php echo $porcGanados; ?>%
                                    </div>
                                </div>
                                <h5>% Empatados</h5>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped <?php echo $labelEmpatados; ?>" role="progressbar" aria-valuenow="<?php echo $porcEmpatados; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcEmpatados; ?>%; font-family:Verdana, Geneva, sans-serif;">
                                    <?php echo $porcEmpatados; ?>%
                                    </div>
                                </div>
                                <h5>% Perdidos</h5>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped <?php echo $labelPerdidos; ?>" role="progressbar" aria-valuenow="<?php echo $porcPerdidos; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcPerdidos; ?>%; font-family:Verdana, Geneva, sans-serif;">
                                    <?php echo $porcPerdidos; ?>%
                                    </div>
                                </div> 
                                
                            </div>
                            
                            <div class="row" style="padding-left:20px; padding-right:20px;">
                            	<h3 style="padding:15px; background-color:#CCC; text-shadow:1px 1px 1px #FFFFFF;">Histórico Jugadores - Planilla</h3>
                                <h4>*  <span class="glyphicon glyphicon-star" style="color:#FF0;"></span> Mayor Artillero</h4>
                                <table class="table table-responsive table-striped table-bordered">
                                	<tbody>
                                		<tr>
                                        	<th>Apellido y Nombre</th>
                                            <th>NroDocumento</th>
                                            <th><div align="center">Goles</div></th>
                                            <th><div align="center">Amarillas</div></th>
                                            <th><div align="center">Rojas</div></th>
											
                                        </tr>
                                        <?php if (mysql_num_rows($resJugadores)>0) { ?>
                                        <?php 
											$cant = 1;
											while ($rowJ = mysql_fetch_array($resJugadores)) { 
										?>
                                        <?php if ($cant == 1) { ?>
                                        <tr>
											<td><?php echo '<div style="font-size:1.8em;"><img src="imagenes/botin.gif" width="50" height="72">'.strtoupper($rowJ['apyn']).'<span class="glyphicon glyphicon-star" style="color:#FF0;"></span></div>'; 
													
												?>
                                            </td>
                                            <td><?php echo '<div style="font-size:1.8em; margin-top:20px;">'.$rowJ['dni'].'</div>'; ?></td>
                                            <td align="center"><?php echo '<div style="font-size:1.8em; margin-top:20px;">'.$rowJ['goles'].'</div>'; ?></td>
                                            <td align="center"><?php echo '<div style="font-size:1.8em; margin-top:20px;">'.$rowJ['amarillas'].'</div>'; ?></td>
                                            <td align="center"><?php echo '<div style="font-size:1.8em; margin-top:20px;">'.$rowJ['rojas'].'</div>'; ?></td>
                                        
                                        <?php } else { ?>
                                            <td><?php echo strtoupper($rowJ['apyn']); ?></td>
                                            <td><?php echo $rowJ['dni']; ?></td>
                                            <td align="center"><?php echo $rowJ['goles']; ?></td>
                                            <td align="center"><?php echo $rowJ['amarillas']; ?></td>
                                            <td align="center"><?php echo $rowJ['rojas']; ?></td>
			
										<?php } ?>
                                        </tr>
                                        <?php $cant += 1; } ?>
                                        <?php } else { ?>
                                        <tr colspan='5'>
                                        	<td>No hay jugadores cargados.</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            	
                                
                                
                            </div>
                            
                            
                            <div class="row" style="padding-left:20px; padding-right:20px;">
                            	<h3 style="padding:15px; background-color:#CCC; text-shadow:1px 1px 1px #FFFFFF;">Histórico Jugadores - Invitados</h3>
                                <h4>*  <span class="glyphicon glyphicon-star" style="color:#FF0;"></span> Mayor Artillero</h4>
                                <table class="table table-responsive table-striped table-bordered">
                                	<tbody>
                                		<tr>
                                        	<th>Apellido y Nombre</th>
                                            <th>NroDocumento</th>
                                            <th><div align="center">Goles</div></th>
                                            <th><div align="center">Amarillas</div></th>
                                            <th><div align="center">Rojas</div></th>
											
                                        </tr>
                                        <?php if (mysql_num_rows($resJugadoresInvitados)>0) { ?>
                                        <?php 
											$cant = 1;
											while ($rowJ = mysql_fetch_array($resJugadoresInvitados)) { 
										?>
                                        <?php if ($cant == 1) { ?>
                                        <tr>
											<td><?php echo '<div style="font-size:1.8em;"><img src="imagenes/botin.gif" width="50" height="72">'.strtoupper($rowJ['apyn']).'<span class="glyphicon glyphicon-star" style="color:#FF0;"></span></div>'; 
													
												?>
                                            </td>
                                            <td><?php echo '<div style="font-size:1.8em; margin-top:20px;">'.$rowJ['dni'].'</div>'; ?></td>
                                            <td align="center"><?php echo '<div style="font-size:1.8em; margin-top:20px;">'.$rowJ['goles'].'</div>'; ?></td>
                                            <td align="center"><?php echo '<div style="font-size:1.8em; margin-top:20px;">'.$rowJ['amarillas'].'</div>'; ?></td>
                                            <td align="center"><?php echo '<div style="font-size:1.8em; margin-top:20px;">'.$rowJ['rojas'].'</div>'; ?></td>
                                        
                                        <?php } else { ?>
                                            <td><?php echo strtoupper($rowJ['apyn']); ?></td>
                                            <td><?php echo $rowJ['dni']; ?></td>
                                            <td align="center"><?php echo $rowJ['goles']; ?></td>
                                            <td align="center"><?php echo $rowJ['amarillas']; ?></td>
                                            <td align="center"><?php echo $rowJ['rojas']; ?></td>
			
										<?php } ?>
                                        </tr>
                                        <?php $cant += 1; } ?>
                                        <?php } else { ?>
                                        <tr colspan='5'>
                                        	<td>No hay jugadores cargados.</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            	
                                
                                
                            </div>
                            
                            
                            
                            
                            <div class="row" style="padding-left:20px; padding-right:20px;">
                            	<h3 style="padding:15px; background-color:#CCC; text-shadow:1px 1px 1px #FFFFFF;">Histórico Jugadores - Expulsados</h3>
                                <h4>*  <span class="glyphicon glyphicon-star" style="color:#FF0;"></span> Mayor Artillero</h4>
                                <table class="table table-responsive table-striped table-bordered">
                                	<tbody>
                                		<tr>
                                        	<th>Apellido y Nombre</th>
                                            <th>NroDocumento</th>
                                            <th><div align="center">Goles</div></th>
                                            <th><div align="center">Amarillas</div></th>
                                            <th><div align="center">Rojas</div></th>
											
                                        </tr>
                                        <?php if (mysql_num_rows($resJugadoresExpulsados)>0) { ?>
                                        <?php 
											$cant = 1;
											while ($rowJ = mysql_fetch_array($resJugadoresExpulsados)) { 
										?>
                                        <?php if ($cant == 1) { ?>
                                        <tr>
											<td><?php echo '<div style="font-size:1.8em;"><img src="imagenes/botin.gif" width="50" height="72">'.strtoupper($rowJ['apyn']).'<span class="glyphicon glyphicon-star" style="color:#FF0;"></span></div>'; 
													
												?>
                                            </td>
                                            <td><?php echo '<div style="font-size:1.8em; margin-top:20px;">'.$rowJ['dni'].'</div>'; ?></td>
                                            <td align="center"><?php echo '<div style="font-size:1.8em; margin-top:20px;">'.$rowJ['goles'].'</div>'; ?></td>
                                            <td align="center"><?php echo '<div style="font-size:1.8em; margin-top:20px;">'.$rowJ['amarillas'].'</div>'; ?></td>
                                            <td align="center"><?php echo '<div style="font-size:1.8em; margin-top:20px;">'.$rowJ['rojas'].'</div>'; ?></td>
                                        
                                        <?php } else { ?>
                                            <td><?php echo strtoupper($rowJ['apyn']); ?></td>
                                            <td><?php echo $rowJ['dni']; ?></td>
                                            <td align="center"><?php echo $rowJ['goles']; ?></td>
                                            <td align="center"><?php echo $rowJ['amarillas']; ?></td>
                                            <td align="center"><?php echo $rowJ['rojas']; ?></td>
			
										<?php } ?>
                                        </tr>
                                        <?php $cant += 1; } ?>
                                        <?php } else { ?>
                                        <tr colspan='5'>
                                        	<td>No hay jugadores cargados.</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            	
                                
                                
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