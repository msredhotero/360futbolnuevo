<?php

/**
 * @author www.intercambiosvirtuales.org
 * @copyright 2013
 */

//declaracion de funciones
include ('../includes/funciones.php');
include ('../includes/funcionesGrupos.php');
include ('../includes/funcionesEquipos.php');
include ('../includes/funcionesNoticias.php');
include ('../includes/funcionesGruposEquipos.php');
include ('../includes/funcionesRES.php');
include ('../includes/funcionesJugadores.php');
include ('../includes/funcionesEXCEL.php');
include ('../includes/funcionesFUNC.php');

$servicios = new Servicios();
$serviciosG = new ServiciosG();
$serviciosE = new ServiciosE();
$serviciosGE = new ServiciosGE();
$serviciosNOTI = new ServiciosNOTI();
$serviciosRES = new ServiciosRES();
$serviciosJ = new ServiciosJ();
$serviciosEXCEL = new ServiciosEXCEL();
$serviciosFUNC = new ServiciosFUNC();

$accion = $_POST['accion'];
//paca hermoso




switch ($accion) {
    case 'agregarTorneo':
        agregarTorneo($servicios);
        break;
    case 'modificarTorneo':
        modificarTorneo($servicios);
        break;
    case 'eliminarTorneo':
        eliminarTorneo($servicios);
        break;
    case 'agregarGrupo':
        agregarGrupo($serviciosG);
        break;
    case 'agregarEquipo':
        agregarEquipo($serviciosE);
        break;
    case 'modificarEquipo':
        modificarEquipo($serviciosE);
        break;
    case 'eliminarEquipo':
        eliminarEquipo($serviciosE);
        break;
    case 'agregarSeleccion':
        agregarSeleccion($serviciosNOTI);
        break;
    case 'insertarGrupoEquipo':
        insertarGrupoEquipo($serviciosGE);
        break;
    case 'eliminarGrupoEquipo':
        eliminarGrupoEquipo($serviciosGE);
        break;
    case 'agregarFixture':
        agregarFixture($serviciosGE);
        break;
    case 'insertarNoticia':
        insertarNoticia($serviciosNOTI);
        break;
    case 'modificarNoticia':
        modificarNoticia($serviciosNOTI);
        break;
    case 'eliminarNoticia':
        eliminarNoticia($serviciosNOTI);
        break;
    case 'insertarNotiPrinc':
        insertarNotiPrinc($serviciosNOTI);
        break;
    case 'modificarTurnos':
        modificarTurnos($serviciosNOTI);
        break;
    case 'ModificarFechas':
        ModificarFechas($servicios);
        break;
    case 'insertarConducta':
        insertarConducta($serviciosRES);
        break;
    case 'modificarConducta':
        modificarConducta($serviciosRES);
        break;

    case 'modificarConductaPuntos':
        modificarConductaPuntos($serviciosRES);
        break;

    case 'eliminarConducta':
        eliminarConducta($serviciosRES);
        break;
    case 'modificarPremios':
        modificarPremios($serviciosNOTI);
        break;
    case 'modificarReglamento':
        modificarReglamento($serviciosNOTI);
        break;
    case 'modificarServicios':
        modificarServicios($serviciosNOTI);
        break;  
    case 'agregarContacto':
        agregarContacto($servicios);
        break;  
    case 'modificarFixture':
        modificarFixture($serviciosGE);
        break;  
    case 'eliminarFixture':
        eliminarFixture($serviciosGE);
        break;
    case 'modificarInfoEquipo':
        modificarInfoEquipo($serviciosE);
        break; 
    case 'cambiarEquipoPorEquipo':
        cambiarEquipoPorEquipo($serviciosGE);
        break;

    case 'insertarJugador':
        insertarJugador($serviciosJ);
        break;
    case 'modificarJugador':
        modificarJugador($serviciosJ);
        break; 
    case 'eliminarJugador':
        eliminarJugador($serviciosJ);
        break;


    case 'insertarAmonestados':
        insertarAmonestados($serviciosEXCEL);
        break;
    case 'modificarAmonestados':
        modificarAmonestados($serviciosEXCEL);
        break; 
    case 'eliminarAmonestados':
        eliminarAmonestados($serviciosEXCEL);
        break;
    case 'modificarAmonestadosAmarillas':
        modificarAmonestadosAmarillas($serviciosEXCEL);
        break; 

    case 'insertarSuspendidos':
        insertarSuspendidos($serviciosEXCEL);
        break;
    case 'modificarSuspendidos':
        modificarSuspendidos($serviciosEXCEL);
        break; 

    case 'modificarSuspendidosMotivos':
        modificarSuspendidosMotivos($serviciosEXCEL);
        break; 


    case 'eliminarSuspendidos':
        eliminarSuspendidos($serviciosEXCEL);
        break;
    case 'insertarGoleadores':
        insertarGoleadores($serviciosEXCEL);
        break;
    case 'modificarGoleadores':
        modificarGoleadores($serviciosEXCEL);
        break; 
    case 'eliminarGoleadores':
        eliminarGoleadores($serviciosEXCEL);
        break;
    case 'modificarGoleadoresGoles':
        modificarGoleadoresGoles($serviciosEXCEL);
        break;

    case 'modificarFixtureResultados':
        modificarFixtureResultados($serviciosGE);
        break; 

    case 'agregarHorarioPrincipal':
        agregarHorarioPrincipal($serviciosNOTI);
        break;

    case 'TraerCanchaTurnos':
        TraerCanchaTurnos($serviciosNOTI);
        break;

    case 'TraerFixturePorGrupoFechaZona':
        TraerFixturePorGrupoFechaZona($serviciosFUNC);
        break; 

case 'LimpiarTodosTurnos':
        LimpiarTodosTurnos($serviciosNOTI);
        break;

    case 'LimpiarTurnos':
        LimpiarTurnos($serviciosNOTI);
        break;
}

function LimpiarTurnos($serviciosNOTI) {
	$serviciosNOTI->LimpiarTurnos($_POST['cancha']);	
}

function LimpiarTodosTurnos($serviciosNOTI) {
	$serviciosNOTI->LimpiarTodosTurnos();	
}

function agregarTorneo($servicios) {

	$insert = $servicios ->insertTorneo($_POST['nombre']);
	
	//echo "<p>Hola</p>";
	
	$res = $servicios->TraerTorneos();
	if ($insert == 1) {
	echo "
			<table id='itsthetable' width='750' cellpadding='0' cellspacing='0'>
			<caption>Torneos Cargados</caption>
			<thead>
			<tr>
			<th>IdTorneo</th>
			<th>Nombre del Torneo</th>
			<th>Fecha de Creaci&oacute;n</th>
			<th>Activo</th>
			</tr>
			</thead>
			<tbody>";

			while ($row = mysql_fetch_array($res)) {
				echo "<tr>
				<td align='center'>";
				echo $row[0];
				echo "</td>
				<td align='left'>";
				echo $row[1];
				echo "</td>
				<td align='center'>";
				echo $row[2];
				echo "</td>
				<td align='center'>";
				if ($row[3] != 0)
				echo "Si";
				else 
				echo "No";
				echo "</td>
				</tr>";
				
				 } 
				echo
				"</tbody>
				</table>";
			
			} else {
				echo "Error al cargar!!!.";
			}
			
			
			

} // fin de la funcion agregar


