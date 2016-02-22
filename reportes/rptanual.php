<?php

date_default_timezone_set('America/Buenos_Aires');
require '../includes/funcionesProductos.php';
require '../includes/funcionesTurnos.php';
require '../includes/funcionesConfiguraciones.php';
require '../includes/funcionesReportes.php';

$serviciosProductos = new ServiciosProductos();
$serviciosTurnos	= new ServiciosTurnos();
$serviciosConfiguraciones = new ServiciosConfiguraciones();
$serviciosReportes = new ServiciosReportes();

$where = " and year(v.fechacreacion) = ".date('Y')." ";


$resIngresosCanchas = $serviciosReportes->ingresosCanchas($where);
$resIngresosVentas = $serviciosReportes->ingresosVentas($where);
$resIngresosFiestas = $serviciosReportes->ingresosFiestas($where);

$fecha = date('Y-m-d');

require('fpdf.php');

//$header = array("Hora", "Cancha 1", "Cancha 2", "Cancha 3");

$TotalIngresos = 0;
$TotalEgresos = 0;
$Totales = 0;
$Caja = 0;



class PDF extends FPDF
{
// Cargar los datos

// Tabla coloreada
function ingresosCanchas($header, $data, &$TotalIngresos)
{
	$this->SetFont('Arial','',12);
	$this->Cell(60,7,'Fecha:'.date('Y-m-d'),0,0,'L',false);
	$this->Ln();
	$this->Cell(60,7,'Ingresos de Canchas',0,0,'L',false);
    $this->SetFont('Arial','',10);
	// Colores, ancho de l�nea y fuente en negrita
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
	$this->Ln();
	
	
    // Cabecera
    $w = array(90, 20,25,25,25);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauraci�n de colores y fuentes
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Datos
    $fill = false;
	
	$total = 0;
	$totalcant = 0;
    while ($row = mysql_fetch_array($data))
    {
		$total = $total + $row[0];
		$totalcant = $totalcant + $row[2];
		
        $this->Cell($w[0],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row[0],'LR',0,'R',$fill);
        $this->Cell($w[2],6,$row[2],'LR',0,'C',$fill);
        $this->Cell($w[3],6,$row[3],'LR',0,'C',$fill);
		$this->Cell($w[4],6,$row[4],'LR',0,'C',$fill);
        $this->Ln();
        $fill = !$fill;
    }
	
    // L�nea de cierre
    $this->Cell(array_sum($w),0,'','T');
	$this->SetFont('Arial','',12);
	$this->Ln();
	$this->Ln();
	$this->Cell(60,7,'Cantidad de Alquileres:'.number_format($totalcant, 2, '.', ','),0,0,'L',false);
	$this->Ln();
	$this->Cell(60,7,'Total de Alquileres: $'.number_format($total, 2, '.', ','),0,0,'L',false);
	
	$TotalIngresos = $total;
	
}


// Tabla coloreada
function ingresosVentas($header, $data, &$TotalIngresos, &$TotalEgresos)
{
	$this->SetFont('Arial','',12);
	$this->Ln();
	$this->Ln();
	$this->Cell(60,7,'Ingresos de Ventas',0,0,'L',false);
	$this->SetFont('Arial','',10);
    // Colores, ancho de l�nea y fuente en negrita
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
	$this->Ln();
	
	
    // Cabecera
    $w = array(90, 30,30);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauraci�n de colores y fuentes
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Datos
    $fill = false;
	
	$total = 0;
	$totalcant = 0;
    while ($row = mysql_fetch_array($data))
    {
		$total = $total + $row[0];
		$totalcant = $totalcant + $row[2];
		if ($row[3] == 1) {
			$TotalEgresos = $TotalEgresos + $row[0];
		}
        $this->Cell($w[0],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row[0],'LR',0,'R',$fill);
        $this->Cell($w[2],6,$row[2],'LR',0,'C',$fill);
		
        $this->Ln();
        $fill = !$fill;
    }
	
    // L�nea de cierre
    $this->Cell(array_sum($w),0,'','T');
	$this->SetFont('Arial','',12);
	$this->Ln();
	$this->Ln();
	$this->Cell(60,7,'Cantidad de Ventas:'.number_format($totalcant, 2, '.', ','),0,0,'L',false);
	$this->Ln();
	$this->Cell(60,7,'Total de Ventas: $'.number_format($total, 2, '.', ','),0,0,'L',false);
	
	$TotalIngresos = $TotalIngresos + $total;
	
	
}


// Tabla coloreada
function ingresosFiestas($header, $data, &$TotalIngresos)
{
	$this->SetFont('Arial','',12);
	$this->Ln();
	$this->Ln();
	$this->Cell(60,7,'Ingresos de Fiestas',0,0,'L',false);
	$this->SetFont('Arial','',10);
    // Colores, ancho de l�nea y fuente en negrita
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
	$this->Ln();
	
	
    // Cabecera
    $w = array(90, 20,25,25,25);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauraci�n de colores y fuentes
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Datos
    $fill = false;
	
	$total = 0;
	$totalcant = 0;
    while ($row = mysql_fetch_array($data))
    {
		$total = $total + $row[0];
		$totalcant = $totalcant + $row[2];
		
        $this->Cell($w[0],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row[0],'LR',0,'R',$fill);
        $this->Cell($w[2],6,$row[2],'LR',0,'C',$fill);
		$this->Cell($w[3],6,$row[3],'LR',0,'C',$fill);
		$this->Cell($w[4],6,$row[4],'LR',0,'C',$fill);
        $this->Ln();
        $fill = !$fill;
    }
	
    // L�nea de cierre
    $this->Cell(array_sum($w),0,'','T');
	$this->SetFont('Arial','',12);
	$this->Ln();
	$this->Ln();
	$this->Cell(60,7,'Cantidad de Fiestas:'.number_format($totalcant, 2, '.', ','),0,0,'L',false);
	$this->Ln();
	$this->Cell(60,7,'Total de Fiestas: $'.number_format($total, 2, '.', ','),0,0,'L',false);
	
	$TotalIngresos = $TotalIngresos + $total;
}

}






