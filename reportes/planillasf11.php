<?php

date_default_timezone_set('America/Buenos_Aires');

include ('../includes/funcionesUsuarios.php');
include ('../includes/funciones.php');
include ('../includes/funcionesHTML.php');
include ('../includes/funcionesJugadores.php');
include ('../includes/funcionesEquipos.php');
include ('../includes/funcionesGrupos.php');
include ('../includes/funcionesZonasEquipos.php');
include ('../includes/funcionesNoticias.php');
include ('../includes/funcionesDATOS.php');

$serviciosUsuarios  = new ServiciosUsuarios();
$serviciosFunciones = new Servicios();
$serviciosHTML		= new ServiciosHTML();
$serviciosJugadores = new ServiciosJ();
$serviciosEquipos	= new ServiciosE();
$serviciosGrupos	= new ServiciosG();
$serviciosZonasEquipos	= new ServiciosZonasEquipos();
$serviciosNoticias = new ServiciosNoticias();
$serviciosDatos = new ServiciosDatos();

$fecha = date('Y-m-d');

require('fpdf.php');

//$header = array("Hora", "Cancha 1", "Cancha 2", "Cancha 3");

$reffecha = $_GET['reffecha'];

$idtorneo = '1,2';

$resEquipos = $serviciosFunciones->traerPlanillas($idtorneo,$reffecha);

//echo $resEquipos;




$pdf = new FPDF();
$cantidadJugadores = 0;
#Establecemos los márgenes izquierda, arriba y derecha: 
$pdf->SetMargins(2, 2 , 2); 

#Establecemos el margen inferior: 
$pdf->SetAutoPageBreak(true,1); 

