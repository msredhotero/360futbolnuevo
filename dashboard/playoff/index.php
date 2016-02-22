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
$resMenu = $serviciosHTML->menu($_SESSION['nombre_predio'],"Canchas",$_SESSION['refroll_predio'],$_SESSION['torneo_predio']);



/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla 			= "dbplayoff";

$lblCambio	 	= array("refequipo","reftorneo","refzona","fechacreacion");
$lblreemplazo	= array("Equipo","Torneo","Zona","Fecha Creación");

$resEquipos 	= $serviciosEquipos->TraerEquipos();

$cadRef = '';
while ($rowTT = mysql_fetch_array($resEquipos)) {
	$cadRef = $cadRef.'<option value="'.$rowTT[0].'">'.$rowTT[1].'</option>';
	
}


$resTorneos 	= $serviciosFunciones->TraerTorneos();

$cadRefT = '';
while ($rowT = mysql_fetch_array($resTorneos)) {
	$cadRefT = $cadRefT.'<option value="'.$rowT[0].'">'.$rowT[4].' - '.$rowT[1].'</option>';
	
}

$resZonas 	= $serviciosGrupos->TraerGrupos();

$cadRef2 = '';
while ($rowZ = mysql_fetch_array($resZonas)) {
	$cadRef2 = $cadRef2.'<option value="'.$rowZ[0].'">'.$rowZ[1].'</option>';
	
}

$refdescripcion = array(0 => $cadRef2,1=>$cadRef,2=>$cadRefT);
$refCampo	 	= array("refzona","refequipo","reftorneo"); 
//////////////////////////////////////////////  FIN de los opciones //////////////////////////




/////////////////////// Opciones para la creacion del view  /////////////////////
$cabeceras 		= "	<th>Equipo</th>
					<th>Torneo</th>
					<th>Zona</th>
					<th>Fecha Creación</th>";

//////////////////////////////////////////////  FIN de los opciones //////////////////////////




$formulario 	= $serviciosFunciones->camposTabla("insertarPlayOff",$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);

$lstCargados 	= $serviciosFunciones->camposTablaView($cabeceras,$serviciosPlayOff->traerPlayOff(),4);

$playoff = $serviciosPlayOff->traerPlayOffTorneoZona();

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

<h3>PlayOff</h3>

    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Carga de PlayOff</p>
        	
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
                </ul>
                </div>
            </div>
            <div class="row" align="center">
            	<ul class="list-inline">
                	<li>
                    	Seleccione un Torneo y una Zona para armar el Playoff
                    </li>
                </ul>
            </div>
            <div class="row" align="center">
                <ul class="list-inline">
                	<?php while ($row = mysql_fetch_array($playoff)) { ?>
                	<li>
                    	<a href="armarplayoff.php?idtorneo=<?php echo $row[0]; ?>&idzona=<?php echo $row[1]; ?>"><button type="button" class="btn btn-primary" style="margin-left:0px;"><?php echo $row[2].' - '.$row[3]; ?> | Armar PlayOff</button></a>
                    </li>
					<?php } ?>
                </ul>
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
							
							cad = cad+'<option value="'+item.idgrupo+'">'+item.nombre+'</option>';
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
