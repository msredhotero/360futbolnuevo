<?php

session_start();

if (!isset($_SESSION['usua_predio']))
{
	header('Location: ../../error.php');
} else {


include ('../../includes/funciones.php');
include ('../../includes/funcionesUsuarios.php');
include ('../../includes/funcionesHTML.php');
include ('../../includes/funcionesNoticias.php');

$serviciosFunciones = new Servicios();
$serviciosUsuario = new ServiciosUsuarios();
$serviciosHTML = new ServiciosHTML();
$serviciosNoticias = new ServiciosNoticias();

$fecha = date('Y-m-d');

$resMenu = $serviciosHTML->menu($_SESSION['nombre_predio'],"Ultimas/Predio Noticias",$_SESSION['refroll_predio'],utf8_encode($_SESSION['torneo_predio']));


/////////////////////// Opciones de la pagina  ////////////////////

$lblTitulosingular	= "Noticia";
$lblTituloplural	= "Noticias";
$lblEliminarObs		= "";
$accionEliminar		= "eliminarNoticiasPrincipales";

/////////////////////// Fin de las opciones /////////////////////


/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla 			= "dbnoticiaprincipal";

$lblCambio	 	= array("titulo","noticiaprincipal","fechacreacion");
$lblreemplazo	= array("Título","Noticia Principal","Fecha Creación");


$tabla2 		= "dbnoticiapredio";

$lblCambio2	 	= array("titulo","noticiapredio","fechacreacion");
$lblreemplazo2	= array("Título","Noticia Predio","Fecha Creación");



$cadRef = '';

$refdescripcion[] = "";
$refCampo[] 	= ""; 
//////////////////////////////////////////////  FIN de los opciones //////////////////////////




/////////////////////// Opciones para la creacion del view  /////////////////////
$cabeceras 		= "	<th>Título</th>
				<th>Noticia Principal</th>
				<th>Fecha Creación</th>";
				
$cabeceras2		= "	<th>Título</th>
				<th>Noticia Principal</th>
				<th>Fecha Creación</th>";

//////////////////////////////////////////////  FIN de los opciones //////////////////////////




$formulario 	= $serviciosFunciones->camposTabla("insertarNoticiasPrincipales",$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);

$lstCargados 	= $serviciosFunciones->camposTablaView($cabeceras,$serviciosNoticias->traerNoticiaPrincipal(),97);


$formulario2 	= $serviciosFunciones->camposTabla("insertarNoticiasPredio",$tabla2,$lblCambio2,$lblreemplazo2,$refdescripcion,$refCampo);

$lstCargados2 	= $serviciosFunciones->camposTablaView($cabeceras2,$serviciosNoticias->traerNoticiaPredio(),98);



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
    
    <script src="../../ckeditor/ckeditor.js"></script>
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
        	<div class="help-block">
            	* Recuerde que para agregar un salto de linea o enter debe ingresar la palabra "<span><</span>br>"
            </div>
        	<form class="form-inline formulario" role="form">
        	<?php echo $formulario; ?>
            
            
            
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
                        <button type="button" class="btn btn-primary" id="cargar" style="margin-left:0px;">Guardar</button>
                    </li>
                </ul>
                </div>
            </div>
            </form>
    	</div>
    </div>
    
    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;"><?php echo $lblTituloplural; ?> Principales Cargadas</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<?php echo $lstCargados; ?>
    	</div>
    </div>
    
    
    
    
    
    
    
    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Carga de <?php echo $lblTituloplural; ?> del Predio</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<div class="help-block">
            	* Recuerde que para agregar un salto de linea o enter debe ingresar la palabra "<span><</span>br>"
            </div>
        	<form class="form-inline formulario2" role="form">
        	<?php echo $formulario2; ?>
            
            
            
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
                        <button type="button" class="btn btn-primary" id="cargar2" style="margin-left:0px;">Guardar</button>
                    </li>
                </ul>
                </div>
            </div>
            </form>
    	</div>
    </div>
    
    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;"><?php echo $lblTituloplural; ?> Predio Cargadas</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<?php echo $lstCargados2; ?>
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
	
	 $('.varborrarprincipal').click(function(event){
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
	
	$('.varborrarpredio').click(function(event){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			$("#idEliminar").val(usersid);
			$("#dialog3").dialog("open");

			
			//url = "../clienteseleccionado/index.php?idcliente=" + usersid;
			//$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton eliminar
	
	$('.varmodificarpredio').click(function(event){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			url = "modificarpredio.php?id=" + usersid;
			$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton modificar
	
	
	$('.varmodificarprincipal').click(function(event){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			url = "modificarprincipal.php?id=" + usersid;
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
									data:  {id: $('#idEliminar').val(), accion: 'eliminarNoticiasPrincipales'},
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
	
	 $( "#dialog3" ).dialog({
		 	
			    autoOpen: false,
			 	resizable: false,
				width:600,
				height:240,
				modal: true,
				buttons: {
				    "Eliminar": function() {
	
						$.ajax({
									data:  {id: $('#idEliminar').val(), accion: 'eliminarNoticiasPredio'},
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
		var contenido = CKEDITOR.instances['noticiaprincipal'].getData();
		
		$('#noticiaprincipal').val(contenido);
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
	
	
	//al enviar el formulario
    $('#cargar2').click(function(){
		var contenido = CKEDITOR.instances['noticiapredio'].getData();
		
		$('#noticiapredio').val(contenido);
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
<script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	CKEDITOR.replace( 'noticiapredio', {
						language: 'es',
						uiColor: '#9AB8F3'
						
					} );
</script>
<script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	CKEDITOR.replace( 'noticiaprincipal', {
						language: 'es',
						uiColor: '#9AB8F3'
						
					} );
</script>

<?php } ?>
</body>
</html>
