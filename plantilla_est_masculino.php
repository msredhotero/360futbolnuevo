<?php


include ('includes/funciones.php');
include ('includes/funcionesJugadores.php');
include ('includes/funcionesEquipos.php');
include ('includes/funcionesGrupos.php');
include ('includes/funcionesZonasEquipos.php');
include ('includes/generadorfixturefijo.php');
include ('includes/funcionesDATOS.php');
include ('includes/funcionesPlayoff.php');

$serviciosFunciones = new Servicios();
$serviciosJugadores = new ServiciosJ();
$serviciosEquipos	= new ServiciosE();
$serviciosGrupos	= new ServiciosG();
$serviciosZonasEquipos	= new ServiciosZonasEquipos();
$serviciosDatos = new ServiciosDatos();
$serviciosPlayOff = new ServiciosPlayOff();


if (isset($_GET["id"])) {
	$idTipoTorneo = $_GET["id"];
} else {
	$idTipoTorneo = 6; /** Esto es lo unico que hay que modificar, aca hay que poner el ID TipoTorneo que corresponda*/
}

if (isset($_GET["zona"])) {
	$idzona = $_GET['zona'];
} else {
	$idzona = 19;
}

if (isset($_GET["fecha"])) {

	$idfecha = $_GET['fecha'];
} else {

	$idfecha = 23;
}

$torneo = $serviciosFunciones->TraerTorneosActivoPorTipo($idTipoTorneo);

$nombreTorneo = mysql_result($torneo,0,'descripciontorneo')." / ".mysql_result($torneo,0,'nombre');

$idfecha = $serviciosFunciones->UltimaFechaPorTorneoZona($idTipoTorneo,$idzona);

if (mysql_num_rows($idfecha)>0) {
	$idfecha = mysql_result($idfecha,0,0);	
} else {
	$idfecha = 23;	
}

$resTorneos = $serviciosDatos->TraerFixturePorZonaTorneo($idTipoTorneo,$idzona,$idfecha);
$resGoles = $serviciosDatos->Goleadores($idTipoTorneo,$idzona,$idfecha);
$resFairPlay = $serviciosDatos->fairplay($idTipoTorneo,$idzona,$idfecha);
$resSuspendido = $serviciosDatos->SuspendidosNuevo($idTipoTorneo,$idzona,$idfecha);
$resAmarillas = $serviciosDatos->traerAcumuladosAmarillasPorTorneoZona($idTipoTorneo,$idzona,$idfecha);
$resVallaMenosVencida = $serviciosDatos->TraerFixturePorZonaTorneoMenosGoles($idTipoTorneo,$idzona,$idfecha);


/////////////////////// PARA EL PLAYOFF /////////////////////////////////////////////

$idTorneo = mysql_result($serviciosFunciones->TraerTorneosActivoPorTipo($idTipoTorneo),0,0);



$etapas = $serviciosPlayOff->TraerEtaposPorTorneosZonas($idTorneo,$idzona);

//var_dump($etapas);
//die;
$resPlayOff = $serviciosPlayOff->traerArmarPlayOffPorEtapa($idTorneo,$idzona,1); //PlayOff
$resOctavos = $serviciosPlayOff->traerArmarPlayOffPorEtapa($idTorneo,$idzona,2); //Octavos
$resCuartos = $serviciosPlayOff->traerArmarPlayOffPorEtapa($idTorneo,$idzona,3); //Cuartos
$resSemiFinal = $serviciosPlayOff->traerArmarPlayOffPorEtapa($idTorneo,$idzona,4); //SemiFinal
$resTercer = $serviciosPlayOff->traerArmarPlayOffPorEtapa($idTorneo,$idzona,5); //Tercer puesto
$resFinal = $serviciosPlayOff->traerArmarPlayOffPorEtapa($idTorneo,$idzona,6); //Final
//traerArmarPlayOffPorEtapa($idTorneo, $idZona, $idEtapa)



$idTab = 2097;
$cadCab = '';
$cadCuerpo = '';

