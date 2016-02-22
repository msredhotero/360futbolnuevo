<?php
	include ('../includes/funcionesNoticias.php');

	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		if(isset($_POST['descripcion'])){
			$serviciosNOTI = new ServiciosNOTI();
			$descripcion = htmlentities($_POST['descripcion']);
			$serviciosNOTI->editarNoticiasTurno($descripcion);
			return true;
		}
	}

?>