<?php

session_start();

if (!isset($_SESSION['usua_predio']))
{
	header('Location: ../../error.php');
} else {


include ('../../includes/funcionesUsuarios.php');
include ('../../includes/funciones.php');
include ('../../includes/funcionesHTML.php');
include ('../../includes/funcionesJugadores.php');
include ('../../includes/funcionesEquipos.php');
include ('../../includes/funcionesGrupos.php');
include ('../../includes/funcionesZonasEquipos.php');
include ('../../includes/funcionesDATOS.php');
include ('../../includes/funcionesPagos.php');
include ('../../includes/funcionesImportar.php');

$serviciosUsuario 	= new ServiciosUsuarios();
$serviciosHTML 		= new ServiciosHTML();
$serviciosFunciones = new Servicios();
$serviciosJugadores = new ServiciosJ();
$serviciosEquipos	= new ServiciosE();
$serviciosGrupos	= new ServiciosG();
$serviciosZonasEquipos	= new ServiciosZonasEquipos();
$serviciosDatos		= new ServiciosDatos();
$serviciosPagos		= new ServiciosPagos();
$serviciosImportar  = new ServiciosImportar();

$fecha = date('Y-m-d');

//$resProductos = $serviciosProductos->traerProductosLimite(6);
$resMenu = $serviciosHTML->menu($_SESSION['nombre_predio'],"Pagos",$_SESSION['refroll_predio'],$_SESSION['torneo_predio']);

//$hacer = $serviciosImportar->ImportarExcel(23,'asdas');


/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla 			= "dbpagos";

$lblCambio	 	= array("refequipo","reftorneo","refzona","reffecha","observacion","fechacreacion");
$lblreemplazo	= array("Equipos","Torneo","Zonas","Fecha","Observación","Fecha Creación");

$resTipoTorneo 	= $serviciosFunciones->TraerTorneos();

$cadRef = '';
$idtorneo = 0;
while ($rowTT = mysql_fetch_array($resTipoTorneo)) {
	$idtorneo = $rowTT[0];
	$cadRef = $cadRef.'<option value="'.$rowTT[0].'">'.$rowTT[1].'</option>';
	
}


$resZonas 	= $serviciosGrupos->TraerGrupos();

$cadRef2 = '';
while ($rowZ = mysql_fetch_array($resZonas)) {
	$cadRef2 = $cadRef2.'<option value="'.$rowZ[0].'">'.$rowZ[1].'</option>';
	
}


$resEquipos 	= $serviciosEquipos->TraerEquipos();

$cadRef3 = '';
while ($rowE = mysql_fetch_array($resEquipos)) {
	$cadRef3 = $cadRef3.'<option value="'.$rowE[0].'">'.$rowE[1].'</option>';
	
}

$resFechas 	= $serviciosFunciones->TraerFecha();

$cadRefFF = '';
while ($rowFF = mysql_fetch_array($resFechas)) {
	$cadRefFF = $cadRefFF.'<option value="'.$rowFF[0].'">'.$rowFF[1].'</option>';
	
}


$refdescripcion = array(0 => $cadRef3,1=>$cadRef,2=>$cadRef2,3=>$cadRefFF);
$refCampo	 	= array("refequipo","reftorneo","refzona","reffecha"); 


//////////////////////////////////////////////  FIN de los opciones //////////////////////////




/////////////////////// Opciones para la creacion del view  /////////////////////
$cabeceras 		= "	<th>Equipo</th>
				<th>Torneo</th>
				<th>Zona</th>
				<th>Fecha</th>
				<th>Pago</th>
				<th>Obs.</th>
				<th>Fecha Pago</th>";

//////////////////////////////////////////////  FIN de los opciones //////////////////////////




$formulario 	= $serviciosFunciones->camposTabla("insertarPagos",$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);

$lstCargados 	= $serviciosFunciones->camposTablaView($cabeceras,$serviciosPagos->traerPagos(),7);




if ($_SESSION['refroll_predio'] != 1) {

} else {

	
}

$nombrearchivo = $_GET['nombrearchivo'];
$reffecha = $_GET['reffecha'];



function query($sql,$accion) {
		
		
		require_once '../../includes/appconfig.php';

		$appconfig	= new appconfig();
		$datos		= $appconfig->conexion();
		$hostname	= $datos['hostname'];
		$database	= $datos['database'];
		$username	= $datos['username'];
		$password	= $datos['password'];
        

		
		$conex = mysql_connect($hostname,$username,$password) or die ("no se puede conectar".mysql_error());
		
		mysql_select_db($database);
		/*
		$result = mysql_query($sql,$conex);
		if ($accion && $result) {
			$result = mysql_insert_id();
		}
		mysql_close($conex);
		return $result;
		*/
                $error = 0;
		mysql_query("BEGIN");
		$result=mysql_query($sql,$conex);
		if ($accion && $result) {
			$result = mysql_insert_id();
		}
		if(!$result){
			$error=1;
		}
		if($error==1){
			mysql_query("ROLLBACK");
			return false;
		}
		 else{
			mysql_query("COMMIT");
			return $result;
		}
	}
	
	
require_once '../../excelClass/PHPExcel.php';
	
	// Se crea el objeto PHPExcel
	$objPHPExcel = new PHPExcel();

	// Se asignan las propiedades del libro
	$objPHPExcel->getProperties()->setCreator("Marcos") // Nombre del autor
		->setLastModifiedBy("Marcos") //Ultimo usuario que lo modificó
		->setTitle($nombrearchivo) // Titulo
		->setSubject($nombrearchivo) //Asunto
		->setDescription("Exportacion de datos") //Descripción
		->setKeywords("datos") //Etiquetas
		->setCategory("Reporte excel"); //Categorias
	
	$tituloReporte = "Registros Pagos Por Fecha";
	$titulosColumnas = array('Torneo', 'Equipo', 'Categoria', 'Fecha', 'Importe', 'Obs.', 'Fecha Pago');
	
	// Se combinan las celdas A1 hasta D1, para colocar ahí el titulo del reporte
	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:D1');

	// Se agregan los titulos del reporte
	$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1',$tituloReporte) // Titulo del reporte
		->setCellValue('A3',  $titulosColumnas[0])  //Titulo de las columnas
		->setCellValue('B3',  $titulosColumnas[1])
		->setCellValue('C3',  $titulosColumnas[2])
		->setCellValue('D3',  $titulosColumnas[3])
		->setCellValue('E3',  $titulosColumnas[4])
		->setCellValue('F3',  $titulosColumnas[5])
		->setCellValue('G3',  $titulosColumnas[6]);
	
	$estiloTituloReporte = array(
		'font' => array(
			'name'      => 'Verdana',
			'bold'      => true,
			'italic'    => false,
			'strike'    => false,
			'size' =>16,
			'color'     => array(
				'rgb' => 'FFFFFF'
			)
		),
		'fill' => array(
			'type'  => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array(
				'argb' => 'FF220835')
		),
		'borders' => array(
			'allborders' => array(
				'style' => PHPExcel_Style_Border::BORDER_NONE
			)
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			'rotation' => 0,
			'wrap' => TRUE
		)
	);
	 
	$estiloTituloColumnas = array(
		'font' => array(
			'name'  => 'Arial',
			'bold'  => true,
			'color' => array(
				'rgb' => 'FFFFFF'
			)
		),
		'fill' => array(
			'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
		'rotation'   => 90,
			'startcolor' => array(
				'rgb' => 'c47cf2'
			),
			'endcolor' => array(
				'argb' => 'FF431a5d'
			)
		),
		'borders' => array(
			'top' => array(
				'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
				'color' => array(
					'rgb' => '143860'
				)
			),
			'bottom' => array(
				'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
				'color' => array(
					'rgb' => '143860'
				)
			)
		),
		'alignment' =>  array(
			'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			'wrap'      => TRUE
		)
	);
	 
	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
		'font' => array(
			'name'  => 'Arial',
			'color' => array(
				'rgb' => '000000'
			)
		),
		'fill' => array(
		'type'  => PHPExcel_Style_Fill::FILL_SOLID,
		'color' => array(
				'argb' => 'FFd9b7f4')
		),
		'borders' => array(
			'left' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN ,
			'color' => array(
					'rgb' => '3a2a47'
				)
			)
		)
	));
	
	
	$sql = "select
				p.idpago,
				t.nombre as torneo,
				e.nombre as equipo,
				g.nombre as categoria,
				f.tipofecha,
				p.importe,
				p.observacion,
				p.fechacreacion
			from		dbpagos p
			inner
			join		dbequipos e
			on			p.refequipo = e.idequipo
			inner
			join		dbtorneos t
			on			t.idtorneo = p.reftorneo
			inner
			join		tbtipotorneo tp
			on			tp.idtipotorneo = t.reftipotorneo
			inner
			join		dbgrupos g
			on			g.idgrupo = p.refzona
			inner
			join		tbfechas f
			on			f.idfecha = p.reffecha
			where p.reffecha <= ".$reffecha."
			order by	f.idfecha,e.nombre";
	$res 		=	query($sql,0);
	
	if ($res == false) {
		return 'Error al traer datos';
	} else {
		$cad = '<table id="Exportar_a_Excel">
					<tr>
						<th>Torneo</th>
						<th>Equipo</th>
						<th>Categoria</th>
						<th>Fecha</th>
						<th>Importe</th>
						<th>Obs.</th>
						<th>Fecha Pago</th>
					</tr>';
		$i = 4; //Numero de fila donde se va a comenzar a rellenar
		 while ($fila = mysql_fetch_array($res)) {
			 $objPHPExcel->setActiveSheetIndex(0)
				 ->setCellValue('A'.$i, $fila['torneo'])
				 ->setCellValue('B'.$i, $fila['equipo'])
				 ->setCellValue('C'.$i, $fila['categoria'])
				 ->setCellValue('D'.$i, $fila['tipofecha'])
				 ->setCellValue('E'.$i, $fila['importe'])
				 ->setCellValue('F'.$i, $fila['observacion'])
				 ->setCellValue('G'.$i, $fila['fechacreacion']);
			 $i++;
			 $cad .= '<tr>';
			 $cad .= '<td>'.$fila['torneo'].'</td>';
			 $cad .= '<td>'.$fila['equipo'].'</td>';
			 $cad .= '<td>'.$fila['categoria'].'</td>';
			 $cad .= '<td>'.$fila['tipofecha'].'</td>';
			 $cad .= '<td>'.$fila['importe'].'</td>';
			 $cad .= '<td>'.$fila['observacion'].'</td>';
			 $cad .= '<td>'.$fila['fechacreacion'].'</td>';
			 $cad .= '</tr>';
		 }
		$cad .= '</table>';
		//$objPHPExcel->getActiveSheet()->getStyle('A1:D1')->applyFromArray($estiloTituloReporte);
		//$objPHPExcel->getActiveSheet()->getStyle('A3:G3')->applyFromArray($estiloTituloColumnas);
		//$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:G".($i-1));
		
		//for($i = 'A'; $i <= 'M'; $i++){
		//	$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
		//}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('Resultado');
		 
		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		 
		// Inmovilizar paneles
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		//$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,12);
		
		// Se manda el archivo al navegador web, con el nombre que se indica, en formato 2007
		
		
		/*
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$nombrearchivo.'.xlsx"');
		header('Cache-Control: max-age=0');
		 
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		*/
		/*
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$nombrearchivo.'.xlsx"');
		header('Cache-Control: max-age=0');
		 
		$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
		*/
		//$objWriter->save('php://output');
		//$objWriter->save('../../archivos/'.$nombrearchivo.'.xlsx');
		
		//$objWriter->save('../archivos/'.$nombrearchivo.'.xlsx');
		/*
		$objWriter->save('php://output');
		exit;
		*/
		// We'll be outputting an excel file
//header('Content-type: application/vnd.ms-excel');

// It will be called file.xls
//header('Content-Disposition: attachment; filename="file.xls"');

// Write file to the browser
//$objWriter->save('php://output');

		
		
}


?>
<!DOCTYPE HTML>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">



<title>Gesti&oacute;n: Tres Sesenta F&uacute;tbol</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style type="text/css">
		table {  color: #333; font-family: Helvetica, Arial, sans-serif; width: 640px; border-collapse: collapse;}
td, th { border: 1px solid #333; height: 30px; }
th { background: #D3D3D3; font-weight: bold; }
td { background: #FAFAFA; text-align: center; }
tr:nth-child(even) td { background: #F1F1F1; }  
tr:nth-child(odd) td { background: #FEFEFE; } 
tr td:hover { background: #666; color: #FFF; }
  
		
	</style>
    
    </head>

<body>
<?php 

header("Content-type: application/vnd.ms-excel; name='excel'");
		header("Content-Disposition: filename=ficheroExcel.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
		echo $cad; ?>
</body>
</html>
<?php } ?>