function modificarTorneo($servicios) {
	
	if ($_POST['activo'] == "on")
	$activo = 1;
	else
	$activo = 0;
	
	/*
	//para pruebas
	$fechacrea = date('Y-m-d');
	$sql = "update dbtorneos set nombre = '".$_POST['nombre']."', fechacreacion = '".$fechacrea."', activo =".$activo." where idtorneo =".$_POST['idtorneo'];
	echo $sql;
	*/
	
	
	$modificar = $servicios ->modificarTorneo($_POST['nombre'],$activo,$_POST['idtorneo']);
	
	
	//echo "<p>Hola</p>";
	
	$res = $servicios->TraerIdTorneos($_POST['idtorneo']);
	if ($modificar == 1) {
	echo "
			<table id='itsthetable' width='750' cellpadding='0' cellspacing='0'>
			<caption>Torneos Cargados</caption>
			<thead>
			<tr>
			<th>IdTorneo</th>
			<th>Nombre del Torneo</th>
			<th>Fecha de Creaci&oacute;n</th>
			<th>Activo</th>
			</tr>
			</thead>
			<tbody>";
			
			while ($row = mysql_fetch_array($res)) {
			echo "<tr>
			<td align='center'>";
			echo $row[0];
			echo "</td>
			<td align='left'>";
			echo $row[1];
			echo "</td>
			<td align='center'>";
			echo $row[2];
			echo "</td>
			<td align='center'>";
			if ($row[3] != 0)
			echo "Si";
			else 
			echo "No";
			echo "</td>
			</tr>";
			
			 } 
			echo
			"</tbody>
			</table>";
			
			} else {
				echo "Error al modificar!!!.";
			}
	
	
} //fin del modificar







function eliminarTorneo($servicios) {
	
	
	$eliminar = $servicios ->eliminarTorneo($_POST['idtorneo']);
	
	
	//echo "<p>Hola</p>";
	
	$res = $servicios->TraerTorneos();
	if ($eliminar == 1) {
	echo "
			<table id='itsthetable' width='750' cellpadding='0' cellspacing='0'>
			<caption>Torneos Cargados</caption>
			<thead>
			<tr>
			<th>IdTorneo</th>
			<th>Nombre del Torneo</th>
			<th>Fecha de Creaci&oacute;n</th>
			<th>Activo</th>
			</tr>
			</thead>
			<tbody>";
			
			while ($row = mysql_fetch_array($res)) {
			echo "<tr>
			<td align='center'>";
			echo $row[0];
			echo "</td>
			<td align='left'>";
			echo $row[1];
			echo "</td>
			<td align='center'>";
			echo $row[2];
			echo "</td>
			<td align='center'>";
			if ($row[3] != 0)
			echo "Si";
			else 
			echo "No";
			echo "</td>
			</tr>";
			
			 } 
			echo
			"</tbody>
			</table>";
			
			} else {
				echo "Error al eliminar el torneo, ya que esta relacionado con grupos, se perderia informacion!!!.";
			}
	
	
} //fin del modificar


function agregarGrupo($serviciosG) {

	$insert = $serviciosG ->insertarGrupo($_POST['nombre']);
	
	//echo "<p>Hola</p>";
	
	$res = $serviciosG->TraerGrupos();
	
	if ($insert == 1) {
	echo "
			<table id='itsthetable' width='360' cellpadding='0' cellspacing='0'>
			<thead>
			<tr>
			<th width='50'>IdZona</th>
			<th>Nombre de la Zona</th>
			</tr>
			</thead>
			<tbody>
			";

	while ($row = mysql_fetch_array($res)) {

		echo "<tr><td align='center' width='50'>"; 
		echo $row[0];
		echo "</td><td align='center'>";
		echo $row[1];
		echo "</td></tr>";

	}
		echo "</tbody></table>";
			
			} else {
				echo "Error al cargar!!!.";
			}

} // fin de la funcion agregar grupo


function agregarEquipo($serviciosE) {

	$insert = $serviciosE ->insertarEquipo($_POST['equipo'],$_POST['nombre'],$_POST['apellido'],$_POST['mail'],$_POST['tel']);
	
	//echo "<p>Hola</p>";
	
	$res = $serviciosE->TraerEquipos();
	
	if ($insert == 1) {
	echo "
			<table id='itsthetable' width='360' cellpadding='0' cellspacing='0'>
			<caption>Equipos Cargados Nuevos</caption>
			<thead>
			<tr>
			<th>IdEquipos</th>
			<th>Equipos</th>
			</tr>
			</thead>
			<tbody>
			";

	while ($row = mysql_fetch_array($res)) {

		echo "<tr><td align='center' width='50'>"; 
		echo $row[0];
		echo "</td><td align='center'>";
		echo $row[1];
		echo "</td></tr>";

	}
		echo "</tbody></table>";
			
			} else {
				echo "Error al cargar!!!.";
			}

} // fin de la funcion agregar equipos




function modificarEquipo($serviciosE) {

	$insert = $serviciosE ->modificarEquipo($_POST['equipo'],$_POST['id']);
	
	//echo "<p>Hola</p>";
	
	$res = $serviciosE->TraerEquipos();
	
	if ($insert == 1) {
	echo "
			<table id='itsthetable' width='360' cellpadding='0' cellspacing='0'>
			<caption>Equipos Modificado</caption>
			<thead>
			<tr>
			<th>IdEquipos</th>
			<th>Equipos</th>
			</tr>
			</thead>
			<tbody>
			";

	while ($row = mysql_fetch_array($res)) {

		echo "<tr><td align='center' width='50'>"; 
		echo $row[0];
		echo "</td><td align='center'>";
		echo $row[1];
		echo "</td></tr>";

	}
		echo "</tbody></table>";
			
			} else {
				echo "Error al cargar!!!.";
			}

} // fin de la funcion modificar equipos




