<?php

session_start();

if (!isset($_SESSION['usua_predio']))
{
	header('Location: ../../error.php');
} else {


include ('../../includes/funciones.php');
include ('../../includes/funcionesUsuarios.php');
include ('../../includes/funcionesHTML.php');

$serviciosFunciones = new Servicios();
$serviciosUsuario = new ServiciosUsuarios();
$serviciosHTML = new ServiciosHTML();

$fecha = date('Y-m-d');

$resMenu = $serviciosHTML->menu($_SESSION['nombre_predio'],"Torneos",$_SESSION['refroll_predio'],utf8_encode($_SESSION['torneo_predio']));

$resTorneoActual = $serviciosFunciones->TraerTorneosActivo($_SESSION['torneo_predio']);

$resTipoTorneos = $serviciosFunciones->traerTipoTorneo();

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

<h3>Torneos</h3>

    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Cambiar de Torneo</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<form class="form-inline formulario" role="form">
        	<div class="row">
            	<div class="col-md-11 alert-info" style="margin-left:20px;">
                	<h4>Torneo Actual: <?php echo utf8_encode(mysql_result($resTorneoActual,0,1)); ?> - <?php echo utf8_encode(mysql_result($resTorneoActual,0,4)); ?></h4>
                </div>
                <div class="form-group col-md-6">
               	 <label class="control-label" style="text-align:left" for="reftorneo">Tipo de Torneo</label>
                    <div class="input-group col-md-12">
                    	<select id="reftipotorneo" class="form-control" name="reftipotorneo">
                        	<option value="0">----Seleccionar----</option>
                    		<?php
								while ($row = mysql_fetch_array($resTipoTorneos)) {
							?>
                            		<option value="<?php echo $row[0]; ?>"><?php echo utf8_encode($row[1]); ?></option>
                            <?php	
								}
							?>
                    	</select>
                    </div>
                </div>
                
                <div class="form-group col-md-6">
               	 <label class="control-label" style="text-align:left" for="reftorneo">Tipo de Torneo</label>
                    <div class="input-group col-md-12">
                    	<select id="reftorneo" class="form-control" name="reftorneo">
                    		
                    	</select>
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
                        <button type="button" class="btn btn-primary" id="cargar" style="margin-left:0px;">Cambiar</button>
                    </li>
                </ul>
                </div>
            </div>
            <input type="hidden" id="accion" name="accion" value="cambiarTorneo" />
            </form>
    	</div>
    </div>
  
</div>


</div>


<script src="../../js/bootstrap-datetimepicker.min.js"></script>
<script src="../../js/bootstrap-datetimepicker.es.js"></script>


<script type="text/javascript">
$(document).ready(function(){
	
	$('#reftipotorneo').change(function() {
		$.ajax({
			data:  {reftipotorneo: $('#reftipotorneo').val(),
					accion: 'traerTorneoPorTipoTorneo'},
			url:   '../../ajax/ajax.php',
			type:  'post',
			beforeSend: function () {
				$('#reftorneo').html('')	
			},
			success:  function (response) {
				$('#reftorneo').html(response);
					
			}
	});
	});
	
	//al enviar el formulario
    $('#cargar').click(function(){
		
		/*if (validador() == "")
        {*/
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
                                            $(".alert").html('<strong>Ok!</strong> Se cambio exitosamente el <strong>Torneo</strong>. ');
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
		/*}*/
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
