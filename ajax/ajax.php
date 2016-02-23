<?php

include ('../includes/funcionesUsuarios.php');
include ('../includes/funciones.php');
include ('../includes/funcionesHTML.php');
include ('../includes/funcionesJugadores.php');
include ('../includes/funcionesEquipos.php');
include ('../includes/funcionesGrupos.php');
include ('../includes/funcionesZonasEquipos.php');
include ('../includes/funcionesNoticias.php');
include ('../includes/funcionesDATOS.php');
include ('../includes/funcionesPlayoff.php');
include ('../includes/funcionesContenido.php');
include ('../includes/funcionesHistorial.php');

$serviciosUsuarios  	= new ServiciosUsuarios();
$serviciosFunciones 	= new Servicios();
$serviciosHTML			= new ServiciosHTML();
$serviciosJugadores 	= new ServiciosJ();
$serviciosEquipos		= new ServiciosE();
$serviciosGrupos		= new ServiciosG();
$serviciosZonasEquipos	= new ServiciosZonasEquipos();
$serviciosNoticias 		= new ServiciosNoticias();
$serviciosDatos 		= new ServiciosDatos();
$serviciosPlayOff 		= new ServiciosPlayOff();
$serviciosContenido		= new ServiciosContenido();
$serviciosHistorial		= new ServiciosHistorial();

$accion = $_POST['accion'];


switch ($accion) {
    case 'login':
        enviarMail($serviciosUsuarios);
        break;
	case 'entrar':
		entrar($serviciosUsuarios);
		break;
	case 'insertarUsuario':
        insertarUsuario($serviciosUsuarios);
        break;
	case 'modificarUsuario':
        modificarUsuario($serviciosUsuarios);
        break;
	case 'registrar':
		registrar($serviciosUsuarios);
        break;
	case 'contacto':
		contacto($serviciosUsuarios);
		break;

	case 'modificarCliente':
		modificarCliente($serviciosUsuarios);
		break;
	
	case 'ImportarExcel':
		ImportarExcel($serviciosImportar);
		break;
/* PARA TorneosSedes */
case 'insertarTorneosSedes':
insertarTorneosSedes($serviciosFunciones);
break;
case 'modificarTorneosSedes':
modificarTorneosSedes($serviciosFunciones);
break;
case 'eliminarTorneosSedes':
eliminarTorneosSedes($serviciosFunciones);
break;

/* Fin */

/* PARA TipoTorneo */
case 'insertarTipoTorneo':
insertarTipoTorneo($serviciosFunciones);
break;
case 'modificarTipoTorneo':
modificarTipoTorneo($serviciosFunciones);
break;
case 'eliminarTipoTorneo':
eliminarTipoTorneo($serviciosFunciones);
break;

/* Fin */

/* PARA PlayOff */
case 'insertarPlayOff':
insertarPlayOff($serviciosPlayOff);
break;
case 'modificarPlayOff':
modificarPlayOff($serviciosPlayOff);
break;
case 'eliminarPlayOff':
eliminarPlayOff($serviciosPlayOff);
break;

case 'insertarArmarPlayOff':
insertarArmarPlayOff($serviciosPlayOff);
break;
case 'modificarArmarPlayOff':
modificarArmarPlayOff($serviciosPlayOff);
break;
case 'eliminarArmarPlayOff':
eliminarArmarPlayOff($serviciosPlayOff);
break; 
/* Fin */

/* PARA Sedes */
case 'insertarSedes':
insertarSedes($serviciosFunciones);
break;
case 'modificarSedes':
modificarSedes($serviciosFunciones);
break;
case 'eliminarSedes':
eliminarSedes($serviciosFunciones);
break;

/* Fin */
/* PARA Horarios */
case 'insertarHorarios':
insertarHorarios($serviciosFunciones);
break;
case 'modificarHorarios':
modificarHorarios($serviciosFunciones);
break;
case 'eliminarHorarios':
eliminarHorarios($serviciosFunciones);
break;

/* Fin */
/* PARA Canchas */
case 'insertarCanchas':
insertarCanchas($serviciosFunciones);
break;
case 'modificarCanchas':
modificarCanchas($serviciosFunciones);
break;
case 'eliminarCanchas':
eliminarCanchas($serviciosFunciones);
break;

/* Fin */

	/* para los torneos */
	case 'insertarTorneo':
		insertarTorneo($serviciosFunciones);
		break;
	case 'modificarTorneo':
		modificarTorneo($serviciosFunciones);
		break;
	case 'eliminarTorneo':
		eliminarTorneo($serviciosFunciones);
		break;
	case 'traerTorneoPorTipoTorneo':
		traerTorneoPorTipoTorneo($serviciosFunciones);
		break;
	case 'cambiarTorneo':
		cambiarTorneo($serviciosFunciones);
		break;
	case 'traerZonaPorTorneos':
		traerZonaPorTorneos($serviciosFunciones);
		break;
		
	/* fin torneos */
	
	/* para los equipos */
	case 'insertarEquipos':
		insertarEquipos($serviciosEquipos);
		break;
	case 'modificarEquipos':
		modificarEquipos($serviciosEquipos);
		break;
	case 'eliminarEquipos':
		eliminarEquipos($serviciosEquipos);
		break; 
		
	case 'insertarConducta':
		insertarConducta($serviciosFunciones);
		break;
	case 'modificarConducta':
		modificarConducta($serviciosFunciones);
		break;
	case 'eliminarConducta':
		eliminarConducta($serviciosFunciones);
		break;
		
	case 'insertarPuntosEquipos':
	insertarPuntosEquipos($serviciosEquipos, $serviciosZonasEquipos);
	break;
	case 'modificarPuntosEquipos':
	modificarPuntosEquipos($serviciosEquipos, $serviciosZonasEquipos);
	break;
	case 'eliminarPuntosEquipos':
	eliminarPuntosEquipos($serviciosEquipos, $serviciosZonasEquipos);
	break; 
	
	case 'traerEquipoPorZonaTorneos':
		traerEquipoPorZonaTorneos($serviciosEquipos);
		break; 
	/* fin equipos */
	
	
	/* para los jugadores */
	case 'buscarJugadores':
		buscarJugadores($serviciosJugadores);
		break;
	case 'buscarGoleadores':
		buscarGoleadores($serviciosJugadores);
		break;
	case 'insertarJugadores':
		insertarJugadores($serviciosJugadores);
		break;
	case 'modificarJugadores':
		modificarJugadores($serviciosJugadores);
		break;
	case 'modificarJugadoresEx':
		modificarJugadoresEx($serviciosJugadores);
		break;
	case 'eliminarJugadores':
		eliminarJugadores($serviciosJugadores);
		break;
	case 'traerJugadores':
		traerJugadores($serviciosJugadores);
		break;
		
	case 'insertarGoleadores':
		insertarGoleadores($serviciosJugadores);
		break;
	case 'modificarGoleadores':
		modificarGoleadores($serviciosJugadores);
		break;
	case 'eliminarGoleadores':
		eliminarGoleadores($serviciosJugadores);
		break; 
	
	case 'insertarAmonestados':
		insertarAmonestados($serviciosJugadores);
		break;
	case 'modificarAmonestados':
		modificarAmonestados($serviciosJugadores);
		break;
	case 'eliminarAmonestados':
		eliminarAmonestados($serviciosJugadores);
		break; 
	case 'insertarEstadistica':
		insertarEstadistica($serviciosJugadores);
		break;
	
	case 'insertarSuspendidos':
		insertarSuspendidos($serviciosJugadores,$serviciosFunciones);
		break;
	case 'modificarSuspendidos':
		modificarSuspendidos($serviciosJugadores,$serviciosFunciones);
		break;
	case 'eliminarSuspendidos':
		eliminarSuspendidos($serviciosJugadores);
		break; 

	case 'insertarEstadisticaPorJugador':
		insertarEstadisticaPorJugador($serviciosJugadores, $serviciosFunciones, $serviciosZonasEquipos);
		break;
	/* fin jugadores */
	
	
	/* para los zonas */
	
	case 'insertarGrupo':
		insertarGrupo($serviciosGrupos);
		break;
	case 'modificarGrupos':
		modificarGrupos($serviciosGrupos);
		break;
	case 'eliminarGrupos':
		eliminarGrupos($serviciosGrupos);
		break; 
	/* fin zonas */
	
	
	/* para los torneo-zonas-equipos */
	case 'modificarFixtureChequeado':
		modificarFixtureChequeado($serviciosZonasEquipos);
		break;
	case 'insertarZonasEquipos':
		insertarZonasEquipos($serviciosZonasEquipos);
		break;
	case 'modificarZonasEquipos':
		modificarZonasEquipos($serviciosZonasEquipos);
		break;
	case 'eliminarZonasEquipos':
		eliminarZonasEquipos($serviciosZonasEquipos);
		break; 
	case 'TraerZonaPorTorneoEquipo':
		TraerZonaPorTorneoEquipo($serviciosZonasEquipos,$serviciosDatos);
		break;
	case 'reemplazarEquipos':
		reemplazarEquipos($serviciosZonasEquipos);
		break;
	case 'chequearPorFecha':
		chequearPorFecha($serviciosZonasEquipos);
		break;
	case 'cargarTablaConducta':
		cargarTablaConducta($serviciosZonasEquipos);
		break;
	case 'calcularTablaConducta':
		calcularTablaConducta($serviciosZonasEquipos);
		break;
	/* PARA Reemplazos */
	case 'insertarReemplazos':
		insertarReemplazos($serviciosZonasEquipos);
		break;
	case 'modificarReemplazos':
		modificarReemplazos($serviciosZonasEquipos);
		break;
	case 'eliminarReemplazos':
		eliminarReemplazos($serviciosZonasEquipos);
		break;
	/* Fin */

	/* fin torneo-zonas-equipos */
	
	
	/* para los fixture */
	case 'insertarFixture':
		insertarFixture($serviciosZonasEquipos);
		break;
	case 'modificarFixture':
		modificarFixture($serviciosZonasEquipos);
		break;
	case 'eliminarFixture':
		eliminarFixture($serviciosZonasEquipos);
		break; 
	case 'traerFixturePorEquipo':
		traerFixturePorEquipo($serviciosZonasEquipos);
		break;
	/* fin fixture */
	
	/* para los noticias */
	case 'insertarNoticiasPrincipales':
		insertarNoticiasPrincipales($serviciosNoticias);
		break;
	case 'modificarNoticiasPrincipales':
		modificarNoticiasPrincipales($serviciosNoticias);
		break;
	case 'eliminarNoticiasPrincipales':
		eliminarNoticiasPrincipales($serviciosNoticias);
		break; 
	
	case 'insertarNoticiasPredio':
		insertarNoticiasPredio($serviciosNoticias);
		break;
	case 'modificarNoticiasPredio':
		modificarNoticiasPredio($serviciosNoticias);
		break;
	case 'eliminarNoticiasPredio':
		eliminarNoticiasPredio($serviciosNoticias);
		break; 
			
	case 'insertarNoticias':
		insertarNoticias($serviciosNoticias);
		break;
	case 'modificarNoticias':
		modificarNoticias($serviciosNoticias);
		break;
	case 'eliminarNoticias':
		eliminarNoticias($serviciosNoticias);
		break; 
	case 'eliminarFoto':
		eliminarFoto($serviciosNoticias);
		break;
	/* fin noticias */
	
	/* Reportes */
	case 'traerResultadosPorTorneoZonaFecha':
		traerResultadosPorTorneoZonaFecha($serviciosDatos);
		break;
	case 'traerResultadosPorTorneoZonaFechaPagina':
		traerResultadosPorTorneoZonaFechaPagina($serviciosDatos);
		break;
	case 'TraerFixturePorZonaTorneo':
		TraerFixturePorZonaTorneo($serviciosDatos);
		break;
	case 'TraerFixturePorZonaPorTorneo':
		TraerFixturePorZonaPorTorneo($serviciosDatos, $serviciosFunciones);
		break;
	case 'Goleadores':
		Goleadores($serviciosDatos);
		break;
	case 'GoleadoresPagina':
		GoleadoresPagina($serviciosDatos);
		break;
	case 'Suspendidos':
		Suspendidos($serviciosDatos);
		break;
	case 'SuspendidosPagina':
		SuspendidosPagina($serviciosDatos);
		break;
	case 'FixturePagina':
		FixturePagina($serviciosDatos);
		break;
	case 'FixturePaginaChico':
		FixturePaginaChico($serviciosDatos);
		break;
	case 'FixturePaginaChicoDos':
		FixturePaginaChicoDos($serviciosDatos);
		break;
	case 'FixturePaginaChicoDosInactivo':
		FixturePaginaChicoDosInactivo($serviciosDatos);
		break;	
	case 'TraerJugadoresFixtureA':
		TraerJugadoresFixtureA($serviciosDatos);
		break;
	case 'TraerJugadoresFixtureB':
		TraerJugadoresFixtureB($serviciosDatos);
		break;
	case 'TraerFixturePorZonaTorneoPagina';
		TraerFixturePorZonaTorneoPagina($serviciosDatos);
		break;
	case 'AmarillasAcumuladasPagina';
		AmarillasAcumuladasPagina($serviciosDatos);
		break;
	case 'AmarillasAcumuladas';
		AmarillasAcumuladas($serviciosDatos);
		break;
	case 'FairPlay';
		FairPlay($serviciosDatos);
		break;
	case 'FairPlayPagina';
		FairPlayPagina($serviciosDatos);
		break;
	case 'MejorJugador':
		MejorJugador($serviciosDatos);
		break;
	/* Fin reportes */
	
	/* PARA Pagos */
	case 'insertarPagos':
		insertarPagos($serviciosPagos);
		break;
	case 'modificarPagos':
		modificarPagos($serviciosPagos);
		break;
	case 'eliminarPagos':
		eliminarPagos($serviciosPagos);
		break;
	
	/* Fin */
	/* Historial */
	case 'TraerFechasPorTorneoZona':
		TraerFechasPorTorneoZona($serviciosHistorial);
		break;
	case 'TraerFixturePorZonaTorneoHistorial':
		TraerFixturePorZonaTorneoHistorial($serviciosHistorial);
		break;
	case 'FixturePaginaChicoDosHistorial':
		FixturePaginaChicoDosHistorial($serviciosHistorial, $serviciosDatos);
		break;
	case 'GoleadoresHistorial':
		GoleadoresHistorial($serviciosHistorial);
		break;
	case 'AmarillasAcumuladasHistorial':
		AmarillasAcumuladasHistorial($serviciosHistorial);
		break;
	case 'SuspendidosHistorial':
		SuspendidosHistorial($serviciosHistorial);
		break;
	
	/* Fin Historial */
}