while ($rowE = mysql_fetch_array($resEquipos)) {
	
	$pdf->AddPage();
	/***********************************    PRIMER CUADRANTE ******************************************/
	$pdf->Rect(5,5,200,281,'');
	$pdf->Image('../imagenes/logo4.png',16,15,0);
	$pdf->Rect(5,45,200,241,'');
	$pdf->SetFont('Arial','U',15);
	$pdf->SetXY(17,6);
	$pdf->Cell(30,7,'PREDIO 98',0,0,'C',false);
	$pdf->SetFont('Arial','',15);
	$pdf->SetXY(60,5);
	$pdf->Cell(30,20,strtoupper($rowE['zona']),1,0,'C',false);
	$pdf->Cell(115,20,strtoupper(utf8_decode($rowE['descripciontorneo'])),1,0,'C',false);
	$pdf->Ln();
	$pdf->SetX(60);
	$pdf->Cell(30,20,strtoupper($rowE['tipofecha']),1,0,'C',false);
	$pdf->Cell(50,20,strtoupper($rowE['cancha']),1,0,'C',false);
	$pdf->Cell(65,20,'HORARIO '.strtoupper($rowE['hora']),1,0,'C',false);
	/***********************************    FIN ******************************************/
	
	/***********************************    SEGUNDO CUADRANTE ******************************************/
	$pdf->SetXY(5,45);
	$pdf->Cell(180,7,'PLANILLA DE INCRIPCIÓN - BUENA FE',0,0,'C',false);
	$pdf->Ln();
	$pdf->SetFont('Arial','',8);
	$pdf->SetX(5);
	$pdf->MultiCell(200,4,'IMPORTANTE:  El "Predio 98” canchas de fútbol, denominado también “La Organización” no se responsabiliza por lesiones ocasionadas en uso de las instalaciones, prácticas de juego, y/o hechos de fuerza mayor y/o caso fortuito, agresiones personales u otros hechos que causen perjuicios material y/o lesiones corporales, como asimismo tampoco se responsabiliza por extravío y/o pérdida de objetos personales, reservándose el derecho de admisión a la totalidad de canchas y/o establecimiento.',1,'L',false);
	$pdf->SetFont('Arial','B',8);
	$pdf->SetX(5);
	$pdf->MultiCell(200,4,'Con la firma del presente, expresamente desiste de cualquier reclamo y acción al respecto. Los DNI y firmas pueden ser completados en la 1º fecha en el Predio.',1,'L',false);
	
	$pdf->SetFillColor(255,10,12);
	$pdf->SetFont('Arial','',10);
	$pdf->SetX(5);
	$pdf->Cell(200,5,'COMPLETAR TODOS LOS DATOS CON MAYUSCULAS',1,0,'C',true);
	
	//////////////////// Aca arrancan a cargarse los datos de los equipos  /////////////////////////
	$pdf->Ln();
	$pdf->SetX(5);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(47.5,5,'NOMBRE DEL EQUIPO:',1,0,'C',false);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(152.5,5,strtoupper(utf8_decode($rowE['nombre'])),1,0,'C',false);
	
	$pdf->Ln();
	$pdf->SetX(5);
	$pdf->SetFont('Arial','',9);
	$pdf->SetFillColor(155,155,155);
	$pdf->Cell(47.5,5,'Nombre capitan del equipo:',1,0,'L',true);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(52.5,5,strtoupper(utf8_decode($rowE['nombrecapitan'])),1,0,'L',false);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(47.5,5,'Nombre sub-cap. del equipo:',1,0,'L',true);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(52.5,5,strtoupper(utf8_decode($rowE['nombresubcapitan'])),1,0,'L',false);
	
	$pdf->Ln();
	$pdf->SetX(5);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(47.5,5,'Teléfono capitan del equipo:',1,0,'L',true);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(52.5,5,strtoupper($rowE['telefonocapitan']),1,0,'L',false);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(47.5,5,'Teléfono sub-cap. del equipo:',1,0,'L',true);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(52.5,5,strtoupper($rowE['telefonosubcapitan']),1,0,'L',false);
	
	$pdf->Ln();
	$pdf->SetX(5);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(47.5,5,'Email capitan del equipo:',1,0,'L',true);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(52.5,5,strtoupper(utf8_decode($rowE['emailcapitan'])),1,0,'L',false);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(47.5,5,'Email sub-cap. del equipo:',1,0,'L',true);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(52.5,5,strtoupper(utf8_decode($rowE['emailsubcapitan'])),1,0,'L',false);
	
	$pdf->Ln();
	$pdf->SetX(5);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(47.5,5,'Facebook capitan del equipo:',1,0,'L',true);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(52.5,5,strtoupper(utf8_decode($rowE['facebookcapitan'])),1,0,'L',false);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(47.5,5,'Facebook sub-cap. del equipo:',1,0,'L',true);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(52.5,5,strtoupper(utf8_decode($rowE['facebooksubcapitan'])),1,0,'L',false);
	
	$pdf->SetFont('Arial','B',10);
	$pdf->Ln();
	$pdf->SetX(5);
	$pdf->Cell(200,5,'JUGADORES',1,0,'C',false);
	$pdf->SetFont('Arial','',9);
	$resJugadores = $serviciosJugadores->TraerJugadoresPorEquipoPlanillas($rowE['idequipo'],$reffecha, $idtorneo);
	
	$pdf->Ln();
	$pdf->SetX(5);
	$pdf->Cell(49.5,5,'APELLIDO Y NOMBRE',1,0,'C',true);
	$pdf->Cell(20,5,'DNI',1,0,'C',true);
	$pdf->Cell(25,5,'FIRMA',1,0,'C',true);
	$pdf->Cell(17.5,5,'N°CAMIS.',1,0,'C',true);
	$pdf->Cell(15,5,'GOLES',1,0,'C',true);
	$pdf->Cell(20,5,'AMARILLAS',1,0,'C',true);
	$pdf->Cell(20,5,'AMAR.ACU.',1,0,'C',true);
	$pdf->Cell(20,5,'ROJAS',1,0,'C',true);
	$pdf->Cell(13,5,'JUGO',1,0,'C',true);
	
	$i = 0;
	while ($rowJ = mysql_fetch_array($resJugadores))
	{
		$pdf->SetFillColor(183,183,183);
		$i = $i+1;
		$pdf->Ln();
		$pdf->SetX(5);
		
		if ($rowJ['suspendido'] == '0') {
			$pdf->Cell(49.5,5,strtoupper(utf8_decode($rowJ['apyn'])),1,0,'L',false);
			$pdf->Cell(20,5,$rowJ['dni'],1,0,'C',false);
			$pdf->Cell(25,5,'',1,0,'C',false);
			$pdf->Cell(17.5,5,'',1,0,'C',false);
			$pdf->Cell(15,5,'',1,0,'C',false);
			$pdf->Cell(20,5,'',1,0,'C',false);
			$pdf->Cell(20,5,$serviciosDatos->traerAcumuladosAmarillasPorTorneoZonaJugador($rowE['idtipotorneo'],$rowE['idgrupo'],$reffecha,$rowJ['idjugador']),1,0,'C',false);
			$pdf->Cell(20,5,'',1,0,'C',false);
			$pdf->Cell(13,5,'Si/No',1,0,'C',false);
		} else {
			$pdf->Cell(49.5,5,strtoupper(utf8_decode($rowJ['apyn'])),1,0,'L',true);
			$pdf->Cell(20,5,$rowJ['dni'],1,0,'C',true);
			$pdf->Cell(25,5,'',1,0,'C',true);
			$pdf->Cell(17.5,5,'',1,0,'C',true);
			$pdf->Cell(15,5,'',1,0,'C',true);
			$pdf->Cell(20,5,'',1,0,'C',true);
			$pdf->Cell(20,5,$serviciosDatos->traerAcumuladosAmarillasPorTorneoZonaJugador($rowE['idtipotorneo'],$rowE['idgrupo'],$reffecha,$rowJ['idjugador']),1,0,'C',false);
			$pdf->Cell(20,5,'',1,0,'C',true);
			$pdf->Cell(13,5,'(Susp.)',1,0,'C',true);	
		}
		if ($i == 28) {
			break;	
		}
	}
	
	if ($i < 29) {
		for ($j=$i+1;$j<29;$j++) {
			$pdf->Ln();
			$pdf->SetX(5);
			$pdf->Cell(49.5,5,'',1,0,'C',false);
			$pdf->Cell(20,5,'',1,0,'C',false);
			$pdf->Cell(25,5,'',1,0,'C',false);
			$pdf->Cell(17.5,5,'',1,0,'C',false);
			$pdf->Cell(15,5,'',1,0,'C',false);
			$pdf->Cell(20,5,'',1,0,'C',false);
			$pdf->Cell(20,5,'',1,0,'C',false);
			$pdf->Cell(20,5,'',1,0,'C',false);
			$pdf->Cell(13,5,'',1,0,'C',false);
		}
	}
	$pdf->Ln();
	$pdf->SetX(5);
	$pdf->Cell(56,5,'Total Goles:',1,0,'L',false);
	$pdf->Cell(56,5,'Total Amarillas:',1,0,'L',false);
	$pdf->Cell(55,5,'Total Rojas:',1,0,'L',false);
	
	$pdf->Ln();
	$pdf->SetX(5);
	$pdf->Cell(167,25,'OBSERVACIONES',1,0,'L',false);
	$pdf->Cell(16.5,5,'ENTRO',1,0,'C',false);
	$pdf->Cell(16.5,5,'SALIO',1,0,'C',false);
	$pdf->Ln();
	$pdf->SetX(172);
	$pdf->Cell(16.5,5,'',1,0,'L',false);
	$pdf->Cell(16.5,5,'',1,0,'L',false);
	$pdf->Ln();
	$pdf->SetX(172);
	$pdf->Cell(16.5,5,'',1,0,'L',false);
	$pdf->Cell(16.5,5,'',1,0,'L',false);
	
	$pdf->Ln();
	$pdf->SetX(172);
	$pdf->Cell(16.5,5,'',1,0,'L',false);
	$pdf->Cell(16.5,5,'',1,0,'L',false);
	
	$pdf->Ln();
	$pdf->SetX(172);
	$pdf->Cell(16.5,5,'',1,0,'L',false);
	$pdf->Cell(16.5,5,'',1,0,'L',false);

	
	
	/********* LA FECHA **************////////////////
	$pdf->SetXY(5,260);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(90,6,'FECHA:',0,0,'L',false);
	
	
	
	/********* LAS FIRMAS **************////////////////
	$pdf->SetXY(20,278);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(90,6,'FIRMA DELEGADO:',0,0,'L',false);
	$pdf->Cell(50,6,'ACLARACION:',0,0,'L',false);
}
//120 x 109



$nombreTurno = "Planillas-".$fecha.".pdf";

$pdf->Output($nombreTurno,'I');


?>

