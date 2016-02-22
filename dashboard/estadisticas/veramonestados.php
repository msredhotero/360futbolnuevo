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


$resMenu = $serviciosHTML->menu($_SESSION['nombre_predio'],"Estadisticas",$_SESSION['refroll_predio'],utf8_encode($_SESSION['torneo_predio']));

/////////////////////// Opciones de la pagina  ////////////////////

$lblTitulosingular	= "Estadistica";
$lblTituloplural	= "Estadisticas";
$lblEliminarObs		= "Si elimina la Estadistica se eliminara todo el contenido de este";
$accionEliminar		= "eliminarEstadisticas";

/////////////////////// Fin de las opciones /////////////////////



/////////////////////// Opciones para la creacion del view  /////////////////////


$cabeceras2 		= "<th>Nombre</th>
				<th>DNI</th>
				<th>Equipo</th>
				<th>Fecha</th>
				<th>Amarillas</th>
				<th>Torneo</th>";
//////////////////////////////////////////////  FIN de los opciones //////////////////////////

$lstCargados2 	= $serviciosFunciones->camposTablaView($cabeceras2,$serviciosJugadores->traerAmonestados($_SESSION['idtorneo_predio']),6);



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
        	<p style="color: #fff; font-size:18px; height:16px;">Amonestados Cargados</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<?php echo $lstCargados2; ?>
            
    	</div>
    </div>
   
</div>


</div>

<div id="dialog2" title="Eliminar Amonestado">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar el Amonestado?.<span id="proveedorEli"></span>
        </p>
     
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>


<div id="dialog22" title="Eliminar Goleador">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar el Goleador?.<span id="proveedorEli"></span>
        </p>
  
        <input type="hidden" value="" id="idEliminar2" name="idEliminar2">
</div>

<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
<script src="../../bootstrap/js/dataTables.bootstrap.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	
	$('#example').dataTable({
		"order": [[ 1, "asc" ]],
		"language": {
			"emptyTable":     "No hay datos cargados",
			"info":           "Mostrar _START_ hasta _END_ del total de _TOTAL_ filas",
			"infoEmpty":      "Mostrar 0 hasta 0 del total de 0 filas",
			"infoFiltered":   "(filtrados del total de _MAX_ filas)",
			"infoPostFix":    "",
			"thousands":      ",",
			"lengthMenu":     "Mostrar _MENU_ filas",
			"loadingRecords": "Cargando...",
			"processing":     "Procesando...",
			"search":         "Buscar:",
			"zeroRecords":    "No se encontraron resultados",
			"paginate": {
				"first":      "Primero",
				"last":       "Ultimo",
				"next":       "Siguiente",
				"previous":   "Anterior"
			},
			"aria": {
				"sortAscending":  ": activate to sort column ascending",
				"sortDescending": ": activate to sort column descending"
			}
		  }
	} );
	
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

	$("#example").on("click",'.varborrar', function(){
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
			url = "modificaramonestados.php?id=" + usersid;
			$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton modificar
	
	
	$("#example").on("click",'.varborrargoleadores', function(){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			$("#idEliminar2").val(usersid);
			$("#dialog22").dialog("open");

			
			//url = "../clienteseleccionado/index.php?idcliente=" + usersid;
			//$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton eliminar
	
	$("#example").on("click",'.varmodificargoleadores', function(){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			url = "modificargoleadores.php?id=" + usersid;
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
									data:  {id: $('#idEliminar').val(), accion: 'eliminarAmonestados'},
									url:   '../../ajax/ajax.php',
									type:  'post',
									beforeSend: function () {
											
									},
									success:  function (response) {
											$('.'+$('#idEliminar').val()).fadeOut( "slow", function() {
												$(this).remove();
											});
											
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
	
	
	$( "#dialog22" ).dialog({
		 	
			    autoOpen: false,
			 	resizable: false,
				width:600,
				height:240,
				modal: true,
				buttons: {
				    "Eliminar": function() {
	
						$.ajax({
									data:  {id: $('#idEliminar2').val(), accion: 'eliminarGoleadores'},
									url:   '../../ajax/ajax.php',
									type:  'post',
									beforeSend: function () {
											
									},
									success:  function (response) {
											$('.'+$('#idEliminar2').val()).fadeOut( "slow", function() {
												$(this).remove();
											});
											
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
		
		if (($("#goles").val() == "") && ($("#amarillas").val() == "")) {
			
			$error = "Es obligatorio el campo Goles o el campo Amarillas.";
			$("#goles").addClass("alert-danger");
			$("#goles").attr("placeholder",$error);
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
                                            
											
											$("#load").html('');
											//url = "index.php";
											//$(location).attr('href',url);
											var str =  $("#refjugador option:selected").html();	
											var res = str.split(" - ");
                                            
											var str2 =  $("#reffixture option:selected").html();	
											var res2 = str.split(" - ");
											if ($("#goles").val() != "") {
												
												$('#resultadosgoleadores').prepend('<tr><td>'+res[0]+'</td>'+
																				   '<td>'+res[1]+'</td>'+
																				   '<td>'+$("#refequipo option:selected").html()+'</td>'+
																				   '<td>'+res2[0]+'</td>'+
																				   '<td>'+$("#goles").val()+'</td>'+
																				   '<td style="color:#f00;">Nuevo</td></tr>');
											
											$(".alert").html('<strong>Ok!</strong> Se cargo exitosamente el <strong>Goleador</strong>. ');
											}
											
											if ($("#amarillas").val() != "") {
												
												$('#resultados').prepend('<tr><td>'+res[0]+'</td>'+
																				   '<td>'+res[1]+'</td>'+
																				   '<td>'+$("#refequipo option:selected").html()+'</td>'+
																				   '<td>'+res2[0]+'</td>'+
																				   '<td>'+$("#amarillas").val()+'</td>'+
																				   '<td style="color:#f00;">Nuevo</td></tr>');
											$(".alert2").html('<strong>Ok!</strong> Se cargo exitosamente el <strong>Amonestado</strong>. ');
											}
											
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
