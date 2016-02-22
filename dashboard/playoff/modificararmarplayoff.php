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
include ('../../includes/funcionesGrupos.php');
include ('../../includes/funcionesPlayoff.php');

$serviciosFunciones = new Servicios();
$serviciosUsuario 	= new ServiciosUsuarios();
$serviciosHTML 		= new ServiciosHTML();
$serviciosEquipos 	= new ServiciosE();
$serviciosGrupos	= new ServiciosG();
$serviciosPlayOff = new ServiciosPlayOff();

$fecha = date('Y-m-d');

//$resProductos = $serviciosProductos->traerProductosLimite(6);
$resMenu = $serviciosHTML->menu($_SESSION['nombre_predio'],"Armar PlayOff",$_SESSION['refroll_predio'],$_SESSION['torneo_predio']);

$id = $_GET['id'];

$resRseultado = $serviciosPlayOff->traerArmarPlayOffPorId($id);

$idTorneo = $_GET['idtorneo'];
$idZona = $_GET['idzona'];

/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla 			= "tbplayoff";


$lblCambio	 	= array("refplayoffequipo_a","refplayoffresultado_a","refplayoffequipo_b","refplayoffresultado_b","fechajuego","refcancha","refetapa","penalesa","penalesb");
$lblreemplazo	= array("Equipo 1","Resultado 1","Equipo 2","Resultado 2","Fecha Juego","Cancha","Etapa","Penales A","Penales B");

$resEquiposA = $serviciosPlayOff->traerPlayOffPorTorneoZona($idTorneo,$idZona);
$resEquiposB = $serviciosPlayOff->traerPlayOffPorTorneoZona($idTorneo,$idZona);

$cadRef = '';
while ($rowTT = mysql_fetch_array($resEquiposA)) {
	if (mysql_result($resResultado,0,'refplayoffequipo_a') == $rowTT[0]) {
		$cadRef = $cadRef.'<option value="'.$rowTT[0].'" selected>'.$rowTT[1].' - '.$rowTT[2].'</option>';
	} else {
		$cadRef = $cadRef.'<option value="'.$rowTT[0].'">'.$rowTT[1].' - '.$rowTT[2].'</option>';	
	}
	
}


$cadRefB = '';
while ($rowTTB = mysql_fetch_array($resEquiposB)) {
	if (mysql_result($resResultado,0,'refplayoffequipo_b') == $rowTTB[0]) {
		$cadRefB = $cadRefB.'<option value="'.$rowTTB[0].'" selected>'.$rowTTB[1].' - '.$rowTTB[2].'</option>';
	} else {
		$cadRefB = $cadRefB.'<option value="'.$rowTTB[0].'">'.$rowTTB[1].' - '.$rowTTB[2].'</option>';	
	}
	
}


$resEtapas 	= $serviciosPlayOff->traerEtapas();

$cadRef2 = '';
while ($rowZ = mysql_fetch_array($resEtapas)) {
	if (mysql_result($resResultado,0,'refetapa') == $rowZ[0]) {
		$cadRef2 = $cadRef2.'<option value="'.$rowZ[0].'" selected>'.$rowZ[1].'</option>';
	} else {
		$cadRef2 = $cadRef2.'<option value="'.$rowZ[0].'">'.$rowZ[1].'</option>';
	}
}

$resCanchas 	= $serviciosFunciones->TraerCanchas();

$cadRef3 = '';
while ($rowC = mysql_fetch_array($resCanchas)) {
	if (mysql_result($resResultado,0,'refcancha') == $rowC[0]) {
		$cadRef3 = $cadRef3.'<option value="'.$rowC[0].'" selected>'.$rowC[1].'</option>';
	} else {
		$cadRef3 = $cadRef3.'<option value="'.$rowC[0].'">'.$rowC[1].'</option>';
	}
}


$resHorarios 	= $serviciosFunciones->TraerHorarios($_SESSION['torneo_predio']);

$cadRef4 = '';
while ($rowH = mysql_fetch_array($resHorarios)) {
	if (mysql_result($resResultado,0,'hora') == $rowC[1]) {
		$cadRef4 = $cadRef4.'<option value="'.$rowH[0].'" selected>'.$rowH[1].'</option>';
	} else {
		$cadRef4 = $cadRef4.'<option value="'.$rowH[0].'">'.$rowH[1].'</option>';
	}
}


$refdescripcion = array(0 => $cadRef,1=>$cadRef,2=>$cadRef2,3=>$cadRef3,4=>$cadRef4);
$refCampo	 	= array("refplayoffequipo_a","refplayoffequipo_b","refetapa","refcancha","hora"); 
//////////////////////////////////////////////  FIN de los opciones //////////////////////////