while ($rowEtapas = mysql_fetch_array($etapas)) { 
$idTab += 1;	
	switch ($rowEtapas['1']) {
		case 'PlayOff':
			$cadCab .= '<div class="tab-tabla " id="tab-tabla-'.$idTab.'">'.$rowEtapas['1'].'</div>';
			$cadCuerpo .= '<div class="posiciones list" id="tabla-posiciones-'.$idTab.'">
							<div class="titles">
								<div class="col col1"></div>
								<div class="col col2 col-number">EQUIPO A</div>
								<div class="col col3 col-number">RESULT. A</div>
								<div class="col col4 col-number">HORARIO</div>
								<div class="col col5 col-number">RESULT. B</div>
								<div class="col col6 col-number">EQUIPO B</div>
								<div class="col col7 col-number">FECHA</div>
							</div>
							<div class="items">';

						
								$cant = 1;
								
								while ($rowSF = mysql_fetch_array($resPlayOff)) {
	
								
								if (($cant % 2) != 0) {
								$cadCuerpo .= '<div class="item pair-row">';
								} else {
								$cadCuerpo .= '<div class="item odd-row">';
								}
									$cadCuerpo .= '<div class="col col1">
										
									</div>
									<div class="col col2 col-number">'.$rowSF['refplayoffequipo_a'].'</div>
									<div class="col col3 col-number">'.$rowSF['refplayoffresultado_a']; 
									if ($rowSF['penalesa'] != '') { 
										$cadCuerpo .= " (".$rowSF['penalesa'].")";
									}
									
									$cadCuerpo .= '</div>
									<div class="col col4 col-number">'.$rowSF['hora'].'</div>
									<div class="col col5 col-number">'.$rowSF['refplayoffresultado_b'];
									if ($rowSF['penalesb'] != '') { 
									$cadCuerpo .= " (".$rowSF['penalesb'].")"; 
									}
									
									$cadCuerpo .= '</div>
									<div class="col col6 col-number">'.$rowSF['refplayoffequipo_b'].'</div>
									<div class="col col7 col-number">'.$rowSF['fechajuego'].'</div>
					
								</div>';

									$cant = $cant + 1;
									} 

							$cadCuerpo .= '</div>
							<div class="instructions">
								<p>PJ: partidos jugados, PG: partidos ganados, PE: partidos 
					empatados, PP: partidos perdidos, GF: goles a favor, GC: goles en 
					contra, GD: diferencia de goles, PB: puntos bonus, FP: fair play, P: 
					puntos.</p>
							</div>
						</div>';
			break;
		case 'Octavos':
			$cadCab .= '<div class="tab-tabla " id="tab-tabla-'.$idTab.'">'.$rowEtapas['1'].'</div>';
			$cadCuerpo .= '<div class="posiciones list" id="tabla-posiciones-'.$idTab.'">
							<div class="titles">
								<div class="col col1"></div>
								<div class="col col2 col-number">EQUIPO A</div>
								<div class="col col3 col-number">RESULT. A</div>
								<div class="col col4 col-number">HORARIO</div>
								<div class="col col5 col-number">RESULT. B</div>
								<div class="col col6 col-number">EQUIPO B</div>
								<div class="col col7 col-number">FECHA</div>
							</div>
							<div class="items">';

						
								$cant = 1;
								
								while ($rowSF = mysql_fetch_array($resOctavos)) {
	
								
								if (($cant % 2) != 0) {
								$cadCuerpo .= '<div class="item pair-row">';
								} else {
								$cadCuerpo .= '<div class="item odd-row">';
								}
									$cadCuerpo .= '<div class="col col1">
										
									</div>
									<div class="col col2 col-number">'.$rowSF['refplayoffequipo_a'].'</div>
									<div class="col col3 col-number">'.$rowSF['refplayoffresultado_a']; 
									if ($rowSF['penalesa'] != '') { 
										$cadCuerpo .= " (".$rowSF['penalesa'].")";
									}
									
									$cadCuerpo .= '</div>
									<div class="col col4 col-number">'.$rowSF['hora'].'</div>
									<div class="col col5 col-number">'.$rowSF['refplayoffresultado_b'];
									if ($rowSF['penalesb'] != '') { 
									$cadCuerpo .= " (".$rowSF['penalesb'].")"; 
									}
									
									$cadCuerpo .= '</div>
									<div class="col col6 col-number">'.$rowSF['refplayoffequipo_b'].'</div>
									<div class="col col7 col-number">'.$rowSF['fechajuego'].'</div>
					
								</div>';

									$cant = $cant + 1;
									} 

							$cadCuerpo .= '</div>
							<div class="instructions">
								<p>PJ: partidos jugados, PG: partidos ganados, PE: partidos 
					empatados, PP: partidos perdidos, GF: goles a favor, GC: goles en 
					contra, GD: diferencia de goles, PB: puntos bonus, FP: fair play, P: 
					puntos.</p>
							</div>
						</div>';
			break;
		case 'Cuartos':
			$cadCab .= '<div class="tab-tabla " id="tab-tabla-'.$idTab.'">'.$rowEtapas['1'].'</div>';
			$cadCuerpo .= '<div class="posiciones list" id="tabla-posiciones-'.$idTab.'">
							<div class="titles">
								<div class="col col1"></div>
								<div class="col col2 col-number">EQUIPO A</div>
								<div class="col col3 col-number">RESULT. A</div>
								<div class="col col4 col-number">HORARIO</div>
								<div class="col col5 col-number">RESULT. B</div>
								<div class="col col6 col-number">EQUIPO B</div>
								<div class="col col7 col-number">FECHA</div>
							</div>
							<div class="items">';

						
								$cant = 1;
								
								while ($rowSF = mysql_fetch_array($resCuartos)) {
	
								
								if (($cant % 2) != 0) {
								$cadCuerpo .= '<div class="item pair-row">';
								} else {
								$cadCuerpo .= '<div class="item odd-row">';
								}
									$cadCuerpo .= '<div class="col col1">
										
									</div>
									<div class="col col2 col-number">'.$rowSF['refplayoffequipo_a'].'</div>
									<div class="col col3 col-number">'.$rowSF['refplayoffresultado_a']; 
									if ($rowSF['penalesa'] != '') { 
										$cadCuerpo .= " (".$rowSF['penalesa'].")";
									}
									
									$cadCuerpo .= '</div>
									<div class="col col4 col-number">'.$rowSF['hora'].'</div>
									<div class="col col5 col-number">'.$rowSF['refplayoffresultado_b'];
									if ($rowSF['penalesb'] != '') { 
									$cadCuerpo .= " (".$rowSF['penalesb'].")"; 
									}
									
									$cadCuerpo .= '</div>
									<div class="col col6 col-number">'.$rowSF['refplayoffequipo_b'].'</div>
									<div class="col col7 col-number">'.$rowSF['fechajuego'].'</div>
					
								</div>';

									$cant = $cant + 1;
									} 

							$cadCuerpo .= '</div>
							<div class="instructions">

								<p>PJ: partidos jugados, PG: partidos ganados, PE: partidos 
					empatados, PP: partidos perdidos, GF: goles a favor, GC: goles en 
					contra, GD: diferencia de goles, PB: puntos bonus, FP: fair play, P: 
					puntos.</p>
							</div>
						</div>';
			break;
		case 'SemiFinal':
			$cadCab .= '<div class="tab-tabla " id="tab-tabla-'.$idTab.'">'.$rowEtapas['1'].'</div>';
			$cadCuerpo .= '<div class="posiciones list" id="tabla-posiciones-'.$idTab.'">
							<div class="titles">
								<div class="col col1"></div>
								<div class="col col2 col-number">EQUIPO A</div>
								<div class="col col3 col-number">RESULT. A</div>
								<div class="col col4 col-number">HORARIO</div>
								<div class="col col5 col-number">RESULT. B</div>
								<div class="col col6 col-number">EQUIPO B</div>
								<div class="col col7 col-number">FECHA</div>
							</div>
							<div class="items">';

						
								$cant = 1;
								
								while ($rowSF = mysql_fetch_array($resSemiFinal)) {
	
								
								if (($cant % 2) != 0) {
								$cadCuerpo .= '<div class="item pair-row">';
								} else {
								$cadCuerpo .= '<div class="item odd-row">';
								}
									$cadCuerpo .= '<div class="col col1">
										
									</div>
									<div class="col col2 col-number">'.$rowSF['refplayoffequipo_a'].'</div>
									<div class="col col3 col-number">'.$rowSF['refplayoffresultado_a']; 
									if ($rowSF['penalesa'] != '') { 
										$cadCuerpo .= " (".$rowSF['penalesa'].")";
									}
									
									$cadCuerpo .= '</div>
									<div class="col col4 col-number">'.$rowSF['hora'].'</div>
									<div class="col col5 col-number">'.$rowSF['refplayoffresultado_b'];
									if ($rowSF['penalesb'] != '') { 
									$cadCuerpo .= " (".$rowSF['penalesb'].")"; 
									}
									
									$cadCuerpo .= '</div>
									<div class="col col6 col-number">'.$rowSF['refplayoffequipo_b'].'</div>
									<div class="col col7 col-number">'.$rowSF['fechajuego'].'</div>
					
								</div>';

									$cant = $cant + 1;
									} 

							$cadCuerpo .= '</div>
							<div class="instructions">
								<p>PJ: partidos jugados, PG: partidos ganados, PE: partidos 
					empatados, PP: partidos perdidos, GF: goles a favor, GC: goles en 
					contra, GD: diferencia de goles, PB: puntos bonus, FP: fair play, P: 
					puntos.</p>
							</div>
						</div>';
			break;
		case 'Tercer':
			$cadCab .= '<div class="tab-tabla " id="tab-tabla-'.$idTab.'">'.$rowEtapas['1'].'</div>';
			$cadCuerpo .= '<div class="posiciones list" id="tabla-posiciones-'.$idTab.'">
							<div class="titles">
								<div class="col col1"></div>
								<div class="col col2 col-number">EQUIPO A</div>
								<div class="col col3 col-number">RESULT. A</div>
								<div class="col col4 col-number">HORARIO</div>
								<div class="col col5 col-number">RESULT. B</div>
								<div class="col col6 col-number">EQUIPO B</div>
								<div class="col col7 col-number">FECHA</div>
							</div>
							<div class="items">';

						
								$cant = 1;
								
								while ($rowSF = mysql_fetch_array($resTercer)) {
	
								
								if (($cant % 2) != 0) {
								$cadCuerpo .= '<div class="item pair-row">';
								} else {
								$cadCuerpo .= '<div class="item odd-row">';
								}
									$cadCuerpo .= '<div class="col col1">
										
									</div>
									<div class="col col2 col-number">'.$rowSF['refplayoffequipo_a'].'</div>
									<div class="col col3 col-number">'.$rowSF['refplayoffresultado_a']; 
									if ($rowSF['penalesa'] != '') { 
										$cadCuerpo .= " (".$rowSF['penalesa'].")";
									}
									
									$cadCuerpo .= '</div>
									<div class="col col4 col-number">'.$rowSF['hora'].'</div>
									<div class="col col5 col-number">'.$rowSF['refplayoffresultado_b'];
									if ($rowSF['penalesb'] != '') { 
									$cadCuerpo .= " (".$rowSF['penalesb'].")"; 
									}
									
									$cadCuerpo .= '</div>
									<div class="col col6 col-number">'.$rowSF['refplayoffequipo_b'].'</div>
									<div class="col col7 col-number">'.$rowSF['fechajuego'].'</div>
					
								</div>';

									$cant = $cant + 1;
									} 

							$cadCuerpo .= '</div>
							<div class="instructions">
								<p>PJ: partidos jugados, PG: partidos ganados, PE: partidos 
					empatados, PP: partidos perdidos, GF: goles a favor, GC: goles en 
					contra, GD: diferencia de goles, PB: puntos bonus, FP: fair play, P: 
					puntos.</p>
							</div>
						</div>';
			break;
		case 'Final':
			$cadCab .= '<div class="tab-tabla " id="tab-tabla-'.$idTab.'">'.$rowEtapas['1'].'</div>';
			$cadCuerpo .= '<div class="posiciones list" id="tabla-posiciones-'.$idTab.'">
							<div class="titles">
								<div class="col col1"></div>
								<div class="col col2 col-number">EQUIPO A</div>
								<div class="col col3 col-number">RESULT. A</div>
								<div class="col col4 col-number">HORARIO</div>
								<div class="col col5 col-number">RESULT. B</div>
								<div class="col col6 col-number">EQUIPO B</div>
								<div class="col col7 col-number">FECHA</div>
							</div>
							<div class="items">';

						
								$cant = 1;
								
								while ($rowSF = mysql_fetch_array($resFinal)) {
	
								
								if (($cant % 2) != 0) {
								$cadCuerpo .= '<div class="item pair-row">';
								} else {
								$cadCuerpo .= '<div class="item odd-row">';
								}
									$cadCuerpo .= '<div class="col col1">
										
									</div>
									<div class="col col2 col-number">'.$rowSF['refplayoffequipo_a'].'</div>
									<div class="col col3 col-number">'.$rowSF['refplayoffresultado_a']; 
									if ($rowSF['penalesa'] != '') { 
										$cadCuerpo .= " (".$rowSF['penalesa'].")";
									}
									
									$cadCuerpo .= '</div>
									<div class="col col4 col-number">'.$rowSF['hora'].'</div>
									<div class="col col5 col-number">'.$rowSF['refplayoffresultado_b'];
									if ($rowSF['penalesb'] != '') { 
									$cadCuerpo .= " (".$rowSF['penalesb'].")"; 
									}
									
									$cadCuerpo .= '</div>
									<div class="col col6 col-number">'.$rowSF['refplayoffequipo_b'].'</div>
									<div class="col col7 col-number">'.$rowSF['fechajuego'].'</div>
					
								</div>';

									$cant = $cant + 1;
									} 

							$cadCuerpo .= '</div>
							<div class="instructions">
								<p>PJ: partidos jugados, PG: partidos ganados, PE: partidos 
					empatados, PP: partidos perdidos, GF: goles a favor, GC: goles en 
					contra, GD: diferencia de goles, PB: puntos bonus, FP: fair play, P: 
					puntos.</p>
							</div>
						</div>';
			break;
	}
}
///////////////////////   FIN PLAYOFF //////////////////////////////////////////////

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
<head>
  <title>Tablas</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />
  
  <script type="text/javascript" src="jscss/jquery-1.8.3.min.js" charset="UTF-8"></script>
  <script type="text/javascript" src="jscss/tablas_export.js?v=2" charset="UTF-8"></script>
    	<link type="text/css" rel="stylesheet" href="jscss/tablas_export.css" media="screen" />
      	<style>
  		body .section .list .items .item.odd-row {
        	background-color: #DEE1E6;
        }
        body .section .list .items .item.pair-row {
        	background-color: #B0B7C1;
        }
        body .section .tabs-tablas .bottom-line {
        	background-color: #FF4200;
        }
        body .section .tabs-tablas .tab-fairplay {
        	background-color: #B0B7C1;
        }
        body .section .tabs-tablas .tab-fairplay.selected {
        	background-color: #FF4200;
        	color: white;
        }
        body .section .list .titles {
        	background-color: #FF4200;
        }
        body .section .tabs-tablas .tab-tabla {
        	background-color: #B0B7C1;
        }
        body .section .tabs-tablas .tab-tabla.selected {
        	background-color: #FF4200;
        	color: white;
        }
        body .section .posiciones.list .col.col1 {
        	width: 29%;
        }
  	</style>
      </head>