function agregarSeleccion($serviciosNOTI) {
	
	/*
	$cadNom = "nombre";
	for($i=1;$i<10;$i++) {
		$nombreV = $cadNom + $i;
		if ($_POST[$nombreV] == "") {
			$insertar = 0;
		}
	}
	*/
	$insert = $serviciosNOTI->insertarSeleccion(trim($_POST['nombre1']),trim($_POST['nombre2']),trim($_POST['nombre3']),trim($_POST['nombre4']),trim($_POST['nombre5']),trim($_POST['nombre6']),trim($_POST['nombre7']),trim($_POST['nombre8']),trim($_POST['nombre9']),$_POST['equipo1'],
				$_POST['equipo2'],
				$_POST['equipo3'],
				$_POST['equipo4'],
				$_POST['equipo5'],
				$_POST['equipo6'],
				$_POST['equipo7'],
				$_POST['equipo8'],
				$_POST['equipo9'],
				$_POST['grupo1']);
	
	//echo "<p>Hola</p>";
	//echo $insert;
	
	
	$res = $serviciosNOTI->TraerSeleccionPorZona($_POST['grupo1']);
	
	if ($insert == 1) {
	echo "
			<table id='itsthetable' width='560' cellpadding='0' cellspacing='0'>
			<caption>Jugadores Cargados Nuevos</caption>
			<thead>
			<tr>
			<th>Grupo</th>
			<th>Equipos</th>
			<th>Nombre</th>
			</tr>
			</thead>
			<tbody>
			";


		while ($row = mysql_fetch_array($res)) {
			echo "<tr>
			<td>".$row[1]."</td>
			<td>".$row[2]."</td>
			<td>".$row[3]."</td></tr>";
		}
			
		echo "</tbody></table>";
			
			} else {
				echo "Error al cargar!!!.";
			}

} // fin de la funcion agregar seleccion


function insertarGrupoEquipo($serviciosGE) {
	
	$idgrupo = $_POST['idgrupo'];
	$idequipo = $_POST['idequipo'];
	$idtorneo = $_POST['idtorneo'];
	$list = explode("-",$idequipo);
	$idequipo = $list[0];
	$serviciosE = new ServiciosE();
	$insert = $serviciosGE ->insertarGrupoEquipo($idgrupo,$idequipo,$idtorneo);
	
	
		echo "<ul id'lista2'>";
		$resGEs = $serviciosGE->TraerGruposEquiposId($idgrupo);
			while ($rowGEs = mysql_fetch_array($resGEs))
			{
				echo "<li>".$rowGEs['equiponombre']."</li>";
				
				
			}	
		echo "</ul>";
	
} // fin de la funcion agregar equipos a grupos


function eliminarGrupoEquipo($serviciosGE) {
	
	$idgrupo = $_POST['idgrupo'];
	$idequipo = $_POST['idequipo'];
	$idtorneo = $_POST['idtorneo'];
	$list = explode("-",$idequipo);
	$idequipo = $list[0];
	$serviciosE = new ServiciosE();
	$eliminar = $serviciosGE ->eliminarGrupoEquipo($idgrupo,$idequipo,$idtorneo);
	
	if ($eliminar == 1) {
		
		
		echo '<table width="350" border="0" cellpadding="0" cellspacing="0" height="auto">
				<tr>
				<td>';
		echo "<ul class='grupos'>";
		$resGEs = $serviciosGE->TraerGruposEquiposId($idgrupo);
		echo "<li class='gruposT'>".mysql_result($resGEs,0,'gruponombre');
		echo "</li>";
			while ($rowGEs = mysql_fetch_array($resGEs))
			{
				echo "<li class='gruposf'>".$rowGEs['equiponombre']."</li>";
				
				
			}	
		echo "</ul>";
		echo "<input type='hidden' id='no' value='no'>";
		echo '</td></tr></table>';
		
	} else {
		echo "No se puede borrar este equipo del grupo ya que tiene resultados, vuelva a recargar el navegador";
		echo "<input type='hidden' id='no' value='si'>";
	}
} // fin de la funcion agregar equipos a grupos




function agregarFixture($serviciosGE) {
	
	$idgrupo = $_POST['idgrupo'];
	$idequipoa = $_POST['equipoa'];
	$idequipob = $_POST['equipob'];
	$resultadoa = $_POST['resultadoa'];
	$resultadob = $_POST['resultadob'];
	$idtorneo = $_POST['idtorneo'];
	$fechaj = $_POST['fechaj'];
	$fecha = $_POST['fecha'];
	$hora = $_POST['hora'];
	$minutos = $_POST['minutos'];
	
	
	$error = "";
	
	if ($idequipoa == $idequipob) {
		$error = "<h4>*_Debe seleccionar dos equipos diferentes, actualise el navegador.</h4>";	
	}
	
	if (($resultadoa == "") xor ($resultadob == "")) {
		$error = $error."<h4>*_Si carga el resultado de un equipo tambien del otro, actualise el navegador.</h4>";
	}
	
	if ($fechaj == "") {
		$error = $error."<h4>*_Debe seleccionar alguna fecha de juego, actualise el navegador.</h4>";	
	}
	
	if ($error == "") {
	$list1 = explode("-",$idequipoa);
	$list2 = explode("-",$idequipob);
	
	$idequipoa = $list1[0];
	$idequipob = $list2[0];
	
	$serviciosE = new ServiciosE();
	$insert = $serviciosGE ->agregarFixture($idgrupo,$idequipoa,$idequipob,$resultadoa,$resultadob,$idtorneo,$fecha,$fechaj,$hora,$minutos);
	//echo $insert;
	
	echo '<table width="860" border="1" id="itsthetable" cellpadding="0" cellspacing="0">
			<tr>
			<th width="40" align="center">Hora</th>
			<th align="center">Equipo A</th>
			<th align="center">Resultado A</th>
			<th align="center" width="6"></th>
			<th align="center">Resultado B</th>
			<th align="center">Equipos B</th>
			<th align="center">FechaJuego</th>
			<th align="center">Fecha</th>
			</tr>';
			
		
		$resGEs = $serviciosGE->TraerFixturePorGrupo($idgrupo);
			while ($rowGEs = mysql_fetch_array($resGEs))
			{
				echo "<tr><td width='40'>";
				echo $rowGEs['hora'];
				echo "</td><td>";
				echo $rowGEs[1];
				echo "</td><td align='center'>";
			    echo $rowGEs[2];
				echo "</td><td>-</td><td align='center'>";
			    echo $rowGEs[4]; 
				echo "</td><td>";
				echo $rowGEs[3]; 
				echo "</td><td>";
				echo $rowGEs['fechajuego'];
				echo "</td><td>";
				echo $rowGEs['fecha']; 
				echo "</td></tr>";
				
				
			}	
		     echo "</table>";
	} else {
		echo "<table width='600' border='0' ><tr><td>";
		echo $error;
		echo "</td></tr></table>";
	}
	
	
} // fin de la funcion agregar equipos al fixture




function eliminarNoticia($serviciosNOTI) {
	$idnoticia = $_POST['idnoticia'];
	
	$eliminar = $serviciosNOTI->eliminarNoticia($idnoticia);
	//echo $eliminar;	
	echo "<h3>La noticia fue eliminada con exito!!!.</h3>";
	
}

function insertarNotiPrinc($serviciosNOTI) {
	$campo1 = $_POST['campo1'];
	$campo2 = $_POST['campo2'];
	$campo3 = $_POST['campo3'];
	$campo4 = $_POST['campo4'];
	
	$insertar = $serviciosNOTI->insertarNotiPrinc($campo1,$campo2,$campo3,$campo4);
	
	//echo $eliminar;	
	echo '<table id="itsthetable" width="360" cellpadding="0" cellspacing="0">
			<caption>Nueva noticia principal Cargada</caption>
			<thead>
			<tr>
			<th>Contenido Unido:</th>
			</tr>
			</thead>
			<tbody>';
			echo "<tr><td>";
			echo $campo1." ".$campo2." ".$campo3." ".$campo4;
			echo "</td></tr>";
			echo "</tbody></table>";
}


