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

$resMenu = $serviciosHTML->menu(utf8_encode($_SESSION['nombre_predio']),"Fixture",$_SESSION['refroll_predio'],utf8_encode($_SESSION['torneo_predio']));


/////////////////////// Opciones de la pagina  ////////////////////

$lblTitulosingular	= "Chequear";
$lblTituloplural	= "Chequear";

/////////////////////// Fin de las opciones /////////////////////

/////////////////////// Opciones para la creacion del view  /////////////////////
$cabeceras 		= "	<th>Equipo</th>
					<th>Fecha</th>
				";

//////////////////////////////////////////////  FIN de los opciones //////////////////////////

$cadF = '';
$resFechas = $serviciosFunciones->TraerFecha();
while ($rowF = mysql_fetch_array($resFechas)) {
	$cadF = $cadF.'<option value="'.$rowF[0].'">'.$rowF[1].'</option>';	
}


$lstCargados 	= $serviciosFunciones->camposTablaView($cabeceras,$serviciosZonasEquipos->TraerFixtureSinTablaConducta(),2);


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

<h3>Fixture-Chequear</h3>

    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Seleccione la fecha para cargar masivamente la carga de puntos de la tabla conducta</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<div class="row" align="center">
            	<form class="form-inline formulario" role="form">
            	<div class="alert alert-info" style="margin:0 15px;">
                <h4>Cada vez que empiece una fecha nueva debera cargar esta tabla para poder sumarizar los puntos del FairPlay de cada equipo en una fecha arbitraria.</h4>
                </div>
                <div class="row">
                	
                	<div class="form-group col-md-6">

                    
                    
                    <div class="form-group col-md-8">
                     <label class="control-label" style="text-align:left" for="torneo">Fecha</label>
                        <div class="input-group col-md-12">
                            <select id="reffecha" class="form-control" name="reffecha">
                                <option value="0">--Seleccione--</option>
                                <?php echo $cadF; ?>
                                    
                            </select>
                        </div>
                    </div>
                
                </div>
                
                <div class="row">
                    <div class="alert"> </div>
                    <div id="load"> </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <ul class="list-inline" style="margin-top:15px;">
                        <li>
                       	 <button id="cargar" class="btn btn-primary" style="margin-left:0px;" type="button">Cargar Tabla de conducta</button>
                        </li>
                        <li>
                       	 <button id="calcular" class="btn btn-warning" style="margin-left:0px;" type="button">Calcular Tabla de conducta</button>
                        </li>
                    </ul>
                    </div>
                </div>
            
            </form>
            </div>
           
    	</div>
    </div>
    
    
    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Conducta de Fixture sin cargar</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<?php echo $lstCargados; ?>
    	</div>
    </div>
  
   
</div>


</div>



<script type="text/javascript">
$(document).ready(function(){

$('#cargar').click(function() {
		if ($('#reffecha').val() == 0) {
			alert("Error, debe seleccionar una fecha.");	
		} else {
			$.ajax({
					data:  {reffecha: $('#reffecha').val(), 
							accion: 'cargarTablaConducta'},
					url:   '../../ajax/ajax.php',
					type:  'post',
					beforeSend: function () {
							
					},
					success:  function (response) {
							url = "conductafixture.php";
							$(location).attr('href',url);
							
					}
			});
		}
	});

$('#calcular').click(function() {
		if ($('#reffecha').val() == 0) {
			alert("Error, debe seleccionar una fecha.");	
		} else {
			$.ajax({
					data:  {reffecha: $('#reffecha').val(), 
							accion: 'calcularTablaConducta'},
					url:   '../../ajax/ajax.php',
					type:  'post',
					beforeSend: function () {
							
					},
					success:  function (response) {
							url = "conductafixture.php";
							$(location).attr('href',url);
							
					}
			});
		}
	});
	
	
	



	

});
</script>

<?php } ?>
</body>
</html>
