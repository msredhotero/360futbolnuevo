<?php

require 'includes/funcionesUsuarios.php';
require 'includes/funcionesProductos.php';
require 'includes/funcionesVentas.php';

session_start();

$serviciosProductos = new ServiciosProductos();
$serviciosVentas = new ServiciosVentas();
$serviciosUsuario = new ServiciosUsuarios();


$ui = $serviciosProductos->GUID();
//echo $ui;
$cantCarrito = 0;
$idcliente = '';
$resCarrito = $serviciosVentas->traerVentasProductosActivas(0);
if (!isset($_SESSION['usua_cv'])) {
	$usuario = "";
	$nombre  = "";
	$email   = "";
	$direccion = "";
	$refroll = "";
	
	
} else {
	
	$usuario = $_SESSION['usua_cv'];
	$nombre  = $_SESSION['nombre_cv'];
	$email   = $_SESSION['email_cv'];
	//$direccion = $_SESSION['direccion_cv'];
	$refroll = $_SESSION['refroll_cv'];
	$idcliente = mysql_result($serviciosUsuario->traerUsuario($email),0,0);
	$direccion = mysql_result($serviciosUsuario->traerUsuario($email),0,'direccion');
	$resCarrito = $serviciosVentas->traerVentasProductosActivas($idcliente);
	//echo $resCarrito;
	$cantCarrito = mysql_num_rows($resCarrito);
}





?>

<!DOCTYPE HTML>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta http-equiv='refresh' content='1000' />

<meta name='title' content='Carnes de Primera Calidad' />

<meta name='description' content='Carnes A Casa, somos una empresa abocada a la comercialización de productos cárnicos envasados al vació con los mas elevados Standars de calidad higiene y salubridad. Productos derivados de animales criados en los mejores establecimientos ganaderos del país. Nuestros productos llegan a su hogar por intermedio de transportes refrigerados cuidando celosamente la cadena de frió para mantener la máxima calidad del producto. Manipulados por personal habilitado con libreta sanitaria e indumentaria apropiada para la manipulación de alimentos. Nuestros productos están amparados por certificado de salubridad y establecimiento del SENASA (secretaria nacional de salubridad animal) desde el campo al frigorífico y del frigorífico a su mesa.' />

<meta name='keywords' content='Carnes, Envio Gratis, Frigorifico, Novillo, Ternera' />

<meta name='distribution' content='Global' />

<meta name='language' content='es' />

<meta name='identifier-url' content='http://www.carnesacasa.com.ar' />

<meta name='rating' content='General' />

<meta name='reply-to' content='' />

<meta name='author' content='Webmasters' />

<meta http-equiv='Pragma' content='no-cache/cache' />

<link rel="carnesacasa" href="imagenes/carnesacasaicon.ico" />


<meta http-equiv='Cache-Control' content='no-cache' />

<meta name='robots' content='all' />

<meta name='revisit-after' content='7 day' />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">



<title>Carnes A Casa</title>



		<link rel="stylesheet" type="text/css" href="css/estilo.css"/>

<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>

         <link rel="stylesheet" href="css/jquery-ui.css">

    <script src="js/jquery-ui.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

        <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        
        
      <script type="text/javascript">
		$( document ).ready(function() {
			$('#icoCate').click(function() {
				$('#icoCate').hide();
				$('.todoMenu').show(100, function() {
					$('#menuCate').animate({'margin-left':'0px'}, {
													duration: 800,
													specialEasing: {
													width: "linear",
													height: "easeOutBounce"
													}});
				});
			});
			
			$('.ocultar').click(function(){
				$('#icoCate').show(100, function() {
					$('#menuCate').animate({'margin-left':'-235px'}, {
													duration: 800,
													specialEasing: {
													width: "linear",
													height: "easeOutBounce"
													}});
				});
				$('.todoMenu').hide();
			});
			
			
		

		});
	</script>


        
        
</head>



<body>


<div class="content">

<div class="row" style="margin-top:-20px; font-family:Verdana, Geneva, sans-serif;">
	<div class="col-md-6" align="center">
		<a href="index.php" title="Carnes A Casa"><img src="imagenes/logo.png"></a>
    </div>
    <div class="col-md-6" align="right" style="padding-right:100px; padding-top:50px;">
		 <div class="col-md-12" style="height:25px;text-shadow: 1px 1px #fff;">
         	<p><span style="color: #009; font-weight:bold; font-size:16px;">Contáctenos</span></p>
         </div>
         <div class="col-md-12" style="height:25px;text-shadow: 1px 1px #fff;">
         	<p><span style="color: #F00; font-weight:bold; font-size:18px;">(011) 15 3946 - 7546</span></p>
         </div>
         <div class="col-md-12" style="height:25px;text-shadow: 1px 1px #fff;">
         	<p>info@carnesacasa.com.ar - dsagasti@yahoo.com.ar</p>
         </div>
         <div class="col-md-12" style="height:25px;text-shadow: 1px 1px #fff;">
         	<p><span style="color: #333; font-weight:bold; font-size:15px;">Calle 136 n° 1408 La Plata</span></p>
         </div>
         <div class="col-md-12" style="height:25px;text-shadow: 1px 1px #fff;">
         	<p>Horarios de Atención, Lun a Vie de 09:00 a 20:00 Hs</p>
         </div>

    </div>
