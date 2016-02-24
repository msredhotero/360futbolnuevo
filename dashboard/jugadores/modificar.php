<?php

session_start();

if (!isset($_SESSION['usua_predio']))
{
	header('Location: ../../error.php');
} else {


include ('../../includes/funciones.php');
include ('../../includes/funcionesUsuarios.php');
include ('../../includes/funcionesHTML.php');
include ('../../includes/funcionesJugadores.php');
include ('../../includes/funcionesEquipos.php');

$serviciosFunciones = new Servicios();
$serviciosUsuario = new ServiciosUsuarios();
$serviciosHTML = new ServiciosHTML();
$serviciosJugadores = new ServiciosJ();
$serviciosEquipos = new ServiciosE();

$fecha = date('Y-m-d');

$resMenu = $serviciosHTML->menu($_SESSION['nombre_predio'],"Torneos",$_SESSION['refroll_predio'],$_SESSION['torneo_predio']);


$id = $_GET['id'];

$resResultado = $serviciosJugadores->TraerJugadoresPorId($id);

//// autocompletar /////////

$res = $serviciosJugadores->TraerJugadores();

$arreglo_php = array();
if(mysql_num_rows($res)==0)
   array_push($arreglo_php, "No hay datos");
else{
  while($palabras = mysql_fetch_array($res)){
    array_push($arreglo_php, $palabras["apyn"]);
  }
}


//////////////////////////////


/////////////////////// Opciones de la pagina  ////////////////////

$lblTitulosingular	= "Jugador";
$lblTituloplural	= "Jugadores";
$lblEliminarObs		= "Si elimina el jugador no se borraran sus datos sino que se dara de baja";
$accionEliminar		= "eliminarJugadores";

/////////////////////// Fin de las opciones /////////////////////


/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla 			= "dbjugadores";

$lblCambio		= array("idequipo");
$lblreemplazo	= array("Equipo");

$resEquipos 	= $serviciosEquipos->TraerEquipos();

$cadRef = '';
while ($rowTT = mysql_fetch_array($resEquipos)) {
	if (mysql_result($resResultado,0,'idequipo') == $rowTT[0]) {
		$cadRef = $cadRef.'<option value="'.$rowTT[0].'" selected>'.$rowTT[1].'</option>';
	} else {
		$cadRef = $cadRef.'<option value="'.$rowTT[0].'">'.$rowTT[1].'</option>';	
	}
}

$refdescripcion = array(0 => $cadRef);
$refCampo[] 	= "idequipo"; 
//////////////////////////////////////////////  FIN de los opciones //////////////////////////




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
        	<p style="color: #fff; font-size:18px; height:16px;">Modificaci&oacute;n de <?php echo $lblTituloplural; ?></p>
        	
        </div>
    	<div class="cuerpoBox">
        	<form class="form-inline formulario" role="form">
        	
			<div class="row">
                    <div class="form-group col-md-6">
                    
                        <label class="control-label" style="text-align:left" for="apyn">Apellido</label>
                        <div class="input-group col-md-12">
                            <input id="apellido" class="form-control" type="text" required placeholder="Ingrese el Apellido..." value="<?php echo mysql_result($resResultado,0,'apellido'); ?>" name="apellido">
                        </div>
                    
                    </div>
                    
                    <div class="form-group col-md-6">
                    
                        <label class="control-label" style="text-align:left" for="apyn">Nombre</label>
                        <div class="input-group col-md-12">
                            <input id="nombre" class="form-control" type="text" required placeholder="Ingrese el Nombre..." value="<?php echo mysql_result($resResultado,0,'apellido'); ?>" name="nombre">
                        </div>
                    
                    </div>
                    
                    
                <div class="form-group col-md-6">
                    <label class="control-label" style="text-align:left" for="idequipo">Equipo</label>
                    <div class="input-group col-md-12">
                        <select id="idequipo" class="form-control" name="idequipo">
                        	<?php echo $cadRef; ?>
                        </select>
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
                    <label class="control-label" style="text-align:left" for="dni">Dni</label>
                    <div class="input-group col-md-12">
                        <input id="dni" class="form-control" value="<?php echo mysql_result($resResultado,0,'dni'); ?>" type="text" required placeholder="Ingrese el Dni..." name="dni" >
                    </div>
                </div>
                
                <div class="form-group col-md-6">
                    <label class="control-label" style="text-align:left" for="dni">E-Mail</label>
                    <div class="input-group col-md-12">
                        <input id="email" class="form-control" value="<?php echo mysql_result($resResultado,0,'email'); ?>" type="text" required placeholder="Ingrese el E-Mail..." name="email">
                    </div>
                </div>
                
                <div class="form-group col-md-6">
                    <label class="control-label" style="text-align:left" for="dni">Facebook</label>
                    <div class="input-group col-md-12">
                        <input id="facebook" class="form-control" value="<?php echo mysql_result($resResultado,0,'facebook'); ?>" type="text" required placeholder="Ingrese el Facebook..." name="facebook">
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
                	<label class="control-label" style="text-align:left" for="chequeado">Invitado</label>
                	<div class="input-group col-md-12 fontcheck">
                        <input id="invitado" <?php if (mysql_result($resResultado,0,'invitado')== 1) { echo 'checked'; } ?> class="form-control" type="checkbox" required style="width:50px;" name="invitado">
                        <p>Si/No</p>
                	</div>
                </div>
                
                
                <div class="form-group col-md-6">
                	<label class="control-label" style="text-align:left" for="chequeado">Expulsado</label>
                	<div class="input-group col-md-12 fontcheck">
                        <input id="expulsado" <?php if (mysql_result($resResultado,0,'expulsado')== 1) { echo 'checked'; } ?> class="form-control" type="checkbox" required style="width:50px;" name="expulsado">
                        <p>Si/No</p>
                	</div>
                </div>
            </div>
            <br>
            <br>
            
            
            
            <input id="accion" type="hidden" value="modificarJugadores" name="accion">
            <input id="id" type="hidden" value="<?php echo $id; ?>" name="id">
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