function modificarTurnos($serviciosNOTI) {

	$campo1 = $_POST['turno1'];
	$campo2 = $_POST['turno2'];
	$campo3 = $_POST['turno3'];
	$campo4 = $_POST['turno4'];
	
	$equipoa1 = $_POST['equipoa1'];
	$equipoa2 = $_POST['equipoa2'];
	$equipoa3 = $_POST['equipoa3'];
	$equipoa4 = $_POST['equipoa4'];
	
	$equipob1 = $_POST['equipob1'];
	$equipob2 = $_POST['equipob2'];
	$equipob3 = $_POST['equipob3'];
	$equipob4 = $_POST['equipob4'];
	
	$cancha = $_POST['cancha'];
	
	$insertar = $serviciosNOTI->modificarTurnos($campo1,$campo2,$campo3,$campo4,$equipoa1,$equipoa2,$equipoa3,$equipoa4,$equipob1,$equipob2,$equipob3,$equipob4,$cancha);
	$res = $serviciosNOTI->TraerTurnos();
	//echo $eliminar;
	
	echo '<table id="itsthetable" width="460" cellpadding="0" cellspacing="0">
			<caption>Nuevos turnos Cargados</caption>
			<tbody>';
			while ($row = mysql_fetch_array($res)) {
			echo '<tr><th align="left">';
			echo $row[1]; 
			echo "</th><td align='center'>";
			echo $row[2];
			echo "</td></tr>";
			}
			echo "</tbody></table>";
			echo $insertar;
}



function ModificarFechas($servicios) {

	$fecha = $_POST['fecha'];
	$resumen = $_POST['desc'];
	
	$insertar = $servicios->ModificarFechas($fecha,$resumen);
	$res = $servicios->TraerFecha();
	//echo $eliminar;
	
	echo '<table id="itsthetable" width="860" cellpadding="0" cellspacing="0">
<caption>Resumenes Cargados</caption>
			<tbody>';
			while ($row = mysql_fetch_array($res)) {
			echo '<tr><th align="left" width="60">';
			echo $row[1]; 
			echo "</th><td align='center'>";
			echo $row[2];
			echo "</td></tr>";
			}
			echo "</tbody></table>";
			
}



function insertarConducta($serviciosRES) {

	$idequipo = $_POST['equipo'];
	$puntos = $_POST['puntos'];
	
	$list1 = explode("-",$idequipo);
	
	$idequipo = $list1[0];

	if ($puntos == "") {
		echo "<h4>Error:* Debe cargar algun dato en los puntos, reinicie el navegador.</h4>";
	} else {
		$insertar = $serviciosRES->insertarConducta($idequipo,$puntos);
		
		
		$res = $serviciosRES->TraerConducta();
		//echo $eliminar;
		
		echo '<table id="itsthetable" width="460" cellpadding="0" cellspacing="0">
				<caption>Resumenes Cargados</caption>
				<tbody><thead>
				<tr>
				<th>Equipo</th>
				<th width="80">Puntos</th>
				</tr>
				</thead>';
				while ($row = mysql_fetch_array($res)) {
				echo '<tr><td align="left">';
				echo $row[2]; 
				echo "</td><td align='center' width='80'>";
				echo $row[3];
				echo "</td></tr>";
				}
				echo "</tbody></table>";
		}	
}




function modificarConducta($serviciosRES) {

	$idequipo = $_POST['equipo'];
	$puntos = $_POST['puntos'];
	$idconducta = $_POST['idconducta'];
	
	$list1 = explode("-",$idequipo);
	
	$idequipo = $list1[0];

	if ($puntos == "") {
		echo "<h4>Error:* Debe cargar algun dato en los puntos, reinicie el navegador.</h4>";
	} else {
		$insertar = $serviciosRES->modificarConducta($idconducta,$idequipo,$puntos);
		
		
		$res = $serviciosRES->TraerIdConducta($idconducta);
		//echo $eliminar;
		
		echo '<table id="itsthetable" width="460" cellpadding="0" cellspacing="0">
				<caption>Resumenes Cargados</caption>
				<tbody><thead>
				<tr>
				<th>Equipo</th>
				<th width="80">Puntos</th>
				</tr>
				</thead>';
				while ($row = mysql_fetch_array($res)) {
				echo '<tr><td align="left">';
				echo $row[2]; 
				echo "</td><td align='center' width='80'>";
				echo $row[3];
				echo "</td></tr>";
				}
				echo "</tbody></table>";
		}	
}



function eliminarConducta($serviciosRES) {

	$idconducta = $_POST['idconducta'];
	
	$insertar = $serviciosRES->eliminarConducta($idconducta);
	
	echo "<h4>Equipo y puntos eliminados correctamente.</h4>";
}




function modificarPremios($serviciosNOTI) {

	$desc = $_POST['desc'];
	
		$modificar = $serviciosNOTI->modificarPremios($desc);
		$insertar  = $serviciosNOTI->insertPremiosBCK($desc);
		
		$res = $serviciosNOTI->TraerPremios();
		//echo $eliminar;
		
		echo '<table id="itsthetable" width="860" cellpadding="0" cellspacing="0">
				<caption>Premios Cargados</caption>
				<tbody><thead>
				</thead>';
				while ($row = mysql_fetch_array($res)) {
				echo '<tr><td>';
				echo $row[1];
				echo "</td></tr>";
				}
				echo "</tbody></table>";
	
}


function modificarReglamento($serviciosNOTI) {

	$desc = $_POST['desc'];
	
		$modificar = $serviciosNOTI->modificarReglamento($desc);
		$insertar  = $serviciosNOTI->insertReglamentoBCK($desc);
		
		$res = $serviciosNOTI->TraerReglamento();
		//echo $eliminar;
		
		echo '<table id="itsthetable" width="860" cellpadding="0" cellspacing="0">
				<caption>Premios Cargados</caption>
				<tbody><thead>
				</thead>';
				while ($row = mysql_fetch_array($res)) {
				echo '<tr><td>';
				echo $row[1];
				echo "</td></tr>";
				}
				echo "</tbody></table>";
	
}



function modificarServicios($serviciosNOTI) {

	$planilleros = $_POST['planilleros'];
	$servmed = $_POST['servmed'];
	$arbitraje = $_POST['arbitraje'];
	
		$modificar = $serviciosNOTI->modificarServicios($planilleros,$servmed,$arbitraje);
		$insertar  = $serviciosNOTI->insertServiciosBCK($planilleros,$servmed,$arbitraje);
		
		$res = $serviciosNOTI->TraerServicios();
		//echo $eliminar;
		
		echo '<table id="itsthetable" width="860" cellpadding="0" cellspacing="0">
				<caption>Premios Cargados</caption>
				<tbody><thead>
				</thead>';
				while ($row = mysql_fetch_array($res)) {
				echo '<tr><td>';
				echo $row[1];
				echo "</td></tr>";
				echo '<tr><td>';
				echo $row[2];
				echo "</td></tr>";
				echo '<tr><td>';
				echo $row[3];
				echo "</td></tr>";
				}
				echo "</tbody></table>";
	
}

