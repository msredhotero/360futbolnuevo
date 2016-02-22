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

$id = $_GET['id'];

$resResultado = $serviciosNoticias->traerNoticiasPorId($id);


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

$resNoticiasFotos = $serviciosNoticias->TraerFotosNoticias($id);

$cantidadImagenes = 0;
$cantidadImagenes = mysql_num_rows($resNoticiasFotos);

$formulario 	= $serviciosFunciones->camposTablaModificar($id, "idnoticia","modificarNoticias",$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);

$parrafo = mysql_result($resResultado,0,'parrafo');

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
        	<p style="color: #fff; font-size:18px; height:16px;">Modificación de <?php echo $lblTituloplural; ?></p>
        	
        </div>
    	<div class="cuerpoBox">
        	<form class="form-inline formulario" role="form">
        	
			<div class="row">
			<?php echo $formulario; ?>
            </div>
            
            <div class="row" style="margin-left:25px; margin-right:25px;">
                <h3>Imagenes Cargadas</h3>
                    <ul class="list-inline">
                        <?php while ($rowImg = mysql_fetch_array($resNoticiasFotos)) { ?>
                        <li>
                            
                            <div class="col-md-4" align="center">
                            <div id="img<?php echo $rowImg[3]; ?>">
                                <img src="<?php echo '../../archivos/'.$rowImg[0].'/'.$rowImg[1].'/'.utf8_encode($rowImg[2]) ?>" width="100" height="100">
                            </div>
                            <input type="button" name="eliminar" id="<?php echo $rowImg[3]; ?>" class="btn btn-danger eliminar" value="Eliminar">
                            </div>
                            
                        </li>
                        <?php } ?>
                    </ul>
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
                            <?php for($i=1;$i<=8-$cantidadImagenes;$i=$i+2) { ?>
                            <li style="margin-top:14px;">
                            <div style=" height:110px; width:140px; border:2px dashed #CCC; text-align:center; overflow: auto;">
                                <div class='custom-input-file'>
                                    <input type="file" name="imagen<?php echo $i; ?>" id="imagen<?php echo $i; ?>">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                
                                <img id="vistaPrevia<?php echo $i; ?>" name="vistaPrevia<?php echo $i; ?>" width="50" height="50"/>
                            </div>
                            <div style="height:14px;">
                                
                            </div>
                            <?php if ($i<8-$cantidadImagenes) { ?>
                            <div style=" height:110px; width:140px; border:2px dashed #CCC; text-align:center; overflow: auto;">
                                <div class='custom-input-file'>
                                    <input type="file" name="imagen<?php echo $i+1; ?>" id="imagen<?php echo $i+1; ?>">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                <img id="vistaPrevia<?php echo $i+1; ?>" name="vistaPrevia<?php echo $i+1; ?>" width="50" height="50"/>
                            </div>
                            <?php } ?>
                                
                            </li>
                            <?php } ?>
                           
                            
                            
                            
                            </ul>
                            
                            
                            
                            
                            
                            
                           
                </div>
                
            <input type="hidden" id="cantidadImagenes" name="cantidadImagenes" value="<?php echo $cantidadImagenes; ?>">    
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
	
	CKEDITOR.instances['parrafo'].setData('<?php echo $parrafo; ?>');

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
		var contenido = CKEDITOR.instances['parrafo'].getData();
		
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
	
	
	$('.eliminar').click(function(event){
                
			  usersid =  $(this).attr("id");
			  imagenId = 'img'+usersid;
			  
			  if (!isNaN(usersid)) {
				$("#idAgente").val(usersid);
                                //$('#vistaPrevia30').attr('src', e.target.result);
				$("#auxImg").html($('#'+imagenId).html());
				$("#dialog3").dialog("open");
				//url = "../clienteseleccionado/index.php?idcliente=" + usersid;
				//$(location).attr('href',url);
			  } else {
				alert("Error, vuelva a realizar la acción.");	
			  }
			  
			  //post code
	});
	
	$( "#dialog3" ).dialog({
		 	
			    autoOpen: false,
			 	resizable: false,
				width:600,
				height:340,
				modal: true,
				buttons: {
				    "Eliminar": function() {
	
						$.ajax({
									data:  {id: $("#idAgente").val(), accion: 'eliminarFoto'},
									url:   '../../ajax/ajax.php',
									type:  'post',
									beforeSend: function () {
											
									},
									success:  function (response) {
											url = "modificar.php?id=<? echo $id; ?>";
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
<div id="dialog3" title="Eliminar Imagen">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar la imagen?.
        </p>
        <div id="auxImg">
        
        </div>
        <input type="hidden" value="" id="idAgente" name="idAgente">
</div>

<?php } ?>
</body>
</html>