//////////////////////////Traer datos */

function toArray($query)
{
    $res = array();
    while ($row = @mysql_fetch_array($query)) {
        $res[] = $row;
    }
    return $res;
}


/* Para el Historial */
function TraerFechasPorTorneoZona($serviciosHistorial) {
	$refIdTorneo	=	$_POST['reftipotorneo'];
	$refTorneo		=	$_POST['reftorneo'];
	$refZona		=	$_POST['refzona'];
	
	$res	=	$serviciosHistorial->TraerFechasPorTorneoZona($refTorneo,$refZona);
	$cad = '';
	while ($rowF = mysql_fetch_array($res)) {
		$cad	.=	'<li style="padding-bottom:8px;">
                                    <a href="historial.php?idtorneo='.$refIdTorneo.'&torneo='.$refTorneo.'&zona='.$refZona.'&fecha='.$rowF[0].'"><button type="button" class="btn btn-info" style="margin-left:0px;">'.$rowF[1].'</button></a>
                                </li>';
	}
	
	echo $cad;
}


/* Fin Historial */
function ImportarExcel($serviciosImportar){
	$nombrearchivo	= $_POST['nombrearchivo'];
	$token 			= $_POST['reffecha'];
	
	$res = $serviciosImportar->ImportarExcel($token,$nombrearchivo);
	
	echo $res;
}

