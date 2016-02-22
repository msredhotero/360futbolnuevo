<?php
	include ('../includes/funcionesCancha.php');

	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		if(isset($_POST['cancha'])){
			$ServiciosCancha = new ServiciosC;
			echo json_encode(mysql_fetch_array($ServiciosCancha->TraerHorariosCancha($_POST['cancha'])));
		}
	}

?>