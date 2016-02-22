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

$resMenu = $serviciosHTML->menu($_SESSION['nombre_predio'],"Jugadores",$_SESSION['refroll_predio'],$_SESSION['torneo_predio']);


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

$lblCambio		= array("idequipo","apyn");
$lblreemplazo	= array("Equipo","Apellido y Nombre");

$resEquipos 	= $serviciosEquipos->TraerEquipos();

$cadRef = '';
while ($rowTT = mysql_fetch_array($resEquipos)) {
	$cadRef = $cadRef.'<option value="'.$rowTT[0].'">'.utf8_encode($rowTT[1]).'</option>';
	
}

$refdescripcion = array(0 => $cadRef);
$refCampo[] 	= "idequipo"; 
//////////////////////////////////////////////  FIN de los opciones //////////////////////////




/////////////////////// Opciones para la creacion del view  /////////////////////
$cabeceras 		= "	<th>Apellido y Nombre</th>
				<th>DNI</th>
				<th>Equipos</th>
				<th>Invitado</th>";
//defino la cantidad de columnas
$cantidad = 4;

//////////////////////////////////////////////  FIN de los opciones //////////////////////////


//$lstCargados 	= $serviciosFunciones->camposTablaView($cabeceras,$serviciosJugadores->TraerJugadoresEquipos(),$cantidad);



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
    <script src="../../js/ui/jquery.ui.autocomplete.js"></script>
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
        	<p style="color: #fff; font-size:18px; height:16px;">Carga de <?php echo $lblTituloplural; ?></p>
        	
        </div>
    	<div class="cuerpoBox">
        	<div class="row" style="margin-left:25px; margin-right:25px;">
        	<form class="form-inline formulario" role="form">
				<div class="row">
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
            </div>
            <br>
            <br>
            
            
            
            <input id="accion" type="hidden" value="insertarJugadores" name="accion">
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
            <div class="row" style="margin-left:25px; margin-right:25px;">
            <div class="alert"> </div>
            <div id="load"> </div>
            </div>
    	</div>
    </div>

	<div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;"><?php echo $lblTituloplural; ?> Cargados</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<form class="form-inline formulario" role="form">
            	
                <div class="row">
                    
                    
                    <div class="form-group col-md-6">
                     <label class="control-label" style="text-align:left" for="torneo">Tipo de Busqueda</label>
                        <div class="input-group col-md-12">
                            <select id="tipobusqueda" class="form-control" name="tipobusqueda">
                                <option value="0">--Seleccione--</option>
                                <option value="1">Equipo</option>
                                <option value="2">Apyn</option>
                                <option value="3">DNI</option>
                                <option value="4">Invitado</option>
                                <option value="5">Expulsado</option>
                                
                            </select>
                        </div>
                        
                    </div>
                    
                    <div class="form-group col-md-6">
                     <label class="control-label" style="text-align:left" for="torneo">Busqueda</label>
                        <div class="input-group col-md-12">
                            <input type="text" name="busqueda" id="busqueda" class="form-control">
                        </div>

                    </div>
                    
                    <div class="form-group col-md-12">
                    	 <ul class="list-inline" style="margin-top:15px;">
                            <li>
                             <button id="buscar" class="btn btn-primary" style="margin-left:0px;" type="button">Buscar</button>
                            </li>
                        </ul>

                    </div>
                    
                    <div class="form-group col-md-12">
                    	<div class="cuerpoBox" id="resultados">
        
       		 			</div>
					</div>
                
                </div>
                
                <div class="row">
                    <div class="alert"> </div>
                    <div id="load"> </div>
                </div>

            
            </form>
    	</div>
    </div>

    
    
   
</div>


</div>

<div id="dialog2" title="Eliminar <?php echo $lblTitulosingular; ?>">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar al <?php echo $lblTitulosingular; ?>?.<span id="proveedorEli"></span>
        </p>
        <p><strong>Importante: </strong><?php echo $lblEliminarObs; ?></p>
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>

<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
<script src="../../bootstrap/js/dataTables.bootstrap.js"></script>


<script type="text/javascript">
$(document).ready(function(){
	
	$('#buscar').click(function(e) {
        $.ajax({
				data:  {busqueda: $('#busqueda').val(),
						tipobusqueda: $('#tipobusqueda').val(),
						accion: 'buscarJugadores'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
						$('#resultados').html(response);
						
				}
		});
		
	});
	
	$('#example').dataTable({
		"order": [[ 2, "asc" ]]
	} );	
	
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
                                            $(".alert").html('<strong>Ok!</strong> Se cargo exitosamente el <strong><?php echo $lblTitulosingular; ?></strong>. ');
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
		}
    });
	

});
</script>
<?php } ?>
</body>
</html>