function agregarContacto($servicios) {
	$nombre = $_POST['nombre'];
	$mail = $_POST['mail'];
	$asunto = $_POST['asunto'];
	$mensaje = $_POST['mensaje'];
	
	$list1 = explode(" ",$nombre);
	
	$insertar = $servicios->insertarContacto($nombre,$nombre,$mail,$asunto,$mensaje);
	
	
} //fin de agregar contacto




function modificarFixture($serviciosGE) {
	
	$resultadoa = $_POST['resultadoa'];
	$resultadob = $_POST['resultadob'];
	$idfixture = $_POST['idfixture'];
	$idgrupo = $_POST['idgrupo'];
	
	
	$error = "";
	
	
	if (($resultadoa == "") xor ($resultadob == "")) {
		$error = $error."<h4>*_Si carga el resultado de un equipo tambien del otro, actualise el navegador.</h4>";
	}
	
	if ($error == "") {
	$insert = $serviciosGE ->modificarFixture($idfixture,$resultadoa,$resultadob);
	//echo $insert;
	
	echo '<table width="860" border="1" id="itsthetable" cellpadding="0" cellspacing="0">
			<tr>
			<th width="40" align="center">Hora</th>
			<th align="center">Equipo A</th>
			<th align="center">Resultado A</th>
			<th align="center" width="6"></th>
			<th align="center">Resultado B</th>
			<th align="center">Equipos B</th>
			<th align="center">FechaJuego</th>
			<th align="center">Fecha</th>
			</tr>';
			
		
		$resGEs = $serviciosGE->TraerIdFixture($idfixture,$idgrupo);
			while ($rowGEs = mysql_fetch_array($resGEs))
			{
				echo "<tr><td width='40'>";
				echo $rowGEs['hora'];
				echo "</td><td>";
				echo $rowGEs[1];
				echo "</td><td align='center'>";
			    echo $rowGEs[2];
				echo "</td><td>-</td><td align='center'>";
			    echo $rowGEs[4]; 
				echo "</td><td>";
				echo $rowGEs[3]; 
				echo "</td><td>";
				echo $rowGEs['fechajuego'];
				echo "</td><td>";
				echo $rowGEs['fecha']; 
				echo "</td></tr>";
				
				
			}	
		     echo "</table><br><a href='fixConsultar.php?idgrupo=".$idgrupo."'>Volver</a>";
			} else {
				echo "<table width='600' border='0' ><tr><td>";
				echo $error;
				echo "</td></tr></table>";
			}
	
	
} // fin de la funcion modificar equipos al fixture




function eliminarFixture($serviciosGE) {
	
	$idfixture = $_POST['idfixture'];
	$idgrupo = $_POST['idgrupo'];
	
	$insert = $serviciosGE ->eliminarFixture($idfixture);
	//echo $insert;
	
	echo '<table width="350" border="1" id="itsthetable" cellpadding="0" cellspacing="0">
			<tr><td>Eliminado correctamente.</td></tr></table><br><a href="fixConsultar.php?idgrupo='.$idgrupo.'">Volver</a>';

	
	
} // fin de la funcion eliminar equipos al fixture


function modificarInfoEquipo($serviciosE) {
	$apellido = $_POST['apellido'];
	$nombre = $_POST['nombre'];
	$mail = $_POST['mail'];
	$tel = $_POST['tel'];
	$imagen = $_POST['imagenes'];
	$idequipo = $_POST['idequipo'];
	
	$error = "";
	
	if ($apellido == '') {
		$error = "<h4>*_Debe ingresar un apellido, actualise el navegador.</h4>";	
	}
	
	if ($nombre == '') {
		$error = $error."<h4>*_Debe ingresar un nombre, actualise el navegador.</h4>";
	}
	
	if ($mail == "") {
		$error = $error."<h4>*_Debe ingresar un e-mail, actualise el navegador.</h4>";	
	}
	
	
	if ($error == "") {
		
		$modificar = $serviciosE->modificarInfoEquipo($idequipo,$apellido,$nombre,$mail,$tel,$imagen);
		//echo "<p>".$modificar."</p>";
		$res = $serviciosE->TraerIdEquipoInfo($idequipo);
		
		echo '<table id="itsthetable" width="760" cellpadding="0" cellspacing="0">
				<caption>Informacion modificada</caption>
				<thead>
				<tr>
				<th>IdEquipos</th>
				<th>Equipos</th>
				<th>Apellido</th>
				<th>Nombre</th>
				<th>Telefono</th>
				<th>E-Mail</th>
				<th>Imagen</th>
				</tr>
				</thead>
				<tbody>';
				while ($row = mysql_fetch_array($res)) {
					
					echo "<tr><td align='center' width='50'>";
					echo $row[0];
					echo "</td><td align='center'>";
					echo $row[1];
					echo "</td><td align='center'>";
					echo $row[5];
					echo "</td><td align='center'>";
					echo $row[4];
					echo "</td><td align='center'>";
					echo $row[8];
					echo "</td><td align='center'>";
					echo $row[9];
					echo "</td><td align='center'>";
					echo "<img src='imagenescargadas/".$row['imagen']."' width='60' height='60'>";
					echo "</td></tr>";

					}
				
		echo '</tbody></table>';		
		
	} else {
				echo "<table width='600' border='0' ><tr><td>";
				echo $error;
				echo "</td></tr></table>";
			}
	
}


function cambiarEquipoPorEquipo($serviciosGE) {
	$equipoa = $_POST['equipoa'];
	$equipob = $_POST['equipob'];
	$idgrupo = $_POST['idgrupo'];
	
	$list1 = explode("-",$equipoa);
	$list2 = explode("-",$equipob);
	
	$idgrupoequipo = $list1[0];
	$idequipob = $list2[0];
	
	$cambiar = $serviciosGE->cambiarEquipoPorEquipo($idequipob,$idgrupoequipo);
	
	$resGEaux = $serviciosGE->TraerGruposEquiposId($idgrupo);
	


	while ($rowGEaux = mysql_fetch_array($resGEaux))
	{	
	echo '<li>';
	echo $rowGEaux['equiponombre'];
	echo '</li>';
	}

	
}




