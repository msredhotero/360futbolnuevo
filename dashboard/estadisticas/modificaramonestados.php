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


$serviciosUsuarios  = new ServiciosUsuarios();
$serviciosFunciones = new Servicios();
$serviciosHTML		= new ServiciosHTML();
$serviciosJugadores = new ServiciosJ();
$serviciosEquipos	= new ServiciosE();


$fecha = date('Y-m-d');

$id = $_GET['id'];

$resGoleadores = $serviciosJugadores->traerAmonestadosPorId($id);

$resMenu = $serviciosHTML->menu($_SESSION['nombre_predio'],"Amonestado",$_SESSION['refroll_predio'],utf8_encode($_SESSION['torneo_predio']));


$resEquipos = $serviciosEquipos->TraerEquipos();

/////////////////////// Opciones de la pagina  ////////////////////

$lblTitulosingular	= "Amonestado";
$lblTituloplural	= "Amonestados";
$lblEliminarObs		= "Si elimina el Amonestado se eliminara todo el contenido de este";
$accionEliminar		= "eliminarAmonestados";

/////////////////////// Fin de las opciones /////////////////////





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

<h3><?php echo $lblTituloplural; ?></h3>

    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Modificar <?php echo $lblTitulosingular; ?></p>
        	
        </div>
    	<div class="cuerpoBox">
    		<form class="form-inline formulario" role="form">
        	<div class="row">

                <div class="form-group col-md-6">
               	 <label class="control-label" style="text-align:left" for="refequipos">Equipos</label>
                    <div class="input-group col-md-12">
                    	<select id="refequipo" class="form-control" name="refequipo">
                    		<option value="<?php echo mysql_result($resGoleadores,0,4); ?>"><?php echo mysql_result($resGoleadores,0,5); ?></option>
							<?php
								while ($row = mysql_fetch_array($resEquipos)) {
							?>
                            		<option value="<?php echo $row[0]; ?>"><?php echo utf8_encode($row[1]); ?></option>
                            <?php	
								}
							?>
                    	</select>
                    </div>
                </div>
                
                <div class="form-group col-md-6">
               	 <label class="control-label" style="text-align:left" for="reftorneo">Jugadores</label>
                    <div class="input-group col-md-12">
                    	<select id="refjugador" class="form-control" name="refjugador">
                    		<option value="<?php echo mysql_result($resGoleadores,0,1); ?>"><?php echo utf8_encode(mysql_result($resGoleadores,0,2)).' - '.mysql_result($resGoleadores,0,3); ?></option>
                    	</select>
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
               	 <label class="control-label" style="text-align:left" for="reftorneo">Fecha</label>
                    <div class="input-group col-md-12">
                    	<select id="reffixture" class="form-control" name="reffixture">
                    		<option value="<?php echo mysql_result($resGoleadores,0,'idfixture'); ?>"><?php echo utf8_encode(mysql_result($resGoleadores,0,2)).' - '.mysql_result($resGoleadores,0,'tipofecha'); ?></option>
                    	</select>
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
               	 <label class="control-label" style="text-align:left" for="reftorneo">Amarillas</label>
                    <div class="input-group col-md-12">
                    	<input type="text" id="amarillas" name="amarillas" class="form-control" value="<?php echo mysql_result($resGoleadores,0,'amarillas'); ?>" required/>
                    </div>
                </div>
            
            </div>
            
            
            
            <div class='row'>
                <div class='alert'>
                
                </div>
                <div id='load'>
                
                </div>
            </div>
			
            
            <div class="row">
                <div class="col-md-12">
                <ul class="list-inline" style="margin-top:15px;">
                    <li>
                        <button type="button" class="btn btn-warning" id="cargar" style="margin-left:0px;">Modificar</button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-danger varborrar" id="<?php echo $id; ?>" style="margin-left:0px;">Eliminar</button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-default volver" style="margin-left:0px;">Volver</button>
                    </li>
                </ul>
                </div>
            </div>
            <input type="hidden" id="accion" name="accion" value="modificarAmonestados" />
            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>" />
            </form>
    	</div>
    </div>

    
   
</div>


</div>

<div id="dialog2" title="Eliminar <?php echo $lblTitulosingular; ?>">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar el <?php echo $lblTitulosingular; ?>?.<span id="proveedorEli"></span>
        </p>
        <p><strong>Importante: </strong><?php echo $lblEliminarObs; ?></p>
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>


<script type="text/javascript">
$(document).ready(function(){
	
	 $('#refequipo').change(function() {
		$.ajax({
			data:  {refequipo: $('#refequipo').val(),
					accion: 'traerJugadores'},
			url:   '../../ajax/ajax.php',
			type:  'post',
			beforeSend: function () {
				$('#refjugador').html('')	
			},
			success:  function (response) {
				$('#refjugador').html(response);
					
			}
		});
		
		$.ajax({
			data:  {refequipo: $('#refequipo').val(),
					accion: 'traerFixturePorEquipo'},
			url:   '../../ajax/ajax.php',
			type:  'post',
			beforeSend: function () {
				$('#reffixture').html('')	
			},
			success:  function (response) {
				$('#reffixture').html(response);
					
			}
		});
	});

	
	$('.volver').click(function(event){
		 
		url = "index.php";
		$(location).attr('href',url);
	});//fin del boton modificar
	
	
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
	


	 $( "#dialog2" ).dialog({
		 	
			    autoOpen: false,
			 	resizable: false,
				width:600,
				height:240,
				modal: true,
				buttons: {
				    "Eliminar": function() {
	
						$.ajax({
									data:  {id: $('#idEliminar').val(), accion: '<?php echo $accionEliminar; ?>'},
									url:   '../../ajax/ajax.php',
									type:  'post',
									beforeSend: function () {
											
									},
									success:  function (response) {
											url = "index.php";
											$(location).attr('href',url);
											
									}
							});
						$( this ).dialog( "close" );
						$( this ).dialog( "close" );
							$('html, body').animate({
	           					scrollTop: '1000px'
	       					},
	       					1500);
				    },
				    Cancelar: function() {
						$( this ).dialog( "close" );
				    }
				}
		 
		 
	 		}); //fin del dialogo para eliminar
	
	
	function validador(){
		$error = "";
		
		if ($("#refequipo").val() == "") {
			
			$error = "Es obligatorio el campo Equipo.";
			$("#refequipo").addClass("alert-danger");
			$("#refequipo").attr("placeholder",$error);
		}
		
		if ($("#refjugador").val() == "") {
			
			$error = "Es obligatorio el campo Jugador.";
			$("#refjugador").addClass("alert-danger");
			$("#refjugador").attr("placeholder",$error);
		}
		
		if ($("#reffixture").val() == "") {
			
			$error = "Es obligatorio el campo Fecha.";
			$("#reffixture").addClass("alert-danger");
			$("#reffixture").attr("placeholder",$error);
		}
		
		if ($("#amarillas").val() == "") {
			
			$error = "Es obligatorio el campo Amarillas.";
			$("#amarillas").addClass("alert-danger");
			$("#amarillas").attr("placeholder",$error);
		}
		
		return $error;
	}
	
	
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
                                            $(".alert").html('<strong>Ok!</strong> Se Modifico exitosamente el <strong>Amarillas</strong>. ');
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
	

});
</script>
<?php } ?>
</body>
</html>
