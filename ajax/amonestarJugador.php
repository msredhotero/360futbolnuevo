<?php
	include ('../includes/funcionesEXCEL.php');

	/*
	print_r($_POST);die();

	(
    [nombre] => asd
    [apellido] => asd
    [id_equipo] => 1664
	)
	*/

	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		if(isset($_POST['id_jugador'])){
			$id_jugador = (int) $_POST['id_jugador'];
			if($id_jugador > 0){
				if($ServiciosEXCEL->TraerIdAmonestados($id_jugador)){
					$ServiciosEXCEL->amonestarById($id_jugador);
				}
				else{
					$ServiciosExcel->insertarAmonestados($apellido,$nombre,$equipo,$amarillas);
				}
			}
			$ServiciosEXCEL = new ServiciosEXCEL();
			
		}
	}
?>