function insertarJugador($serviciosJ) {
	$equipo = trim($_POST['equipo']);
	
	
	$apellido = trim($_POST['apellido']);
	$nombre = trim($_POST['nombre']);
	
	$error = "";
	
	if ($apellido == "")
	$error = "*_Es obligatorio un nombre.";
	
	if ($nombre == "") 
	$error = $error."<br>*_Es olbigatorio el nombre.";
	
	
	if ($error == "") {
		
		$insertar = $serviciosJ->insertarJugador($apellido,$nombre,$equipo);
		
		$res = $serviciosJ->TraerJugadoresEquipos();
		
		echo '<table id="itsthetable" width="760" cellpadding="0" cellspacing="0">
				<caption>Jugadores Cargados</caption>
				<thead>
				<tr>
				<th>IdJugador</th>
				<th>Apellido</th>
				<th>Nombre</th>
				<th>Equipo</th>
				</tr>
				</thead>
				<tbody>';
		
		while ($row = mysql_fetch_array($res)) {
			
			echo "<tr>
			<td align='center' width='50'>";
			echo $row[0];
			echo "</td>
			<td align='center'>";
			echo $row[1];
			echo "</td>
			<td align='center'>";
			echo $row[2];
			echo "</td>
			<td align='center'>";
			echo $row[5];
			echo "</td>
			
			</tr>";
			
			}
				
		echo '</tbody></table>';
		
		
	} else {
		
		echo "Error, datos no cargados.<br>".$error;
		
	}
	
}




function modificarJugador($serviciosJ) {
	$equipo = $_POST['equipo'];
	
	
	$apellido = $_POST['apellido'];
	$nombre = $_POST['nombre'];
	$id = $_POST['idjugador'];
	
	$error = "";
	
	if ($apellido == "")
	$error = "*_Es obligatorio un nombre.";
	
	if ($nombre == "") 
	$error = $error."<br>*_Es olbigatorio el nombre.";
	
	
	if ($error == "") {
		
		$modificar = $serviciosJ->modificarJugador($apellido,$nombre,$equipo,$id);
		
		$res = $serviciosJ->TraerIdJugadoresEquipos($id);
		
		echo '<table id="itsthetable" width="760" cellpadding="0" cellspacing="0">
				<caption>Jugadores Cargados</caption>
				<thead>
				<tr>
				<th>IdJugador</th>
				<th>Apellido</th>
				<th>Nombre</th>
				<th>Equipo</th>
				</tr>
				</thead>
				<tbody>';
		
		while ($row = mysql_fetch_array($res)) {
			
			echo "<tr>
			<td align='center' width='50'>";
			echo $row[0];
			echo "</td>
			<td align='center'>";
			echo $row[1];
			echo "</td>
			<td align='center'>";
			echo $row[2];
			echo "</td>
			<td align='center'>";
			echo $row[5];
			echo "</td>
			
			</tr>";
			
			}
				
		echo '</tbody></table>';
		
		
	} else {
		
		echo "Error, datos no cargados.<br>".$error;
		
	}
	
}


function eliminarJugador($serviciosJ) {
	$id = $_POST['idjugador'];
	
	$eliminar = $serviciosJ->eliminarJugador($id);
	
	echo "El jugador se elimino correctamente";
}









function insertarSuspendidos($serviciosEXCEL) {
	$equipo = $_POST['equipo'];
	
	$error = "";
	$nombre = $_POST['nombre'];
	if ($nombre == "") { 
	$error = $error."<br>*_Es obligatorio el nombre.";
	} else {
	
	$apyn = explode(" ",$nombre);
	
	$nombre = $apyn[0];
	$apellido = $apyn[1];
	}
	$motivo = $_POST['motivo'];
	
	
	
	
	
	if ($motivo == "") 
	$error = $error."<br>*_Es obligatorio el motivo.";
	
	
	if ($error == "") {
		
		$insertar = $serviciosEXCEL->insertarSuspendidos($apellido,$nombre,$equipo,$motivo);
		
		$res = $serviciosEXCEL->TraerSuspendidos();
		
		echo '<table id="itsthetable" width="760" cellpadding="0" cellspacing="0">
				<caption>Suspendidos Cargados</caption>
				<thead>
				<tr>
				<th>Apellido</th>
				<th>Nombre</th>
				<th>Equipo</th>
				<th>Motivo</th>
				</tr>
				</thead>
				<tbody>';
		
		while ($row = mysql_fetch_array($res)) {
			
			echo "<tr>
			<td align='center' width='50'>";
			echo $row[1];
			echo "</td>
			<td align='center'>";
			echo $row[2];
			echo "</td>
			<td align='center'>";
			echo $row[3];
			echo "</td>
			<td align='center'>";
			echo $row[4];
			echo "</td>
			
			</tr>";
			
			}
				
		echo '</tbody></table>';
		
		
	} else {
		
		echo "Error, datos no cargados.<br>".$error."<br><p>Actualice el navegador.</p>";
		
	}
	
}




function modificarSuspendidos($serviciosEXCEL) {
	$equipo = $_POST['equipo'];
	$list1 = explode("-",$equipo);
	$error = "";
	$id = $_POST['idsuspendido'];
	
	$nombre = $_POST['nombre'];
	if ($nombre == "") { 
	$error = $error."<br>*_Es obligatorio el nombre.";
	} else {
	
	$apyn = explode(" ",$nombre);
	
	$nombre = $apyn[0];
	$apellido = $apyn[1];
	}
	$motivo = $_POST['motivo'];
	
	
	
	
	
	if ($motivo == "") 
	$error = $error."<br>*_Es obligatorio el motivo.";
	
	
	if ($error == "") {
		
		$insertar = $serviciosEXCEL->modificarSuspendidos($id,$apellido,$nombre,$list1[1],$motivo);
		
		$res = $serviciosEXCEL->TraerSuspendidos();
		
		echo '<table id="itsthetable" width="760" cellpadding="0" cellspacing="0">
				<caption>Suspendidos Cargados</caption>
				<thead>
				<tr>
				<th>Apellido</th>
				<th>Nombre</th>
				<th>Equipo</th>
				<th>Motivo</th>
				</tr>
				</thead>
				<tbody>';
		
		while ($row = mysql_fetch_array($res)) {
			
			echo "<tr>
			<td align='center' width='50'>";
			echo $row[1];
			echo "</td>
			<td align='center'>";
			echo $row[2];
			echo "</td>
			<td align='center'>";
			echo $row[3];
			echo "</td>
			<td align='center'>";
			echo $row[4];
			echo "</td>
			
			</tr>";
			
			}
				
		echo '</tbody></table>';
		
		
	} else {
		
		echo "Error, datos no cargados.<br>".$error."<br><p>Actualice el navegador.</p>";
		
	}
	
}


function eliminarSuspendidos($serviciosEXCEL) {
	$id = $_POST['idsuspendido'];
	
	$eliminar = $serviciosEXCEL->eliminarSuspendidos($id);
	
	echo "El suspendido se elimino correctamente";
}





