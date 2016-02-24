<?php

session_start();

if (!isset($_SESSION['usua_predio']))
{
	header('Location: ../../error.php');
} else {


include ('../../includes/funcionesUsuarios.php');
include ('../../includes/funciones.php');
include ('../../includes/funcionesHTML.php');
include ('../../includes/funcionesJugadores.php');
include ('../../includes/funcionesEquipos.php');
include ('../../includes/funcionesZonasEquipos.php');

$serviciosUsuarios  	= new ServiciosUsuarios();
$serviciosFunciones 	= new Servicios();
$serviciosHTML			= new ServiciosHTML();
$serviciosJugadores 	= new ServiciosJ();
$serviciosEquipos		= new ServiciosE();
$serviciosZonasEquipos 	= new ServiciosZonasEquipos();


$fecha = date('Y-m-d');


$resMenu = $serviciosHTML->menu($_SESSION['nombre_predio'],"Estadisticas",$_SESSION['refroll_predio'],$_SESSION['torneo_predio']);

$idFixture = $_GET['id'];

$resFix = $serviciosZonasEquipos->TraerFixturePorId($idFixture);

$refFecha = mysql_result($resFix,0,6);
$refChequeado = mysql_result($resFix,0,'chequeado');

$resEquipos = $serviciosEquipos->TraerEquipos();

//// autocompletar /////////

$res = $serviciosJugadores->TraerJugadores();

$arreglo_php = array();
if(mysql_num_rows($res)==0)
   array_push($arreglo_php, "No hay datos");
else{
  while($palabras = mysql_fetch_array($res)){
    array_push($arreglo_php, $palabras["apyn"]);
  }
}


/////////////////////// Opciones de la pagina  ////////////////////

$lblTitulosingular	= "Estadistica";
$lblTituloplural	= "Estadisticas";
$lblEliminarObs		= "Si elimina la Estadistica se eliminara todo el contenido de este";
$accionEliminar		= "eliminarEstadisticas";

/////////////////////// Fin de las opciones /////////////////////

$cadRef = '';
$cadRef2 = '';
while ($rowTT = mysql_fetch_array($resEquipos)) {
	$cadRef = $cadRef.'<option value="'.$rowTT[0].'">'.$rowTT[1].'</option>';
	
}

$cadRef2 = $cadRef;



/////////////////////// Opciones para la creacion del view  /////////////////////
$cabeceras 		= "<th>Nombre</th>
				<th>DNI</th>
				<th>Equipo</th>
				<th>Fecha</th>
				<th>Goles</th>";

$cabeceras2 		= "<th>Nombre</th>
				<th>DNI</th>
				<th>Equipo</th>
				<th>Fecha</th>
				<th>Amarillas</th>";
//////////////////////////////////////////////  FIN de los opciones //////////////////////////

$resUltimasDosFechas = $serviciosFunciones->TraerUltimasDosFechas();

$fech = '';
while ($rowFechas = mysql_fetch_array($resUltimasDosFechas)) {
	$fech = $fech.$rowFechas[0].',';	
}

$fech = substr($fech,0,strlen($fech)-1);

$resJugadoresA = $serviciosJugadores->traerJugadoresPorFixtureA($idFixture);
$resJugadoresB = $serviciosJugadores->traerJugadoresPorFixtureB($idFixture);

if (mysql_num_rows($resJugadoresA)>0) {
	$equipoA	= mysql_result($resJugadoresA,0,'nombre');
	$IdequipoA	= mysql_result($resJugadoresA,0,'idequipo');
	$refTorneoA = mysql_result($resJugadoresA,0,'reftorneo');
	$refPuntosEquiposA = $serviciosEquipos->traerPuntosEquiposPorFixtureEquipoFechaTorneo($idFixture,$IdequipoA,$refFecha,$refTorneoA);
	if (mysql_num_rows($refPuntosEquiposA)>0) {
		$ePuntosA 		= mysql_result($refPuntosEquiposA,0,'puntos');
		$eAmarillasA 	= mysql_result($refPuntosEquiposA,0,'amarillas');
		$eRojasA 		= mysql_result($refPuntosEquiposA,0,'rojas');
		$eAzulesA 		= mysql_result($refPuntosEquiposA,0,'azules');	
		$eObservacionA 	= mysql_result($refPuntosEquiposA,0,'observacion');
	} else {
		$ePuntosA 		= '';
		$eAmarillasA 	= '';
		$eRojasA 		= '';
		$eAzulesA 		= '';
		$eObservacionA 	= '';	
	}
}
if (mysql_num_rows($resJugadoresB)>0) {
	$equipoB	= mysql_result($resJugadoresB,0,'nombre');
	$IdequipoB	= mysql_result($resJugadoresB,0,'idequipo');
	$refTorneoB = mysql_result($resJugadoresB,0,'reftorneo');
	$refPuntosEquiposB = $serviciosEquipos->traerPuntosEquiposPorFixtureEquipoFechaTorneo($idFixture,$IdequipoB,$refFecha,$refTorneoB);
	if (mysql_num_rows($refPuntosEquiposB)>0) {
		$ePuntosB 		= mysql_result($refPuntosEquiposB,0,'puntos');
		$eAmarillasB 	= mysql_result($refPuntosEquiposB,0,'amarillas');
		$eRojasB 		= mysql_result($refPuntosEquiposB,0,'rojas');
		$eAzulesB 		= mysql_result($refPuntosEquiposB,0,'azules');	
		$eObservacionB 	= mysql_result($refPuntosEquiposB,0,'observacion');
	} else {
		$ePuntosB 		= '';
		$eAmarillasB 	= '';
		$eRojasB 		= '';
		$eAzulesB 		= '';	
		$eObservacionB 	= '';
	}
}

if ($_SESSION['refroll_predio'] != 1) {

} else {

	
}

$resJugadoresA = $serviciosJugadores->traerJugadoresPorFixtureA($idFixture);
$resJugadoresB = $serviciosJugadores->traerJugadoresPorFixtureB($idFixture);

?>

<!DOCTYPE HTML>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">



<title>Gesti&oacute;n: Tres Sesenta F&uacute;tbol</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link href="../../css/estiloDash.css" rel="stylesheet" type="text/css">
    

    
    <script type="text/javascript" src="../../js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" href="../../css/jquery-ui.css">

    <script src="../../js/jquery-ui.js"></script>
    
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"/>
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>

	<style type="text/css">
		
  
		
	</style>
    
   
   <link href="../../css/perfect-scrollbar.css" rel="stylesheet">
      <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
      <script src="../../js/jquery.mousewheel.js"></script>
      <script src="../../js/perfect-scrollbar.js"></script>
      <script>
      jQuery(document).ready(function ($) {
        "use strict";
        $('#navigation').perfectScrollbar();
      });
    </script>
    
    <script>
	  $(function(){
		var autocompletar = new Array();
		<?php //Esto es un poco de php para obtener lo que necesitamos
		 for($p = 0;$p < count($arreglo_php); $p++){ //usamos count para saber cuantos elementos hay ?>
		   autocompletar.push('<?php echo $arreglo_php[$p]; ?>');
		 <?php } ?>
		 $("#apyn").autocomplete({ //Usamos el ID de la caja de texto donde lo queremos
		   source: autocompletar //Le decimos que nuestra fuente es el arreglo
		 });
	  });
	</script>
</head>

<body>

 
<?php echo $resMenu; ?>

<div id="content">

<h3><?php echo $lblTituloplural; ?></h3>

    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Cargar <?php echo $lblTitulosingular; ?></p>
        	
        </div>
    	<div class="cuerpoBox" style="padding-right:10px;">
    		<form class="form-inline formulario" role="form">
        	<div class="row">
				<div align="center">
                <ul class="list-inline">
                	<li>
                    	<button type="button" class="btn btn-success marcar" style="margin-left:0px;">Marcar Todos</button>
                	</li>
                    <li>
                    	<button type="button" class="btn btn-danger desmarcar" style="margin-left:0px;">Desmarcar Todos</button>
                    </li>
                </ul>
                </div>
                <table class="table table-striped" style="margin:10px;">
                	<caption style="font-size:1.5em; font-style:italic;">Equipo A: <?php echo $equipoA; ?></caption>
                    <thead>
                    	<tr>
                        	<th><div align="center">Jugó</div></th>
                        	<th>Jugador</th>
                            <th>DNI</th>
                            <th><div align="center"><img src="../../imagenes/pelotaweb.png"></div></th>
                            <!--<th><div align="center"><img src="../../imagenes/cancha.png"></div></th>-->
                            <th><div align="center"><img src="../../imagenes/pelotaerro.png"></div></th>
                            <th><div align="center"><img src="../../imagenes/icoAmarilla.png"></div></th>
                            <th><div align="center"><img src="../../imagenes/azul.png"></div></th>
                            <th><div align="center"><img src="../../imagenes/icoRoja.png"></div></th>
                            <th><div align="center"><img src="../../imagenes/medalla.png"></div></th>
                            <th><div align="center"><img src="../../imagenes/estrella.png"></div></th>
                            <th><div align="center">Acción</div></th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
							
							while ($row = mysql_fetch_array($resJugadoresA)) {
								if ($row[0] != '') {
						?>
                        <tr>
                        	<th>
                            	<div align="center">
                                	<input type="checkbox" class="form-control input-sm" id="jugo<?php echo $row[0]; ?>" name="jugo<?php echo $row[0]; ?>" style="width:30px;" <?php if ($row["jugo"] == '1') { echo "checked"; } ?> />
                                </div>
                            </th>
                        	<th>
								<?php echo $row[1]; ?>
                            </th>
                            <th>
								<?php echo $row[2]; ?>
                            </th>
                            <th>
                            	<div align="center">
                                	<input type="number" class="form-control input-sm" name="goles<?php echo $row[0]; ?>" id="goles<?php echo $row[0]; ?>" style="width:45px;" value="<?php echo $row["goles"]; ?>"/>
                                </div>
                            </th>
                            <th class="hidden">
                            	<div align="center">
                                	<input type="number" class="form-control input-sm" name="cancha<?php echo $row[0]; ?>" id="cancha<?php  echo $row[0]; ?>" style="width:45px;" value="<?php echo $row["cancha"]; ?>"/>
                                </div>
                            </th>
                            <th>
                            	<div align="center">
                                	<input type="number" class="form-control input-sm" name="arquero<?php echo $row[0]; ?>" id="arquero<?php echo $row[0]; ?>" style="width:45px;" value="<?php echo $row["arquero"]; ?>"/>
                                </div>
                            </th>
                            <th>
                            	<div align="center">	
                                	<input type="number" class="form-control input-sm" name="amarillas<?php echo $row[0]; ?>" id="amarillas<?php echo $row[0]; ?>" style="width:45px;" value="<?php echo $row["amarillas"]; ?>"/>
                                </div>
                            </th>
                            <th>
                            	<div align="center">
                                	<input type="number" class="form-control input-sm" name="azules<?php echo $row[0]; ?>" id="azules<?php echo $row[0]; ?>" style="width:45px;" value="<?php echo $row["azules"]; ?>"/>
                                </div>
                            </th>
                            <th>
                            	<div align="center">
                                	<input type="number" class="form-control input-sm" name="rojas<?php echo $row[0]; ?>" id="rojas<?php echo $row[0]; ?>" style="width:45px;" value="<?php echo $row["rojas"]; ?>"/>
                                </div>
                            </th>
                            <th>
                            	<div align="center">
                                	<input type="number" class="form-control input-sm" name="puntos<?php echo $row[0]; ?>" id="puntos<?php echo $row[0]; ?>" style="width:55px;" value="<?php if ($row["puntos"] == '') { echo 6; } else { echo $row["puntos"]; }?>"/>
                                </div>
                            </th>
                            <th>
                            	<div align="center">
                                	<input type="checkbox" class="form-control input-sm" id="mejor<?php echo $row[0]; ?>" name="mejor<?php echo $row[0]; ?>s" style="width:30px;" <?php if ($row["mejor"] == 1) { echo "checked"; } ?>/>
                                </div>
                            </th>
                            <th>
                            	<div align="center">
                                	
                                	<button type="button" class="btn btn-primary guardarjugadorA" id="<?php echo $row[0]; ?>" style="margin-left:0px;">Guardar</button>
                                </div>
                            </th>
                        </tr>
                        <tr style="display:none;" id="resultado<?php echo $row[0]; ?>"><th colspan='12'></th></tr>
                        <?php
								} else {
									echo "<tr><th colspan='12'><h4>El Equipo no posee jugadores cargados</h4></th></tr>";	
								}
							}
						?>
                    </tbody>
                </table>
                
                <div class='row' style="margin-left:15px; margin-right:15px;">
                    <h4>Puntos Bonus - Sanciones del Equipo</h4>
                    <div class="form-group col-md-2">
                     <label class="control-label" style="text-align:left" for="reftorneo">Punto Bonus</label>
                        <div class="input-group col-md-8">
                            <input type="text" id="puntobonusa" name="puntobonusa" class="form-control" value="<?php echo $ePuntosA == '' ? 1 : $ePuntosA; ?>" required/>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-2" align="center">
                     <label class="control-label" style="text-align:left" for="reftorneo"><img src="../../imagenes/icoAmarilla.png">Canilleras</label>
                        <div class="input-group col-md-8">
                            <input type="text" id="equipoamarillasa" name="equipoamarillasa" value="<?php echo $eAmarillasA; ?>" class="form-control" required/>
                        </div>
                        
                    </div>
                    <div class="form-group col-md-2 hidden" align="center">
                     <label class="control-label" style="text-align:left" for="reftorneo"><img src="../../imagenes/azul.png"></label>
                        <div class="input-group col-md-8">
                            <input type="text" id="equipoazulesa" name="equipoazulesa" value="<?php echo $eAzulesA; ?>" class="form-control" required/>
                        </div>
                        
                    </div>
                    <div class="form-group col-md-2" align="center">
                     <label class="control-label" style="text-align:left" for="reftorneo"><img src="../../imagenes/icoRoja.png">Ausente</label>
                        <div class="input-group col-md-8">
                            <input type="text" id="equiporojasa" name="equiporojasa" value="<?php echo $eRojasA; ?>" class="form-control" required/>
                        </div>
                        
                    </div>
                    <div class="form-group col-md-6" align="center">
                     <label class="control-label" style="text-align:left" for="reftorneo">Observación</label>
                        <div class="input-group col-md-12">
                            <input type="text" id="equipoobservaciona" name="equipoobservaciona" value="<?php echo $eObservacionA; ?>" class="form-control" required/>
                        </div>
                        
                    </div>
                    
                    
                    <div class="form-group col-md-12" align="left">
                    	<button type="button" class="btn btn-primary guardarpuntosA" id="<?php echo $IdequipoA; ?>" style="margin-left:0px;">Guardar Puntos</button>
                        <h4 id="msgResultadoA"></h4>
                    </div>
                    
                </div>
                
                <hr>
                
                
                <table class="table table-striped" style="margin:10px;">
                	<caption style="font-size:1.5em; font-style:italic;">Equipo B: <?php echo $equipoB; ?></caption>
                    <thead>
                    	<tr>
                        	<th><div align="center">Jugó</div></th>
                        	<th>Jugador</th>
                            <th>DNI</th>
                            <th><div align="center"><img src="../../imagenes/pelotaweb.png"></div></th>
                            <!--<th><div align="center"><img src="../../imagenes/cancha.png"></div></th>-->
                            <th><div align="center"><img src="../../imagenes/pelotaerro.png"></div></th>
                            <th><div align="center"><img src="../../imagenes/icoAmarilla.png"></div></th>
                            <th><div align="center"><img src="../../imagenes/azul.png"></div></th>
                            <th><div align="center"><img src="../../imagenes/icoRoja.png"></div></th>
                            <th><div align="center"><img src="../../imagenes/medalla.png"></div></th>
                            <th><div align="center"><img src="../../imagenes/estrella.png"></div></th>
                            <th><div align="center">Acción</div></th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
							
							while ($rowB = mysql_fetch_array($resJugadoresB)) {
								if ($rowB[0] != '') {
						?>
                        <tr>
                        	<th>
                            	<div align="center">
                                	<input type="checkbox" class="form-control input-sm" id="jugo<?php echo $rowB[0]; ?>" name="jugo<?php echo $rowB[0]; ?>" style="width:30px;" <?php if ($rowB["jugo"] == '1') { echo "checked"; } ?>/>
                                </div>
                            </th>
                        	<th>
								<?php echo $rowB[1]; ?>
                            </th>
                            <th>
								<?php echo $rowB[2]; ?>
                            </th>
                            <th>
                            	<div align="center">
                                	<input type="number" class="form-control input-sm" name="goles<?php echo $rowB[0]; ?>" id="goles<?php echo $rowB[0]; ?>" style="width:45px;" value="<?php echo $rowB["goles"]; ?>"/>
                                </div>
                            </th>
                            <th class="hidden">
                            	<div align="center">
                                	<input type="number" class="form-control input-sm" name="cancha<?php echo $rowB[0]; ?>" id="cancha<?php echo $rowB[0]; ?>" style="width:45px;" value="<?php echo $rowB["cancha"]; ?>"/>
                                </div>
                            </th>
                            <th>
                            	<div align="center">
                                	<input type="number" class="form-control input-sm" name="arquero<?php echo $rowB[0]; ?>" id="arquero<?php echo $rowB[0]; ?>" style="width:45px;" value="<?php echo $rowB["arquero"]; ?>"/>
                                </div>
                            </th>
                            <th>
                            	<div align="center">	
                                	<input type="number" class="form-control input-sm" name="amarillas<?php echo $rowB[0]; ?>" id="amarillas<?php echo $rowB[0]; ?>" style="width:45px;" value="<?php echo $rowB["amarillas"]; ?>"/>
                                </div>
                            </th>
                            <th>
                            	<div align="center">
                                	<input type="number" class="form-control input-sm" name="azules<?php echo $rowB[0]; ?>" id="azules<?php echo $rowB[0]; ?>" style="width:45px;" value="<?php echo $rowB["azules"]; ?>"/>
                                </div>
                            </th>
                            <th>
                            	<div align="center">
                                	<input type="number" class="form-control input-sm" name="rojas<?php echo $rowB[0]; ?>" id="rojas<?php echo $rowB[0]; ?>" style="width:45px;" value="<?php echo $rowB["rojas"]; ?>"/>
                                </div>
                            </th>
                            <th>
                            	<div align="center">
                                	<input type="number" class="form-control input-sm" name="puntos<?php echo $rowB[0]; ?>" id="puntos<?php echo $rowB[0]; ?>" style="width:55px;" value="<?php if ($rowB["puntos"] == '') { echo 6; } else { echo $rowB["puntos"]; }?>" />
                                </div>
                            </th>
                            <th>
                            	<div align="center">
                                	<input type="checkbox" class="form-control input-sm" id="mejor<?php echo $rowB[0]; ?>" name="mejor<?php echo $rowB[0]; ?>s" style="width:30px;" <?php if ($rowB["mejor"] == 1) { echo "checked"; } ?>/>
                                </div>
                            </th>
                            <th>
                            	<div align="center">
                                	
                                	<button type="button" class="btn btn-primary guardarjugadorB" id="<?php echo $rowB[0]; ?>" style="margin-left:0px;">Guardar</button>
                                </div>
                            </th>
                        </tr>
                        <tr style="display:none;" id="resultado<?php echo $rowB[0]; ?>"><th colspan='12'></th></tr>
                        <?php
								} else {
									echo "<tr><th colspan='12'><h4>El Equipo no posee jugadores cargados</h4></th></tr>";
								}
							}
						?>
                    </tbody>
                </table>

                
                <div class='row' style="margin-left:15px; margin-right:15px;">
                    <h4>Puntos Bonus - Sanciones del Equipo</h4>
                    <div class="form-group col-md-2">
                     <label class="control-label" style="text-align:left" for="reftorneo">Punto Bonus</label>
                        <div class="input-group col-md-8">
                            <input type="text" id="puntobonusb" name="puntobonusb" value="<?php echo $ePuntosB == '' ? 1 : $ePuntosB; ?>" class="form-control" required/>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-2" align="center">
                     <label class="control-label" style="text-align:center" for="reftorneo"><img src="../../imagenes/icoAmarilla.png">Canilleras</label>
                        <div class="input-group col-md-8">
                            <input type="text" id="equipoamarillasb" name="equipoamarillasb" value="<?php echo $eAmarillasB; ?>" class="form-control" required/>
                        </div>
                        
                    </div>
                    <div class="form-group col-md-2 hidden" align="center">
                     <label class="control-label" style="text-align:center" for="reftorneo"><img src="../../imagenes/azul.png"></label>
                        <div class="input-group col-md-8">
                            <input type="text" id="equipoazulesb" name="equipoazulesb" value="<?php //echo $eAzulesB; ?>" class="form-control" required/>
                        </div>
                        
                    </div>
                    <div class="form-group col-md-2" align="center">
                     <label class="control-label" style="text-align:center" for="reftorneo"><img src="../../imagenes/icoRoja.png">Ausente</label>
                        <div class="input-group col-md-8">
                            <input type="text" id="equiporojasb" name="equiporojasb" value="<?php echo $eRojasB; ?>" class="form-control" required/>
                        </div>
                        
                    </div>
                    <div class="form-group col-md-6" align="center">
                     <label class="control-label" style="text-align:center" for="reftorneo">Observación</label>
                        <div class="input-group col-md-12">
                            <input type="text" id="equipoobservacionb" name="equipoobservacionb" value="<?php echo $eObservacionB; ?>" class="form-control" required/>
                        </div>
                        
                    </div>
                    
                    <div class="form-group col-md-12" align="left">
                    	<button type="button" class="btn btn-primary guardarpuntosB" id="<?php echo $IdequipoB; ?>" style="margin-left:0px;">Guardar Puntos</button>
                        <h4 id="msgResultadoB"></h4>
                    </div>
                    
                </div>
              	
                
            
            </div>
            
            <div class='row' style="margin-left:15px; margin-right:15px;">
                <div class="form-group col-md-2">
                 <label class="control-label" style="text-align:left" for="reftorneo">Chequeado</label>
                    <div class="input-group col-md-8">
                        <input type="checkbox" class="form-control input-sm" id="chequeado" name="chequeado" style="width:30px;" <?php if ($refChequeado == 1) { echo "checked"; } ?>/>
                    </div>
                </div>
            
            </div>
            
            
            
            <div class='row' style="margin-left:15px; margin-right:15px;">
                <div class='alert'>
                
                </div>
                <div class='alert alert2'>
                
                </div>
                <div id='load'>
                
                </div>
            </div>
			
            
            <div class="row">
                <div class="col-md-12">
                <ul class="list-inline" style="margin-top:15px;">

					<li>
                        <button type="button" class="btn btn-success" id="cargarjugador">Agregar Jugador</button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-primary" id="cargamasiva">Guardar Masivo</button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-default volver">Volver</button>
                    </li>
                </ul>
                </div>
            </div>
            <input type="hidden" id="accion" name="accion" value="insertarEstadisticaMasiva" />
            <input type="hidden" id="idfixture" name="idfixture" value="<?php echo $idFixture; ?>" />
            </form>
    	</div>
    </div>



	  
<div id="crearFjugador" style=" z-index:9; display:none; height:auto; background-color:#CCC; margin-top:-32%; width:79%;" class="boxInfoLargo">
 	<form class="form-inline formulario2" role="form">
                    <div class="form-group col-md-6">
                    
                        <label class="control-label" style="text-align:left" for="apyn">Apellido</label>
                        <div class="input-group col-md-12">
                            <input id="apellido" class="form-control" maxlength="60" type="text" required placeholder="Ingrese el Apellido..." name="apellido">
                        </div>
                    
                    </div>
                    
                    <div class="form-group col-md-6">
                    
                        <label class="control-label" style="text-align:left" for="apyn">Nombre</label>
                        <div class="input-group col-md-12">
                            <input id="nombre" class="form-control" maxlength="60" type="text" required placeholder="Ingrese el Nombre..." name="nombre">
                        </div>
                    
                    </div>
                    
                    
                    <div class="form-group col-md-6">
                        <label class="control-label" style="text-align:left" for="idequipo">Equipo</label>
                        <div class="input-group col-md-12">
                            <select id="idequipo" class="form-control" name="idequipo">
                                <?php echo $cadRef; ?>
                            </select>
                        </div>
                    </div>
                
                
                    <div class="form-group col-md-6">
                        <label class="control-label" style="text-align:left" for="dni">Dni</label>
                        <div class="input-group col-md-12">
                            <input id="dni" class="form-control" type="text" required placeholder="Ingrese el Dni..." name="dni">
                        </div>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label class="control-label" style="text-align:left" for="dni">E-Mail</label>
                        <div class="input-group col-md-12">
                            <input id="email" class="form-control" type="text" required placeholder="Ingrese el E-Mail..." name="email">
                        </div>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label class="control-label" style="text-align:left" for="dni">Facebook</label>
                        <div class="input-group col-md-12">
                            <input id="facebook" class="form-control" type="text" required placeholder="Ingrese el Facebook..." name="facebook">
                        </div>
                    </div>
                
                
                    <div class="form-group col-md-6">
                        <label class="control-label" style="text-align:left" for="chequeado">Invitado</label>
                        <div class="input-group col-md-12 fontcheck">
                            <input id="invitado" class="form-control" type="checkbox" required style="width:50px;" name="invitado">
                            <p>Si/No</p>
                        </div>
                    </div>
                    <input id="accion" type="hidden" value="insertarJugadores" name="accion">
                    <div class="col-md-12">
                <ul class="list-inline" style="margin-top:15px;">
                    <li>
                        <button type="button" class="btn btn-success" id="crearjugador" style="margin-left:0px;">Crear</button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-default" id="cerrar" style="margin-left:0px;">Cerrar</button>
                    </li>
                </ul>
                </div>
 	</form>
</div>


    

   
</div>


</div>






<script type="text/javascript">
$(document).ready(function(){
	
	 $('#refequipo').change(function() {
		$.ajax({
			data:  {refequipo: $('#refequipo').val(),
					accion: 'traerJugadores'},
			url:   '../../ajax/ajax.php',
			type:  'post',
			beforeSend: function () {
				$('#refjugador').html('')	
			},
			success:  function (response) {
				$('#refjugador').html(response);
					
			}
		});
		
		$.ajax({
			data:  {refequipo: $('#refequipo').val(),
					accion: 'traerFixturePorEquipo'},
			url:   '../../ajax/ajax.php',
			type:  'post',
			beforeSend: function () {
				$('#reffixture').html('')	
			},
			success:  function (response) {
				$('#reffixture').html(response);
					
			}
		});
	});


	$('.guardarpuntosA').click(function(event){
		usersid =  $(this).attr("id");
		if (!isNaN(usersid)) {
			 $.ajax({
				data:  {rojas: 		$('#equiporojasa').val(),
						azules: 	$('#equipoazulesa').val(),
						amarillas: 	$('#equipoamarillasa').val(),
						observacion:$('#equipoobservaciona').val(),
						puntos: 	$('#puntobonusa').val(),
						reffixture:	<?php echo $idFixture; ?>,
						reffecha:	<?php echo $refFecha; ?>,
						refequipo:	<?php echo $IdequipoA; ?>,
						reftorneo:  <?php echo $refTorneoA; ?>,
						accion: 	'insertarPuntosEquipos'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
					$('#reffixture').html('')	
				},
				success:  function (response) {
					if (response == '') {
				
						$('#msgResultadoA').html("<img src='../../imagenes/check.gif'> Se cargo correctamente!!");
						$('#msgResultadoA').show(300);
						$('#msgResultadoA').toggle(120);
						$('#msgResultadoA').show(150);
					} else {
						$('#msgResultadoA').show(300);
						$('#msgResultadoA').toggle(120);
						$('#msgResultadoA').show(150);
						$('#msgResultadoA').html("<img src='../../imagenes/errorico.png'> " + response);
						
					}
				}
			}); 
		} else {
			alert("Error, vuelva a realizar la acción.");	
		}
	});//fin del boton guardarPuntosA
	
	
	
	$('.guardarpuntosB').click(function(event){
		usersid =  $(this).attr("id");
		if (!isNaN(usersid)) {
			 $.ajax({
				data:  {rojas: 		$('#equiporojasb').val(),
						azules: 	$('#equipoazulesb').val(),
						amarillas: 	$('#equipoamarillasb').val(),
						observacion:$('#equipoobservacionb').val(),
						puntos: 	$('#puntobonusb').val(),
						reffixture:	<?php echo $idFixture; ?>,
						reffecha:	<?php echo $refFecha; ?>,
						refequipo:	<?php echo $IdequipoB; ?>,
						reftorneo:  <?php echo $refTorneoB; ?>,
						accion: 	'insertarPuntosEquipos'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
					$('#reffixture').html('')	
				},
				success:  function (response) {
					if (response == '') {
				
						$('#msgResultadoB').html("<img src='../../imagenes/check.gif'> Se cargo correctamente!!");
						$('#msgResultadoB').show(300);
						$('#msgResultadoB').toggle(120);
						$('#msgResultadoB').show(150);
					} else {
						$('#msgResultadoB').show(300);
						$('#msgResultadoB').toggle(120);
						$('#msgResultadoB').show(150);
						$('#msgResultadoB').html("<img src='../../imagenes/errorico.png'> " + response);
						
					}
				}
			}); 
		} else {
			alert("Error, vuelva a realizar la acción.");	
		}
	});//fin del boton guardarPuntosB
	
	
	$('.guardarjugadorA').click(function(event){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			$.ajax({
				data:  {jugo: 		$('#jugo'+usersid).is(':checked') ? 1 : 0,
						goles: 		$('#goles'+usersid).val(),
						cancha: 	$('#cancha'+usersid).val(),
						arquero: 	$('#arquero'+usersid).val(),
						amarillas: 	$('#amarillas'+usersid).val(),
						azules: 	$('#azules'+usersid).val(),
						rojas: 		$('#rojas'+usersid).val(),
						puntos: 	$('#puntos'+usersid).val(),
						mejor: 		$('#mejor'+usersid).is(':checked') ? 1 : 0,
						reffixture:	<?php echo $idFixture; ?>,
						refjugador:	usersid,
						refequipo:	<?php echo $IdequipoA; ?>,
						accion: 	'insertarEstadisticaPorJugador'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
					$('#reffixture').html('')	
				},
				success:  function (response) {
					if (response == '') {
				
						$('#resultado'+usersid).html("<th colspan='12'><img src='../../imagenes/check.gif'> Se cargo correctamente!!</th>");
						$('#resultado'+usersid).show(300);
						$('#resultado'+usersid).toggle(120);
						$('#resultado'+usersid).show(150);
					} else {
						$('#resultado'+usersid).show(300);
						$('#resultado'+usersid).toggle(120);
						$('#resultado'+usersid).show(150);
						$('#resultado'+usersid).html("<th colspan='12'><img src='../../imagenes/errorico.png'> " + response + "</th>");
						
					}
				}
			});
			
			//url = "../clienteseleccionado/index.php?idcliente=" + usersid;
			//$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton guardarJugadorA
	
	
	$('.guardarjugadorB').click(function(event){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			$.ajax({
				data:  {jugo: 		$('#jugo'+usersid).is(':checked') ? 1 : 0,
						goles: 		$('#goles'+usersid).val(),
						cancha: 	$('#cancha'+usersid).val(),
						arquero: 	$('#arquero'+usersid).val(),
						amarillas: 	$('#amarillas'+usersid).val(),
						azules: 	$('#azules'+usersid).val(),
						rojas: 		$('#rojas'+usersid).val(),
						puntos: 	$('#puntos'+usersid).val(),
						mejor: 		$('#mejor'+usersid).is(':checked') ? 1 : 0,
						reffixture:	<?php echo $idFixture; ?>,
						refjugador:	usersid,
						refequipo:	<?php echo $IdequipoB; ?>,
						accion: 	'insertarEstadisticaPorJugador'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
					$('#reffixture').html('')	
				},
				success:  function (response) {
					if (response == '') {
						$('#resultado'+usersid).show(300);
						$('#resultado'+usersid).toggle(120);
						$('#resultado'+usersid).show(150);
						$('#resultado'+usersid).html("<th colspan='12'><img src='../../imagenes/check.gif'> Se cargo correctamente!!</th>");
						
						
					} else {
						$('#resultado'+usersid).show(300);
						$('#resultado'+usersid).toggle(120);
						$('#resultado'+usersid).show(150);
						$('#resultado'+usersid).html("<th colspan='12'><img src='../../imagenes/errorico.png'> " + response + "</th>");
						
					}
						
				}
			});
			
			//url = "../clienteseleccionado/index.php?idcliente=" + usersid;
			//$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton guardarJugadorB
	
	$('.varmodificar').click(function(event){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			url = "modificaramonestados.php?id=" + usersid;
			$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton modificar
	
	$('.volver').click(function(event){
		  
		url = "../fixture/";
		$(location).attr('href',url);
		  
	});//fin del boton modificar
	
	
	$('#vergoleadores').click(function(event){

		window.open('vergoleadores.php','_blank');

	});//fin del boton modificar
	
	$('#veramonestados').click(function(event){

		window.open('veramonestados.php','_blank');

	});//fin del boton modificar
	
	
	
	$('#cargarjugador').click(function(event){

		$("#crearFjugador").show(100);

	});//fin del boton abrir
	
	$('.marcar').click(function(event){

		$("input:checkbox").each(function(){
			//cada elemento seleccionado
			var cad = $(this).attr("id");

			if (cad.indexOf('jugo')>=0) {
				$(this).prop("checked", "checked");
			}
		});

	});//fin del boton abrir
	
	$('.desmarcar').click(function(event){

		$("input:checkbox").each(function(){
			//cada elemento seleccionado
			var cad = $(this).attr("id");

			if (cad.indexOf('jugo')>=0) {
				$(this).prop("checked", "");
			}
		});

	});//fin del boton abrir
	
	$('#chequeado').click(function() {
		$.ajax({
				data:  {id: <?php echo $idFixture; ?>, chequeado: $('#chequeado').is(':checked') ? 1 : 0, accion: 'modificarFixtureChequeado'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
						$('.'+$('#idEliminar').val()).fadeOut( "slow", function() {
							$(this).remove();
						});
						
				}
		});	
	});
	
	
	$('#cargamasiva').click(function(e) {
        
		$("button:button").each(function(){
			//cada elemento seleccionado
			var cad = $(this).attr("id");
			
			if (parseInt(cad)>0) {
				//$(this).prop("checked", "");
				$(this).click();
				
				
			}
		});
		
		$('#chequeado').click();
    });

	
	$('#cerrar').click(function(event){

		$("#crearFjugador").hide(100);

	});//fin del boton cerrar
	
	
	$('.varborrargoleadores').click(function(event){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			$("#idEliminar2").val(usersid);
			$("#dialog22").dialog("open");

			
			//url = "../clienteseleccionado/index.php?idcliente=" + usersid;
			//$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton eliminar
	
	$('.varmodificargoleadores').click(function(event){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			url = "modificargoleadores.php?id=" + usersid;
			$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton modificar

	 $( "#dialog2" ).dialog({
		 	
			    autoOpen: false,
			 	resizable: false,
				width:600,
				height:240,
				modal: true,
				buttons: {
				    "Eliminar": function() {
	
						$.ajax({
									data:  {id: $('#idEliminar').val(), accion: 'eliminarAmonestados'},
									url:   '../../ajax/ajax.php',
									type:  'post',
									beforeSend: function () {
											
									},
									success:  function (response) {
											$('.'+$('#idEliminar').val()).fadeOut( "slow", function() {
												$(this).remove();
											});
											
									}
							});
						$( this ).dialog( "close" );
						$( this ).dialog( "close" );
							$('html, body').animate({
	           					scrollTop: '1000px'
	       					},
	       					1500);
				    },
				    Cancelar: function() {
						$( this ).dialog( "close" );
				    }
				}
		 
		 
	 		}); //fin del dialogo para eliminar
			
			
			
			
			
			
			
			
			
	// para cargar al jugador
	
	
	
	//al enviar el formulario
    $('#crearjugador').click(function(){
		

			//información del formulario
			var formData = new FormData($(".formulario2")[0]);
			var message = "";
			//hacemos la petición ajax  
			$.ajax({
				url: '../../ajax/ajax.php',  
				type: 'POST',
				// Form data
				//datos del formulario
				data: formData,
				//necesario para subir archivos via ajax
				cache: false,
				contentType: false,
				processData: false,
				//mientras enviamos el archivo
				beforeSend: function(){
					$("#load3").html('<img src="../../imagenes/load13.gif" width="50" height="50" />');       
				},
				//una vez finalizado correctamente
				success: function(data){

					if (data == '') {
                                            $(".alert3").removeClass("alert-danger");
											$(".alert3").removeClass("alert-info");
                                            $(".alert3").addClass("alert-success");
                                            $(".alert3").html('<strong>Ok!</strong> Se cargo exitosamente el <strong><?php echo $lblTitulosingular; ?></strong>. ');
											$(".alert3").delay(3000).queue(function(){
												/*aca lo que quiero hacer 
												  después de los 2 segundos de retraso*/
												$(this).dequeue(); //continúo con el siguiente ítem en la cola
												
											});
											$("#load").html('');
											url = "estadisticas.php?id="+<?php echo $idFixture; ?>;
											$(location).attr('href',url);
                                            
											
                                        } else {
                                        	$(".alert3").removeClass("alert-danger");
                                            $(".alert3").addClass("alert-danger");
                                            $(".alert3").html('<strong>Error!</strong> '+data);
                                            $("#load3").html('');
                                        }
				},
				//si ha ocurrido un error
				error: function(){
					$(".alert").html('<strong>Error!</strong> Actualice la pagina');
                    $("#load").html('');
				}
			});
		
    });
	
	
	
	
	
	
	// finnn del cargar jugador		
			
			
			
			
			
			
			
			
			
	
	
	$( "#dialog22" ).dialog({
		 	
			    autoOpen: false,
			 	resizable: false,
				width:600,
				height:240,
				modal: true,
				buttons: {
				    "Eliminar": function() {
	
						$.ajax({
									data:  {id: $('#idEliminar2').val(), accion: 'eliminarGoleadores'},
									url:   '../../ajax/ajax.php',
									type:  'post',
									beforeSend: function () {
											
									},
									success:  function (response) {
											$('.'+$('#idEliminar2').val()).fadeOut( "slow", function() {
												$(this).remove();
											});
											
									}
							});
						$( this ).dialog( "close" );
						$( this ).dialog( "close" );
							$('html, body').animate({
	           					scrollTop: '1000px'
	       					},
	       					1500);
				    },
				    Cancelar: function() {
						$( this ).dialog( "close" );
				    }
				}
		 
		 
	 		}); //fin del dialogo para eliminar
	
	function validador(){
		$error = "";
		
		if ($("#refequipo").val() == "") {
			
			$error = "Es obligatorio el campo Equipo.";
			$("#refequipo").addClass("alert-danger");
			$("#refequipo").attr("placeholder",$error);
		}
		
		if ($("#refjugador").val() == "") {
			
			$error = "Es obligatorio el campo Jugador.";
			$("#refjugador").addClass("alert-danger");
			$("#refjugador").attr("placeholder",$error);
		}
		
		if ($("#reffixture").val() == "") {
			
			$error = "Es obligatorio el campo Fecha.";
			$("#reffixture").addClass("alert-danger");
			$("#reffixture").attr("placeholder",$error);
		}
		
		if (($("#goles").val() == "") && ($("#amarillas").val() == "")) {
			
			$error = "Es obligatorio el campo Goles o el campo Amarillas.";
			$("#goles").addClass("alert-danger");
			$("#goles").attr("placeholder",$error);
		}
		
		return $error;
	}
	
	
	//al enviar el formulario
    $('#cargar').click(function(){
		
		if (validador() == "")
        {
			//información del formulario
			var formData = new FormData($(".formulario")[0]);
			var message = "";
			//hacemos la petición ajax  
			$.ajax({
				url: '../../ajax/ajax.php',  
				type: 'POST',
				// Form data
				//datos del formulario
				data: formData,
				//necesario para subir archivos via ajax
				cache: false,
				contentType: false,
				processData: false,
				//mientras enviamos el archivo
				beforeSend: function(){
					$("#load").html('<img src="../../imagenes/load13.gif" width="50" height="50" />');       
				},
				//una vez finalizado correctamente
				success: function(data){

					if (data == '') {
                                            $(".alert").removeClass("alert-danger");
											$(".alert").removeClass("alert-info");
                                            $(".alert").addClass("alert-success");
                                            
											
											$("#load").html('');
											//url = "index.php";
											//$(location).attr('href',url);
											var str =  $("#refjugador option:selected").html();	
											var res = str.split(" - ");
                                            
											var str2 =  $("#reffixture option:selected").html();	
											var res2 = str.split(" - ");
											if ($("#goles").val() != "") {
												
												$('#resultadosgoleadores').prepend('<tr><td>'+res[0]+'</td>'+
																				   '<td>'+res[1]+'</td>'+
																				   '<td>'+$("#refequipo option:selected").html()+'</td>'+
																				   '<td>'+res2[0]+'</td>'+
																				   '<td>'+$("#goles").val()+'</td>'+
																				   '<td style="color:#f00;">Nuevo</td></tr>');
											
											$(".alert").html('<strong>Ok!</strong> Se cargo exitosamente el <strong>Goleador</strong>. ');
											}
											
											if ($("#amarillas").val() != "") {
												
												$('#resultados').prepend('<tr><td>'+res[0]+'</td>'+
																				   '<td>'+res[1]+'</td>'+
																				   '<td>'+$("#refequipo option:selected").html()+'</td>'+
																				   '<td>'+res2[0]+'</td>'+
																				   '<td>'+$("#amarillas").val()+'</td>'+
																				   '<td style="color:#f00;">Nuevo</td></tr>');
											$(".alert2").html('<strong>Ok!</strong> Se cargo exitosamente el <strong>Amonestado</strong>. ');
											}
											
                                        } else {
                                        	$(".alert").removeClass("alert-danger");
                                            $(".alert").addClass("alert-danger");
                                            $(".alert").html('<strong>Error!</strong> '+data);
                                            $("#load").html('');
                                        }
				},
				//si ha ocurrido un error
				error: function(){
					$(".alert").html('<strong>Error!</strong> Actualice la pagina');
                    $("#load").html('');
				}
			});
		}
    });
	

});
</script>
<?php } ?>
</body>
</html>