$pdf = new PDF();


// T�tulos de las columnas
$header = array("Tipo Alquiler", "Importe", "Cant", "Completados","Cancelados");

$headerVentas = array("Tipo Producto", "Importe", "Cant");

$headerFiestas = array("Tipo Fiesta", "Importe", "Cant", "Completados","Cancelados");
// Carga de datos

$pdf->AddPage();

$pdf->SetFont('Arial','U',15);
$pdf->Cell(180,7,'Reporte: Ingresos/Egresos Anuales',0,0,'C',false);
$pdf->Ln();

$pdf->SetFont('Arial','',10);


$pdf->ingresosCanchas($header,$resIngresosCanchas,$TotalIngresos);

$pdf->ingresosVentas($headerVentas,$resIngresosVentas,$TotalIngresos,$TotalEgresos);

$pdf->ingresosFiestas($headerFiestas,$resIngresosFiestas,$TotalIngresos);

$pdf->Ln();

$pdf->SetFont('Arial','',13);

$pdf->Ln();
$pdf->Cell(60,7,'Importe Ingresos:'.number_format($TotalIngresos, 2, '.', ','),0,0,'L',false);
$pdf->Ln();
$pdf->Cell(60,7,'Importe Egresos: $'.number_format($TotalEgresos, 2, '.', ','),0,0,'L',false);
$pdf->Ln();
$pdf->Cell(60,7,'Importe Total:'.number_format(($TotalIngresos + $TotalEgresos), 2, '.', ','),0,0,'L',false);


$nombreTurno = "Anual-".$fecha.".pdf";

$pdf->Output($nombreTurno,'D');


?>

