<?php

include ('includes/funciones.php');
include ('includes/funcionesJugadores.php');
include ('includes/funcionesEquipos.php');
include ('includes/funcionesGrupos.php');
include ('includes/funcionesZonasEquipos.php');
include ('includes/generadorfixturefijo.php');
include ('includes/funcionesDATOS.php');

$serviciosFunciones = new Servicios();
$serviciosJugadores = new ServiciosJ();
$serviciosEquipos	= new ServiciosE();
$serviciosGrupos	= new ServiciosG();
$serviciosZonasEquipos	= new ServiciosZonasEquipos();
$serviciosDatos = new ServiciosDatos();


if (isset($_GET["id"])) {
	$idTipoTorneo = $_GET["id"];
} else {
	$idTipoTorneo = 3; /** Esto es lo unico que hay que modificar, aca hay que poner el ID TipoTorneo que corresponda*/

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

$resZonasTorneos = $serviciosDatos->traerZonasPorTorneo($idTipoTorneo);

$cadCabeceras 	= '';
$cadCuerpo 		= '';


$cant = 1;
while ($row = mysql_fetch_array($resZonasTorneos)) { 
	$cadCabeceras .= '<div class="tab-tabla'; 
    if ($cant ==1) { 
		$cadCabeceras .= ' selected" id="tab-tabla-210'.$cant.'">'.$row[1].'</div>';
	} else {
		$cadCabeceras .= '" id="tab-tabla-210'.$cant.'">'.$row[1].'</div>';
	}
	
	$lstFechas = $serviciosZonasEquipos->traerFechasJugadas($idTipoTorneo,$row[0]);
	
	$cadCuerpoFechas = '';
	
	$cant2 = 1;
	$cadCuerpo .= '<div class="fixture list" id="tabla-fixture-210'.$cant.'">
	<div class="fechas-selectores">
<div class="texto">Fechas: </div>';
		while ($rowFF = mysql_fetch_array($lstFechas)) {
			$res = $serviciosDatos->traerResultadosPorTorneoZonaFecha($idTipoTorneo,$idzona,$rowFF[0]);
			$cadCuerpo .= '<div class="fecha-selector'; 
			if ($cant2 == 1) {
				$cadCuerpo .= ' selected';	
			}
			$cadCuerpo .= '" id="fecha-selector-'.$cant2.'">'.$cant2.'</div>';
			
			$cant3 = 1;
			while ($rowRR = mysql_fetch_array($res)) {
				if ($cant3 == 1) {
					$cadCuerpoFechas .= '<div class="fecha" id="fecha-'.$cant2.'">
										<div class="sub-header">
											<p>Fecha '.$cant2.'</p>
										</div>';
				}
				
				if (($cant3 % 2) == 0) {
					$css = 'pair-row';
				} else {
					$css = 'odd-row';
				}
				
				$cadCuerpoFechas .= '<div class="item '.$css.'">
											<div class="col col1">'.$rowRR['equipo1'].'</div>
											<div class="col col2">'.$rowRR['resultadoa'].' - '.$rowRR['resultadob'].'</div>
											<div class="col col3">'.$rowRR['equipo2'].'</div>
											<div class="col col4 closed view-more"></div>
											<div class="more">
												<div class="row">
													<div class="title">Sede:</div>
													<div class="text">Area Chica</div>
												</div>
												<div class="row">
													<div class="title">Fecha:</div>
													<div class="text">'.$rowRR['fechajuego'].'</div>
												</div>
												<div class="row">
													<div class="title">Hora:</div>
													<div class="text">'.$rowRR['hora'].'</div>
												</div>
											</div>
										</div>
									';
				$cant3 += 1;
			}
			$cadCuerpoFechas .= '</div>';
			
			$cant2 += 1;
		}
	$cadCuerpo .= '</div>';
	$cadCuerpo .= '<div class="items">';
	$cadCuerpo .= $cadCuerpoFechas;
	$cadCuerpo .= '</div>';
$cant += 1;
} 




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
<head>
  <title>Fixture 360 Masculino</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />
  
<script type="text/javascript" src="jscss/jquery-1.8.3.min.js" charset="UTF-8"></script>
  <script type="text/javascript" src="jscss/tablas_export.js?v=2" charset="UTF-8"></script>
    	<link type="text/css" rel="stylesheet" href="jscss/tablas_export.css" media="screen" />
        
      	<style>
  		body .list .items .item.odd-row {
        	background-color: #DEE1E6;
        }
        body .list .items .item.pair-row {
        	background-color: #B0B7C1;
        }
        body .tabs-tablas .bottom-line {
        	background-color: #FF4200;
        }
        body .tabs-tablas .tab-fairplay {
        	background-color: #B0B7C1;
        }
        body .tabs-tablas .tab-fairplay.selected {
        	background-color: #FF4200;
        	color: white;
        }
        body .list .titles {
        	background-color: #FF4200;
        }
        body .tabs-tablas .tab-tabla {
        	background-color: #B0B7C1;
        }
        body .tabs-tablas .tab-tabla.selected {
        	background-color: #FF4200;
        	color: white;
        }
        body .posiciones.list .col.col1 {
        	width: 29%;
        }
  	</style>
      </head>
<body>
  <div class="section" style="display: block;">
    		<div class="tabs-fixture tabs-tablas">
            	  <?php echo $cadCabeceras; ?>
                
	  		  	  <div class="bottom-line"></div>
	</div>
<div class="tablas-fixture">
<?php echo $cadCuerpo; ?>

</div>
  </div>
  
  <script type="text/javascript">
$(document).ready(function(){
	
	function traerFecha() {
        $.ajax({
				data:  {reftorneo: $('#reftorneo').val(),
						refzona: $('#refzona').val(),
						reffecha: $('#reffecha').val(),
						zona: $('#refzona option:selected').text(),
						accion: 'traerResultadosPorTorneoZonaFecha'},
				url:   '../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
						$('#resultados').html(response);
						
				}
		});
	}
		

	

	

});
</script>

</body>
</html>
