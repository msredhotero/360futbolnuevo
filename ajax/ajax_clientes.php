<?php

include ('../includes/funcionesClientes.php');

$serviciosClientes  = new ServiciosClientes();


$accion = $_POST['accion'];


switch ($accion) {
	
	case 'insertarCliente':
		insertarCliente($serviciosClientes);
		break;	
	case 'generarNroCliente':
		generarNroCliente($serviciosClientes);
		break;

	case 'eliminarCliente':
		eliminarCliente($serviciosClientes);
		break;

	case 'modificarCliente':
		modificarCliente($serviciosClientes);
		break;

	case 'traerClientePorId':
		traerClientePorId($serviciosClientes);
		break;
		
	case 'traerClientePorNroCliente':
		traerClientePorNroCliente($serviciosClientes);
		break;	
	case 'traerClientePorNroDocumento':
		traerClientePorNroDocumento($serviciosClientes);
		break;
		
}

function insertarCliente($serviciosClientes) {
	$nombre			=	$_POST['nombre'];
	$email			=	$_POST['email'];
	$nrodocumento	=	$_POST['nrodocumento'];
	$telefono		=	$_POST['telefono'];
	echo $serviciosClientes->insertarCliente($nombre,'',$email,$nrodocumento,$telefono);
}


function eliminarCliente($serviciosClientes) {
	
	$id 			=	$_POST['id'];

	$res 			= $serviciosClientes->eliminarCliente($id);
	echo $res;
}


function modificarCliente($serviciosClientes) {
	$id 			=	$_POST['id'];
	$nombre			=	$_POST['nombre'];
	$email			=	$_POST['email'];
	$nrodocumento	=	$_POST['nrodocumento']; 
	$telefono		=	$_POST['telefono'];
	$res 			= $serviciosClientes->modificarCliente($id,$nombre,'',$email,$nrodocumento,$telefono);
	echo $res;
}

function traerClientePorId($serviciosClientes) {
	$id 	=	$_POST['id'];
	
	$res 	= $serviciosClientes->traerClientePorId($id);
	echo $res;
}



function traerClientePorNroCliente($serviciosClientes) {
	$nrodocumento	=	$_POST['nrodocumento'];
	
	$res 			= $serviciosClientes->traerClientePorNroCliente($nrodocumento);
	echo $res;
}

function traerClientePorNroDocumento($serviciosClientes) {
	$codigobarra 	=	$_POST['$codigobarra'];
	
	$res			= $serviciosClientes->traerClientePorNroDocumento($codigobarra);
	echo $res;
}

?>