<body>
 
  
  <div class="section-tabs">
	<div id="tab-posiciones" class="item posiciones">Posiciones</div>
	<div id="tab-goleadores" class="item goleadores">Goleadores</div>
	<div id="tab-fairplay" class="item fairplay">Fair Play</div>
	<div id="tab-vallamenosvencida" class="item vallamenosvencida selected">Valla menos vencida</div>
		  </div>
  <div style="display: none;" class="posiciones-wrapper section">
    	<div class="tabs-posiciones tabs-tablas">
      	<div class="tab-tabla selected" id="tab-tabla-2097"><?php echo $nombreTorneo; ?></div>
  	    	<!-- otras etapas -->
            <?php echo $cadCab; ?>
  	    <div class="bottom-line"></div>
</div>
<div class="tablas-posiciones">
	<div class="posiciones list" id="tabla-posiciones-2097">
    	<div class="titles">
    		<div class="col col1"></div>
    		<div class="col col2 col-number">PJ</div>
    		<div class="col col3 col-number">PG</div>
    		<div class="col col4 col-number">PE</div>
    		<div class="col col5 col-number">PP</div>
    		<div class="col col6 col-number">GF</div>
    		<div class="col col7 col-number">GC</div>
    		<div class="col col8 col-number">GD</div>
    		<div class="col col9 col-number">PB</div>
    		    			<div class="col col-fp col-number">FP</div>
    		    		<div class="col col10 col-number">P</div>
    	</div>
