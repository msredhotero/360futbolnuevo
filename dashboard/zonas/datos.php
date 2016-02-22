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
include ('../../includes/funcionesJugadores.php');
include ('../../includes/funcionesEquipos.php');

$serviciosFunciones = new Servicios();
$serviciosUsuario 	= new ServiciosUsuarios();
$serviciosHTML 		= new ServiciosHTML();
$serviciosGrupos 	= new ServiciosG();
$serviciosDatos		= new ServiciosDatos();
$serviciosZonasEquipos = new ServiciosZonasEquipos();
$serviciosJugadores = new ServiciosJ();
$serviciosEquipos = new ServiciosE();

$fecha = date('Y-m-d');

$resMenu = $serviciosHTML->menu(utf8_encode($_SESSION['nombre_predio']),"Zonas",$_SESSION['refroll_predio'],utf8_encode($_SESSION['torneo_predio']));

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

$lblTitulosingular	= "Zona";
$lblTituloplural	= "Zonas";

/////////////////////// Fin de las opciones /////////////////////

$idZona		= $_GET['zona'];
$idEquipo	= $_GET['equipo'];

$resJugadores = $serviciosJugadores->TraerJugadoresPorEquipo($idEquipo);

$Equipo = mysql_result($serviciosEquipos->TraerIdEquipo($idEquipo),0,1);

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

<h3><?php echo $Equipo; ?></h3>

    <div class="boxInfoLargo" style="min-height:500px;">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Modificar Jugadores Por Equipos</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<button type="button" class="btn btn-primary" id="cargarjugador" style="margin-left:0px;">Agregar</button>
            
        	<div class="row">
				<form class="form-inline formulario" role="form">
                    <table class="table table-striped table-responsive" id="example">
                        <thead>
                            <tr>
                                <th>Apyn</th>
                                <th>Dni</th>
                                <th>Invitado</th>
                                <th>Expulsado</th>
                                <th align="center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    		<?php while ($row = mysql_fetch_array($resJugadores)) { ?>
							<tr id="fila<?php echo $row[0]; ?>">
                       			<td><input id="apyn<?php echo $row[0]; ?>" class="form-control" type="text" value="<?php echo utf8_encode($row['apyn']); ?>" required placeholder="Apyn..." name="apyn">
                                </td>
                                <td><input id="dni<?php echo $row[0]; ?>" class="form-control" value="<?php echo $row['dni']; ?>" type="text" required placeholder="Dni..." name="dni">
                                </td>
                                <td>
                                	<select id="invitado<?php echo $row[0]; ?>" class="form-control" name="invitado">
                                		<?php if ($row['invitado'] == chr(0x01)) { ?>
                                        <option value="0">No</option>
                                        <option value="1" selected>Si</option>
                                        <?php } else { ?>
                                        <option value="0" selected>No</option>
                                        <option value="1">Si</option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                	<select id="expulsado<?php echo $row[0]; ?>" class="form-control" name="expulsado">
                                		<?php if ($row['expulsado'] == chr(0x01)) { ?>
                                        <option value="0">No</option>
                                        <option value="1" selected>Si</option>
                                        <?php } else { ?>
                                        <option value="0" selected>No</option>
                                        <option value="1">Si</option>
                                        <?php } ?>
                                        
                                    </select>
                                    <?php  //echo $row['expulsado']; ?>
                                </td>
                                <td><button type="button" class="btn btn-warning varmodificar" id="<?php echo $row[0]; ?>" style="margin-left:0px;">Modificar</button>
                                </td>
                                
                            </tr>
							<?php } ?>
                        </tbody>
                    </table>
                	
             	</form>
            </div>
           
    	</div>
    </div>
    
  






<div id="crearFjugador" style=" z-index:9; display:none; height:auto; background-color:#CCC;position:absolute; top:20%; width:79%;" class="boxInfoLargo">
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
                                <option value="<?php echo $idEquipo; ?>"><?php echo $Equipo; ?></option>
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


   



</div>




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
	
	
	/*modificarJugadores
	$id 		= $_POST['id'];
	$apyn 		= $_POST['apyn'];
	$idequipo 	= $_POST['idequipo'];
	$dni 		= $_POST['dni'];
	$("#activo").is(':checked') ? 1 : 0,
	
	*/
	
	function modificarJugador(id,apyn,idequipo,dni,invitado,expulsado) {
		$.ajax({
				data:  {id: id,
						apyn: apyn,
						idequipo: idequipo,
						dni: dni,
						invitado: invitado,
						expulsado: expulsado,
						accion: 'modificarJugadoresEx'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
					$("#load").html('');
					url = "datos.php?zona=<?php echo $idZona; ?>&equipo=<?php echo $idEquipo; ?>";	
						
				}
		});
	}
	
	
	$('.varmodificar').click(function(event){
			
		  usersid =  $(this).attr("id");

		  if (!isNaN(usersid)) {
		  		modificarJugador(usersid,$('#apyn'+usersid).val(), <?php echo $idEquipo; ?>,$('#dni'+usersid).val(),$("#invitado"+usersid).val(), $("#expulsado"+usersid).val());
				$(this).html('Modificado');
				$(this).removeClass('btn-warning');
				$(this).addClass('btn-success');
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton modificar
	
	
	$('#cargarjugador').click(function(event){

		$("#crearFjugador").show(100);

	});//fin del boton abrir
	
	$('#cerrar').click(function(event){

		$("#crearFjugador").hide(100);

	});//fin del boton cerrar
	
	
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
											url = "datos.php?zona=<?php echo $idZona; ?>&equipo=<?php echo $idEquipo; ?>";
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
	

});
</script>

<?php } ?>
</body>
</html>