</div>

<div style=" background-color:#FFF; border:1px solid #F7F7F7;height: auto; position: relative;margin-bottom:35px; padding:12px;box-shadow: 2px 2px 5px #999;
				-webkit-box-shadow: 2px 2px 5px #999;
  				-moz-box-shadow: 2px 2px 5px #999;">
        
    <div class="row" style="padding-left:20px; padding-right:20px;">
    	
        	<?php if ($usuario == '') { ?>
            <div class="alert alert-danger col-md-8">
    		Recuerde que para hacer su pedido debe registrarse. <a href="usuario.php">REGISTRESE.</a>
            </div>
            <?php } else { ?>
            <div class="col-md-8">
            	<h4>Bienvenido: <?php echo $nombre; ?></h4>
                <ul class="list-inline">
                <li>
                <button type="button" class="btn btn-info cuenta" id="1">
                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Mi Cuenta
                </button>
                </li>
                <li>
                <button type="button" class="btn btn-danger salir" id="1">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span> Salir
                </button>
                </li>
                <li>
                <button type="button" class="btn btn-default volver" id="1">
                  <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Volver
                </button>
                </li>
                </ul>
            </div>
            <?php } ?>
        

    </div>
    
    <div class="row" style="padding-left:30px; padding-right:30px; ">
        <div class="col-md-12" style="padding:8px; background-color:#333;margin-top:10px;-moz-border-radius: 6px 6px 6px 6px;-webkit-border-radius: 6px 6px 6px 6px;
border-radius: 6px 6px 6px 6px;">
                <div class="col-md-6" style="color:#FFF; font-size:18px;" align="left">
                	<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Tu pedido
                </div>
                <div class="col-md-6" style="color:#FFF; font-size:18px;" align="right">
                	Hay <?php echo mysql_num_rows($resCarrito); ?> productos.
                </div>
                	
        </div>            
    </div>
    
    <div class="row" style="padding-left:30px; padding-right:30px;">
    	<form class="form-inline formulario" role="form" method="post" action="confirmar.php">
        <br>
        <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
              <input type="text" class="form-control" value="<?php if (!isset($_SESSION['usua_cv'])) { echo ''; } else { echo utf8_encode($direccion); } ?>" readonly>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="col-md-12">
        <label class="control-label">Si desea que el pedido se entrege en otro domicilio, tilde la opción y escriba el nuevo domicilio.</label>
            <div class="input-group">
              
              <span class="input-group-addon">
                <input type="checkbox" id="esotrodomicilio" name="esotrodomicilio">
              </span>
              <input type="text" class="form-control" id="otrodomicilio" name="otrodomicilio">
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
        <table class="table table-striped">
            	<thead>
                	<tr>
                    	<th>Imagen</th>
                    	<th>Producto</th>
                        <th>Tipo</th>
                        <th style="width:42px;">Piezas</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
<!--idproducto,nombre,precio_unit,precio_venta,stock,stock_min,reftipoproducto,refproveedor,codigo,codigobarra,caracteristicas -->
                	<?php
						if (mysql_num_rows($resCarrito)>0) {
							
							$totalPrecio = 0;
							$totalCant = 0;
							while ($row = mysql_fetch_array($resCarrito)) {
							
							$totalPrecio = $totalPrecio + ($row['precioventa']*$row['cantidad']);
							$totalCant = $totalCant + $row['cantidad'];
					?>
                    	<tr class="prodCarrito">
                        	<td><?php echo '<img src="'.$row[5].'"  width="72"/>'; ?></td>
                            <td><?php echo utf8_encode($row['producto']); ?></td>
							<td>
								<?php echo $row['tipoproducto']; ?>
                            </td>
                            <td>
								<?php echo $row['cantidad']; ?>
                            </td>
                            <td>
								<?php echo '$ '.($row['precioventa']*$row['cantidad']); ?>
                            </td>
                            <td>
                            	
                                <button type="button" class="btn btn-danger agregarCarrito" id="<?php echo $row['idauxdetallefactura']; ?>">
                                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar
                                </button>
                                
                            </td>
                        </tr>
                        
                    <?php } ?>
                    	<tr>
                        	<td colspan="5" align="right">
                            	<b>Cantidad de Piezas: <?php echo $totalCant; ?></b>
                            </td>
                            <td colspan="1">
                            	<b>Precio Total: <?php echo $totalPrecio; ?></b>
                            </td>
                        </tr>
                    <?php } else { ?>
                    	<h3>No hay productos cargados.</h3>
                    <?php } ?>
                </tbody>
            </table>
            	<div id="load">
                        
                </div>
                <div id="error">
                
                </div>
                
                <div class="row" style="padding-top:10px;" align="center">
                    <div class="form-group">
                        <label for="dtp_input2" class="col-md-6 control-label">Fecha de Entrega: (día/mes/año)</label>
                        <div class="input-group date form_date col-md-6" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input class="form-control" size="50" type="text" value="" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                        <input type="hidden" id="dtp_input2" value="" /><br/>
                    </div>
                    <div class="col-md-12">
                    	<div class="alert alert-warning">
                        	<strong>* Importante: </strong> Recuerde que la fecha de entrega es a partir de las 72 hs.
                        </div>
                    </div>
                     
                     
                    <div class="col-md-12">
                        <button type="button" class="btn btn-warning" id="finalizar" style="margin-left:0px;"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Finalizar el Pedido</button>
                    </div>
                </div>
            </form>
    </div>
    
   