function insertarAmonestados($serviciosEXCEL) {
	$equipo = $_POST['equipo'];
	
	
	$error = "";
	
	$nombre = $_POST['nombre'];
	if ($nombre == "") { 
	$error = $error."<br>*_Es obligatorio el nombre.";
	} else {
	
	$apyn = explode(" ",$nombre);
	
	$nombre = $apyn[0];
	$apellido = $apyn[1];
	}
	$amarillas = $_POST['amarillas'];
	
	
	
	
	
	if ($amarillas == "") 
	$error = $error."<br>*_Es obligatorio agregarle amarillas.";
	
	
	if ($error == "") {
		
		$insertar = $serviciosEXCEL->insertarAmonestados($apellido,$nombre,$equipo,$amarillas);
		
		$res = $serviciosEXCEL->TraerAmonestados();
		
		echo '<table id="itsthetable" width="760" cellpadding="0" cellspacing="0">
				<caption>Suspendidos Cargados</caption>
				<thead>
				<tr>
				<th>Apellido</th>
				<th>Nombre</th>
				<th>Equipo</th>
				<th>Amarillas</th>
				</tr>
				</thead>
				<tbody>';
		
		while ($row = mysql_fetch_array($res)) {
			
			echo "<tr>
			<td align='center' width='50'>";
			echo $row[1];
			echo "</td>
			<td align='center'>";
			echo $row[2];
			echo "</td>
			<td align='center'>";
			echo $row[3];
			echo "</td>
			<td align='center'>";
			echo $row[4];
			echo "</td>
			
			</tr>";
			
			}
				
		echo '</tbody></table>';
		
		
	} else {
		
		echo "Error, datos no cargados.<br>".$error."<br><p>Actualice el navegador.</p>";
		
	}
	
}




function modificarAmonestados($serviciosEXCEL) {
	$equipo = $_POST['equipo'];
	$list1 = explode("-",$equipo);
	
	$id = $_POST['idamonestado'];
	$error = "";
	$nombre = $_POST['nombre'];
	if ($nombre == "") { 
	$error = $error."<br>*_Es obligatorio el nombre.";
	} else {
	
	$apyn = explode(" ",$nombre);
	
	$nombre = $apyn[0];
	$apellido = $apyn[1];
	}
	$amarillas = $_POST['amarillas'];
	
	
	
	
	
	if ($amarillas == "") 
	$error = $error."<br>*_Es obligatorio agregarle amarillas.";
	
	
	if ($error == "") {
		
		$insertar = $serviciosEXCEL->modificarAmonestados($id,$apellido,$nombre,$list1[1],$amarillas);
		
		$res = $serviciosEXCEL->TraerIdAmonestados($id);
		
		echo '<table id="itsthetable" width="760" cellpadding="0" cellspacing="0">
				<caption>Amonestado modificado</caption>
				<thead>
				<tr>
				<th>Apellido</th>
				<th>Nombre</th>
				<th>Equipo</th>
				<th>Motivo</th>
				</tr>
				</thead>
				<tbody>';
		
		while ($row = mysql_fetch_array($res)) {
			
			echo "<tr>
			<td align='center' width='50'>";
			echo $row[1];
			echo "</td>
			<td align='center'>";
			echo $row[2];
			echo "</td>
			<td align='center'>";
			echo $row[3];
			echo "</td>
			<td align='center'>";
			echo $row[4];
			echo "</td>
			
			</tr>";
			
			}
				
		echo '</tbody></table>';
		
		
	} else {
		
		echo "Error, datos no cargados.<br>".$error."<br><p>Actualice el navegador.</p>";
		
	}
	
}


function eliminarAmonestados($serviciosEXCEL) {
	$id = $_POST['idamonestado'];
	
	$eliminar = $serviciosEXCEL->eliminarAmonestados($id);
	
	echo "El amanostado se elimino correctamente";
}





function insertarGoleadores($serviciosEXCEL) {
	$equipo = $_POST['equipo'];
	//$list1 = explode("-",$equipo);
	$error = "";
	$nombre = $_POST['nombre'];
	if ($nombre == "") { 
	$error = $error."<br>*_Es obligatorio el nombre.";
	} else {
	
	//$apyn = explode(" ",$nombre);
	
	//$nombre = $apyn[0];
	//$apellido = $apyn[1];

        $serviciosJ = new ServiciosJ();
	
	$apellido = trim(mysql_result($serviciosJ->TraerIdJugador($nombre),0,1));
	$nombre = trim(mysql_result($serviciosJ->TraerIdJugador($nombre),0,2));


	}
	$goles = $_POST['goles'];
	$grupo = trim($_POST['zonas']);
	
	
	
	
	
	if ($goles == "") 
	$error = $error."<br>*_Es obligatorio agregarle goles.";
	
	
	if ($error == "") {
		
		$insertar = $serviciosEXCEL->insertarGoleadores($apellido,$nombre,$equipo,$goles,$grupo);
		
		$res = $serviciosEXCEL->TraerIdGoleadores($grupo);
		
		echo '<table id="itsthetable" width="760" cellpadding="0" cellspacing="0">
				<caption>Goleadores Cargados</caption>
				<thead>
				<tr>
				<th>Apellido</th>
				<th>Nombre</th>
				<th>Equipo</th>
				<th>Goles</th>
				<th>Zona</th>
				</tr>
				</thead>
				<tbody>';
		
		while ($row = mysql_fetch_array($res)) {
			
			echo "<tr>
			<td align='center' width='50'>";
			echo $row[1];
			echo "</td>
			<td align='center'>";
			echo $row[2];
			echo "</td>
			<td align='center'>";
			echo $row[3];
			echo "</td>
			<td align='center'>";
			echo $row[4];
			echo "</td>
			<td align='center'>";
			echo $row[5];
			echo "</td>
			</tr>";
			
			}
				
		echo '</tbody></table>';
		
		
	} else {
		
		echo "Error, datos no cargados.<br>".$error."<br><p>Actualice el navegador.</p>";
		
	}
	
}




function modificarGoleadores($serviciosEXCEL) {
	$equipo = $_POST['equipo'];
	$list1 = explode("-",$equipo);
	
	$id = $_POST['idgoleador'];
	$error = "";
	$nombre = $_POST['nombre'];
	if ($nombre == "") { 
	$error = $error."<br>*_Es obligatorio el nombre.";
	} else {
	
	$apyn = explode(" ",$nombre);
	
	$nombre = $apyn[0];
	$apellido = $apyn[1];
	}
	$goles = $_POST['goles'];
	$grupo = $_POST['grupo'];
	
	
	
	
	
	if ($goles == "") 
	$error = $error."<br>*_Es obligatorio agregarle goles.";
	
	
	if ($error == "") {
		
		$insertar = $serviciosEXCEL->modificarGoleadores($id,$apellido,$nombre,$list1[1],$goles,$grupo);
		
		$res = $serviciosEXCEL->TraerIndiceGoleadores($id);
		
		echo '<table id="itsthetable" width="760" cellpadding="0" cellspacing="0">
				<caption>Goleador modificado</caption>
				<thead>
				<tr>
				<th>Apellido</th>
				<th>Nombre</th>
				<th>Equipo</th>
				<th>Goles</th>
				<th>Zona</th>
				</tr>
				</thead>
				<tbody>';
		
		while ($row = mysql_fetch_array($res)) {
			
			echo "<tr>
			<td align='center' width='50'>";
			echo $row[1];
			echo "</td>
			<td align='center'>";
			echo $row[2];
			echo "</td>
			<td align='center'>";
			echo $row[3];
			echo "</td>
			<td align='center'>";
			echo $row[4];
			echo "</td>
			<td align='center'>";
			echo $row[5];
			echo "</td>
			</tr>";
			
			}
				
		echo '</tbody></table>';
		
		
	} else {
		
		echo "Error, datos no cargados.<br>".$error."<br><p>Actualice el navegador.</p>";
		
	}
	
}


