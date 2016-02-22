<?php

session_start();

if (!isset($_SESSION['usua_predio']))
{
	header('Location: ../../error.php');
} else {


include ('../../includes/funciones.php');
include ('../../includes/funcionesUsuarios.php');
include ('../../includes/funcionesHTML.php');
include ('../../includes/funcionesEquipos.php');
include ('../../includes/funcionesJugadores.php');

$serviciosFunciones = new Servicios();
$serviciosUsuario = new ServiciosUsuarios();
$serviciosHTML = new ServiciosHTML();
$serviciosEquipos = new ServiciosE();
$serviciosJugadores = new ServiciosJ();

$fecha = date('Y-m-d');

$resMenu = $serviciosHTML->menu($_SESSION['nombre_predio'],"Suspendidos",$_SESSION['refroll_predio'],utf8_encode($_SESSION['torneo_predio']));


$id = $_GET['id'];

$resResultado = $serviciosJugadores->traerSuspendidosPorId($id);

/////////////////////// Opciones de la pagina  ////////////////////
$tabla = 'tbsuspendidos';

$lblTitulosingular	= "Suspendido";
$lblTituloplural	= "Suspendidos";
$lblEliminarObs		= "Si elimina el Suspendido";
$accionEliminar		= "eliminarSuspendidos";

/////////////////////// Fin de las opciones /////////////////////


/////////////////////// Opciones para la creacion del formulario  /////////////////////


$resTipoTorneo 	= $serviciosEquipos->TraerEquipos();

$cadRef = '';
while ($rowTT = mysql_fetch_array($resTipoTorneo)) {
	if (mysql_result($resResultado,0,'refequipo')==$rowTT[0]) {
		$cadRef = $cadRef.'<option value="'.$rowTT[0].'" selected>'.utf8_encode($rowTT[1]).'</option>';
	} else {
		$cadRef = $cadRef.'<option value="'.$rowTT[0].'">'.utf8_encode($rowTT[1]).'</option>';
	}
	
}

//////////////////////////////////////////////  FIN de los opciones //////////////////////////


/////////////////// Fechas para Suspender ///////////////////////

$resFechas = $serviciosFunciones->TraerFecha();

$resFS = $serviciosFunciones->traerSuspendidosPorFechas( mysql_result($resResultado,0,'idjugador'),mysql_result($resResultado,0,'refequipo'),$id);


	while ($subrow = mysql_fetch_array($resFS)) {
			$arrayFS[] = $subrow;
	}



$cadFechasS = '<ul class="list-inline">';
while ($rowFS = mysql_fetch_array($resFechas)) {
	$check = '';
	if (mysql_num_rows($resFS)>0) {
		foreach ($arrayFS as $item) {
			if (stripslashes($item['reffecha']) == $rowFS[0]) {
				$check = 'checked';	
			}
		}
	}
	$cadFechasS = $cadFechasS."<li>".'<input id="fecha'.$rowFS[0].'" '.$check.' class="form-control" type="checkbox" required="" style="width:50px;" name="fecha'.$rowFS[0].'"><p>'.$rowFS[1].'</p>'."</li>";


}



$cadFechasS = $cadFechasS."</ul>";

/////////////////////////////////////////////////////////////////


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
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="../../css/bootstrap-datetimepicker.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    

    
   
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
        	<p style="color: #fff; font-size:18px; height:16px;">Modificación de <?php echo $lblTituloplural; ?></p>
        	
        </div>
    	<div class="cuerpoBox">
        	<form class="form-inline formulario" role="form">
        	
			<div class="row">
				<div class="form-group col-md-6">
               	 <label class="control-label" style="text-align:left" for="refequipos">Equipos</label>
                    <div class="input-group col-md-12">
                    	<select id="refequipo" class="form-control" name="refequipo">
                    		<option value="0">--Seleccione--</option>
							<?php
								echo $cadRef;
							?>
                    	</select>
                    </div>
                </div>
                
                <div class="form-group col-md-6">
               	 <label class="control-label" style="text-align:left" for="reftorneo">Jugadores</label>
                    <div class="input-group col-md-12">
                    	<select id="refjugador" class="form-control" name="refjugador">
                    		<option value="<?php echo mysql_result($resResultado,0,'idjugador'); ?>"><?php echo mysql_result($resResultado,0,'apyn'); ?></option>
                    	</select>
                    </div>
                </div>
                
                
                
                
                
                <div class="form-group col-md-6">
               	 <label class="control-label" style="text-align:left" for="reftorneo">Cant.Fechas</label>
                    <div class="input-group col-md-12">
                    	<input type="text" id="cantidadfechas" value="<?php echo mysql_result($resResultado,0,'cantidadfechas'); ?>" name="cantidadfechas" class="form-control" required/>
                    </div>
                </div>
            	
                <div class="form-group col-md-6">
               	 <label class="control-label" style="text-align:left" for="reftorneo">Fecha</label>
                    <div class="input-group col-md-12">
                    	<select id="reffixture" class="form-control" name="reffixture">
                    		
                    	</select>
                    </div>
                </div>
                
                <div class="form-group col-md-12">
               	 <label class="control-label" style="text-align:left" for="reftorneo">Motivos</label>
                    <div class="input-group col-md-12">
                    	<textarea id="motivos" class="form-control" name="motivos" rows="5" cols="6" style="text-align:left;">
                    		<?php echo utf8_encode(mysql_result($resResultado,0,'motivos')); ?>
                    	</textarea>
                    </div>
                </div>
            </div>
            
            
            <hr>
            
            <div class="row">
            	<div class="form-group col-md-12">
                	<label class="control-label" style="text-align:left" for="fechas">Fechas a Suspender</label>
                    <div class="input-group col-md-12">
                    	<?php echo $cadFechasS; ?>
                    </div>
                </div>
            </div>
            
            
            <div class='row' style="margin-left:25px; margin-right:25px;">
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
            <input type="hidden" id="accion" name="accion" value="modificarSuspendidos" />
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
<script src="../../js/bootstrap-datetimepicker.min.js"></script>
<script src="../../js/bootstrap-datetimepicker.es.js"></script>


<script type="text/javascript">
$(document).ready(function(){
	
	function traerFechas() {
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
			
	}
	
	traerFechas();
	
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
	
	
	<?php 
		echo $serviciosHTML->validacion($tabla);
	
	?>
	
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
                                            $(".alert").html('<strong>Ok!</strong> Se Modifico exitosamente el <strong><?php echo $lblTitulosingular; ?></strong>. ');
											$(".alert").delay(3000).queue(function(){
												/*aca lo que quiero hacer 
												  después de los 2 segundos de retraso*/
												$(this).dequeue(); //continúo con el siguiente ítem en la cola
												
											});
											$("#load").html('');
											
                                            
											
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