<div class="items">
    <?php
	
	$cant = 1;
	
	while ($row = mysql_fetch_array($resTorneos)) {
	?>
    
    <?php if (($cant % 2) != 0) { ?>
    <div class="item pair-row">
    <?php } else { ?>
    <div class="item odd-row">
    <?php } ?>
        <div class="col col1">
            <?php echo $row['nombre']; ?>
        </div>
        <div class="col col2 col-number"><?php echo $row['partidos']; ?></div>
        <div class="col col3 col-number"><?php echo $row['ganados']; ?></div>
        <div class="col col4 col-number"><?php echo $row['empatados']; ?></div>
        <div class="col col5 col-number"><?php echo $row['perdidos']; ?></div>
        <div class="col col6 col-number"><?php echo $row['golesafavor']; ?></div>
        <div class="col col7 col-number"><?php echo $row['golesencontra']; ?></div>
        <div class="col col8 col-number"><?php echo ((integer)$row['golesafavor'] - (integer)$row['golesencontra']); ?></div>
        <div class="col col9 col-number"><?php echo $row['bonus']; ?></div>
        <div class="col col-fp col-number"><?php echo $row['puntos']; ?></div>
        <div class="col col10 col-number"><?php echo $row['pts']; ?></div>
    </div>
    
    <?php 
		$cant = $cant + 1;
		} 
	?>
    
    

