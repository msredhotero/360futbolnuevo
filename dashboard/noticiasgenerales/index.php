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

$resMenu = $serviciosHTML->menu($_SESSION['nombre_predio'],"Noticias Generales",$_SESSION['refroll_predio'],utf8_encode($_SESSION['torneo_predio']));


/////////////////////// Opciones de la pagina  ////////////////////

$lblTitulosingular	= "Noticia General";
$lblTituloplural	= "Noticias Generales";
$lblEliminarObs		= "";
$accionEliminar		= "eliminarNoticias";

/////////////////////// Fin de las opciones /////////////////////


/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla 			= "dbnoticias";

$lblCambio	 	= array("titulo","parrafo","fechacreacion");
$lblreemplazo	= array("Título","Noticia","Fecha Creación");


$cadRef = '';

$refdescripcion[] = "";
$refCampo[] 	= ""; 
//////////////////////////////////////////////  FIN de los opciones //////////////////////////




/////////////////////// Opciones para la creacion del view  /////////////////////
$cabeceras 		= "	<th>Título</th>
				<th>Noticia Principal</th>
				<th>Fecha Creación</th>
				<th>Es Galeria</th>";
				

//////////////////////////////////////////////  FIN de los opciones //////////////////////////




$formulario 	= $serviciosFunciones->camposTabla("insertarNoticias",$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);

$lstCargados 	= $serviciosFunciones->camposTablaView($cabeceras,$serviciosNoticias->traerNoticias(),4);




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
			
        	<form class="form-inline formulario" role="form">
	        	<div class="row" style="margin-left:25px; margin-right:25px;">
				<?php echo $formulario; ?>
            	</div>
                
                <div class="row" style="margin-left:25px; margin-right:25px;">
                	<h4>Agregar Imagenes</h4>
                        <p style=" color: #999;">30 fotos disponibles (no más de 1 mb por foto)</p>
                        <div style="height:auto; 
                    			width:100%; 
                                background-color:#FFF;
                                -webkit-border-radius: 13px; 
                            	-moz-border-radius: 13px;
                            	border-radius: 13px;
                                margin-left:-20px;
                                padding-left:20px;">

                            
			<ul class="list-inline">
                            <li style="margin-top:14px;">
                            <div style=" height:110px; width:140px; border:2px dashed #CCC; text-align:center; overflow: auto;">
                                <div class='custom-input-file'>
                                    <input type="file" name="imagen1" id="imagen1">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                
                                <img id="vistaPrevia1" name="vistaPrevia1" width="50" height="50"/>
                            </div>
                            <div style="height:14px;">
                                
                            </div>
                            <div style=" height:110px; width:140px; border:2px dashed #CCC; text-align:center; overflow: auto;">
                                <div class='custom-input-file'>
                                    <input type="file" name="imagen2" id="imagen2">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                <img id="vistaPrevia2" name="vistaPrevia2" width="50" height="50"/>
                            </div>
                            
                                
                            </li>
                            <li style="margin-top:14px;">
                            <div style=" height:110px; width:140px; border:2px dashed #CCC; text-align:center; overflow: auto;">
                                <div class='custom-input-file'>
                                    <input type="file" name="imagen3" id="imagen3">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                <img id="vistaPrevia3" name="vistaPrevia3" width="50" height="50"/>
                            </div>
                            <div style="height:14px;">
                                
                            </div>
                            <div style=" height:110px; width:140px; border:2px dashed #CCC; text-align:center; overflow: auto;">
                                <div class='custom-input-file'>
                                    <input type="file" name="imagen4" id="imagen4">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                <img id="vistaPrevia4" name="vistaPrevia4" width="50" height="50"/>
                            </div>
                            </li>
                            <li style="margin-top:14px;">
                            <div style=" height:110px; width:140px; border:2px dashed #CCC; text-align:center; overflow: auto;">
                                <div class='custom-input-file'>
                                    <input type="file" name="imagen5" id="imagen5">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                <img id="vistaPrevia5" name="vistaPrevia5" width="50" height="50"/>
                            </div>
                            <div style="height:14px;">
                            
                            </div>
                            <div style=" height:110px; width:140px; border:2px dashed #CCC; text-align:center; overflow: auto;">
                                <div class='custom-input-file'>
                                    <input type="file" name="imagen6" id="imagen6">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                <img id="vistaPrevia6" name="vistaPrevia6" width="50" height="50"/>
                            </div>
                            </li>
                            
                            <li style="margin-top:14px;">
                            <div style=" height:110px; width:140px; border:2px dashed #CCC; text-align:center; overflow: auto;">
                                <div class='custom-input-file'>
                                    <input type="file" name="imagen7" id="imagen7">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                <img id="vistaPrevia7" name="vistaPrevia7" width="50" height="50"/>
                            </div>
                            <div style="height:14px;">
                            
                            </div>
                            <div style=" height:110px; width:140px; border:2px dashed #CCC; text-align:center; overflow: auto;">
                                <div class='custom-input-file'>
                                    <input type="file" name="imagen8" id="imagen8">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                <img id="vistaPrevia8" name="vistaPrevia8" width="50" height="50"/>
                            </div>
                            </li>
                            
                            </ul>
                            
                            
                            
                            
                            
                            
                           
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
        	<p style="color: #fff; font-size:18px; height:16px;"><?php echo $lblTituloplural; ?></p>
        	
        </div>
    	<div class="cuerpoBox">
        	<?php echo $lstCargados; ?>
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
		var contenido = CKEDITOR.instances['parrafo'].getData();
		
		//alert(contenido);
		
		$('#parrafo').val(contenido);
		
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