/////////////////////// Opciones para la creacion del view  /////////////////////
$cabeceras 		= "	<th>Equipo 1</th>
				<th>Resultado 1</th>
				<th>Resultado 2</th>
				<th>Equipo 2</th>
				<th>Torneo</th>
				<th>Zona</th>
				<th>Fecha Juego</th>
				<th>Etapa</th>
				<th>Hora</th>
				<th>Penales A</th>
				<th>Penales B</th>";

//////////////////////////////////////////////  FIN de los opciones //////////////////////////




$formulario 	= $serviciosFunciones->camposTabla("insertarArmarPlayOff",$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);

$lstCargados 	= $serviciosFunciones->camposTablaView($cabeceras,$serviciosPlayOff->traerArmarPlayOff($idTorneo,$idZona),11);

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
	<link rel="stylesheet" href="../../css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="../../css/bootstrap-timepicker.css">
    <script src="../../js/bootstrap-timepicker.min.js"></script>
    
   
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

<h3>Armar Fixture del PlayOff</h3>

    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Carga del Fixture</p>
        	
        </div>
    	<div class="cuerpoBox">

        	<form class="form-inline formulario" role="form">
        	<div class="row">
			<?php echo $formulario; ?>
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
                        <button type="button" class="btn btn-primary" id="cargar" style="margin-left:0px;">Guardar</button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-default" id="volver" style="margin-left:0px;">Volver</button>
                    </li>
                </ul>
                </div>
            </div>
            
            </form>
    	</div>
    </div>
    
    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Equipos Cargados</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<?php echo $lstCargados; ?>
    	</div>
    </div>
    
    

    
    
   
</div>


</div>
<div id="dialog2" title="Eliminar Equipos">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar el equipo?.<span id="proveedorEli"></span>
        </p>
        <p><strong>Importante: </strong>Si elimina el equipo no permanecera en el PlayOff/p>
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>
<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
<script src="../../bootstrap/js/dataTables.bootstrap.js"></script>

<script src="../../js/bootstrap-datetimepicker.min.js"></script>
<script src="../../js/bootstrap-datetimepicker.es.js"></script>

<script type="text/javascript">

$(document).ready(function(){
	$('#timepicker2').timepicker({
		minuteStep: 15,
		showSeconds: false,
		showMeridian: false,
		defaultTime: false
		});
		
	$('#example').dataTable({
		"order": [[ 0, "asc" ]],
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
	
	$('#volver').click(function(event){
		 url = "index.php";
		$(location).attr('href',url);
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


	function buscarEquipo(idTorneo,idZona) {
		$.ajax({
				data:  {reftorneo: idTorneo, 
						refzona: idZona,
						accion: 'traerEquipoPorZonaTorneos'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
					if(response){
						var cadE = '';	//idproducto,codigo,nombre,descripcion,stock,stockmin,preciocosto,precioventa,utilidad,estado,imagen,idcategoria,tipoimagen,nroserie,codigobarra
						json = $.parseJSON(response);
						
						$.each(json, function(i, item) {
							
							cadE = cadE+'<option value="'+item.idequipo+'">'+item.nombre+'</option>';
						});
						
						$("#refequipo").html(cadE);
					}
						
				}
		});
	}
	
	function buscarZona(idTorneo) {
		$.ajax({
				data:  {reftorneo: idTorneo, 
						accion: 'traerZonaPorTorneos'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
					if(response){
						var cad = '';	//idproducto,codigo,nombre,descripcion,stock,stockmin,preciocosto,precioventa,utilidad,estado,imagen,idcategoria,tipoimagen,nroserie,codigobarra
						json = $.parseJSON(response);
						
						$.each(json, function(i, item) {
							
							cad = '<option value="'+item.idgrupo+'">'+item.nombre+'</option>';
						});
						
						$("#refzona").html(cad);
						
						buscarEquipo(idTorneo,$("#refzona").val());
					}
						
				}
		});
	}
	
	$("#refzona").change(function(e) {
        buscarEquipo($("#reftorneo").val(),$("#refzona").val());
    });
	
	
	

	$("#reftorneo").change(function(e) {
        buscarZona($('#reftorneo').val());
    });
	
	buscarZona($('#reftorneo').val());


	 $( "#dialog2" ).dialog({
		 	
			    autoOpen: false,
			 	resizable: false,
				width:600,
				height:240,
				modal: true,
				buttons: {
				    "Eliminar": function() {
	
						$.ajax({
									data:  {id: $('#idEliminar').val(), accion: 'eliminarPlayOff'},
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
                                            $(".alert").html('<strong>Ok!</strong> Se cargo exitosamente la <strong>Cancha</strong>. ');
											$(".alert").delay(3000).queue(function(){
												/*aca lo que quiero hacer 
												  después de los 2 segundos de retraso*/
												$(this).dequeue(); //continúo con el siguiente ítem en la cola
												
											});
											$("#load").html('');
										
											url = "armarplayoff.php?idtorneo="+<?php echo $idTorneo; ?>+"&idzona="+<?php echo $idZona; ?>;
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