</div>


</div><!-- fin del content -->

<div id="dialogEliminar" title="Eliminar Producto Cargado">
    	<p>
        	<span class="glyphicon glyphicon-ok-sign" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar el producto de su pedido?.
        </p>
        <br>
        <h3>Carnes a Casa</h3>
        <input type="hidden" name="idcarrito" id="idcarrito" value=""/>
        
</div>


<script src="js/bootstrap-datetimepicker.min.js"></script>
<script src="js/bootstrap-datetimepicker.es.js"></script>

<script type="text/javascript">
$( document ).ready(function() {
	
	
	$('.volver').click(function(){
		history.back();
	});
	
	$('.agregarCarrito').click(function(event){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			$('#idcarrito').val(usersid);
			$('#dialogEliminar').dialog("open");
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton eliminar
	
	$('.cuenta').click(function(event){
			url = "dashboard/";
			$(location).attr('href',url);
	});//fin del boton dashboard
	
	
	$('.salir').click(function(event){
			url = "logout.php";
			$(location).attr('href',url);
	});//fin del boton dashboard
	
	
	
	$('#finalizar').click(function() {
		/*
		$('.prodCarrito tr').each(function(){
			
		});
		*/
		<?php if ($cantCarrito > 0) { ?>
		if($("#esotrodomicilio").is(':checked')) {  
            if ($('#otrodomicilio').val() == '') {
				alert("Error, debe ingresar un domicilio para hacer el pedido.");	
			} else {
				if ($('#dtp_input2').val() != '') {
					$( ".formulario" ).submit();
				} else {
					alert("Error, debe ingresar una fecha de entrega.");	
				}
			}
        } else {  
            if ($('#dtp_input2').val() != '') {
				$( ".formulario" ).submit();
			} else {
				alert("Error, debe ingresar una fecha de entrega.");	
			}
        }  
		
		<?php } else { ?>
		alert($('#dtp_input2').val());
		alert("Error, debe seleccionar algun producto para hacer el pedido.");	
		<?php } ?>
		//url = "confirmar.php";
		//$(location).attr('href',url);
	});
	
	$( "#dialogEliminar" ).dialog({
		 	
		autoOpen: false,
		resizable: false,
		width:600,
		height:260,
		modal: true,
		buttons: {
			"Eliminar": function() {
				$.ajax({
					data:  {id:		$('#idcarrito').val(),
							accion:		'eliminarCarrito'},
					url:   'ajax/ajax.php',
					type:  'post',
					beforeSend: function () {
							$("#load").html('<img src="imagenes/load13.gif" width="50" height="50" />');
					},
					success:  function (response) {
							
							if (response != '') {
								
								$("#error").removeClass("alert alert-danger");
	
								$("#error").addClass("alert alert-danger");
								$("#error").html('<strong>Error!</strong> '+response);
								$("#load").html('');
	
							} else {
								//url = "index.php";
								//$(location).attr('href',url);
								url = "carrito.php";
								$(location).attr('href',url);
							}
							
					}
				});//fin del ajax
			
				$( this ).dialog( "close" );
				$( this ).dialog( "close" );
					$('html, body').animate({
						scrollTop: '0'
					},
					1500);
				
				url = "carrito.php";
				$(location).attr('href',url);
			},
			"Cancelar": function() {
				$( this ).dialog( "close" );
				$( this ).dialog( "close" );
			}
		}
 
 
	}); //fin del dialogo para registro
	
	$('#novillo').click(function(event){
			url = "novillo.php";
			$(location).attr('href',url);
	});//fin del boton novillo
	
	$('#ternera').click(function(event){
			url = "ternera.php";
			$(location).attr('href',url);
	});//fin del boton ternera
});
</script>
<?php 

date("l") == "Sunday" ? $fecha_cambiada = mktime(0,0,0,date("m"),date("d")+4,date("Y")): $fecha_cambiada = mktime(0,0,0,date("m"),date("d")+3,date("Y"));

$fecha = date("d/m/Y", $fecha_cambiada);
//echo $fecha; //devuelve 10/01/2004  

?>
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
	format: 'dd/mm/yyyy',
	initialDate: '<?php echo $fecha; ?>',
	startDate: '<?php echo $fecha; ?>'
});
</script>
<footer>

<div class="row">
	<div class="col-md-12" align="center">
    	<p style="text-shadow: 1px 1px #fff;"><strong>Copyright © 2014 Carnes A Casa. Diseño Web: Saupurein Marcos.</strong></p>

    </div>
</div>

</footer>

</body>

</html>