$('#imagen1').on('change', function(e) {
  var Lector,
      oFileInput = this;
 
  if (oFileInput.files.length === 0) {
    return;
  };
 
  Lector = new FileReader();
  Lector.onloadend = function(e) {
    $('#vistaPrevia1').attr('src', e.target.result);         
  };
  Lector.readAsDataURL(oFileInput.files[0]);
 
});

$('#imagen2').on('change', function(e) {
  var Lector,
      oFileInput = this;
 
  if (oFileInput.files.length === 0) {
    return;
  };
 
  Lector = new FileReader();
  Lector.onloadend = function(e) {
    $('#vistaPrevia2').attr('src', e.target.result);         
  };
  Lector.readAsDataURL(oFileInput.files[0]);
 
});

$('#imagen3').on('change', function(e) {
  var Lector,
      oFileInput = this;
 
  if (oFileInput.files.length === 0) {
    return;
  };
 
  Lector = new FileReader();
  Lector.onloadend = function(e) {
    $('#vistaPrevia3').attr('src', e.target.result);         
  };
  Lector.readAsDataURL(oFileInput.files[0]);
 
});

$('#imagen4').on('change', function(e) {
  var Lector,
      oFileInput = this;
 
  if (oFileInput.files.length === 0) {
    return;
  };
 
  Lector = new FileReader();
  Lector.onloadend = function(e) {
    $('#vistaPrevia4').attr('src', e.target.result);         
  };
  Lector.readAsDataURL(oFileInput.files[0]);
 
});

$('#imagen5').on('change', function(e) {
  var Lector,
      oFileInput = this;
 
  if (oFileInput.files.length === 0) {
    return;
  };
 
  Lector = new FileReader();
  Lector.onloadend = function(e) {
    $('#vistaPrevia5').attr('src', e.target.result);         
  };
  Lector.readAsDataURL(oFileInput.files[0]);
 
});

$('#imagen6').on('change', function(e) {
  var Lector,
      oFileInput = this;
 
  if (oFileInput.files.length === 0) {
    return;
  };
 
  Lector = new FileReader();
  Lector.onloadend = function(e) {
    $('#vistaPrevia6').attr('src', e.target.result);         
  };
  Lector.readAsDataURL(oFileInput.files[0]);
 
});

$('#imagen7').on('change', function(e) {
  var Lector,
      oFileInput = this;
 
  if (oFileInput.files.length === 0) {
    return;
  };
 
  Lector = new FileReader();
  Lector.onloadend = function(e) {
    $('#vistaPrevia7').attr('src', e.target.result);         
  };
  Lector.readAsDataURL(oFileInput.files[0]);
 
});


$('#imagen8').on('change', function(e) {
  var Lector,
      oFileInput = this;
 
  if (oFileInput.files.length === 0) {
    return;
  };
 
  Lector = new FileReader();
  Lector.onloadend = function(e) {
    $('#vistaPrevia8').attr('src', e.target.result);         
  };
  Lector.readAsDataURL(oFileInput.files[0]);
 
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
	CKEDITOR.replace( 'parrafo', {
						language: 'es',
						uiColor: '#9AB8F3'
						
					} );
</script>

<?php } ?>
</body>
</html>
