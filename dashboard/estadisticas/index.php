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


$resEquipos = $serviciosEquipos->TraerEquipos();

//// autocompletar /////////

$res = $serviciosJugadores->TraerJugadores();

$arreglo_php = array();
if(mysql_num_rows($res)==0)
   array_push($arreglo_php, "No hay datos");
else{
  while($palabras = mysql_fetch_array($res)){
    array_push($arreglo_php, utf8_encode($palabras["apyn"]));
  }
}


/////////////////////// Opciones de la pagina  ////////////////////

$lblTitulosingular	= "Estadistica";
$lblTituloplural	= "Estadisticas";
$lblEliminarObs		= "Si elimina la Estadistica se eliminara todo el contenido de este";
$accionEliminar		= "eliminarEstadisticas";

/////////////////////// Fin de las opciones /////////////////////

$cadRef = '';
$cadRef2 = '';
while ($rowTT = mysql_fetch_array($resEquipos)) {
	$cadRef = $cadRef.'<option value="'.$rowTT[0].'">'.utf8_encode($rowTT[1]).'</option>';
	
}

$cadRef2 = $cadRef;



/////////////////////// Opciones para la creacion del view  /////////////////////
$cabeceras 		= "<th>Nombre</th>
				<th>DNI</th>
				<th>Equipo</th>
				<th>Fecha</th>
				<th>Goles</th>";

$cabeceras2 		= "<th>Nombre</th>
				<th>DNI</th>
				<th>Equipo</th>
				<th>Fecha</th>
				<th>Amarillas</th>";
//////////////////////////////////////////////  FIN de los opciones //////////////////////////

$resUltimasDosFechas = $serviciosFunciones->TraerUltimasDosFechas();

$fech = '';
while ($rowFechas = mysql_fetch_array($resUltimasDosFechas)) {
	$fech = $fech.$rowFechas[0].',';	
}

$fech = substr($fech,0,strlen($fech)-1);

$lstCargados 	= $serviciosFunciones->camposTablaView($cabeceras,$serviciosJugadores->traerGoleadoresPorFecha($fech),99);
$lstCargados2 	= $serviciosFunciones->camposTablaView($cabeceras2,$serviciosJugadores->traerAmonestadosPorFecha($fech),5);



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
    
    <script>
	  $(function(){
		var autocompletar = new Array();
		<?php //Esto es un poco de php para obtener lo que necesitamos
		 for($p = 0;$p < count($arreglo_php); $p++){ //usamos count para saber cuantos elementos hay ?>
		   autocompletar.push('<?php echo $arreglo_php[$p]; ?>');
		 <?php } ?>
		 $("#apyn").autocomplete({ //Usamos el ID de la caja de texto donde lo queremos
		   source: autocompletar //Le decimos que nuestra fuente es el arreglo
		 });
	  });
	</script>
</head>

<body>

 
<?php echo $resMenu; ?>

<div id="content">

<h3><?php echo $lblTituloplural; ?></h3>

    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Cargar <?php echo $lblTitulosingular; ?></p>
        	
        </div>
    	<div class="cuerpoBox">
    		<form class="form-inline formulario" role="form">
        	<div class="row">
				
                <div class="form-group col-md-6">
               	 <label class="control-label" style="text-align:left" for="refequipos">Equipos</label>
                    <div class="input-group col-md-12">
                    	<select id="refequipo" class="form-control" name="refequipo">
                    		<option value="0">--Seleccione--</option>
							<?php echo $cadRef2; ?>
								
                    	</select>
                    </div>
                </div>
                
                <div class="form-group col-md-6">
               	 <label class="control-label" style="text-align:left" for="reftorneo">Jugadores</label>
                    <div class="input-group col-md-12">
                    	<ul class="list-inline">
                        	<li>
                                <select id="refjugador" class="form-control" name="refjugador">
                                    
                                </select>
                            </li>
                            <li>
                            	<button type="button" class="btn btn-success" id="cargarjugador">Agregar</button>
                            </li>
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
               	 <label class="control-label" style="text-align:left" for="reftorneo">Fecha</label>
                    <div class="input-group col-md-12">
                    	<select id="reffixture" class="form-control" name="reffixture">
                    		
                    	</select>
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
               	 <label class="control-label" style="text-align:left" for="reftorneo">Goles</label>
                    <div class="input-group col-md-12">
                    	<input type="text" id="goles" name="goles" class="form-control" required/>
                    </div>
                </div>
                
                <div class="form-group col-md-6">
               	 <label class="control-label" style="text-align:left" for="reftorneo">Amarillas</label>
                    <div class="input-group col-md-12">
                    	<input type="text" id="amarillas" name="amarillas" class="form-control" required/>
                    </div>
                </div>
            
            </div>
            
            
            
            <div class='row' style="margin-left:15px; margin-right:15px;">
                <div class='alert'>
                
                </div>
                <div class='alert alert2'>
                
                </div>
                <div id='load'>
                
                </div>
            </div>
			
            
            <div class="row">
                <div class="col-md-12">
                <ul class="list-inline" style="margin-top:15px;">
                    <li>
                        <button type="button" class="btn btn-primary" id="cargar" style="margin-left:0px;">Guardar</button>
                    </li>
                    <li>
                    	<button type="button" class="btn btn-info" id="vergoleadores" style="margin-left:0px;">Ver Goleadores</button>
                    </li>
                    <li>
                    	<button type="button" class="btn btn-info" id="veramonestados" style="margin-left:0px;">Ver Amonestados</button>
                    </li>
                </ul>
                </div>
            </div>
            <input type="hidden" id="accion" name="accion" value="insertarEstadistica" />
            </form>
    	</div>
    </div>



	  
