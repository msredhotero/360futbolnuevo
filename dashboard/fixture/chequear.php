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
$cabeceras 		= "	<th>Equipo 1</th>
				<th>Resultado 1</th>
				<th>Resultado 2</th>
				<th>Equipo 2</th>
				<th>Zona</th>
				<th>Fecha Juego</th>
				<th>Fecha</th>
				<th>Hora</th>";

//////////////////////////////////////////////  FIN de los opciones //////////////////////////

$cadF = '';
$resFechas = $serviciosFunciones->TraerFecha();
while ($rowF = mysql_fetch_array($resFechas)) {
	$cadF = $cadF.'<option value="'.$rowF[0].'">'.$rowF[1].'</option>';	
}


$lstCargados 	= $serviciosFunciones->camposTablaView($cabeceras,$serviciosZonasEquipos->TraerFixtureSinChequear(),8);


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
        	<p style="color: #fff; font-size:18px; height:16px;">Seleccione la fecha para activar masivamente todos los resultados</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<div class="row" align="center">
            	<form class="form-inline formulario" role="form">
            	
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
                       	 <button id="chequear" class="btn btn-primary" style="margin-left:0px;" type="button">Chequear</button>
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
        	<p style="color: #fff; font-size:18px; height:16px;">Fixture Cargados sin Chequear</p>
        	
        </div>
    	<div class="cuerpoBox" id="modificar">
        	<?php echo $lstCargados; ?>
    	</div>
    </div>
  
   
</div>


</div>
<div id="dialog2" title="Eliminar Fixture">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar el fixture?.<span id="proveedorEli"></span>
        </p>
        <p><strong>Importante: </strong>Si elimina el fixture se perderan todos los datos de este</p>
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>


<script type="text/javascript">
$(document).ready(function(){

	$('#chequear').click(function() {
		if ($('#reffecha').val() == 0) {
			alert("Error, debe seleccionar una fecha.");	
		} else {
			$.ajax({
					data:  {reffecha: $('#reffecha').val(), 
							accion: 'chequearPorFecha'},
					url:   '../../ajax/ajax.php',
					type:  'post',
					beforeSend: function () {
							
					},
					success:  function (response) {
							url = "chequear.php";
							$(location).attr('href',url);
							
					}
			});
		}
	});
	
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

	$("#example").on("click",'.varmodificar', function(){
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
				height:240,
				modal: true,
				buttons: {
				    "Eliminar": function() {
	
						$.ajax({
									data:  {id: $('#idEliminar').val(), accion: 'eliminarFixture'},
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
                                            $(".alert").html('<strong>Ok!</strong> Se cargo exitosamente el <strong>Fixture</strong>. ');
											$(".alert").delay(3000).queue(function(){
												/*aca lo que quiero hacer 
												  después de los 2 segundos de retraso*/
												$(this).dequeue(); //continúo con el siguiente ítem en la cola
												
											});
											$("#load").html('');
											//url = "index.php";
											var a = $('#reftorneoge_a option:selected').html();
											var b = $('#reftorneoge_b option:selected').html();
											a = a.split(' - ');
											b = b.split(' - ');
											
											$('#resultados').prepend('<tr><td>' + a[1] + '</td><td></td><td></td><td>' + 
																		+ b[1] + '</td><td>' + 
																		a[0] + '</td><td>' + 
																		$('#fechajuego option:selected').html() + '</td><td>' + 
																		$('#reffecha option:selected').html() + '</td><td>' + 
																		$('#hora option:selected').html() + '</td><td style="color:#f00;">Nuevo</td></tr>').fadeIn(300);
											
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
		}
    });
	

});
</script>

<?php } ?>
</body>
</html>