/* PARA TipoTorneo */
function insertarTipoTorneo($serviciosTipoTorneo) {
$descripciontorneo = $_POST['descripciontorneo'];
$res = $serviciosTipoTorneo->insertarTipoTorneo($descripciontorneo);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarTipoTorneo($serviciosTipoTorneo) {
$id = $_POST['id'];
$descripciontorneo = $_POST['descripciontorneo'];
$res = $serviciosTipoTorneo->modificarTipoTorneo($id,$descripciontorneo);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarTipoTorneo($serviciosTipoTorneo) {
$id = $_POST['id'];
$res = $serviciosTipoTorneo->eliminarTipoTorneo($id);
echo $res;
}

/* Fin */ 


/* PARA PlayOff */
function insertarPlayOff($serviciosPlayOff) {
$refequipo = $_POST['refequipo'];
$reftorneo = $_POST['reftorneo'];
$refzona = $_POST['refzona'];
$fechacreacion = $_POST['fechacreacion'];
$res = $serviciosPlayOff->insertarPlayOff($refequipo,$reftorneo,$refzona,$fechacreacion);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarPlayOff($serviciosPlayOff) {
$id = $_POST['id'];
$refequipo = $_POST['refequipo'];
$reftorneo = $_POST['reftorneo'];
$refzona = $_POST['refzona'];
$fechacreacion = $_POST['fechacreacion'];
$res = $serviciosPlayOff->modificarPlayOff($id,$refequipo,$reftorneo,$refzona,$fechacreacion);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarPlayOff($serviciosPlayOff) {
$id = $_POST['id'];
$res = $serviciosPlayOff->eliminarPlayOff($id);
echo $res;
}


function insertarArmarPlayOff($serviciosArmarPlayOff) {
$refplayoffequipo_a = $_POST['refplayoffequipo_a'];
$refplayoffresultado_a = $_POST['refplayoffresultado_a'];
$refplayoffequipo_b = $_POST['refplayoffequipo_b'];
$refplayoffresultado_b = $_POST['refplayoffresultado_b'];
$fechajuego = $_POST['fechajuego'];
$hora = $_POST['hora'];
$refcancha = $_POST['refcancha'];
$penalesa = $_POST['penalesa'];
$penalesb = $_POST['penalesb'];
if (isset($_POST['chequeado'])) {
$chequeado = 1;
} else {
$chequeado = 0;
}
$refetapa = $_POST['refetapa'];
$res = $serviciosArmarPlayOff->insertarArmarPlayOff($refplayoffequipo_a,$refplayoffresultado_a,$refplayoffequipo_b,$refplayoffresultado_b,$fechajuego,$hora,$refcancha,$chequeado,$refetapa,$penalesa,$penalesb);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
//echo $res;
}
function modificarArmarPlayOff($serviciosArmarPlayOff) {
$id = $_POST['id'];
$refplayoffequipo_a = $_POST['refplayoffequipo_a'];
$refplayoffresultado_a = $_POST['refplayoffresultado_a'];
$refplayoffequipo_b = $_POST['refplayoffequipo_b'];
$refplayoffresultado_b = $_POST['refplayoffresultado_b'];
$penalesa = $_POST['penalesa'];
$penalesb = $_POST['penalesb'];
$fechajuego = $_POST['fechajuego'];
$hora = $_POST['hora'];
$refcancha = $_POST['refcancha'];
if (isset($_POST['chequeado'])) {
$chequeado = 1;
} else {
$chequeado = 0;
}
$refetapa = $_POST['refetapa'];
$res = $serviciosArmarPlayOff->modificarArmarPlayOff($id,$refplayoffequipo_a,$refplayoffresultado_a,$refplayoffequipo_b,$refplayoffresultado_b,$fechajuego,$hora,$refcancha,$chequeado,$refetapa,$penalesa,$penalesb);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarArmarPlayOff($serviciosArmarPlayOff) {
$id = $_POST['id'];
$res = $serviciosArmarPlayOff->eliminarArmarPlayOff($id);
echo $res;
} 
/* Fin */ 

/* PARA Canchas */
function insertarCanchas($serviciosCanchas) {
$cancha = $_POST['cancha'];
$res = $serviciosCanchas->insertarCanchas($cancha);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarCanchas($serviciosCanchas) {
$id = $_POST['id'];
$cancha = $_POST['cancha'];
$res = $serviciosCanchas->modificarCanchas($id,$cancha);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarCanchas($serviciosCanchas) {
$id = $_POST['id'];
$res = $serviciosCanchas->eliminarCanchas($id);
echo $res;
}

/* Fin */ 

/* PARA Horarios */
function insertarHorarios($serviciosHorarios) {
$horario = $_POST['horario'];
$reftipotorneo = $_POST['reftipotorneo'];
$res = $serviciosHorarios->insertarHorarios($horario,$reftipotorneo);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarHorarios($serviciosHorarios) {
$id = $_POST['id'];
$horario = $_POST['horario'];
$reftipotorneo = $_POST['reftipotorneo'];
$res = $serviciosHorarios->modificarHorarios($id,$horario,$reftipotorneo);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarHorarios($serviciosHorarios) {
$id = $_POST['id'];
$res = $serviciosHorarios->eliminarHorarios($id);
echo $res;
}

/* Fin */ 


/* PARA Sedes */
function insertarSedes($serviciosSedes) {
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$res = $serviciosSedes->insertarSedes($nombre,$direccion);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarSedes($serviciosSedes) {
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$res = $serviciosSedes->modificarSedes($id,$nombre,$direccion);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarSedes($serviciosSedes) {
$id = $_POST['id'];
$res = $serviciosSedes->eliminarSedes($id);
echo $res;
}

/* Fin */ 


/* Reportes */

function MejorJugador($serviciosDatos) {
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$idfecha	= $_POST['reffecha'];
	$zona		= $_POST['zona'];	
	
	$res3 = $serviciosDatos->mejorJugador($idtorneo,$idzona,$idfecha);
	
	$cad3 = '
	<div class="row" style="margin-top:20px;">
                	<table class="table table-responsive table-striped table3" style="margin:2px 20px;max-width:480px;">
                        <thead>
						<tr>
                        	<th>NOMBRE Y APELLIDO</th>
							<th>DNI</th>
                            <th>EQUIPO</th>
                            <th>PUNTOS</th>
                        </tr>
						</thead><tbody>';
                        
						$i =1;
						while ($row1 = mysql_fetch_array($res3)) {

                        $cad3 = $cad3.'<tr>
                            <td>'.strtoupper($row1['apyn']).'</td>
                            <td>'.$row1['dni'].'</td>
							<td>'.$row1['nombre'].'</td>
                            <td align="center">'.$row1['puntos'].'</td>
 
                        </tr>';
         
						$i = $i + 1;

						}
                    $cad3 = $cad3.'</tbody></table>
                
                </div>';
	echo $cad3;
}

function traerResultadosPorTorneoZonaFecha($serviciosDatos) {
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$idfecha	= $_POST['reffecha'];
	$zona		= $_POST['zona'];
	
	$res = $serviciosDatos->traerResultadosPorTorneoZonaFecha($idtorneo,$idzona,$idfecha);
	
	$cad = '<div class="row">
                	<table class="table table-responsive table-striped table3" style="margin:2px 20px;">
                    	<thead>
							<tr>
								<th>Resultado A</th>
								<th>Equipo A</th>
								<th>Horario</th>
								<th>Equipo B</th>
								<th>Resultado B</th>
							</tr>
						</thead>
						<tbody>
						<tr>';
                        while ($row = mysql_fetch_array($res)) {
                        	$cad = $cad.'<tr>
                        	<td>'.$row['resultadoa'].'</td>
                            <td>'.(substr($row['equipo1'],0,17)).'</td>
                            <td>Horario '.$row['hora'].'</td>
                            <td>'.(substr($row['equipo2'],0,17)).'</td>
                            <td>'.$row['resultadob'].'</td>
                        </tr>';
                    	}
                    $cad = $cad.'</tbody></table>
                
                </div>';
	echo $cad;
}

/* Reportes */
function traerResultadosPorTorneoZonaFechaPagina($serviciosDatos) {
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$idfecha	= $_POST['reffecha'];
	$zona		= $_POST['zona'];
	
	$res = $serviciosDatos->traerResultadosPorTorneoZonaFecha($idtorneo,$idzona,$idfecha);
	
	$cad = '';
                        while ($row = mysql_fetch_array($res)) {
                        	$cad = $cad.'<tr>
                        	<td align="center">'.$row['resultadoa'].'</td>
                            <td align="center">'.(utf8_encode($row['equipo1'])).'</td>
                            <td align="center">'.$row['hora'].'</td>
                            <td align="center">'.(utf8_encode($row['equipo2'])).'</td>
                            <td align="center">'.$row['resultadob'].'</td>
                        </tr>';
                    	}

	echo $cad;
}



function TraerJugadoresFixtureA($serviciosDatos) {
	$idfixture	= $_POST['idfixture'];

	
	$res = $serviciosDatos->TraerJugadoresFixtureA($idfixture);
	
	$cad = '';
                        while ($row = mysql_fetch_array($res)) {
                        	$cad = $cad.'<tr>
							
                        	<td align="center">'.$row['RojasA'].'</td>
                            <td align="center">'.$row['amarillasA'].'</td>
                            <td align="center">'.$row['golesA'].'</td>
                            <td align="right" style="font-size:0.9em;">'.strtoupper(($row['apynA'])).'</td>
							<td></td>
                        </tr>';
                    	}

	echo $cad;
}


function TraerJugadoresFixtureB($serviciosDatos) {
	$idfixture	= $_POST['idfixture'];

	
	$res = $serviciosDatos->TraerJugadoresFixtureB($idfixture);
	
	$cad = '';
                        while ($row = mysql_fetch_array($res)) {
                        	$cad = $cad.'<tr>
							<td></td>
                            <td align="left" style="font-size:0.9em;">'.strtoupper(($row['apynB'])).'</td>
							<td align="center">'.$row['golesB'].'</td>
							<td align="center">'.$row['amarillasB'].'</td>
							<td align="center">'.$row['RojasB'].'</td>
							
                        </tr>';
                    	}

	echo $cad;
}


function FixturePagina($serviciosDatos) {
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$idfecha	= $_POST['reffecha'];
	$zona		= $_POST['zona'];
	$cad = '';
	
	for ($i=$idfecha;$i>=23;$i--) {
		$cad = $cad.'
				<div class="col-md-6">
				<div class="panel panel-predio" style="margin-top:20px;">
                                <div class="panel-heading">
                                	<h3 class="panel-title">'.mysql_result($serviciosDatos->TraerFechaPorId($i),0,1).'</h3>
                                	<img src="imagenes/logo2-chico.png" style="float:right;margin-top:-21px; width:26px; height:24px;">
                                </div>
                                <div class="panel-body-predio">
                                	';
									
		$res = $serviciosDatos->traerResultadosPorTorneoZonaFecha($idtorneo,$idzona,$i);
		
		$cad = $cad.'<table class="table table-responsive table-striped" style="font-size:0.8em; padding:2px;">
                                	
                                	<thead>
                                    	<tr>
                                        	<th style="text-align:center">Result. A</th>
                                            <th style="text-align:center">Equipo A</th>
                                            <th style="text-align:center">Horario</th>
                                            <th style="text-align:center">Equipo B</th>
                                            <th style="text-align:center">Result. B</th>
                                            <th style="text-align:center">Ver</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
	
                        while ($row = mysql_fetch_array($res)) {
                        	$cad = $cad.'<tr>
                        	<td align="center" id="resA'.$row['idfixture'].'">'.$row['resultadoa'].'</td>
                            <td align="center" id="equipoA'.$row['idfixture'].'">'.(substr(utf8_encode($row['equipo1']),0,17)).'</td>
                            <td align="center">'.$row['hora'].'</td>
                            <td align="center" id="equipoB'.$row['idfixture'].'">'.(substr(utf8_encode($row['equipo2']),0,17)).'</td>
                            <td align="center" id="resB'.$row['idfixture'].'">'.$row['resultadob'].'</td>
							<td><img src="imagenes/verIco2.png" style="cursor:pointer;" id="'.$row['idfixture'].'" class="varModificar" data-target="#dialogModificar" data-toggle="modal"></td>
                        </tr>';
                    	}
													
        $cad = $cad.'</tbody>
                                </table></div>
                            </div>
						</div>';	
		
		
	}


	echo $cad;
}


function FixturePaginaChico($serviciosDatos) {
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$idfecha	= $_POST['reffecha'];
	$zona		= $_POST['zona'];
	$cad = '';
	
	for ($i=$idfecha;$i>=23;$i--) {
		$cad = $cad.'
				<div class="col-md-12">
				<div class="panel panel-predio" style="margin-top:0;">
                                <div class="panel-heading">
                                	<h3 class="panel-title">'.mysql_result($serviciosDatos->TraerFechaPorId($i),0,1).'</h3>
                                	<img src="imagenes/logo2-chico.png" style="float:right; margin-top:-21px; width:26px; height:24px;">
                                </div>
                                <div class="panel-body-predio">
                                	';
									
		$res = $serviciosDatos->traerResultadosPorTorneoZonaFecha($idtorneo,$idzona,$i);
		
		$cad = $cad.'<table class="table table-responsive table-striped" style="font-size:0.8em; padding:2px;">
                                	
                                	<thead>
                                    	<tr>
                                        	<th style="text-align:center;padding:3px;">Result. A</th>
                                            <th style="text-align:center;padding:3px;">Equipo A</th>
                                            <th style="text-align:center;padding:3px;">Horario</th>
                                            <th style="text-align:center;padding:3px;">Equipo B</th>
                                            <th style="text-align:center;padding:3px;">Result. B</th>
                                            <th style="text-align:center;padding:3px;">Ver</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
	
                        while ($row = mysql_fetch_array($res)) {
                        	$cad = $cad.'<tr>
                        	<td align="center" id="resA'.$row['idfixture'].'" style="padding:3px;">'.$row['resultadoa'].'</td>
                            <td align="center" id="equipoA'.$row['idfixture'].'" style="padding:3px;">'.(substr(utf8_encode($row['equipo1']),0,17)).'</td>
                            <td align="center" style="padding:3px;">'.$row['hora'].'</td>
                            <td align="center" id="equipoB'.$row['idfixture'].'" style="padding:3px;">'.(substr(utf8_encode($row['equipo2']),0,17)).'</td>
                            <td align="center" id="resB'.$row['idfixture'].'" style="padding:3px;">'.$row['resultadob'].'</td>
							<td style="padding:3px;"><img src="imagenes/verIco2.png" style="cursor:pointer;" id="'.$row['idfixture'].'" class="varModificar" data-target="#dialogModificar" data-toggle="modal"></td>
                        </tr>';
                    	}
													
        $cad = $cad.'</tbody>
                                </table></div>
                            </div>
						</div>';	
		
		
	}


	echo $cad;
}



function FixturePaginaChicoDos($serviciosDatos) {
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$idfecha	= $_POST['reffecha'];
	$zona		= $_POST['zona'];
	$cad = '';
	
	if ($idfecha == 23) {
		$menos = 0;	
	} else {
		$menos = 0;	
	}
	
	for ($i=$idfecha;$i>=$idfecha-$menos;$i--) {
		$cad = $cad.'
				<!--<div class="col-md-4">-->
				<div class="panel panel-predio" style="margin-top:0;">
                                <div class="panel-heading">
                                	<h3 class="panel-title">'.mysql_result($serviciosDatos->TraerFechaPorId($i),0,1).'</h3>
                                	<img src="imagenes/logo2-chico.png" style="float:right; margin-top:-21px; width:26px; height:24px;">
                                </div>
                                <div class="panel-body-predio" style="padding-bottom:0px;">
                                	';
									
		$res = $serviciosDatos->traerResultadosPorTorneoZonaFecha($idtorneo,$idzona,$i);
		
		$cad = $cad.'<table class="table table-responsive table-striped" style="font-size:0.9em; padding:0 2px;">
                                	
                                	<thead>
                                    	<tr>
                                        	<th style="text-align:center;padding:3px;"></th>
                                            <th style="text-align:center;padding:3px;">Equipo A</th>
                                            <th style="text-align:center;padding:3px;">Horario</th>
                                            <th style="text-align:center;padding:3px;">Equipo B</th>
                                            <th style="text-align:center;padding:3px;"></th>
                                            <th style="text-align:center;padding:3px;">Ver</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
	
                        while ($row = mysql_fetch_array($res)) {
                        	$cad = $cad.'<tr>
                        	<td align="center" id="resA'.$row['idfixture'].'" style="padding:3px;">'.$row['resultadoa'].'</td>
                            <td align="center" id="equipoA'.$row['idfixture'].'" style="padding:3px;">'.(utf8_encode($row['equipo1'])).'</td>
                            <td align="center" style="padding:3px;">'.$row['hora']."/".$row['cancha'].'</td>
                            <td align="center" id="equipoB'.$row['idfixture'].'" style="padding:3px;">'.(utf8_encode($row['equipo2'])).'</td>
                            <td align="center" id="resB'.$row['idfixture'].'" style="padding:3px;">'.$row['resultadob'].'</td>
							<td style="padding:3px;"><img src="imagenes/verIco2.png" style="cursor:pointer;" id="'.$row['idfixture'].'" class="varModificar" data-target="#dialogModificar" data-toggle="modal"></td>
                        </tr>';
                    	}
													
        $cad = $cad.'</tbody>
                                </table></div>
                            </div>
						<!--</div>-->';	
		
		
	}


	echo $cad;
}


function FixturePaginaChicoDosInactivo($serviciosDatos) {
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$idfecha	= $_POST['reffecha'];
	$zona		= $_POST['zona'];
	$cad = '';
	
	if ($idfecha == 23) {
		$menos = 0;	
	} else {
		$menos = 0;	
	}
	
	$res = $serviciosDatos->traerResultadosPorTorneoZonaFecha($idtorneo,$idzona,$idfecha);
	
	if (mysql_num_rows($res)>0) {
		$cad = $cad.'
				<!--<div class="col-md-4">-->
				<div class="panel panel-predio" style="margin-top:0;">
                                <div class="panel-heading">
                                	<h3 class="panel-title">Proxima Fecha: '.mysql_result($serviciosDatos->TraerFechaPorId($idfecha),0,1).'</h3>
                                	<img src="imagenes/logo2-chico.png" style="float:right; margin-top:-21px; width:26px; height:24px;">
                                </div>
                                <div class="panel-body-predio" style="padding-bottom:0px;">
                                	';
									
		
		
		$cad = $cad.'<table class="table table-responsive table-striped" style="font-size:0.9em; padding:0 2px;">
                                	
                                	<thead>
                                    	<tr>
                                        	<th style="text-align:center;padding:3px;"></th>
                                            <th style="text-align:center;padding:3px;">Equipo A</th>
                                            <th style="text-align:center;padding:3px;">Horario</th>
                                            <th style="text-align:center;padding:3px;">Equipo B</th>
                                            <th style="text-align:center;padding:3px;"></th>
                                            <th style="text-align:center;padding:3px;">Ver</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
	
                        while ($row = mysql_fetch_array($res)) {
                        	$cad = $cad.'<tr>
                        	<td align="center" id="resA'.$row['idfixture'].'" style="padding:3px;">'.$row['resultadoa'].'</td>
                            <td align="center" id="equipoA'.$row['idfixture'].'" style="padding:3px;">'.(utf8_encode($row['equipo1'])).'</td>
                            <td align="center" style="padding:3px;">'.$row['hora']."/".$row['cancha'].'</td>
                            <td align="center" id="equipoB'.$row['idfixture'].'" style="padding:3px;">'.(utf8_encode($row['equipo2'])).'</td>
                            <td align="center" id="resB'.$row['idfixture'].'" style="padding:3px;">'.$row['resultadob'].'</td>
							<td style="padding:3px;"><img src="imagenes/verIco2.png" style="cursor:pointer;" id="'.$row['idfixture'].'" class="varModificar" data-target="#dialogModificar" data-toggle="modal"></td>
                        </tr>';
                    	}
													
        $cad = $cad.'</tbody>
                                </table></div>
                            </div>
						<!--</div>-->';	
	}
		


	echo $cad;
}


function TraerFixturePorZonaTorneo($serviciosDatos) {
	
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$zona		= $_POST['zona'];
	$idfecha	= $_POST['reffecha'];
	$res2 = $serviciosDatos->TraerFixturePorZonaTorneo($idtorneo,$idzona,$idfecha);
	
	$cad2 = '
	<div class="row">
                	<table class="table table-responsive table-striped table3" style="margin:2px 20px;">
						<thead>
                        <tr>
                        	<th>POSICION</th>
                            <th>EQUIPO</th>
                            <th>PTS</th>
                            <th>PJ</th>
                            <th>PG</th>
                            <th>PE</th>
                            <th>PP</th>
                            <th>GF</th>
                            <th>GC</th>
                            <th>DIF</th>
                            <th>F.P.</th>
							<th>Pts Bonus</th>
                        </tr>
						</thead><tbody>';

						$i =1;
						$puntos = 0;
						while ($row1 = mysql_fetch_array($res2)) {
							
							
							if (($row1['reemplzado'] == '0') || (($row1['volvio'] == '1') && ($row1['reemplzadovolvio'] == '1'))) {	
							$cad2 = $cad2.'<tr>
								<td>'.$i.'</td>
								<td>'.$row1['nombre'].'</td>
								<td>'.$row1['pts'].'</td>
								<td>'.$row1['partidos'].'</td>
								<td>'.$row1['ganados'].'</td>
								<td>'.$row1['empatados'].'</td>
								<td>'.$row1['perdidos'].'</td>
								<td>'.$row1['golesafavor'].'</td>
								<td>'.$row1['golesencontra'].'</td>
								<td>'.$row1['diferencia'].'</td>
								<td>'.$row1['puntos'].'</td>
								<td>'.$row1['bonus'].'</td>
							</tr>';
					
							$i = $i + 1;
							}
						}
                    $cad2 = $cad2.'</tbody></table>
                
                </div>';
	echo $cad2;
}


function TraerFixturePorZonaPorTorneo($serviciosDatos, $serviciosFunciones) {
	
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$zona		= $_POST['zona'];
	$idfecha	= $_POST['reffecha'];
	
	$idTipoTorneo = mysql_result($serviciosFunciones->TraerIdTorneos($idtorneo),0,'reftipotorneo');
	
	$res2 = $serviciosDatos->TraerFixturePorZonaTorneo($idTipoTorneo,$idzona,$idfecha);
	
	$cad2 = '
	<div class="row">
                	<table cellpadding="0" cellspacing="0" border="2" bordercolor="#FF0000" style="width:auto; margin-left:20px; font-weight:bold; margin-right:5px;">
                    	<tr bgcolor="#bfbfbf">
                        	<td colspan="11" align="center" style="font-size:1.9em;">RESULTADOS '.$zona.'</td>
                        </tr>
                        <tr style="font-size:1.5em;">
                        	<td align="center" style="padding:1px 6px;">POSICION</td>
                            <td align="center" style="padding:1px 6px;">EQUIPO</td>
                            <td align="center" style="padding:1px 6px;">PTS</td>
                            <td align="center" style="padding:1px 6px;">PJ</td>
                            <td align="center" style="padding:1px 6px;">PG</td>
                            <td align="center" style="padding:1px 6px;">PE</td>
                            <td align="center" style="padding:1px 6px;">PP</td>
                            <td align="center" style="padding:1px 6px;">GF</td>
                            <td align="center" style="padding:1px 6px;">GC</td>
                            <td align="center" style="padding:1px 6px;">DIF</td>
                            <td align="center" style="padding:1px 6px;">F.P.</td>
                        </tr>';

						$i =1;
						$puntos = 0;
						while ($row1 = mysql_fetch_array($res2)) {
							
							
							if (($row1['reemplzado'] == '0') || (($row1['volvio'] == '1') && ($row1['reemplzadovolvio'] == '1'))) {	
							$cad2 = $cad2.'<tr style="font-size:1.5em;">
								<td align="right" style="padding:1px 6px;">'.$i.'</td>
								<td align="left" style="padding:1px 6px;">'.utf8_encode($row1['nombre']).'</td>
								<td align="right" style="padding:1px 6px;">'.$row1['pts'].'</td>
								<td align="right" style="padding:1px 6px;">'.$row1['partidos'].'</td>
								<td align="right" style="padding:1px 6px;">'.$row1['ganados'].'</td>
								<td align="right" style="padding:1px 6px;">'.$row1['empatados'].'</td>
								<td align="right" style="padding:1px 6px;">'.$row1['perdidos'].'</td>
								<td align="right" style="padding:1px 6px;">'.$row1['golesafavor'].'</td>
								<td align="right" style="padding:1px 6px;">'.$row1['golesencontra'].'</td>
								<td align="right" style="padding:1px 6px;">'.$row1['diferencia'].'</td>
								<td align="right" style="padding:1px 6px;">'.$row1['puntos'].'</td>
							</tr>';
					
							$i = $i + 1;
							}
						}
                    $cad2 = $cad2.'</table>
                
                </div>';
	echo $cad2;
}


function TraerFixturePorZonaTorneoPagina($serviciosDatos) {
	
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$zona		= $_POST['zona'];
	$idfecha	= $_POST['reffecha'];
	
	$res2 = $serviciosDatos->TraerFixturePorZonaTorneo($idtorneo,$idzona,$idfecha);
	$cad2 = '';
	$cad2 = $cad2.'
				<!--<div class="col-md-8">-->
				<div class="panel panel-predio">
                                <div class="panel-heading">
                                	<h3 class="panel-title">'.$zona.'</h3>
                                	<img src="imagenes/logo2-chico.png" style="float:right;margin-top:-21px; width:26px; height:24px;">
                                </div>
                                <div class="panel-body-predio" style="padding:5px 20px;">
                                	';
	$cad2 = $cad2.'
	<div class="row">
                	<table class="table table-responsive table-striped" style="font-size:1em; padding:0px;">

                        <thead>
							<tr>
								<th align="center">POS.</th>
								<th align="center">EQUIPO</th>
								<th align="center">PTS</th>
								<th align="center">PJ</th>
								<th align="center">PG</th>
								<th align="center">PE</th>
								<th align="center">PP</th>
								<th align="center">GF</th>
								<th align="center">GC</th>
								<th align="center">DIF</th>
								<th align="center">F.P.</th>
								<th align="center">% Goles</th>
								<th align="center">EFECT.</th>
								<th align="center"><img src="imagenes/icoRoja.png"></th>
                            	<th align="center"><img src="imagenes/icoAmarilla.png"></th>
							</tr>
						</thead>
						<tbody>';

						$i =1;
						$puntos = 0;
						while ($row1 = mysql_fetch_array($res2)) {
						
							
							if (($row1['reemplzado'] == '0') || (($row1['volvio'] == '1') && ($row1['reemplzadovolvio'] == '1'))) {	
							$cad2 = $cad2.'
							<tr>
								<td align="center">'.$i.'</td>
								<td align="left"><a href="equipo.php?eq='.$row1['idequipo'].'">'.utf8_encode($row1['nombre']).'</a></td>
								<td align="center">'.$row1['pts'].'</td>
								<td align="center">'.$row1['partidos'].'</td>
								<td align="center">'.$row1['ganados'].'</td>
								<td align="center">'.$row1['empatados'].'</td>
								<td align="center">'.$row1['perdidos'].'</td>
								<td align="center">'.$row1['golesafavor'].'</td>
								<td align="center">'.$row1['golesencontra'].'</td>
								<td align="center">'.$row1['diferencia'].'</td>
								<td align="center">'.$row1['puntos'].'</td>
								<td align="center">'.$row1['porcentajegoles'].'%</td>
								<td align="center">'.$row1['efectividad'].'%</td>
								<td align="center">'.$row1['rojas'].'</td>
								<td align="center">'.$row1['amarillas'].'</td>
							</tr>';
					
							$i = $i + 1;
							}
						}
                    $cad2 = $cad2.'</tbody>
                                </table>
								</div>
								</div>
                            </div>
						<!--</div>-->';
	echo $cad2;
}



function GoleadoresPagina($serviciosDatos) {
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$zona		= $_POST['zona'];
	$idfecha	= $_POST['reffecha'];
	
	$res3 = $serviciosDatos->Goleadores($idtorneo,$idzona,$idfecha);
	$cad3 = '';
	$cad3 = $cad3.'
				<!--<div class="col-md-12">-->
				<div class="panel panel-predio">
                                <div class="panel-heading">
                                	<h3 class="panel-title">'.$zona.' - Goleadores</h3>
                                	<img src="imagenes/logo2-chico.png" style="float:right;margin-top:-21px; width:26px; height:24px;">
                                </div>
                                <div class="panel-body-predio" style="padding:5px 20px;">
                                	';
	$cad3 = $cad3.'
	<div class="row">
                	<table class="table table-responsive table-striped" style="font-size:0.9em; padding:2px;">
						<thead>
                        <tr>
                        	<th align="left">Nombre y Apellido</th>
                            <th align="left">Equipo</th>
                            <th align="center">Goles</th>
                        </tr>
						</thead>
						<tbody>';
                        
						$i =1;
						while ($row1 = mysql_fetch_array($res3)) {
						if (($row1['reemplzado'] == '0') || (($row1['volvio'] == '1') && ($row1['reemplzadovolvio'] == '1'))) {	
                        $cad3 = $cad3.'<tr>
                            <td align="left" style="padding:1px;">'.strtoupper(utf8_encode($row1['apyn'])).'</td>
                            <td align="left" style="padding:1px;"><a href="equipo.php?eq='.$row1['refequipo'].'">'.strtoupper(utf8_encode($row1['nombre'] )).'</a></td>
                            <td align="center" style="padding:1px;">'.$row1['cantidad'].'</td>
 
                        </tr>';
         
						$i = $i + 1;
						}
						}
                    $cad3 = $cad3.'</tbody>
                                </table>
								</div>
								</div>
                            </div>
						<!--</div>-->';
	echo $cad3;
}



function Goleadores($serviciosDatos) {
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$zona		= $_POST['zona'];
	$idfecha	= $_POST['reffecha'];
	
	$res3 = $serviciosDatos->Goleadores($idtorneo,$idzona,$idfecha);

	$cad3 = '
	<div class="row" style="margin-top:20px;">
                	<table class="table table-responsive table-striped table3" style="margin:2px 20px;max-width:480px;">
                        <thead>
						<tr>
                        	<th>NOMBRE Y APELLIDO</th>
                            <th>EQUIPO</th>
                            <th>CANTIDAD</th>
                        </tr>
						</thead><tbody>';
                        
						$i =1;
						while ($row1 = mysql_fetch_array($res3)) {
						if (($row1['reemplzado'] == '0') || (($row1['reemplzado'] == '1') && ($row1['volvio'] == '1'))) {
                        $cad3 = $cad3.'<tr>
                            <td>'.strtoupper(utf8_encode($row1['apyn'])).'</td>
                            <td>'.utf8_encode($row1['nombre']).'</td>
                            <td align="center">'.$row1['cantidad'].'</td>
 
                        </tr>';
         
						$i = $i + 1;
						}
						}
                    $cad3 = $cad3.'</tbody></table>
                
                </div>';
	echo $cad3;
}


function Suspendidos($serviciosDatos) {
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$idfecha	= $_POST['reffecha'];
	$zona		= $_POST['zona'];
	
	$res4 = $serviciosDatos->SuspendidosNuevo($idtorneo,$idzona,$idfecha);
	
	$res5 = $serviciosDatos->SuspendidosPorSiempre($idtorneo,$idzona,$idfecha);
	
	$resCantDeEquipos = $serviciosDatos->traerResultadosPorTorneoZonaFecha($idtorneo,$idzona,$idfecha);
		
	$cantEquipos = (mysql_num_rows($resCantDeEquipos)*4) + 20;
	
	$ultimaFecha = 0;
	if ($cantEquipos == $idfecha) {
		$res6 = $serviciosDatos->SuspendidosUltimaFecha($idtorneo,$idzona,$idfecha);
		$ultimaFecha = 1;
	}
	
	$cad4 = '
	<div class="row" style="margin-top:20px;">
                	<table class="table table-responsive table-striped table3" style="margin:2px 20px;">
                    	<thead>
                        <tr>
                        	<th>NOMBRE Y APELLIDO</th>
                            <th>EQUIPO</th>
                            <th>MOTIVO</th>
							<th>CANTIDAD</th>
                        </tr>
						</thead>
						<tbody>';
                        
						$i =1;
						$restantes = 0;
						while ($row1 = mysql_fetch_array($res4)) {
							
							if (($row1['reemplzado'] == '0') || (($row1['reemplzado'] == '1') && ($row1['volvio'] == '1'))) {
							$restantes = $serviciosDatos->traerFechasRestantes($idfecha,$row1['refjugador'],$row1['refequipo'],$row1['refsuspendido']);
							//echo $restantes;
							$restantes = (integer)$row1['cantidad'] - (integer)$restantes;
							if ($restantes != 0) { 
								$cad4 = $cad4.'<tr>
									<td>'.strtoupper($row1['apyn']).'</td>
									<td>'.$row1['nombre'].'</td>
									<td>'.$row1['motivos'].'</td>
									<td>'.$row1['cantidad'].'(Resta '.$restantes.')'.'</td>
								</tr>';
								
								$i = $i + 1;
							}
							}
						}
						
						if ($ultimaFecha == 1) {
							while ($row7 = mysql_fetch_array($res6)) {
	
	
									$cad4 = $cad4.'<tr>
										<td>'.strtoupper($row7['apyn']).'</td>
										<td>'.($row7['nombre']).'</td>
										<td>'.$row7['motivos'].'</td>
										<td>'.$row7['cantidad'].'(Resta '.$row7['cantidad'].')'.'</td>
									</tr>';
									
									$i = $i + 1;
	
							}
						}
						while ($row2 = mysql_fetch_array($res5)) {


								$cad4 = $cad4.'<tr>
									<td>'.strtoupper(($row2['apyn'])).'</td>
									<td>'.($row2['nombre']).'</td>
									<td>'.$row2['motivos'].'</td>
									<td>Todas</td>
								</tr>';
								
								$i = $i + 1;

						}
                    $cad4 = $cad4.'</tbody></table>
                
                </div>';
	echo $cad4;
}



function AmarillasAcumuladasPagina($serviciosDatos) {
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$zona		= $_POST['zona'];
	$idfecha	= $_POST['reffecha'];
	
	$res3 = $serviciosDatos->traerAcumuladosAmarillasPorTorneoZona($idtorneo,$idzona,$idfecha);
	$cad3 = '';
	$cad3 = $cad3.'
				<!--<div class="col-md-12">-->
				<div class="panel panel-predio">
                                <div class="panel-heading">
                                	<h3 class="panel-title">'.$zona.' - Amarillas</h3>
                                	<img src="imagenes/logo2-chico.png" style="float:right;margin-top:-21px; width:26px; height:24px;">
                                </div>
                                <div class="panel-body-predio" style="padding:5px 20px;">
                                	';
	$cad3 = $cad3.'
	<div class="row">
                	<table class="table table-responsive table-striped" style="font-size:0.9em; padding:2px;">
						<thead>
                        <tr>
                        	<th align="left">Nombre y Apellido</th>
                            <th align="left">Equipo</th>
                            <th align="center">Amarillas</th>
                        </tr>
						</thead>
						<tbody>';
                        
						$i =1;
						while ($row1 = mysql_fetch_array($res3)) {
							if (($row1['reemplzado'] == '0') || (($row1['volvio'] == '1') && ($row1['reemplzadovolvio'] == '1'))) {	
                        	$cad3 = $cad3.'<tr>
                            <td align="left" style="padding:1px;">'.strtoupper(utf8_encode($row1['apyn'])).'</td>
                            <td align="left" style="padding:1px;"><a href="equipo.php?eq='.$row1['refequipo'].'">'.utf8_encode($row1['nombre']).'</a></td>
                            <td align="center" style="padding:1px;">'.$row1['cantidad'].'</td>
 
                        </tr>';
         
							$i = $i + 1;
							}
						}
                    $cad3 = $cad3.'</tbody>
                                </table>
								</div>
								</div>
                            </div>
						<!--</div>-->';
	echo $cad3;
}





function AmarillasAcumuladas($serviciosDatos) {
	
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$zona		= $_POST['zona'];
	$idfecha	= $_POST['reffecha'];
	
	$res2 = $serviciosDatos->traerAcumuladosAmarillasPorTorneoZona($idtorneo,$idzona,$idfecha);
	
	$cad2 = '
	<div class="row">
                	<table class="table table-responsive table-striped table3" style="margin:2px 20px;">
                        <thead>
						<tr>
                            <th align="center">EQUIPO</th>
							<th align="center">JUGADOR</th>
							<th align="center">DNI</th>
              				<th align="center">AMARILLAS</th>
							<th align="center">AZULES</th>
							<th align="center">ROJAS</th>
                        </tr>
						</thead>
						<tbody>';

						$i =1;
						$puntos = 0;
						while ($row1 = mysql_fetch_array($res2)) {
						
							
						if (($row1['reemplzado'] == '0') || (($row1['reemplzado'] == '1') && ($row1['volvio'] == '1'))) {
							$cad2 = $cad2.'<tr>
								<td align="left">'.utf8_encode($row1['nombre']).'</td>
								<td align="right">'.strtoupper(utf8_encode($row1['apyn'])).'</td>
								<td align="right">'.utf8_encode($row1['dni']).'</td>
								<td align="center">'.$row1['cantidad'].'</td>
								<td align="center">'.$row1['cantidadazules'].'</td>
								<td align="center">'.$row1['cantidadrojas'].'</td>
							</tr>';
						}
						}
                    $cad2 = $cad2.'</tbody></table>
                
                </div>';
	echo $cad2;
}



function FairPlay($serviciosDatos) {
	
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$zona		= $_POST['zona'];
	$idfecha	= $_POST['reffecha'];
	
	$amarillas 	= '';
	$azules		= '';
	$rojas		= '';

	$res2 = $serviciosDatos->fairplay($idtorneo,$idzona,$idfecha);
	
	$cad2 = '
	<div class="row">
                	<table class="table table-responsive table-striped table3" style="margin:2px 20px;">
                        <thead>
						<tr>
                            <th align="center">EQUIPO</th>
                            <th align="center" style="width:80px;">PUNTOS</th>
							<th align="center" style="width:110px;"><img src="../imagenes/icoAmarilla.png"/> Equipo</th>
							<th align="center" style="width:110px;"><img src="../imagenes/icoRoja.png"/> Equipo</th>
							<th align="center" style="width:80px;"><img src="../imagenes/icoAmarilla.png"/> Jug.</th>
							<th align="center" style="width:80px;"><img src="../imagenes/azul.png"/> Jug.</th>
							<th align="center" style="width:80px;"><img src="../imagenes/icoRoja.png"/> Jug.</th>
							<th align="center">OBS.</th>
                        </tr>
						</thead>
						<tbody>';

						$i =1;
						$puntos = 0;
						while ($row1 = mysql_fetch_array($res2)) {
							$resAmarillasJugadores = $serviciosDatos->traerAcumuladosAmarillasPorTorneoZonaEquipo($idtorneo,$idzona,$idfecha,$row1['idequipo']);
							if (mysql_num_rows($resAmarillasJugadores)>0) {
								$amarillas 	= mysql_result($resAmarillasJugadores,0,'cantidad');
								$azules		= mysql_result($resAmarillasJugadores,0,'cantidadazules');
								$rojas		= mysql_result($resAmarillasJugadores,0,'cantidadrojas');
							} else {
								$amarillas 	= '0';
								$azules		= '0';
								$rojas		= '0';
							}
				
							$cad2 = $cad2.'<tr>
								<td align="left">'.utf8_encode($row1['nombre']).'</td>
								<td align="center">'.$row1['puntos'].'</td>
								<td align="center">'.$row1['amarillas'].'</td>
								<td align="center">'.$row1['rojas'].'</td>
								<td align="center">'.$amarillas.'</td>
								<td align="center">'.$azules.'</td>
								<td align="center">'.$rojas.'</td>
								<td align="left">'.$row1['observacion'].'</td>
							</tr>';

						}
                    $cad2 = $cad2.'</tbody></table>
                
                </div>';
	echo $cad2;
}
/* Fin reportes */



/* para los torneos */

function traerZonaPorTorneos($serviciosFunciones) {
	$idTorneo	= 	$_POST["reftorneo"];
	
	$res	= $serviciosFunciones->traerZonaPorTorneos($idTorneo);
	
	echo json_encode(toArray($res));	
	
}
function insertarTorneo($serviciosFunciones) {
	$nombre			=	$_POST['nombre'];
	$fechacreacion	=	$_POST['fechacreacion'];

	if (isset($_POST['activo'])) {
		$activo	= 1;
	} else {
		$activo = 0;
	}
	
	$reftipotorneo	=	$_POST['reftipotorneo'];
	
	$res = $serviciosFunciones->insertarTorneo($nombre,$fechacreacion,$activo,$reftipotorneo);
	//echo $res;
	
	if ((integer)$res > 0) {
		$resFechas = $serviciosFunciones->traerSedes();
		$cad = 'sede';
		while ($rowFS = mysql_fetch_array($resFechas)) {
			if (isset($_POST[$cad.$rowFS[0]])) {
				$serviciosFunciones->insertarTorneosSedes($res,$rowFS[0]);
			}
		}
		echo '';
	} else {
		echo "Huvo un error al insertar datos";	
	}
}

function modificarTorneo($serviciosFunciones) {
	$id				=	$_POST['id'];
	$nombre			=	$_POST['nombre'];
	$fechacreacion	=	$_POST['fechacreacion'];
	if (isset($_POST['activo'])) {
		$activo	= 1;
	} else {
		$activo = 0;
	}
	
	$reftipotorneo	=	$_POST['reftipotorneo'];
	
	$res = $serviciosFunciones->modificarTorneo($id,$nombre,$fechacreacion,$activo,$reftipotorneo);
	
	

	if ($res == true) {
		$serviciosFunciones->eliminarTorneosSedesPorTorneos($res);
			$resFechas = $serviciosFunciones->traerSedes();
			$cad = 'sede';
			while ($rowFS = mysql_fetch_array($resFechas)) {
				if (isset($_POST[$cad.$rowFS[0]])) {
					$serviciosFunciones->insertarTorneosSedes($id,$rowFS[0]);
				}
			}
		echo '';
	} else {
		echo 'Huvo un error al modificar datos';
	}
}

function eliminarTorneo($serviciosFunciones) {
	$id				=	$_POST['id'];
	
	$res = $serviciosFunciones->eliminarTorneo($id);
	echo $res;
}


function traerTorneoPorTipoTorneo($serviciosFunciones) {
	$idtipotorneo	=	$_POST['reftipotorneo'];
	
	$res = $serviciosFunciones->traerTorneoPorTipoTorneo($idtipotorneo);
	
	$cad = '';
	while ($roww = mysql_fetch_array($res)) {
		$cad = $cad.'<option value="'.$roww[0].'">'.utf8_encode($roww[1]).'</td>';	
	}
	echo $cad;
}

function cambiarTorneo($serviciosFunciones) {
	$idtipotorneo		=	$_POST['reftipotorneo'];
	$idtorneo = '';
	//$idtorneo			=	$_POST['reftorneo'];
	
	$res = $serviciosFunciones->cambiarTorneo($idtipotorneo,$idtorneo);
	//echo $res;
	if ($res == true) {
		echo '';
	} else {
		echo 'Huvo un error al cambiar el torneo';
	}
}

/* fin torneos */
	
/* para los equipos */

function traerEquipoPorZonaTorneos($serviciosEquipos) {
	$refTorneo		= $_POST['reftorneo'];
	$refZona		= $_POST['refzona'];
	
	$res	= $serviciosEquipos->traerEquipoPorZonaTorneos($refTorneo,$refZona);
	
	echo json_encode(toArray($res));
}


function insertarEquipos($serviciosEquipos) {
	$Nombre 			= $_POST['nombre'];
	$nombrecapitan 		= $_POST['nombrecapitan'];
	$telefonocapitan 	= $_POST['telefonocapitan'];
	$facebookcapitan 	= $_POST['facebookcapitan'];
	$nombresubcapitan 	= $_POST['nombresubcapitan'];
	$telefonosubcapitan = $_POST['telefonosubcapitan'];
	$facebooksubcapitan = $_POST['facebooksubcapitan'];
	$emailcapitan 		= $_POST['emailcapitan'];
	$emailsubcapitan 	= $_POST['emailsubcapitan'];

	$res = $serviciosEquipos->insertarEquipos($Nombre,$nombrecapitan,$telefonocapitan,$facebookcapitan,$nombresubcapitan,$telefonosubcapitan,$facebooksubcapitan,$emailcapitan,$emailsubcapitan);
	if ((integer)$res > 0) {
		echo '';
	} else {
		echo 'Huvo un error al insertar datos';
	}
}
function modificarEquipos($serviciosEquipos) {
	$id 				= $_POST['id'];
	$Nombre 			= $_POST['nombre'];
	$nombrecapitan 		= $_POST['nombrecapitan'];
	$telefonocapitan 	= $_POST['telefonocapitan'];
	$facebookcapitan 	= $_POST['facebookcapitan'];
	$nombresubcapitan 	= $_POST['nombresubcapitan'];
	$telefonosubcapitan = $_POST['telefonosubcapitan'];
	$facebooksubcapitan = $_POST['facebooksubcapitan'];
	$emailcapitan 		= $_POST['emailcapitan'];
	$emailsubcapitan 	= $_POST['emailsubcapitan'];

	$res = $serviciosEquipos->modificarEquipos($id,$Nombre,$nombrecapitan,$telefonocapitan,$facebookcapitan,$nombresubcapitan,$telefonosubcapitan,$facebooksubcapitan,$emailcapitan,$emailsubcapitan);
	
	if ($res == true) {
		echo '';
	} else {
		echo 'Huvo un error al insertar datos';
	}
}

function eliminarEquipos($serviciosEquipos) {
	$id = $_POST['id'];
	$res = $serviciosEquipos->eliminarEquipos($id);
	echo $res;
}





function insertarConducta($serviciosFunciones) {
	$refequipo = $_POST['refequipo'];
	$puntos = $_POST['puntos'];
	$reffecha =$_POST['reffecha'];
	$reftorneo = $_POST['reftorneo'];
	
	$res = $serviciosFunciones->modificarConductaPorEquipo($refequipo,$puntos,$reffecha,$reftorneo);
	if ($res == true) {
		echo '';
	} else {
		echo 'Huvo un error al modificar datos';
	}
}
function modificarConducta($serviciosFunciones) {
	$id = $_POST['id'];
	$refequipo = $_POST['refequipo'];
	$puntos = $_POST['puntos'];
	$res = $serviciosFunciones->modificarConducta($id,$refequipo,$puntos);
	if ($res == true) {
		echo '';
	} else {
		echo 'Huvo un error al modificar datos';
	}
}
function eliminarConducta($serviciosFunciones) {
	$id = $_POST['id'];
	$res = $serviciosFunciones->eliminarConducta($id);
	echo $res;
} 



function insertarPuntosEquipos($serviciosPuntosEquipos, $serviciosZonasEquipos) {
$refequipo = $_POST['refequipo'];
$puntos = $_POST['puntos'];
$amarillas = $_POST['amarillas'];
$observacion = $_POST['observacion'];
$azules = $_POST['azules'];
$rojas = $_POST['rojas'];
$reffixture = $_POST['reffixture'];
$reffecha = $_POST['reffecha'];
$reftorneo = $_POST['reftorneo'];

$resExiste = $serviciosPuntosEquipos->traerPuntosEquiposPorFixtureEquipoFechaTorneo($reffixture,$refequipo,$reffecha,$reftorneo);

	if (mysql_num_rows($resExiste)<1) {
		$res = $serviciosPuntosEquipos->insertarPuntosEquipos($refequipo,$puntos,$amarillas,$azules,$rojas,$reffixture,$reffecha,$reftorneo,$observacion);
		if ((integer)$res > 0) {
			echo '';
		} else {
			echo 'Huvo un error al insertar datos ';
		}
	} else {
		$res = $serviciosPuntosEquipos->modificarPuntosEquipos(mysql_result($resExiste,0,0) ,$refequipo,$puntos,$amarillas,$azules,$rojas,$reffixture,$reffecha,$reftorneo,$observacion);
		if ($res == true) {
			echo '';
		} else {
			echo 'Huvo un error al modificar datos';
		}
	}
	
	///////////   BORRO Y CREO EL FAIRPLAY /////////////////////////////////////////////////
	$resTorneo  = $serviciosZonasEquipos->TraerFixturePorIdGral($reffixture);
	$reffecha	= mysql_result($resTorneo,0,2);
	$reftorneo	= mysql_result($resTorneo,0,1);
	
	$serviciosZonasEquipos->borrarTablaConductaPorEquipo($reffecha, $refequipo, $reftorneo);
	$serviciosZonasEquipos->calcularTablaConductaPorEquipo($reffecha, $refequipo, $reftorneo);
	//////////     FIN
}
function modificarPuntosEquipos($serviciosPuntosEquipos, $serviciosZonasEquipos) {
	$id = $_POST['id'];
	$refequipo = $_POST['refequipo'];
	$puntos = $_POST['puntos'];
	$amarillas = $_POST['amarillas'];
	$observacion = $_POST['observacion'];
	$azules = $_POST['azules'];
	$rojas = $_POST['rojas'];
	$reffixture = $_POST['reffixture'];
	$reffecha = $_POST['reffecha'];
	$reftorneo = $_POST['reftorneo'];
	$res = $serviciosPuntosEquipos->modificarPuntosEquipos($id,$refequipo,$puntos,$amarillas,$azules,$rojas,$reffixture,$reffecha,$reftorneo,$observacion);
	
	if ($res == true) {
		  
		echo '';
	} else {
		echo 'Huvo un error al modificar datos';
	}
}
function eliminarPuntosEquipos($serviciosPuntosEquipos, $serviciosZonasEquipos) {
$id = $_POST['id'];
$res = $serviciosPuntosEquipos->eliminarPuntosEquipos($id);
echo $res;
}
/* fin equipos */


/* para los jugadores */

function insertarEstadisticaPorJugador($serviciosJugadores, $serviciosFunciones, $serviciosZonasEquipos) {
	
	$refjugador		= $_POST['refjugador'];
	$refequipo		= $_POST['refequipo'];
	$reffixture		= $_POST['reffixture'];

	$jugo = $_POST['jugo'];
	$goles = $_POST['goles'];
	$cancha = $_POST['cancha'];
	$arquero = $_POST['arquero'];
	$amarillas = $_POST['amarillas'];
	$azul = $_POST['azules'];
	$rojas = $_POST['rojas'];
	$puntos = $_POST['puntos'];
	$mejor = $_POST['mejor'];

	if ($mejor == '1') {
		$mejor = true;
	} else {
		$mejor = false;
	}
	$id = $serviciosJugadores->existeAmonestado($reffixture,$refjugador);
	
	if ($id == 0) {
		
		if ($jugo == 1) {
			$res = $serviciosJugadores->insertarAmonestados($refjugador,$refequipo,$reffixture,$amarillas,$azul,$rojas,$jugo,$cancha,$arquero,$puntos,$mejor,$goles);
			if ($goles > 0) {
				$serviciosJugadores->insertarGoleadores($refequipo,$reffixture,$goles,$refjugador);	
			}
			if ((integer)$res > 0) {
				echo '';
			} else {
				echo 'Huvo un error al insertar datos'.$res;
			} 
		} else {
			echo 'La estadistica no ha sido cargada, ya que el jugador no jugó';	
		}
	} else {
		if ($jugo == 1) {
			$res = $serviciosJugadores->modificarAmonestados($id,$refjugador,$refequipo,$reffixture,$amarillas,$azul,$rojas,$jugo,$cancha,$arquero,$puntos,$mejor,$goles);
			$serviciosJugadores->modificarGoleadoresPorFixture($refequipo,$reffixture,$goles,$refjugador);
			if ($res == true) {
				echo '';
			} else {
				echo 'Huvo un error al MODIFICAR datos'.$res;
			}
		} else {
			$res = $serviciosJugadores->eliminarAmonestados($id);
			$serviciosJugadores->eliminarGoleadoresPorFixture($reffixture);
			echo 'La estadistica ha sido eliminada, ya que el jugador no jugó';	
		}
	}
	///////////   BORRO Y CREO EL FAIRPLAY /////////////////////////////////////////////////
	$resTorneo  = $serviciosZonasEquipos->TraerFixturePorIdGral($reffixture);
	$reffecha	= mysql_result($resTorneo,0,2);
	$reftorneo	= mysql_result($resTorneo,0,1);
	
	$serviciosZonasEquipos->borrarTablaConductaPorEquipo($reffecha, $refequipo, $reftorneo);
	$serviciosZonasEquipos->calcularTablaConductaPorEquipo($reffecha, $refequipo, $reftorneo);
	//////////     FIN                    //////////////////////////////////////////////////
}


function buscarGoleadores($serviciosJugadores) {
	$tipobusqueda	= $_POST['tipobusqueda'];
	$busqueda		= $_POST['busqueda'];
	
	$res = $serviciosJugadores->buscarGoleadores($tipobusqueda,$busqueda);
	
	$cad3 = '';
	//////////////////////////////////////////////////////busquedajugadores/////////////////////
	$cad3 = $cad3.'
				<div class="col-md-12">
				<div class="panel panel-info">
                                <div class="panel-heading">
                                	<h3 class="panel-title">Resultado de la Busqueda</h3>
                                	<img src="../../imagenes/logo2-chico.png" style="float:right;margin-top:-21px; width:26px; height:24px;">
                                </div>
                                <div class="panel-body-predio" style="padding:5px 20px;">
                                	';
	$cad3 = $cad3.'
	<div class="row">
                	<table id="example" class="table table-responsive table-striped" style="font-size:0.8em; padding:2px;">
						<thead>
                        <tr>
                        	
                            <th align="left">Jugador</th>
                            <th align="center">DNI</th>
							<th align="left">Equipo</th>
							<th align="center">Fecha</th>
							<th align="center">Goles</th>
							<th align="left">Torneo</th>
							<th>Acciones</th>
                        </tr>
						</thead>
						<tbody>';
	while ($rowJ = mysql_fetch_array($res)) {
		$cad3 .= '<tr>
					<td>'.utf8_encode($rowJ[1]).'</td>
					<td>'.utf8_encode($rowJ[2]).'</td>
					<td>'.utf8_encode($rowJ[3]).'</td>
					<td>'.utf8_encode($rowJ[4]).'</td>
					<td>'.utf8_encode($rowJ[5]).'</td>
					<td>'.utf8_encode($rowJ[6]).'</td>
					<td>
								
							<div class="btn-group">
								<button class="btn btn-success" type="button">Acciones</button>
								
								<button class="btn btn-success dropdown-toggle" data-toggle="dropdown" type="button">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								
								<ul class="dropdown-menu" role="menu">
									<li>
									<a href="modificargoleadores.php?id='.$rowJ[0].'" class="varmodificar" id="'.$rowJ[0].'">Modificar</a>
									</li>

									
								</ul>
							</div>
						</td>';
	}
	
	$cad3 = $cad3.'</tbody>
                                </table></div>
                            </div>
						</div>';
						
	echo $cad3;
}


function buscarJugadores($serviciosJugadores) {
	$tipobusqueda	= $_POST['tipobusqueda'];
	$busqueda		= $_POST['busqueda'];
	
	$res = $serviciosJugadores->buscarJugadores($tipobusqueda,$busqueda);
	
	$cad3 = '';
	//////////////////////////////////////////////////////busquedajugadores/////////////////////
	$cad3 = $cad3.'
				<div class="col-md-12">
				<div class="panel panel-success">
                                <div class="panel-heading">
                                	<h3 class="panel-title">Resultado de la Busqueda</h3>
                                	
                                </div>
                                <div class="panel-body-predio" style="padding:5px 20px;">
                                	';
	$cad3 = $cad3.'
	<div class="row">
                	<table id="example" class="table table-responsive table-striped" style="font-size:0.8em; padding:2px;">
						<thead>
                        <tr>
                        	<th align="left">Equipo</th>
                            <th align="left">Jugador</th>
                            <th align="center">DNI</th>
							<th align="center">Invitado</th>
							<th align="center">Expulsado</th>
							<th>Acciones</th>
                        </tr>
						</thead>
						<tbody>';
	while ($rowJ = mysql_fetch_array($res)) {
		$cad3 .= '<tr>
					<td>'.utf8_encode($rowJ[1]).'</td>
					<td>'.utf8_encode($rowJ[2]).'</td>
					<td>'.utf8_encode($rowJ[3]).'</td>
					<td>'.utf8_encode($rowJ[4]).'</td>
					<td>'.utf8_encode($rowJ[5]).'</td>
					<td>
								
							<div class="btn-group">
								<button class="btn btn-success" type="button">Acciones</button>
								
								<button class="btn btn-success dropdown-toggle" data-toggle="dropdown" type="button">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								
								<ul class="dropdown-menu" role="menu">
									<li>
									<a href="modificar.php?id='.$rowJ[0].'" class="varmodificar" id="'.$rowJ[0].'">Modificar</a>
									</li>

									
								</ul>
							</div>
						</td>';
	}
	
	$cad3 = $cad3.'</tbody>
                                </table></div>
                            </div>
						</div>';
						
	echo $cad3;
}

function insertarJugadores($serviciosJugadores) {
	$apellido = $_POST['apellido'];
	$nombre = $_POST['nombre'];
	$idequipo = $_POST['idequipo'];
	$dni = $_POST['dni'];
	if (isset($_POST['invitado'])) {
	$invitado = 1;
	} else {
	$invitado = 0;
	}
	if (isset($_POST['expulsado'])) {
	$expulsado = 1;
	} else {
	$expulsado = 0;
	}
	$email = $_POST['email'];
	$facebook = $_POST['facebook'];

	
	$dni 		= str_replace('.','',$_POST['dni']);
	
	$res = $serviciosJugadores->insertarJugadores($apellido,$nombre,$idequipo,$dni,$invitado,$expulsado,$email,$facebook); 
	if ((integer)$res > 0) {
		echo '';
	} else {
		echo 'Huvo un error al insertar datos';
	}
}
function modificarJugadores($serviciosJugadores) {
	$id 		= $_POST['id'];
	$apellido = $_POST['apellido'];
	$nombre = $_POST['nombre'];
	$idequipo = $_POST['idequipo'];
	$dni = $_POST['dni'];
	if (isset($_POST['invitado'])) {
	$invitado = 1;
	} else {
	$invitado = 0;
	}
	if (isset($_POST['expulsado'])) {
	$expulsado = 1;
	} else {
	$expulsado = 0;
	}
	$email = $_POST['email'];
	$facebook = $_POST['facebook'];
	
	$res = $serviciosJugadores->modificarJugadores($id,$apellido,$nombre,$idequipo,$dni,$invitado,$expulsado,$email,$facebook); 
	
	
	if ($res == true) {
		echo '';
	} else {
		echo 'Huvo un error al MODIFICAR datos';
	}
	
}

function modificarJugadoresEx($serviciosJugadores) {
	$id 		= $_POST['id'];
	$apyn 		= $_POST['apyn'];
	$idequipo 	= $_POST['idequipo'];
	$dni 		= $_POST['dni'];
	
	$invitado	= $_POST['invitado'];
	$expulsado	= $_POST['expulsado'];
	
	$res = $serviciosJugadores->modificarJugadores($apyn,$dni,$idequipo,$id,$invitado,$expulsado);
	
	//echo $res;
	
	if ($res == true) {
		echo '';
	} else {
		echo 'Huvo un error al MODIFICAR datos';
	}
}
function eliminarJugadores($serviciosJugadores) {
	$id = $_POST['id'];
	
	$res = $serviciosJugadores->eliminarJugadores($id);
	echo $res;
} 

function traerJugadores($serviciosJugadores) {
	$idequipo		=	$_POST['refequipo'];
	
	$res = $serviciosJugadores->TraerJugadoresPorEquipo($idequipo);
	
	$cad = '';
	while ($roww = mysql_fetch_array($res)) {
		$cad = $cad.'<option value="'.$roww[0].'">'.utf8_encode($roww[1]).' - '.$roww[2].'</td>';	
	}
	echo $cad;
		
}



function insertarGoleadores($serviciosJugadores) {
	$refequipo 	= $_POST['refequipo'];
	$reffixture = $_POST['reffixture'];
	$goles 		= $_POST['goles'];
	$refjugador = $_POST['refjugador'];

	$res = $serviciosJugadores->insertarGoleadores($refequipo,$reffixture,$goles,$refjugador);

	if ((integer)$res > 0) {
		echo '';
	} else {
		echo 'Huvo un error al insertar datos';
	}
}

function modificarGoleadores($serviciosJugadores) {
	$id 		= $_POST['id'];
	$refequipo 	= $_POST['refequipo'];
	$reffixture = $_POST['reffixture'];
	$goles 		= $_POST['goles'];
	$refjugador = $_POST['refjugador'];
	
	$res = $serviciosJugadores->modificarGoleadores($id,$refequipo,$reffixture,$goles,$refjugador);

	if ($res == true) {
		echo '';
	} else {
		echo 'Huvo un error al modificar datos';
	}
}

function eliminarGoleadores($serviciosJugadores) {
$id = $_POST['id'];
$res = $serviciosJugadores->eliminarGoleadores($id);
echo $res;
} 




function insertarAmonestados($serviciosJugadores) {
	$refjugador = $_POST['refjugador'];
	$refequipo 	= $_POST['refequipo'];
	$reffixture = $_POST['reffixture'];
	$amarillas 	= $_POST['amarillas'];
	
	$res = $serviciosJugadores->insertarAmonestados($refjugador,$refequipo,$reffixture,$amarillas);
	if ((integer)$res > 0) {
		echo '';
	} else {
		echo 'Huvo un error al insertar datos';
	}
}
function modificarAmonestados($serviciosJugadores) {
	$id 		= $_POST['id'];
	$refjugador = $_POST['refjugador'];
	$refequipo	 = $_POST['refequipo'];
	$reffixture = $_POST['reffixture'];
	$amarillas 	= $_POST['amarillas'];
	
	$res = $serviciosJugadores->modificarAmonestados($id,$refjugador,$refequipo,$reffixture,$amarillas);
	if ($res == true) {
		echo '';
	} else {
		echo 'Huvo un error al modificar datos';
	}
}
function eliminarAmonestados($serviciosJugadores) {
$id = $_POST['id'];
$res = $serviciosJugadores->eliminarAmonestados($id);
echo $res;
}


function insertarEstadistica($serviciosJugadores) {
	$refjugador = $_POST['refjugador'];
	$refequipo 	= $_POST['refequipo'];
	$reffixture = $_POST['reffixture'];
	$amarillas 	= $_POST['amarillas'];
	$goles 		= $_POST['goles'];
	
	if (($goles != '') || ($goles != 0)) {
		$res2 = $serviciosJugadores->insertarGoleadores($refequipo,$reffixture,$goles,$refjugador);
	}
			
	if (($amarillas != '') || ($amarillas != 0)) {
		$res  = $serviciosJugadores->insertarAmonestados($refjugador,$refequipo,$reffixture,$amarillas);
	}	
	
	return '';
	
}



function insertarSuspendidos($serviciosSuspendidos,$serviciosFunciones) {
	$refjugador = $_POST['refjugador'];
	$refequipo = $_POST['refequipo'];
	$motivos = str_replace("'",'',trim($_POST['motivos']));
	$cantidadfechas = $_POST['cantidadfechas'];
	$fechacreacion = date('Y-m-d');
	$reffixture = $_POST['reffixture'];
	
	
	
	
	$res = $serviciosSuspendidos->insertarSuspendidos($refequipo,$refjugador,$motivos,$cantidadfechas,$fechacreacion,$reffixture);
	if ((integer)$res > 0) {
		$resFechas = $serviciosFunciones->TraerFecha();
		$cad = 'fecha';
		while ($rowFS = mysql_fetch_array($resFechas)) {
			if (isset($_POST[$cad.$rowFS[0]])) {
				$serviciosFunciones->insertarSuspendidosFechas($refjugador,$refequipo,$rowFS[0],$res);
			}
		}
		echo '';
	} else {
		echo 'Huvo un error al insertar datos';
	}
}
function modificarSuspendidos($serviciosSuspendidos,$serviciosFunciones) {
	$id = $_POST['id'];
	$refjugador = $_POST['refjugador'];
	$refequipo = $_POST['refequipo'];
	$motivos = str_replace("'",'',trim($_POST['motivos']));
	$cantidadfechas = $_POST['cantidadfechas'];
	$fechacreacion = date('Y-m-d');
	$reffixture = $_POST['reffixture'];
	
	$res = $serviciosSuspendidos->modificarSuspendidos($id,$refequipo,$refjugador,$motivos,$cantidadfechas,$fechacreacion,$reffixture);
	
	
	
	if ($res == true) {
		$serviciosFunciones->eliminarSuspendidosFechas($refjugador,$refequipo);
			$resFechas = $serviciosFunciones->TraerFecha();
			$cad = 'fecha';
			while ($rowFS = mysql_fetch_array($resFechas)) {
				if (isset($_POST[$cad.$rowFS[0]])) {
					$serviciosFunciones->insertarSuspendidosFechas($refjugador,$refequipo,$rowFS[0],$id);
				}
			}
		echo '';
	} else {
		echo 'Huvo un error al modificar datos';
	}
}
function eliminarSuspendidos($serviciosSuspendidos) {
	$id = $_POST['id'];
	
	$res = $serviciosSuspendidos->eliminarSuspendidos($id);
	echo $res;
} 

/* fin jugadores */


/* para los zonas */
function insertarGrupo($serviciosGrupos) {
$Nombre = $_POST['nombre'];
$res = $serviciosGrupos->insertarGrupos($Nombre);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarGrupos($serviciosGrupos) {
	$id = $_POST['id'];
	$Nombre = $_POST['nombre'];
	
	$res = $serviciosGrupos->modificarGrupos($id,$Nombre);
	if ($res == true) {
		echo '';
	} else {
		echo 'Huvo un error al modificar datos';
	}
}
function eliminarGrupos($serviciosGrupos) {
$id = $_POST['id'];
$res = $serviciosGrupos->eliminarGrupos($id);
echo $res;
} 
/* fin zonas */


/* para los torneo-zonas-equipos */

/* PARA Reemplazos */
function insertarReemplazos($serviciosReemplazos) {
	$refequipo 				= $_POST['refequipo'];
	$refequiporeemplazado 	= $_POST['refequiporeemplazado'];
	$puntos 				= $_POST['puntos'];
	$golesencontra 			= $_POST['golesencontra'];
	$reffecha 				= $_POST['reffecha'];
	$reftorneo 				= $_POST['reftorneo'];
	$ptsfairplay			= $_POST['fairplay'];
	
	$res = $serviciosReemplazos->insertarReemplazos($refequipo,$refequiporeemplazado,$puntos,$golesencontra,$reffecha,$reftorneo,$ptsfairplay);
	
	if ((integer)$res > 0) {
		echo '';
	} else {
		echo 'Huvo un error al insertar datos';
	}
}
function modificarReemplazos($serviciosReemplazos) {
	$id 					= $_POST['id'];
	$refequipo 				= $_POST['refequipo'];
	$refequiporeemplazado 	= $_POST['refequiporeemplazado'];
	$puntos 				= $_POST['puntos'];
	$golesencontra 			= $_POST['golesencontra'];
	$reffecha 				= $_POST['reffecha'];
	$reftorneo 				= $_POST['reftorneo'];
	
	$res = $serviciosReemplazos->modificarReemplazos($id,$refequipo,$refequiporeemplazado,$puntos,$golesencontra,$reffecha,$reftorneo);
	
	if ($res == true) {
		echo '';
	} else {
		echo 'Huvo un error al modificar datos';
	}
}

function eliminarReemplazos($serviciosReemplazos) {
	$id = $_POST['id'];
	$res = $serviciosReemplazos->eliminarReemplazos($id);
	echo $res;
}

/* Fin */ 


function modificarFixtureChequeado($serviciosZonasEquipos) {
	$id = $_POST['id'];
	
	$chequeado = $_POST['chequeado'];
	
	$res = $serviciosZonasEquipos->modificarFixtureChequeado($id,$chequeado);
	
	if ($res == true) {
		echo '';
	} else {
		echo 'Huvo un error al modificar datos';
	}	
}

function insertarZonasEquipos($serviciosZonasEquipos) {
	$refgrupo 		= $_POST['refgrupo'];
	$reftorneo 		= $_POST['reftorneo'];
	$refequipo 		= $_POST['refequipo'];
	$prioridad	 	= $_POST['prioridad'];
	
	
	$res = $serviciosZonasEquipos->insertarZonasEquipos($refgrupo,$reftorneo,$refequipo,$prioridad);
	if ((integer)$res > 0) {
		
		for ($i=1;$i<=4;$i++) {
			$serviciosZonasEquipos->insertarHorariosEquiposPrioridades($res,$_POST['idhorario'.$i],$_POST['horario'.$i]);
		}
		
		echo '';
	} else {
		echo 'Huvo un error al insertar datos';
	}
}


function modificarZonasEquipos($serviciosZonasEquipos) {
	
	$id 		= $_POST['id'];
	$refgrupo 	= $_POST['refgrupo'];
	$reftorneo 	= $_POST['reftorneo'];
	$refequipo 	= $_POST['refequipo'];
	$prioridad 	= $_POST['prioridad'];
	
	$res = $serviciosZonasEquipos->modificarZonasEquipos($id,$refgrupo,$reftorneo,$refequipo,$prioridad);
	for ($i=1;$i<=4;$i++) {
			$serviciosZonasEquipos->modificarHorariosEquiposPrioridades($_POST['idtp'.$i],$_POST['idhorario'.$i],$_POST['horario'.$i]);
		}
	if ($res == true) {
		echo '';
	} else {
		echo 'Huvo un error al modificar datos';
	}
}


function eliminarZonasEquipos($serviciosZonasEquipos) {
$id = $_POST['id'];
$res = $serviciosZonasEquipos->eliminarZonasEquipos($id);
echo $res;
} 


function TraerZonaPorTorneoEquipo($serviciosZonasEquipos,$serviciosDatos) {

	$refequipo 		= $_POST['refequipo'];
	$reffecha		= $_POST['reffecha'];
	
	$res = $serviciosZonasEquipos->TraerZonaPorTorneoEquipo($refequipo);
	
	$idequipo = 0;
	$nombre = '';
	$pts = 0;
	$ptsfp = 0;
	$golesc = 0;
	
	if (mysql_num_rows($res)>0) {
		$idzona = mysql_result($res,0,0);
		$reftorneo = mysql_result($res,0,2);
		$res2 = $serviciosDatos->TraerFixturePorZonaTorneo($reftorneo,$idzona,$reffecha);
		
		while ($row = mysql_fetch_array($res2)) {
			if ($row['equipoactivo'] != 1) {
			$idequipo = $row['idequipo'];
			$nombre = utf8_encode($row['nombre']);
			$pts = $row['pts'];
			$ptsfp = $row['puntos'];
			$golesc = $row['golesencontra'];
			}
		}
	}
///	$datos = array('nombre'=>$nombre,'idequipo'=>$idequipo,'pts'=>$pts,'ptsfp'=>$ptsfp,'golesc'=>$golesc);
	$datos = array($nombre,$idequipo,$pts,$ptsfp,$golesc);
	echo json_encode($datos);
}


function reemplazarEquipos($serviciosZonasEquipos) {
	$equipoReemplazado		=	$_POST['refequipor'];
	$equipoAReemplazado		=	$_POST['refequiporr'];
	$pts					=	$_POST['puntos'];
	$golesencontra			=	$_POST['golesec'];
	$ptsfairplay			=	$_POST['puntosfp'];
	$reffecha				=	$_POST['reffechar'];
	
	$res = $serviciosZonasEquipos->reemplazarEquipos($equipoReemplazado,$equipoAReemplazado,$pts,$golesencontra,$ptsfairplay,$reffecha);
	if ((integer)$res > 0) {
		echo '';
	} else {
		echo 'Huvo un error al insertar datos';
	}
}


function chequearPorFecha($serviciosZonasEquipos) {
	$reffecha		=	$_POST['reffecha'];	
	
	$res = $serviciosZonasEquipos->chequearPorFecha($reffecha);
	if ((integer)$res > 0) {
		echo '';
	} else {
		echo 'Huvo un error al chequear los datos';
	}
}

function cargarTablaConducta($serviciosZonasEquipos) {
	$reffecha		=	$_POST['reffecha'];	
	
	$res = $serviciosZonasEquipos->cargarTablaConducta($reffecha);
	if ((integer)$res > 0) {
		echo '';
	} else {
		echo 'Huvo un error al chequear los datos';
	}
}

function calcularTablaConducta($serviciosZonasEquipos) {
	$reffecha		=	$_POST['reffecha'];	
	$reftorneo		=	$_POST['reftorneo'];	
	$refzona		=	$_POST['refzona'];
	
	$serviciosZonasEquipos->borrarTablaConducta($reffecha,$reftorneo,$refzona);

	
	$res = $serviciosZonasEquipos->calcularTablaConducta($reffecha);
	//echo $res;
	
	if ((integer)$res > 0) {
		echo '';
	} else {
		echo 'Huvo un error al chequear los datos';
	}
}

/* fin torneo-zonas-equipos */


/* para los fixture */


function insertarFixture($serviciosZonasEquipos) {
	$reftorneoge_a 	= $_POST['reftorneoge_a'];
	$resultado_a 	= $_POST['resultado_a'];
	$reftorneoge_b 	= $_POST['reftorneoge_b'];
	$resultado_b 	= $_POST['resultado_b'];
	$fechajuego 	= $_POST['fechajuego'];
	$refFecha 		= $_POST['reffecha'];
	$cancha 		= $_POST['cancha'];
	$horario 		= $_POST['hora'];
	
	$res = $serviciosZonasEquipos->insertarFixture($reftorneoge_a,$resultado_a,$reftorneoge_b,$resultado_b,$fechajuego,$refFecha,$cancha,$horario);
	
	if ((integer)$res > 0) {
		echo '';
	} else {
		echo 'Huvo un error al insertar datos';
	}
}


function modificarFixture($serviciosZonasEquipos) {
	$id 			= $_POST['id'];
	$reftorneoge_a 	= $_POST['reftorneoge_a'];
	$resultado_a 	= $_POST['resultado_a'];
	$reftorneoge_b 	= $_POST['reftorneoge_b'];
	$resultado_b 	= $_POST['resultado_b'];
	$fechajuego 	= $_POST['fechajuego'];
	$refFecha 		= $_POST['reffecha'];
	$cancha 		= $_POST['cancha'];
	$horario 		= $_POST['hora'];
	if (isset($_POST['chequeado'])) {
		$chequeado = 1;
	} else {
		$chequeado = 0;
	}

	$res = $serviciosZonasEquipos->modificarFixtureTodo($id,$reftorneoge_a,$resultado_a,$reftorneoge_b,$resultado_b,$fechajuego,$refFecha,$cancha,$horario,$chequeado);
	if ($res == true) {
		echo '';
	} else {
		echo 'Huvo un error al modificar datos';
	}
} 


function eliminarFixture($serviciosZonasEquipos) {
$id = $_POST['id'];
$res = $serviciosZonasEquipos->eliminarFixture($id);
echo $res;
} 


function traerFixturePorEquipo($serviciosZonasEquipos) {
	$idequipo		=	$_POST['refequipo'];
	
	$res4 = $serviciosZonasEquipos->traerFixturePorEquipo($idequipo);
	

	$cad = '';
	while ($row4 = mysql_fetch_array($res4)) {
		$cad = $cad.'<option value="'.$row4[0].'">'.$row4[7].' - '.$row4[8].'</td>';	
	}
	echo $cad;
		
}
/* fin fixture */
	
	
/* PARA Pagos */
function insertarPagos($serviciosPagos) {
	$refequipo = $_POST['refequipo'];
	$reftorneo = $_POST['reftorneo'];
	$refzona = $_POST['refzona'];
	$reffecha = $_POST['reffecha'];
	$importe = $_POST['importe'];
	$observacion = $_POST['observacion'];
	$fechacreacion = $_POST['fechacreacion'];
	
	$res = $serviciosPagos->insertarPagos($refequipo,$reftorneo,$refzona,$reffecha,$importe,$observacion,$fechacreacion);
	
	if ((integer)$res > 0) {
		echo '';
	} else {
		echo 'Huvo un error al insertar datos';
	}
}

function modificarPagos($serviciosPagos) {
	$id = $_POST['id'];
	$refequipo = $_POST['refequipo'];
	$reftorneo = $_POST['reftorneo'];
	$refzona = $_POST['refzona'];
	$reffecha = $_POST['reffecha'];
	$importe = $_POST['importe'];
	$observacion = $_POST['observacion'];
	$fechacreacion = $_POST['fechacreacion'];
	
	$res = $serviciosPagos->modificarPagos($id,$refequipo,$reftorneo,$refzona,$reffecha,$importe,$observacion,$fechacreacion);
	
	if ($res == true) {
		echo '';
	} else {
		echo 'Huvo un error al modificar datos';
	}
}

function eliminarPagos($serviciosPagos) {
	$id = $_POST['id'];
	$res = $serviciosPagos->eliminarPagos($id);
	echo $res;
}

/* Fin */ 
	
function modificarCliente($serviciosUsuarios) {
	$email		=	$_POST['email'];
	$password	=	$_POST['password'];
	$direccion	=	$_POST['direccion'];
	$nombre		=	$_POST['nombre'];
	$apellido	=	$_POST['apellido'];
	$id			=	$_POST['id'];
	
	echo $serviciosUsuarios->modificarUsuario($id,$apellido,$password,'',$email,$nombre,'',$direccion,'','','','');
}

function entrar($serviciosUsuarios) {
	$email		=	$_POST['email'];
	$pass		=	$_POST['pass'];
	echo $serviciosUsuarios->loginUsuario($email,$pass);
}


function registrar($serviciosUsuarios) {
	$apellido			=	$_POST['apellido'];
	$password			=	$_POST['password'];
	$refroll			=	2;
	$email				=	$_POST['email'];
	$nombre				=	$_POST['nombre'];
	$telefono			=	'';
	$direccion			=	$_POST['direccion'];
	$imagen				=	'';
	$mime				=	'';
	$carpeta			=	'';
	$intentoserroneos	=	0;
	$res = $serviciosUsuarios->insertarUsuario($apellido,$password,$refroll,$email,$nombre,$telefono,$direccion,$imagen,$mime,$carpeta,$intentoserroneos);
	if ((integer)$res > 0) {
		echo '';	
	} else {
		echo $res;	
	}
}


function insertarUsuario($serviciosUsuarios) {
	$apellido			=	$_POST['apellido'];
	$password			=	$_POST['password'];
	$refroll			=	2;
	$email				=	$_POST['email'];
	$nombre				=	$_POST['nombre'];
	$telefono			=	'';
	$direccion			=	$_POST['direccion'];
	$imagen				=	'';
	$mime				=	'';
	$carpeta			=	'';
	$intentoserroneos	=	0;
	echo $serviciosUsuarios->insertarUsuario($apellido,$password,$refroll,$email,$nombre,$telefono,$direccion,$imagen,$mime,$carpeta,$intentoserroneos);
}


function modificarUsuario($serviciosUsuarios) {
	$id					=	$_POST['id'];
	$apellido			=	$_POST['apellido'];
	$password			=	$_POST['password'];
	$refroll			=	2;
	$email				=	$_POST['email'];
	$nombre				=	$_POST['nombre'];
	$telefono			=	'';
	$direccion			=	$_POST['direccion'];
	$imagen				=	'';
	$mime				=	'';
	$carpeta			=	'';
	$intentoserroneos	=	0;
	echo $serviciosUsuarios->modificarUsuario($id,$apellido,$password,$refroll,$email,$nombre,$telefono,$direccion,$imagen,$mime,$carpeta,$intentoserroneos);
}


function enviarMail($serviciosUsuarios) {
	$email		=	$_POST['email'];
	$pass		=	$_POST['pass'];
	$torneo		=	$_POST['reftorneo'];
	
	echo $serviciosUsuarios->login($email,$pass,$torneo);
}


function devolverImagen($nroInput) {
	
	if( $_FILES['archivo'.$nroInput]['name'] != null && $_FILES['archivo'.$nroInput]['size'] > 0 ){
	// Nivel de errores
	  error_reporting(E_ALL);
	  $altura = 100;
	  // Constantes
	  # Altura de el thumbnail en píxeles
	  //define("ALTURA", 100);
	  # Nombre del archivo temporal del thumbnail
	  //define("NAMETHUMB", "/tmp/thumbtemp"); //Esto en servidores Linux, en Windows podría ser:
	  //define("NAMETHUMB", "c:/windows/temp/thumbtemp"); //y te olvidas de los problemas de permisos
	  $NAMETHUMB = "c:/windows/temp/thumbtemp";
	  # Servidor de base de datos
	  //define("DBHOST", "localhost");
	  # nombre de la base de datos
	  //define("DBNAME", "portalinmobiliario");
	  # Usuario de base de datos
	  //define("DBUSER", "root");
	  # Password de base de datos
	  //define("DBPASSWORD", "");
	  // Mime types permitidos
	  $mimetypes = array("image/jpeg", "image/pjpeg", "image/gif", "image/png");
	  // Variables de la foto
	  $name = $_FILES["archivo".$nroInput]["name"];
	  $type = $_FILES["archivo".$nroInput]["type"];
	  $tmp_name = $_FILES["archivo".$nroInput]["tmp_name"];
	  $size = $_FILES["archivo".$nroInput]["size"];
	  // Verificamos si el archivo es una imagen válida
	  if(!in_array($type, $mimetypes))
		die("El archivo que subiste no es una imagen válida");
	  // Creando el thumbnail
	  switch($type) {
		case $mimetypes[0]:
		case $mimetypes[1]:
		  $img = imagecreatefromjpeg($tmp_name);
		  break;
		case $mimetypes[2]:
		  $img = imagecreatefromgif($tmp_name);
		  break;
		case $mimetypes[3]:
		  $img = imagecreatefrompng($tmp_name);
		  break;
	  }
	  
	  $datos = getimagesize($tmp_name);
	  
	  $ratio = ($datos[1]/$altura);
	  $ancho = round($datos[0]/$ratio);
	  $thumb = imagecreatetruecolor($ancho, $altura);
	  imagecopyresized($thumb, $img, 0, 0, 0, 0, $ancho, $altura, $datos[0], $datos[1]);
	  switch($type) {
		case $mimetypes[0]:
		case $mimetypes[1]:
		  imagejpeg($thumb, $NAMETHUMB);
			  break;
		case $mimetypes[2]:
		  imagegif($thumb, $NAMETHUMB);
		  break;
		case $mimetypes[3]:
		  imagepng($thumb, $NAMETHUMB);
		  break;
	  }
	  // Extrae los contenidos de las fotos
	  # contenido de la foto original
	  $fp = fopen($tmp_name, "rb");
	  $tfoto = fread($fp, filesize($tmp_name));
	  $tfoto = addslashes($tfoto);
	  fclose($fp);
	  # contenido del thumbnail
	  $fp = fopen($NAMETHUMB, "rb");
	  $tthumb = fread($fp, filesize($NAMETHUMB));
	  $tthumb = addslashes($tthumb);
	  fclose($fp);
	  // Borra archivos temporales si es que existen
	  //@unlink($tmp_name);
	  //@unlink(NAMETHUMB);
	} else {
		$tfoto = '';
		$type = '';
	}
	$tfoto = utf8_decode($tfoto);
	return array('tfoto' => $tfoto, 'type' => $type);	
}

function contacto($serviciosUsuarios) {
	$nombre		=	$_POST['nombre'];
	$email		=	$_POST['email'];
	$mensaje	=	$_POST['mensaje'];
	
	echo $serviciosUsuarios->contacto($nombre, $email, $mensaje);	
}



/////////* PARA EL HISTORIAL *////////////////////////////////////////

function TraerFixturePorZonaTorneoHistorial($serviciosHistorial) {
	
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$zona		= $_POST['zona'];
	$idfecha	= $_POST['reffecha'];
	$res2 = $serviciosHistorial->TraerFixturePorZonaTorneo($idtorneo,$idzona,$idfecha);
	
	$cad2 = '';
	$cad2 = $cad2.'
				<!--<div class="col-md-8">-->
				<div class="panel panel-predio">
                                <div class="panel-heading">
                                	<h3 class="panel-title">'.$zona.'</h3>
                                	<img src="imagenes/logo2-chico.png" style="float:right;margin-top:-21px; width:26px; height:24px;">
                                </div>
                                <div class="panel-body-predio" style="padding:5px 20px;">
                                	';
	$cad2 = $cad2.'
	<div class="row">
                	<table class="table table-responsive table-striped" style="font-size:1em; padding:0px;">

                        <thead>
							<tr>
								<th align="center">POS.</th>
								<th align="center">EQUIPO</th>
								<th align="center">PTS</th>
								<th align="center">PJ</th>
								<th align="center">PG</th>
								<th align="center">PE</th>
								<th align="center">PP</th>
								<th align="center">GF</th>
								<th align="center">GC</th>
								<th align="center">DIF</th>
								<th align="center">F.P.</th>
								<th align="center">% Goles</th>
								<th align="center">EFECT.</th>
								<th align="center"><img src="imagenes/icoRoja.png"></th>
                            	<th align="center"><img src="imagenes/icoAmarilla.png"></th>
							</tr>
						</thead>
						<tbody>';

						$i =1;
						$puntos = 0;
						while ($row1 = mysql_fetch_array($res2)) {
						
							
							if (($row1['reemplzado'] == '0') || (($row1['volvio'] == '1') && ($row1['reemplzadovolvio'] == '1'))) {	
							$cad2 = $cad2.'
							<tr>
								<td align="center">'.$i.'</td>
								<td align="left"><a href="equipo.php?eq='.$row1['idequipo'].'">'.utf8_encode($row1['nombre']).'</a></td>
								<td align="center">'.$row1['pts'].'</td>
								<td align="center">'.$row1['partidos'].'</td>
								<td align="center">'.$row1['ganados'].'</td>
								<td align="center">'.$row1['empatados'].'</td>
								<td align="center">'.$row1['perdidos'].'</td>
								<td align="center">'.$row1['golesafavor'].'</td>
								<td align="center">'.$row1['golesencontra'].'</td>
								<td align="center">'.$row1['diferencia'].'</td>
								<td align="center">'.$row1['puntos'].'</td>
								<td align="center">'.$row1['porcentajegoles'].'%</td>
								<td align="center">'.$row1['efectividad'].'%</td>
								<td align="center">'.$row1['rojas'].'</td>
								<td align="center">'.$row1['amarillas'].'</td>
							</tr>';
					
							$i = $i + 1;
							}
						}
                    $cad2 = $cad2.'</tbody>
                                </table>
								</div>
								</div>
                            </div>
						<!--</div>-->';
	echo $cad2;
}


function FixturePaginaChicoDosHistorial($serviciosHistorial, $serviciosDatos) {
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$idfecha	= $_POST['reffecha'];
	$zona		= $_POST['zona'];
	$cad = '';
	
	if ($idfecha == 23) {
		$menos = 0;	
	} else {
		$menos = 0;	
	}
	
	for ($i=$idfecha;$i>=$idfecha-$menos;$i--) {
		$cad = $cad.'
				<!--<div class="col-md-4">-->
				<div class="panel panel-predio" style="margin-top:0;">
                                <div class="panel-heading">
                                	<h3 class="panel-title">'.mysql_result($serviciosDatos->TraerFechaPorId($i),0,1).'</h3>
                                	<img src="imagenes/logo2-chico.png" style="float:right; margin-top:-21px; width:26px; height:24px;">
                                </div>
                                <div class="panel-body-predio" style="padding-bottom:0px;">
                                	';
									
		$res = $serviciosHistorial->traerResultadosPorTorneoZonaFecha($idtorneo,$idzona,$i);
		
		$cad = $cad.'<table class="table table-responsive table-striped" style="font-size:0.9em; padding:0 2px;">
                                	
                                	<thead>
                                    	<tr>
                                        	<th style="text-align:center;padding:3px;"></th>
                                            <th style="text-align:center;padding:3px;">Equipo A</th>
                                            <th style="text-align:center;padding:3px;">Horario</th>
                                            <th style="text-align:center;padding:3px;">Equipo B</th>
                                            <th style="text-align:center;padding:3px;"></th>
                                            <th style="text-align:center;padding:3px;">Ver</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
	
                        while ($row = mysql_fetch_array($res)) {
                        	$cad = $cad.'<tr>
                        	<td align="center" id="resA'.$row['idfixture'].'" style="padding:3px;">'.$row['resultadoa'].'</td>
                            <td align="center" id="equipoA'.$row['idfixture'].'" style="padding:3px;">'.(utf8_encode($row['equipo1'])).'</td>
                            <td align="center" style="padding:3px;">'.$row['hora']."/".$row['cancha'].'</td>
                            <td align="center" id="equipoB'.$row['idfixture'].'" style="padding:3px;">'.(utf8_encode($row['equipo2'])).'</td>
                            <td align="center" id="resB'.$row['idfixture'].'" style="padding:3px;">'.$row['resultadob'].'</td>
							<td style="padding:3px;"><img src="imagenes/verIco2.png" style="cursor:pointer;" id="'.$row['idfixture'].'" class="varModificar" data-target="#dialogModificar" data-toggle="modal"></td>
                        </tr>';
                    	}
													
        $cad = $cad.'</tbody>
                                </table></div>
                            </div>
						<!--</div>-->';	
		
		
	}


	echo $cad;
}



function GoleadoresHistorial($serviciosHistorial) {
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$zona		= $_POST['zona'];
	$idfecha	= $_POST['reffecha'];
	
	$res3 = $serviciosHistorial->Goleadores($idtorneo,$idzona,$idfecha);
	$cad3 = '';
	$cad3 = $cad3.'
				<!--<div class="col-md-12">-->
				<div class="panel panel-predio">
                                <div class="panel-heading">
                                	<h3 class="panel-title">'.$zona.' - Goleadores</h3>
                                	<img src="imagenes/logo2-chico.png" style="float:right;margin-top:-21px; width:26px; height:24px;">
                                </div>
                                <div class="panel-body-predio" style="padding:5px 20px;">
                                	';
	$cad3 = $cad3.'
	<div class="row">
                	<table class="table table-responsive table-striped" style="font-size:0.9em; padding:2px;">
						<thead>
                        <tr>
                        	<th align="left">Nombre y Apellido</th>
                            <th align="left">Equipo</th>
                            <th align="center">Goles</th>
                        </tr>
						</thead>
						<tbody>';
                        
						$i =1;
						while ($row1 = mysql_fetch_array($res3)) {
						if (($row1['reemplzado'] == '0') || (($row1['volvio'] == '1') && ($row1['reemplzadovolvio'] == '1'))) {	
                        $cad3 = $cad3.'<tr>
                            <td align="left" style="padding:1px;">'.strtoupper(($row1['apyn'])).'</td>
                            <td align="left" style="padding:1px;"><a href="equipo.php?eq='.$row1['refequipo'].'">'.strtoupper(utf8_encode($row1['nombre'] )).'</a></td>
                            <td align="center" style="padding:1px;">'.$row1['cantidad'].'</td>
 
                        </tr>';
         
						$i = $i + 1;
						}
						}
                    $cad3 = $cad3.'</tbody>
                                </table>
								</div>
								</div>
                            </div>
						<!--</div>-->';
	echo $cad3;
}


function AmarillasAcumuladasHistorial($serviciosHistorial) {
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$zona		= $_POST['zona'];
	$idfecha	= $_POST['reffecha'];
	
	$res3 = $serviciosHistorial->traerAcumuladosAmarillasPorTorneoZona($idtorneo,$idzona,$idfecha);
	$cad3 = '';
	$cad3 = $cad3.'
				<!--<div class="col-md-12">-->
				<div class="panel panel-predio">
                                <div class="panel-heading">
                                	<h3 class="panel-title">'.$zona.' - Amarillas</h3>
                                	<img src="imagenes/logo2-chico.png" style="float:right;margin-top:-21px; width:26px; height:24px;">
                                </div>
                                <div class="panel-body-predio" style="padding:5px 20px;">
                                	';
	$cad3 = $cad3.'
	<div class="row">
                	<table class="table table-responsive table-striped" style="font-size:0.9em; padding:2px;">
						<thead>
                        <tr>
                        	<th align="left">Nombre y Apellido</th>
                            <th align="left">Equipo</th>
                            <th align="center">Amarillas</th>
                        </tr>
						</thead>
						<tbody>';
                        
						$i =1;
						while ($row1 = mysql_fetch_array($res3)) {
							if (($row1['reemplzado'] == '0') || (($row1['volvio'] == '1') && ($row1['reemplzadovolvio'] == '1'))) {	
                        	$cad3 = $cad3.'<tr>
                            <td align="left" style="padding:1px;">'.strtoupper(($row1['apyn'])).'</td>
                            <td align="left" style="padding:1px;"><a href="equipo.php?eq='.$row1['refequipo'].'">'.($row1['nombre']).'</a></td>
                            <td align="center" style="padding:1px;">'.$row1['cantidad'].'</td>
 
                        </tr>';
         
							$i = $i + 1;
							}
						}
                    $cad3 = $cad3.'</tbody>
                                </table>
								</div>
								</div>
                            </div>
						<!--</div>-->';
	echo $cad3;
}





function SuspendidosHistorial($serviciosHistorial) {
	$idtorneo	= $_POST['reftorneo'];
	$idzona		= $_POST['refzona'];
	$idfecha	= $_POST['reffecha'];
	$zona		= $_POST['zona'];
	
	$res4 = $serviciosHistorial->SuspendidosNuevo($idtorneo,$idzona,$idfecha);
	
	$res5 = $serviciosHistorial->SuspendidosPorSiempre($idtorneo,$idzona,$idfecha);
	$cad3 = '';
	$cad3 = $cad3.'
				<!--<div class="col-md-12">-->
				<div class="panel panel-predio">
                                <div class="panel-heading">
                                	<h3 class="panel-title">'.$zona.' - Suspendidos</h3>
                                	<img src="imagenes/logo2-chico.png" style="float:right;margin-top:-21px; width:26px; height:24px;">
                                </div>
                                <div class="panel-body-predio" style="padding:5px 20px;">
                                	';
	$cad3 = $cad3.'
	<div class="row">
                	<table class="table table-responsive table-striped" style="font-size:0.9em; padding:2px;">
						<thead>
                        <tr>
                        	<th align="left">Nombre y Apellido</th>
                            <th align="left">Equipo</th>
                            <th align="center">Amarillas</th>
							<th align="center">Cant.Fechas</th>
                        </tr>
						</thead>
						<tbody>';
                        
						$i =1;
						$restantes = 0;
						while ($row1 = mysql_fetch_array($res4)) {
							
							if (($row1['reemplzado'] == '0') || (($row1['volvio'] == '1') && ($row1['reemplzadovolvio'] == '1'))) {	
							$restantes = $serviciosHistorial->traerFechasRestantes($idfecha,$row1['refjugador'],$row1['refequipo'],$row1['refsuspendido']);
							//echo $restantes;
							$restantes = (integer)$row1['cantidad'] - (integer)$restantes;
							if ($restantes != 0) { 
								$cad3 = $cad3.'<tr>
									<td align="left" style="padding:1px;">'.strtoupper(($row1['apyn'])).'</td>
									<td align="left" style="padding:1px;"><a href="equipo.php?eq='.$row1['refequipo'].'">'.($row1['nombre']).'</a></td>
									<td align="left" style="padding:1px;">'.($row1['motivos']).'</td>
									<td align="center" style="padding:1px;">'.$row1['cantidad'].'(Resta '.$restantes.')'.'</td>
								</tr>';
								
								$i = $i + 1;
							}
							}
						}
						
						
						while ($row2 = mysql_fetch_array($res5)) {


								$cad3 = $cad3.'<tr>
									<td align="left" style="padding:1px ;">'.strtoupper(($row2['apyn'])).'</td>
									<td align="left" style="padding:1px ;">'.($row2['nombre']).'</td>
									<td align="left" style="padding:1px ;">'.($row2['motivos']).'</td>
									<td align="center" style="padding:1px ;">Todas</td>
								</tr>';
								
								$i = $i + 1;

						}
                    $cad3 = $cad3.'</tbody>
                                </table>
								</div>
								</div>
                            </div>
						<!--</div>-->';
	echo $cad3;
}
////////////////// FIN DEL HISTORIAL ///////////////////////////////////////////////////////////////////////////////////

?>