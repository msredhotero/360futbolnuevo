<?php
	include ('../includes/funcionesJugadores.php');

	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$respuesta = array('ok' => false, 'jugadores' => '');
		if(isset($_POST['id_equipo'])){
			$id_equipo = (int)$_POST['id_equipo'];
			if($id_equipo > 0){
				$serviciosJ = new ServiciosJ();
				$query = $serviciosJ->TraerJugadoresPorEquipo($_POST['id_equipo']);
				$i = 0;
				while($jugador = mysql_fetch_array($query)){
					$respuesta['jugadores'][$i] = $jugador;
					$i += 1;
				}
				$respuesta['ok'] = true;
				echo json_encode($respuesta);
			}
		}
	}

?>