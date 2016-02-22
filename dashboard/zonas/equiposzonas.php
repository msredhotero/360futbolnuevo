<?php


session_start();

if (!isset($_SESSION['usua_predio']))
{
	header('Location: ../../error.php');
} else {


include ('../../includes/funciones.php');
include ('../../includes/funcionesUsuarios.php');
include ('../../includes/funcionesHTML.php');
include ('../../includes/funcionesGrupos.php');
include ('../../includes/funcionesDATOS.php');
include ('../../includes/funcionesZonasEquipos.php');

$serviciosFunciones = new Servicios();
$serviciosUsuario 	= new ServiciosUsuarios();
$serviciosHTML 		= new ServiciosHTML();
$serviciosGrupos 	= new ServiciosG();
$serviciosDatos		= new ServiciosDatos();
$serviciosZonasEquipos = new ServiciosZonasEquipos();

$fecha = date('Y-m-d');

$resMenu = $serviciosHTML->menu(utf8_encode($_SESSION['nombre_predio']),"Zonas",$_SESSION['refroll_predio'],utf8_encode($_SESSION['torneo_predio']));


/////////////////////// Opciones de la pagina  ////////////////////

$lblTitulosingular	= "Zona";
$lblTituloplural	= "Zonas";

/////////////////////// Fin de las opciones /////////////////////

$idZona = $_GET['zona'];

$resEquipos = $serviciosZonasEquipos->TraerEquiposZonasPorTorneoZona($_SESSION['idtorneo_predio'],$idZona);

if ($_SESSION['refroll_predio'] != 1) {

} else {

	
}


?>

<!DOCTYPE HTML>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">



<title>Gestión: Predio 98</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link href="../../css/estiloDash.css" rel="stylesheet" type="text/css">
    

    
    <script type="text/javascript" src="../../js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" href="../../css/jquery-ui.css">

    <script src="../../js/jquery-ui.js"></script>
    
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"/>
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>

	<style type="text/css">
		
  
		
	</style>
    
   
   <link href="../../css/perfect-scrollbar.css" rel="stylesheet">
      <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
      <script src="../../js/jquery.mousewheel.js"></script>
      <script src="../../js/perfect-scrollbar.js"></script>
      <script>
      jQuery(document).ready(function ($) {
        "use strict";
        $('#navigation').perfectScrollbar();
      });
    </script>
</head>

<body>

 
<?php echo $resMenu; ?>

<div id="content">

<h3>Zonas-Equipos</h3>

    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Seleccione el equipo para cargar datos por zonas</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<div class="row" align="center">
            	
                <ul class="list-inline">
                	
                	<?php while ($row = mysql_fetch_array($resEquipos)) { ?>
                	<li style="margin:5px;">
                    	<a href="datos.php?zona=<?php echo $idZona; ?>&equipo=<?php echo $row[0]; ?>"><button type="button" class="btn btn-info" style="margin-left:0px;"><?php echo $row[1]; ?></button></a>
                    </li>
					<?php } ?>
                </ul>
            </div>
           
    	</div>
    </div>
    
  
   
</div>


</div>




<?php } ?>
</body>
</html>