function eliminarGoleadores($serviciosEXCEL) {
	$id = $_POST['idgoleador'];
	
	$eliminar = $serviciosEXCEL->eliminarGoleadores($id);
	
	echo "El goleador se elimino correctamente";
}


function modificarAmonestadosAmarillas($serviciosEXCEL) {

	
	$id = $_POST['id'];
	$error = "";

	$amarillas = $_POST['amarillas'];
	
	if ($amarillas == "") 
	$error = $error."<br>*_Es obligatorio agregarle amarillas.";
	
	
	if ($error == "") {
		
		$insertar = $serviciosEXCEL->modificarAmonestadosAmarillas($id,$amarillas);
		
		echo "<p>Amonestado Modificado</p>";
		
		
	} else {
		
		echo "Error, datos no cargados.<br>".$error."<br><p>Actualice el navegador.</p>";
		
	}
	
}



function modificarGoleadoresGoles($serviciosEXCEL) {

	
	$id = $_POST['id'];
	$error = "";

	$goles = $_POST['goles'];
	
	if ($goles == "") 
	$error = $error."<br>*_Es obligatorio agregarle goles.";
	
	
	if ($error == "") {
		
		$insertar = $serviciosEXCEL->modificarGoleadoresGoles($id,$goles);
		
		
		
		echo "<p>Goleador Modificado</p>";
		
		
	} else {
		
		echo "Error, datos no cargados.<br>".$error."<br><p>Actualice el navegador.</p>";
		
	}
	
}


function modificarSuspendidosMotivos($serviciosEXCEL) {

	
	$id = $_POST['id'];
	$error = "";

	$motivos = $_POST['motivos'];
	
	if ($motivos == "") 
	$error = $error."<br>*_Es obligatorio agregarle algun motivo.";
	
	
	if ($error == "") {
		
		$insertar = $serviciosEXCEL->modificarSuspendidosMotivos($id,$motivos);
		
		echo "<p>Suspendido Modificado</p>";
		
		
	} else {
		
		echo "Error, datos no cargados.<br>".$error."<br><p>Actualice el navegador.</p>";
		
	}
	
}


function modificarConductaPuntos($ServiciosRES) {

	
	$id = $_POST['id'];
	$error = "";

	$puntos = $_POST['puntos'];
	
	if ($puntos == "") 
	$error = $error."<br>*_Es obligatorio agregarle algun punto.";
	
	
	if ($error == "") {
		
		$insertar = $ServiciosRES->modificarConductaPuntos($id,$puntos);
		
		echo "<p>Suspendido Modificado</p>";
		
		
	} else {
		
		echo "Error, datos no cargados.<br>".$error."<br><p>Actualice el navegador.</p>";
		
	}
	
}



function modificarFixtureResultados($serviciosGE) {
	
	$resultadoa = $_POST['resultadoa'];
	$resultadob = $_POST['resultadob'];
	$idfixture = $_POST['id'];
	
	
	
	$error = "";
	
	
	if (($resultadoa == "") xor ($resultadob == "")) {
		$error = $error."<h4>*_Si carga el resultado de un equipo también del otro, actualise el navegador.</h4>";
	}
	
	if ($error == "") {
	$insert = $serviciosGE ->modificarFixture($idfixture,$resultadoa,$resultadob);
	//echo $insert;

			echo "<p>Resultado Modificado</p>";
		
		
	} else {
		
		echo "Error, datos no cargados.<br>".$error."<br><p>Actualice el navegador.</p>";
		
	}
	
	
} // fin de la funcion modificar equipos al fixture



function agregarHorarioPrincipal($serviciosNOTI) {

	$insert = $serviciosNOTI->InsertarHorarioPrincipal($_POST['nombre']);
	
	//echo "<p>Hola</p>";
	
	$res = $serviciosNOTI->TraerHorarioPrincipal();
	if ($insert == 1) {
	echo "
			<table id='itsthetable' width='650' cellpadding='0' cellspacing='0'>
			<caption>Horario Principal Cargados</caption>
			<thead>
			<tr>
			<th>IdHorarioPrincipal</th>
			<th>Horario</th>
			</tr>
			</thead>
			<tbody>";

			while ($row = mysql_fetch_array($res)) {
				echo "<tr>
				<td align='center'>";
				echo $row[0];
				echo "</td>
				<td align='left'>";
				echo $row[1];
				echo "</td>
				</tr>";
				
				 } 
				echo
				"</tbody>
				</table>";
			
			} else {
				echo "Error al cargar!!!.";
			}
			
			
			

} // fin de la funcion agregar


function TraerCanchaTurnos($serviciosNOTI) {
	$cancha = $_POST['cancha'];
	$res = $serviciosNOTI->TraerCanchaTurnos($cancha);
	$devuelve = "";
	while ($row = mysql_fetch_array($res)) {
		
		$devuelve = $devuelve.$row[1]."/".$row[2]."/".$row[3]."*";	
	}
	echo $devuelve;
}//fin de traer turnos por canchas


function TraerFixturePorGrupoFechaZona($serviciosFUNC) {
	$zona = $_POST['zona'];
	$fecha = $_POST['fecha'];
	$res = $serviciosFUNC->TraerFixturePorGrupoFechaZona($zona,$fecha);
	$cant =0;
	$devuelve = "";
	while ($row = mysql_fetch_array($res)) {
		$cant++;
		if ($row[4] != '') {
		$devuelve= $devuelve."<tr><td>".$row[1]."</td>
			    <td align='center'><input type='text' name='resultadoa".$cant."' id='resultadoa".$cant."' value='".$row[2]."' size='1' maxlength='3' /></td>
			    <td>-</td>
			    <td align='center'><input type='text' name='resultadob".$cant."' id='resultadob".$cant."' value='".$row[4]."' size='1' maxlength='3' /></td>
			    <td>".$row[3]."</td>
				<input type='hidden' name='id".$cant."' id='id".$cant."' value=".$row[0]." />
				</tr>";
			    
			    } else {
			    	echo "<tr class='sinResultados'><td>".$row[1]."</td>
			    <td align='center'><input type='text' name='resultadoa".$cant."' id='resultadoa".$cant."' value='' size='1' maxlength='3' />".$row[2]."</td>
			    <td>-</td>
			    <td align='center'><input type='text' name='resultadob".$cant."' id='resultadob".$cant."' value='' size='1' maxlength='3' />".$row[4]."</td>
			    <td>".$row[3]."</td>
				<input type='hidden' name='id".$cant."' id='id".$cant."' value=".$row[0]." />
				</tr>";
			    	
			    	
			    }
	}
	if (mysql_num_rows($res)>0) {
		$devuelve = $devuelve.'<input type="hidden" name="cant" id="cant" value="'.$cant.'" />';
	}
	echo $devuelve;
}
?>