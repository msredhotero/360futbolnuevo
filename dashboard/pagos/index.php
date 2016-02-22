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


?>

<!DOCTYPE HTML>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">



<title>Gesti&oacute;n: Tres Sesenta F&uacute;tbol</title>
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
    <script type="text/javascript" src="../../js/jquery.number.min.js"></script>
	<link rel="stylesheet" href="../../css/bootstrap-datetimepicker.min.css">
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
		$('#importe').number( true, 2 );
      });
    </script>
</head>

<body>

 
<?php echo $resMenu; ?>

<div id="content">

<h3>Pagos</h3>

    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Carga de Pagos</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<div class="row">

            <form class="form-inline formulario" role="form">
    		<?php echo $formulario; ?>
            </div>
            <br>
            
            
            
            <div class="row">
                <div class="col-md-12" align="center">
                <ul class="list-inline" style="margin-top:15px;">
                    <li>
                        <button type="button" class="btn btn-primary" id="cargar" style="margin-left:0px;">Guardar</button>
                    </li>
                </ul>
                </div>
            </div>
            </form>


    	</div>
    </div>

	<div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Exportar</p>
        	
        </div>
    	<div class="cuerpoBox2">
        	<div class="row" style="padding-left:10px; padding-top:8px;">
            	<div class="col-md-11">
                <div class="alert alert-info"><strong>Importante:</strong> Una vez generado el archivo debera descargarlo!!.</div>
            	</div>
                <div class="col-md-6">
                	
                    <label class="control-label" for="asd">Nombre del archivo <span id="resultado"></span></label>
                    <div class="form-group col-md-12">
                    	<input type="text" name="nombrearchivo" id="nombrearchivo" class="form-control"/>
                    </div>
                </div>
                
                <div class="col-md-6">
                	
                    <label class="control-label" for="asd">Seleccione Fecha Hasta</label>
                    <div class="form-group col-md-12">
                    	<select id="reffechab" name="reffechab" class="form-control">
                        	<?php echo $cadRefFF; ?>
                        </select>
                    </div>
                </div>
            </div>            
            
            <div class="row">
                <div class="col-md-12" align="center">
                <ul class="list-inline" style="margin-top:15px;">
                    <li>
                        <button type="button" class="btn btn-primary exportarexcel" id="cargar" style="margin-left:0px;">Generar</button>
                    </li>
                </ul>
                </div>
            </div>


            
            <div id="load">
            
            </div>
    	</div>
    </div>
    
    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Pagos Cargados</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<?php echo $lstCargados; ?>
    	</div>
    </div>
    
   
</div>

</div>


</div>


<div id="dialog2" title="Eliminar Equipo de la Zona">
    	<p class="alert alert-danger">
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar el Pagos?.<span id="proveedorEli"></span>
        </p>

        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>

<script src="../../js/bootstrap-datetimepicker.min.js"></script>
<script src="../../js/bootstrap-datetimepicker.es.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	
	 <?php 
		echo $serviciosHTML->validacion($tabla);
	
	?>
	
	
	
	
	 $('.varborrar').click(function(event){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			$("#idEliminar").val(usersid);
			$("#dialog2").dialog("open");

			
			//url = "../clienteseleccionado/index.php?idcliente=" + usersid;
			//$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton eliminar
	
	$('.varmodificar').click(function(event){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			url = "modificar.php?id=" + usersid;
			$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton modificar

	 $( "#dialog2" ).dialog({
		 	
			    autoOpen: false,
			 	resizable: false,
				width:600,
				height:260,
				modal: true,
				buttons: {
				    "Eliminar": function() {
	
						$.ajax({
									data:  {id: $('#idEliminar').val(), accion: 'eliminarPagos'},
									url:   '../../ajax/ajax.php',
									type:  'post',
									beforeSend: function () {
											
									},
									success:  function (response) {
											
											$('.'+$('#idEliminar').val()).fadeOut( "slow", function() {
												$(this).remove();
											  });
											
											url = "index.php";
											//$(location).attr('href',url);
											
									}
							});
						$( this ).dialog( "close" );
						$( this ).dialog( "close" );
							
				    },
				    Cancelar: function() {
						$( this ).dialog( "close" );
				    }
				}
		 
		 
	 		}); //fin del dialogo para eliminar
	
	
	//al enviar el formulario
    $('#cargar').click(function(){
		
		if (validador() == "")
        {
			//información del formulario
			var formData = new FormData($(".formulario")[0]);
			var message = "";
			//hacemos la petición ajax  
			$.ajax({
				url: '../../ajax/ajax.php',  
				type: 'POST',
				// Form data
				//datos del formulario
				data: formData,
				//necesario para subir archivos via ajax
				cache: false,
				contentType: false,
				processData: false,
				//mientras enviamos el archivo
				beforeSend: function(){
					$("#load").html('<img src="../../imagenes/load13.gif" width="50" height="50" />');       
				},
				//una vez finalizado correctamente
				success: function(data){

					if (data == '') {
                                            $(".alert").removeClass("alert-danger");
											$(".alert").removeClass("alert-info");
                                            $(".alert").addClass("alert-success");
                                            $(".alert").html('<strong>Ok!</strong> Se cargo exitosamente el <strong>Pago</strong>. ');
											$(".alert").delay(3000).queue(function(){
												/*aca lo que quiero hacer 
												  después de los 2 segundos de retraso*/
												$(this).dequeue(); //continúo con el siguiente ítem en la cola
												
											});
											$("#load").html('');
											url = "index.php";
											$(location).attr('href',url);
                                            
											
                                        } else {
                                        	$(".alert").removeClass("alert-danger");
                                            $(".alert").addClass("alert-danger");
                                            $(".alert").html('<strong>Error!</strong> '+data);
                                            $("#load").html('');
                                        }
				},
				//si ha ocurrido un error
				error: function(){
					$(".alert").html('<strong>Error!</strong> Actualice la pagina');
                    $("#load").html('');
				}
			});
		}
    });
	
	
$('.exportarexcel33').click(function(e) {


	if ($('#nombrearchivo').val() != '') 
	{
		$.ajax({
			data:  {nombrearchivo:	$("#nombrearchivo").val(),
					reffecha: $("#reffechab").val(),
					accion:	'ImportarExcel'},
			url:   '../../ajax/ajax.php',
			type:  'post',
			beforeSend: function () {
					$("#load").html('<img src="../imagenes/load13.gif" width="50" height="50" />');
			},
			success:  function (response) {
				$('#resultado').html(': <a href="../../archivos/'+$("#nombrearchivo").val()+'.xlsx">Descargar</a>');
				$("#load").html('');
			}
		});
	} else {
		alert('Debe seleccionar un nombre para el archivo que se va a generar');	
	}

});	

$('.exportarexcel').click(function(e) {

	if ($('#nombrearchivo').val() != '') 
	{
		url = "generar.php?nombrearchivo="+$('#nombrearchivo').val()+"&reffecha="+$("#reffechab").val();
		$(location).attr('href',url);
	} else {
		alert('Debe seleccionar un nombre para el archivo que se va a generar');	
	}

});
	

});
</script>
<script type="text/javascript">
$('.form_date').datetimepicker({
	language:  'es',
	weekStart: 1,
	todayBtn:  1,
	autoclose: 1,
	todayHighlight: 1,
	startView: 2,
	minView: 2,
	forceParse: 0,
	format: 'dd/mm/yyyy'
});
</script>
<?php } ?>
</body>
</html>
