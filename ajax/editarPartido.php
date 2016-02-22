<?php
	include ('../includes/funcionesEquipos.php');
	include ('../includes/funcionesEXCEL.php');
	include ('../includes/funcionesGruposEquipos.php');

	/*    [equipoa] => 1646
    [equipob] => 89
    [resultadoa] => 3
    [resultadob] => 0
    [idgrupo] => 1
    [idtorneo] => 33*/
	
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		if(isset($_POST['idgrupo']) && isset($_POST['equipoa']) && isset($_POST['equipob']) && isset($_POST['resultadoa']) && isset($_POST['resultadob']) && isset($_POST['idtorneo'])){
			$respuesta = array('ok' => false);
			
			$idgrupo = $_POST['idgrupo'];
			$idequipoa = $_POST['equipoa'];
			$idequipob = $_POST['equipob'];
			$resultadoa = $_POST['resultadoa'];
			$resultadob = $_POST['resultadob'];
			$idtorneo = $_POST['idtorneo'];
			// $fechaj = $_POST['fechaj'];
			// $fecha = $_POST['fecha'];
			// $hora = $_POST['hora'];
			// $minutos = $_POST['minutos'];

			$ServiciosEXCEL = new ServiciosEXCEL();
			$serviciosGE = new ServiciosGE();

			if($idequipoa != $idequipob){
				if($resultadoa != '' && $resultadob != ''){
					$list1 = explode("-",$idequipoa);
					$list2 = explode("-",$idequipob);
					
					$idequipoa = $list1[0];
					$idequipob = $list2[0];
					
					$serviciosE = new ServiciosE();

					if(isset($_POST['amonestados']) && sizeof($_POST['amonestados']) > 0){
						foreach ($_POST['amonestados'] as $amonestado) {
							if($amonestado['id_jugador'] > 0){
								if(mysql_fetch_array($ServiciosEXCEL->TraerIdAmonestadosByApellidoNombreEquipo($amonestado['apellido'],$amonestado['nombre'],$amonestado['nombreequipo']))){
									$ServiciosEXCEL->amonestarById($amonestado['apellido'],$amonestado['nombre'],$amonestado['nombreequipo']);
								}
								else{
									$ServiciosEXCEL->insertarAmonestados($amonestado['apellido'],$amonestado['nombre'],$amonestado['nombreequipo'],1);
								}
							}
						}
					}

					if(isset($_POST['suspendidos']) && sizeof($_POST['suspendidos']) > 0){
						foreach ($_POST['suspendidos'] as $suspendido) {
							$ServiciosEXCEL->insertarSuspendidos($suspendido['apellido'],$suspendido['nombre'],$suspendido['nombreequipo'],$suspendido['descripcion']);
                		}
					}

					if(isset($_POST['goleadores']) && sizeof($_POST['goleadores']) > 0){
						foreach ($_POST['goleadores'] as $goleador) {
							if($jugador = mysql_fetch_array($ServiciosEXCEL->TraerGoleadorByApellidoNombreEquipoGrupo($goleador['apellido'],$goleador['nombre'],$goleador['nombreequipo'],$goleador['zona']))){
								$ServiciosEXCEL->modificarGoleadores($jugador['idgoleador'],$jugador['apellido'],$jugador['nombre'],$jugador['equipo'],$jugador['goles']+$goleador['goles'],$jugador['grupo']);
							}
							else{
								$ServiciosEXCEL->insertarGoleadores($goleador['apellido'],$goleador['nombre'],$goleador['nombreequipo'],$goleador['goles'],$goleador['zona']);
							}
						}
					}
					// $tabla = '<table width="860" border="1" id="itsthetable" cellpadding="0" cellspacing="0">
					// 		<tr>
					// 		<th width="40" align="center">Hora</th>
					// 		<th align="center">Equipo A</th>
					// 		<th align="center">Resultado A</th>
					// 		<th align="center" width="6"></th>
					// 		<th align="center">Resultado B</th>
					// 		<th align="center">Equipos B</th>
					// 		<th align="center">FechaJuego</th>
					// 		<th align="center">Fecha</th>
					// 		</tr>';
							
						
					// $resGEs = $serviciosGE->TraerFixturePorGrupo($idgrupo);
					// while ($rowGEs = mysql_fetch_array($resGEs))
					// {
					// 	$tabla .= "<tr><td width='40'>";
					// 	$tabla .= $rowGEs['hora'];
					// 	$tabla .= "</td><td>";
					// 	$tabla .= $rowGEs[1];
					// 	$tabla .= "</td><td align='center'>";
					//     $tabla .= $rowGEs[2];
					// 	$tabla .= "</td><td>-</td><td align='center'>";
					//     $tabla .= $rowGEs[4]; 
					// 	$tabla .= "</td><td>";
					// 	$tabla .= $rowGEs[3]; 
					// 	$tabla .= "</td><td>";
					// 	$tabla .= $rowGEs['fechajuego'];
					// 	$tabla .= "</td><td>";
					// 	$tabla .= $rowGEs['fecha']; 
					// 	$tabla .= "</td></tr>";
					// }	
				 //    $tabla .= "</table>";
				    $respuesta['ok'] = true;
				    $respuesta['msj'] = 'Partido editado con éxito';
				    // $respuesta['tabla'] = $tabla;
					
				}
				else{
					// $error = $error."<h4>*_Si carga el resultado de un equipo tambien del otro, actualise el navegador.</h4>";
					$respuesta['msj'] = 'Si carga el resultado de un equipo también del otro';
				}
			}
			else{
				// $error = "<h4>*_Debe seleccionar dos equipos diferentes, actualise el navegador.</h4>";	
				$respuesta['msj'] = 'Debe seleccionar dos equipos diferentes';
			}
			echo json_encode($respuesta);
		}
		else{
			print_r($_POST);
		}
	}
?>