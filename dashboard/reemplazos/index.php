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

$serviciosUsuario 	= new ServiciosUsuarios();
$serviciosHTML 		= new ServiciosHTML();
$serviciosFunciones = new Servicios();
$serviciosJugadores = new ServiciosJ();
$serviciosEquipos	= new ServiciosE();
$serviciosZonas 	= new ServiciosG();
$serviciosZonasEquipos	= new ServiciosZonasEquipos();
$serviciosDatos	= new ServiciosDatos();

$fecha = date('Y-m-d');

//$resProductos = $serviciosProductos->traerProductosLimite(6);
$resMenu = $serviciosHTML->menu(utf8_encode($_SESSION['nombre_predio']),"ZonasEquipos",$_SESSION['refroll_predio'],utf8_encode($_SESSION['torneo_predio']));



/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla 			= "dbreemplazo";

$lblCambio	 	= array("refequipo","refequiporeemplazado","reffecha","reftorneo","golesencontra");
$lblreemplazo	= array("Equipo - Entra","Equipo - Sale","Fecha","Tipo Torneo","Goles en contra");

$resTipoTorneo 	= $serviciosFunciones->TraerTorneosActivoTodos();

$cadRef = '';
$idtorneo = 0;
while ($rowTT = mysql_fetch_array($resTipoTorneo)) {
	$idtorneo = $rowTT[0];
	$cadRef = $cadRef.'<option value="'.$rowTT[0].'">'.$rowTT[1]." - ".$rowTT[4].'</option>';
	
}


$resFecha 	= $serviciosFunciones->TraerFecha();

$cadRef2 = '';
while ($rowZ = mysql_fetch_array($resFecha)) {
	$cadRef2 = $cadRef2.'<option value="'.$rowZ[0].'">'.utf8_encode($rowZ[1]).'</option>';
	
}


$resEquipos 	= $serviciosEquipos->TraerEquipos();

$cadRef3 = '';
while ($rowE = mysql_fetch_array($resEquipos)) {
	$cadRef3 = $cadRef3.'<option value="'.$rowE[0].'">'.utf8_encode($rowE[1]).'</option>';
	
}



$refdescripcion = array(0 => $cadRef3,1=>$cadRef3,2=>$cadRef2,3=>$cadRef);
$refCampo	 	= array("refequipo","refequiporeemplazado","reffecha","reftorneo"); 





//////////////////////////////////////////////  FIN de los opciones //////////////////////////




/////////////////////// Opciones para la creacion del view  /////////////////////
$cabeceras 		= "	<th>Equipo(Entra)</th>
				<th>Equipo(Sale)</th>
				<th>Puntos</th>
				<th>Goles En Contra</th>
				<th>Fecha</th>
				<th>Tipo Torneo</th>";

//////////////////////////////////////////////  FIN de los opciones //////////////////////////




$formulario 	= $serviciosFunciones->camposTabla("insertarReemplazos",$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);

$lstCargados 	= $serviciosFunciones->camposTablaView($cabeceras,$serviciosZonasEquipos->traerReemplazos(),6);

$cadZonas = '';
$resZonas = $serviciosZonas->TraerGrupos();
while ($rowZonas = mysql_fetch_array($resZonas)) {
	$cadZonas = $cadZonas.'<option value="'.$rowZonas[0].'">'.$rowZonas[1].'</option>';	
}


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

<h3>Reemplazos</h3>

    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Carga de Reemplazos</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<div class="row">
            <form class="form-inline formulario" role="form">
    		<?php echo $formulario; ?>
            </div>
            <br>
            <div class="form-group col-md-6">
             <label class="control-label" style="text-align:left" for="torneo">Zona</label>
                <div class="input-group col-md-8">
                    <select id="refzona" class="form-control" name="refzona">
                        <option value="0">--Seleccione--</option>
                        <?php echo $cadZonas; ?>
                            
                    </select>
                </div>
                <div class="input-group col-md-4">
                	<button id="buscar" class="btn btn-primary" style="margin-left:0px;" type="button">Buscar</button>
                </div>
            </div>
            
            <div class="form-group col-md-6">
             <label class="control-label" style="text-align:left" for="torneo">Puntos Fair Play</label>
                <div class="input-group col-md-12">
                    <input type="text" class="form-control" id="fairplay" name="fairplay" value="0" />
                </div>

            </div>
            
            <div class="row">
                <div class="col-md-12">
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
	<div class="boxInfoLargo" style="margin-top:-30px;">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Posiciones</p>
        	
        </div>
    	<div class="cuerpoBox" id="posiciones">
        
        </div>
        
    </div>
    
    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Reemplazos Cargados</p>
        	
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
            ¿Esta seguro que desea eliminar el Reemplazos?.<span id="proveedorEli"></span>
        </p>

        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>

<script type="text/javascript">
$(document).ready(function(){
	
	 <?php 
		echo $serviciosHTML->validacion($tabla);
	
	?>
	
	function traerPosiciones(reftorneo,refzona,reffecha, zona) {
		$.ajax({
				data:  {reftorneo: reftorneo,
						refzona: refzona,
						zona: zona,
						reffecha: reffecha,
						accion: 'TraerFixturePorZonaPorTorneo'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
						$('#posiciones').html(response);
						
				}
		});
	}
	
	$('#buscar').click(function(e) {
		traerPosiciones($('#reftorneo').val(),$('#refzona').val(),$('#reffecha').val(),$('#refzona option:selected').text());
	});
	
	traerPosiciones($('#reftorneo').val(),$('#refzona').val(),$('#reffecha').val(),$('#refzona option:selected').text());
	
	
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
									data:  {id: $('#idEliminar').val(), accion: 'eliminarZonasEquipos'},
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
                                            $(".alert").html('<strong>Ok!</strong> Se cargo exitosamente el <strong>Equipo a la Zona</strong>. ');
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
	
	
	
	
	
	
	
	
	
	//al enviar el formulario
    $('#cambiar').click(function(){
		
		if (($('#refequipor').val() != 0) && ($('#refequiporr').val() != 0))
        {
			//información del formulario
			var formData = new FormData($(".formulario2")[0]);
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
                                            $(".alert").html('<strong>Ok!</strong> Se cargo exitosamente el <strong>Equipo a la Zona</strong>. ');
											$(".alert").delay(3000).queue(function(){
												/*aca lo que quiero hacer 
												  después de los 2 segundos de retraso*/
												$(this).dequeue(); //continúo con el siguiente ítem en la cola
												
											});
											$("#load").html('');
											url = "index.php";
											//$(location).attr('href',url);
                                            
											
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
		} else {
			alert("Debe seleccionar ambos equipos");	
		}
    });

});
</script>
<?php } ?>
</body>
</html>