</div>
    	<div class="instructions">
        	<p>PJ: partidos jugados, PG: partidos ganados, PE: partidos 
empatados, PP: partidos perdidos, GF: goles a favor, GC: goles en 
contra, GD: diferencia de goles, PB: puntos bonus, FP: fair play, P: 
puntos.</p>
        </div>
	</div>
		<?php echo $cadCuerpo; ?>
        
        
        
        
        
        
	</div>
	</div>
  </div>
  <div class="goleadores-wrapper section">
  		<div class="goleadores list">
    	<div class="titles">
    		<div class="col col1">Jugador</div>
    		<div class="col col2">Equipo</div>
    		<div class="col col3">Goles</div>
    	</div>
    	<div class="items">
        <?php
			
			$cant = 1;
			
			while ($rowG = mysql_fetch_array($resGoles)) {
			?>
			
			<?php if (($cant % 2) != 0) { ?>
			<div class="item pair-row">
			<?php } else { ?>
			<div class="item odd-row">
			<?php } ?>
            	<div class="col col1">
            		<?php echo $rowG[0]; ?>
            	</div>
            	<div class="col col2">
            		<?php echo $rowG[1]; ?>
            	</div>
            	<div class="col col3"><?php echo $rowG[2]; ?></div>
            </div>
			<?php $cant += 1; } ?>
    	</div>
	</div>
  </div>
  <div class="fairplay-wrapper section">
  	<div class="tabs-tablas">
  <div class="tab-fairplay selected" id="tab-fairplay-equipos">Equipos</div>
  <div class="tab-fairplay" id="tab-fairplay-jugadores">Jugadores</div>
  <div class="tab-fairplay" id="tab-fairplay-suspendidos">Suspendidos</div>
  <div class="bottom-line"></div>