<div id="crearFjugador" style=" z-index:9; display:none; height:auto; background-color:#CCC; margin-top:-32%; width:79%;" class="boxInfoLargo">
 	<form class="form-inline formulario2" role="form">
                    <div class="form-group col-md-6">
                    
                        <label class="control-label" style="text-align:left" for="apyn">Apellido Y Nombre</label>
                        <div class="input-group col-md-12">
                            <input id="apyn" class="form-control" type="text" required placeholder="Ingrese el Apellido Y Nombre..." name="apyn">
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
                            <input id="dni" class="form-control" type="text" required placeholder="Ingrese el Dni..." name="dni">
                        </div>
                    </div>
                
                
                    <div class="form-group col-md-6">
                        <label class="control-label" style="text-align:left" for="chequeado">Invitado</label>
                        <div class="input-group col-md-12 fontcheck">
                            <input id="invitado" class="form-control" type="checkbox" required style="width:50px;" name="invitado">
                            <p>Si/No</p>
                        </div>
                    </div>
                    <input id="accion" type="hidden" value="insertarJugadores" name="accion">
                    <div class="col-md-12">
                <ul class="list-inline" style="margin-top:15px;">
                    <li>
                        <button type="button" class="btn btn-success" id="crearjugador" style="margin-left:0px;">Crear</button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-default" id="cerrar" style="margin-left:0px;">Cerrar</button>
                    </li>
                </ul>
                </div>
 	</form>
</div>








    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Goleadores Cargados</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<?php echo $lstCargados; ?>
            
    	</div>
    </div>
    
  



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
			url = "modificaramonestados.php?id=" + usersid;
			$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton modificar
	
	
	$('#vergoleadores').click(function(event){

		window.open('vergoleadores.php','_blank');

	});//fin del boton modificar
	
	$('#veramonestados').click(function(event){

		window.open('veramonestados.php','_blank');

	});//fin del boton modificar
	
	
	
	$('#cargarjugador').click(function(event){

		$("#crearFjugador").show(100);

	});//fin del boton abrir
	
	$('#cerrar').click(function(event){

		$("#crearFjugador").hide(100);

	});//fin del boton cerrar
	
	
	$('.varborrargoleadores').click(function(event){
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
	
	$('.varmodificargoleadores').click(function(event){
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
			
			
			
			
			
			
			
			
			
	// para cargar al jugador
	
	
	
	//al enviar el formulario
    $('#crearjugador').click(function(){
		

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
					$("#load3").html('<img src="../../imagenes/load13.gif" width="50" height="50" />');       
				},
				//una vez finalizado correctamente
				success: function(data){

					if (data == '') {
                                            $(".alert3").removeClass("alert-danger");
											$(".alert3").removeClass("alert-info");
                                            $(".alert3").addClass("alert-success");
                                            $(".alert3").html('<strong>Ok!</strong> Se cargo exitosamente el <strong><?php echo $lblTitulosingular; ?></strong>. ');
											$(".alert3").delay(3000).queue(function(){
												/*aca lo que quiero hacer 
												  después de los 2 segundos de retraso*/
												$(this).dequeue(); //continúo con el siguiente ítem en la cola
												
											});
											$("#load").html('');
											url = "index.php";
											//$(location).attr('href',url);
                                            
											
                                        } else {
                                        	$(".alert3").removeClass("alert-danger");
                                            $(".alert3").addClass("alert-danger");
                                            $(".alert3").html('<strong>Error!</strong> '+data);
                                            $("#load3").html('');
                                        }
				},
				//si ha ocurrido un error
				error: function(){
					$(".alert").html('<strong>Error!</strong> Actualice la pagina');
                    $("#load").html('');
				}
			});
		
    });
	
	
	
	
	
	
	// finnn del cargar jugador		
			
			
			
			
			
			
			
			
			
	
	
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
