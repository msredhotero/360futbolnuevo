<?php
	include ('../includes/funcionesCancha.php');

	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		if(isset($_POST['cancha']) && isset($_POST['horario_1']) && isset($_POST['horario_2']) && isset($_POST['horario_3']) && isset($_POST['horario_4'])){
			print_r($_POST);
			$ServiciosCancha = new ServiciosC;
			$ServiciosCancha->editarHorariosCancha($_POST['cancha'],$_POST['horario_1'],$_POST['horario_2'],$_POST['horario_3'],$_POST['horario_4']);
			echo "LLEGÖ";
		}
		else{
			print_r($_POST);
		}
	}

?>