</div>
	<div class="fairplay equipos list" id="tabla-fairplay-equipos">
    	<div class="titles">
    		<div class="col col1">Equipo</div>
    		<div class="col col3">Puntos</div>

    	</div>
    	<div class="items">
        	<?php
	
			$cant = 1;
			
			while ($rowFP = mysql_fetch_array($resFairPlay)) {
			?>
			
			<?php if (($cant % 2) != 0) { ?>
			<div class="item pair-row">
			<?php } else { ?>
			<div class="item odd-row">
			<?php } ?>
                <div class="col col1">
                	<?php echo $rowFP[0]; ?>
                </div>
                <div class="col col3"><?php echo $rowFP[1]; ?></div>

            </div>

				<?php $cant += 1; } ?>
    	</div>
	</div>
	<div class="fairplay list jugadores" id="tabla-fairplay-jugadores">
    	<div class="titles">
    		<div class="col col1">Jugador</div>
    		<div class="col col2">Equipo</div>
    		<div class="col col3"><img src="../imagenes/icoAmarilla.png" /></div>
    		<div class="col col4"><img src="../imagenes/azul.png" /></div>
    		<div class="col col5"><img src="../imagenes/icoRoja.png" /></div>
    	</div>
    	<div class="items">
        	<?php
	
			$cant = 1;
			
			while ($rowA = mysql_fetch_array($resAmarillas)) {
			?>
			
			<?php if (($cant % 2) != 0) { ?>
			<div class="item pair-row">
			<?php } else { ?>
			<div class="item odd-row">
			<?php } ?>
                <div class="col col1">
                	<?php echo $rowA['apyn']; ?>
                </div>
                <div class="col col2">
                	<?php echo $rowA['nombre']; ?>
                </div>
                <div class="col col3"><?php echo $rowA['cantidad']; ?></div>
                <div class="col col4"><?php echo $rowA['cantidadazules']; ?></div>
                <div class="col col5"><?php echo $rowA['cantidadrojas']; ?></div>
            </div>
    		<?php $cant += 1; } ?>
    		</div>
	</div>
	<div class="fairplay list suspendidos" id="tabla-fairplay-suspendidos">
    	<div class="titles">
    		<div class="col col1">Jugador</div>
    		<div class="col col2">Equipo</div>
            <div class="col col3">Motivos</div>
    		<div class="col col4">Partidos</div>
    	</div>
    	<div class="items">
        	<?php
	
			$cant = 1;
			
			while ($rowS = mysql_fetch_array($resSuspendido)) {
			?>
			
			<?php if (($cant % 2) != 0) { ?>
			<div class="item pair-row">
			<?php } else { ?>
			<div class="item odd-row">
			<?php } ?>

                <div class="col col1">
                	<?php echo $rowS['apyn']; ?>
                </div>
                <div class="col col2">
                	<?php echo $rowS['nombre']; ?>
                </div>
                <div class="col col3"><?php echo $rowS['motivos']; ?></div>
                <div class="col col4"><?php echo $rowS['cantidad']; ?></div>
            
            </div>
    		<?php $cant += 1; } ?>
    	</div>
	</div>
  </div>
  <div style="display: block;" class="vallamenosvencida-wrapper section">
  		<div class="vallamenosvencida list">
    	<div class="titles">
    		<div class="col col1">Equipo</div>
    		<div class="col col2">Goles en contra</div>
    	</div>
    	<div class="items">
        	<?php
	
			$cant = 1;
			
			while ($rowV = mysql_fetch_array($resVallaMenosVencida)) {
			?>
			
			<?php if (($cant % 2) != 0) { ?>
			<div class="item pair-row">
			<?php } else { ?>
			<div class="item odd-row">
			<?php } ?>

                    <div class="col col1">
                        <?php echo $rowV['nombre']; ?>
                    </div>
                    <div class="col col2"><?php echo $rowV['golesencontra']; ?></div>
                </div>
            <?php $cant += 1; } ?>
    		</div>
	</div>
  </div>
  
  </div>
</body>
</html>