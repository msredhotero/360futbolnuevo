<?php
	include ('../includes/funcionesJugadores.php');

	/*
	print_r($_POST);die();
	(
    [nombre] => asd
    [apellido] => asd
    [id_equipo] => 1664
	)
	*/

	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$respuesta = array('ok' => false, 'jugadores' => '');
		if(isset($_POST['id_equipo']) && isset($_POST['nombre']) && isset($_POST['apellido'])){
			$id_equipo = (int) $_POST['id_equipo'];
			$nombre = trim($_POST['nombre']);
			$apellido = trim($_POST['apellido']);
			$serviciosJ = new ServiciosJ();
			//echo $serviciosJ->insertarJugador($apellido,$nombre,$id_equipo);
			$jugador = array('id_jugador' => $serviciosJ->insertarJugador($apellido,$nombre,$id_equipo),'nombre' => $nombre, 'apellido' => $apellido);
			echo json_encode($jugador);
			// $id_equipo = (int)$_POST['id_equipo'];
			// if($id_equipo > 0){
			// 	$serviciosJ = new ServiciosJ();
			// 	$query = $serviciosJ->TraerJugadoresPorEquipo($_POST['id_equipo']);
			// 	$i = 0;
			// 	while($jugador = mysql_fetch_array($query)){
			// 		$respuesta['jugadores'][$i] = $jugador;
			// 		$i += 1;
			// 	}
			// 	$respuesta['ok'] = true;
			// 	echo json_encode($respuesta);
			// }
		}
	}

?>