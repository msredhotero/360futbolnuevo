<?php
set_include_path("class");

require 'includes/funcionesUsuarios.php';

$serviciosUsuarios = new ServiciosUsuarios();


require_once("src/facebook.php");

   $config = array(
      'appId' => '729527633821576',
      'secret' => 'faec7376d2c6b01c6acf9746d89126d9',
      'fileUpload' => false, // optional
      'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps
  );

  $facebook = new Facebook($config);
  $paramater = array(
      'scope' => 'email',
      'redirect_url' => 'http://www.carnesacasa.com.ar'
    );
  $user_id = $facebook->getUser();
  if($user_id) {
    
          // We have a user ID, so probably a logged in user.
          // If not, we'll get an exception, which we handle below.
          try {
    
            $user_profile = $facebook->api('/me','GET');

            //print_r($user_profile);
            $email = $user_profile['email'];
            //echo $user_profile['first_name'];
            //echo $user_profile['last_name'];
            $resFacebook = $serviciosUsuarios->loginFacebook($email);
            //var_dump($resFacebook);
            //echo "<pre>";
            //print_r($user_profile);
            //echo $_SESSION['usua_cv'];
            //echo $email;
            //echo $resFacebook;
            //echo "</pre>";
            //echo $_SESSION['usua_cv'];
            if ($resFacebook == null) {
              echo '<script>
                $( document ).ready(function() {
                  $("#dialogInicio").dialog("open");
                });
                </script>';
            }
    
          } catch(FacebookApiException $e) {
            // If the user is logged out, you can have a 
            // user ID even though the access token is invalid.
            // In this case, we'll get an exception, so we'll
            // just ask the user to login again here.
            $login_url = $facebook->getLoginUrl($paramater); 
            echo 'Please <a href="' . $login_url . '">login.</a>';
            error_log($e->getType());
            error_log($e->getMessage());
          }   
    } else {
          // No user, print a link for the user to login
          $login_url = $facebook->getLoginUrl($paramater);
          //echo 'No Log. Please <a href="' . $login_url . ' tarjet='blank'">login.</a>';

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

<style>

	label {
		padding-top:6px;
		padding-bottom:3px;
	}
	input-group {
		padding:4px;
	}
	

</style>

        
        
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
        
                

	<div class="row" style="height:360px;">
    	
        <div class="col-md-1">
        
        </div>
        
        <div class="col-md-5">
        	
            <div class="panel panel-info">
              <div class="panel-heading">Registrate <span id="error"></span></div>
              <div class="panel-body">
                <form class="form-inline formulario1" role="form">
                    <div class="row" style="padding-left:12px; padding-right:12px;">
                    	<div class="form-group col-md-6">
                            <label for="cancha" class="control-label" style="text-align:left">Usuario (email)</label>
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" id="usuarior" name="usuarior" placeholder="Ingrese un Usuario..." >
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="cancha" class="control-label" style="text-align:left">Password</label>
                            <div class="input-group col-md-12">
                                <input type="password" class="form-control" id="passwordr" name="passwordr" placeholder="Ingrese una Contraseña..." >
                            </div>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="cancha" class="control-label" style="text-align:left">Dirección</label>
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su dirección..." >
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="cancha" class="control-label" style="text-align:left">Nombre</label>
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su Nombre..." >
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="cancha" class="control-label" style="text-align:left">Apellido</label>
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese su Apellido..." >
                            </div>
                        </div>
                        
                        <div id="loadr">
                        
                        </div>
                        <div id="errorR">
                        
                        </div>
                        
                    </div>
                    <div class="row" align="center">
                    	<div class="col-md-12" style="padding-top:10px;">
                        	<button type="button" class="btn btn-default" id="registrar" style="margin-left:0px;">Registrate</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>

        </div>
        <div class="col-md-5">
        	
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Si ya estas registrado, ingresa</h3>
              </div>
              <div class="panel-body">
                <form class="form-inline formulario2" role="form">
                    <div class="row" style="padding-left:12px; padding-right:12px;">
                    	<div class="form-group col-md-6">
                            <label for="cancha" class="control-label" style="text-align:left">Usuario</label>
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese un Usuario..." >
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="cancha" class="control-label" style="text-align:left">Password</label>
                            <div class="input-group col-md-12">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese una Contraseña..." >
                            </div>
                        </div>
                        
                        <div id="captcha">
                        
                        </div>
                        
                        <div id="load">
                        
                        </div>
                        <div id="errorI">
                        
                        </div>
                        
                    </div>
                    <div class="row" style="padding-top:10px;" align="center">
                        <div class="col-md-12">
                        	<button type="button" class="btn btn-primary" id="iniciar" style="margin-left:0px;">Iniciar sessión</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>


            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Ingresa por Facebook, si ya estas registrado</h3>
              </div>
              <div class="panel-body">

                    <div class="row" style="padding-top:10px;" align="center">
                        <div class="col-md-12">
                        	<button type="button" class="btn btn-primary" id="loginfacebook" style="margin-left:0px;">Iniciar sessión</button>
                        </div>
                    </div>

              </div>
            </div>
            
        </div>
        
        <div class="col-md-1">
        
        </div>
        
    </div>
	<div class="row" style="padding-left:12px; padding-right:12px;">
    	<div class="alert alert-info">
        	Es importante que complete todos los campos para el Registro.
        </div>
    </div>

    
   

</div>


</div><!-- fin del content -->

<div id="dialogRegistro" title="Registro completo">
    	<p class="alert alert-success">
        	<span class="glyphicon glyphicon-ok-sign" style="float: left; margin: 0 7px 20px 0; color:#090;"></span>
            Se genero correctamente el usuario. Por favor revise su correo para activar la cuenta.
            <br>
            <br>
            <strong>* Importante:</strong> Recuerde revisar la casilla de correo no deseado o de spam.
        </p>
        
        <p style="color:#0F0;"><strong>Muchas Gracias.</strong></p>
        <h3 style="color: #F03;">Carnes a Casa</h3>
        
</div>

<div id="dialogInicio" title="Inicio de Sessión">
    	<p class="alert alert-success">
        	<span class="glyphicon glyphicon-ok-sign" style="float: left; margin: 0 7px 20px 0; color:#090;"></span>
            Acaba de iniciar la sessión, ya esta listo para realizar su pedido.
        </p>
        <p style="color:#0F0;"><strong>Muchas Gracias.</strong></p>
        <h3 style="color: #F03;">Carnes a Casa</h3>
        
</div>

<footer>
<br>
<br>
<br>
<div class="row">
	<div class="col-md-12" align="center">
    	<p style="text-shadow: 1px 1px #fff;"><strong>Copyright © 2014 Carnes Victoria. Diseño Web: Saupurein Marcos.</strong></p>

    </div>
</div>

</footer>

<script type="text/javascript">
$( document ).ready(function() {

	$( "#dialogRegistro" ).dialog({
		 	
		autoOpen: false,
		resizable: false,
		width:600,
		height:360,
		modal: true,
		buttons: {
			"Volver al Inicio": function() {

				$( this ).dialog( "close" );
				$( this ).dialog( "close" );
					$('html, body').animate({
						scrollTop: '0'
					},
					1500);
				url = "index.php";
				$(location).attr('href',url);
			}
		}
 
 
	}); //fin del dialogo para registro
	
	$( "#dialogInicio" ).dialog({
		 	
		autoOpen: false,
		resizable: false,
		width:600,
		height:300,
		modal: true,
		buttons: {
			"Volver al Inicio": function() {

				$( this ).dialog( "close" );
				$( this ).dialog( "close" );
					$('html, body').animate({
						scrollTop: '0'
					},
					1500);
				url = "index.php";
				$(location).attr('href',url);
			}
		}
 
 
	}); //fin del dialogo para registro
	
			
	$('#login').click(function(){
		if ($(this).html() == 'Login') {
			$('#logueo').animate({'margin-top':'-20px'});
			$('#login').html('Ocultar');
		} else {
			$('#logueo').animate({'margin-top':'-375px'});
			$('#login').html('Login');
		}
		
	});

	$('#loginfacebook').click(function() {
		url = "<?php echo $login_url; ?>";
		$(location).attr('href',url);
		
	});
	
	function ValidaEmail(email) {
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return regex.test(email);
	}

	function validarRegistro() {
		
		
			$error = "";
//idproducto,nombre,precio_unit,precio_venta,stock,stock_min,reftipoproducto,refproveedor,codigo,codigobarra,caracteristicas
			
			if ($("#usuarior").val() == "") {
				$error = "Es obligatorio el campo usuario.";
				$("#usuarior").addClass("alert-danger");
				$("#usuarior").attr('placeholder',$error);
			}
			
			if ($("#passwordr").val() == "") {
				$error = "Es obligatorio el campo password.";
				$("#passwordr").addClass("alert-danger");
				$("#passwordr").attr('placeholder',$error);
			}
			
			if ($("#nombre").val() == "") {
				$error = "Es obligatorio el campo nombre.";
				$("#nombre").addClass("alert-danger");
				$("#nombre").attr('placeholder',$error);
			}
			
			if ($("#apellido").val() == "") {
				$error = "Es obligatorio el campo apellido.";
				$("#apellido").addClass("alert-danger");
				$("#apellido").attr('placeholder',$error);
			}
			
			if ($("#direccion").val() == "") {
				$error = "Es obligatorio el campo dirección.";
				$("#direccion").addClass("alert-danger");
				$("#direccion").attr('placeholder',$error);
			}
			
			
			if (ValidaEmail($("#usuarior").val()) == false)
			{
				$error = "El E-Mail es invalido";
				$("#usuarior").val('');
				$("#usuarior").addClass("alert-danger");
				$("#usuarior").attr('placeholder',$error);
			}
			
			
			return $error;
    }
	
	$("#nombre").click(function(event) {
		if ($("#nombre").val() == "") {
			$("#nombre").removeClass("alert-danger");
			$("#nombre").attr('value','');
			$("#nombre").attr('placeholder','Ingrese el nombre...');
		}
    });

	$("#nombre").change(function(event) {
		if ($("#nombre").val() == "") {
			$("#nombre").removeClass("alert-danger");
			$("#nombre").attr('placeholder','Ingrese el nombre');
		}
	});
	
	
	$("#apellido").click(function(event) {
		if ($("#apellido").val() == "") {
			$("#apellido").removeClass("alert-danger");
			$("#apellido").attr('value','');
			$("#apellido").attr('placeholder','Ingrese el apellido...');
		}
    });

	$("#apellido").change(function(event) {
		if ($("#apellido").val() == "") {
			$("#apellido").removeClass("alert-danger");
			$("#apellido").attr('placeholder','Ingrese el apellido');
		}
	});
	
	$("#direccion").click(function(event) {
		if ($("#direccion").val() == "") {
			$("#direccion").removeClass("alert-danger");
			$("#direccion").attr('value','');
			$("#direccion").attr('placeholder','Ingrese el dirección...');
		}
    });

	$("#direccion").change(function(event) {
		if ($("#direccion").val() == "") {
			$("#direccion").removeClass("alert-danger");
			$("#direccion").attr('placeholder','Ingrese el dirección');
		}
	});
	
	
	$("#usuario").click(function(event) {
		if ($("#usuario").val() == "") {
			$("#usuario").removeClass("alert-danger");
			$("#usuario").attr('value','');
			$("#usuario").attr('placeholder','Ingrese el usuario...');
		}
    });

	$("#usuario").change(function(event) {
		if ($("#usuario").val() == "") {
			$("#usuario").removeClass("alert-danger");
			$("#usuario").attr('placeholder','Ingrese el usuario');
		}
	});
	
	$("#password").click(function(event) {
		if ($("#password").val() == "") {
			$("#password").removeClass("alert-danger");
			$("#password").attr('value','');
			$("#password").attr('placeholder','Ingrese el password...');
		}
    });

	$("#password").change(function(event) {
		if ($("#password").val() == "") {
			$("#password").removeClass("alert-danger");
			$("#password").attr('placeholder','Ingrese el password');
		}
	});
	
	function validarInicio() {
		
		
			$error = "";
//idproducto,nombre,precio_unit,precio_venta,stock,stock_min,reftipoproducto,refproveedor,codigo,codigobarra,caracteristicas
			
			if ($("#usuario").val() == "") {
				$error = "Es obligatorio el campo usuario.";
				$("#usuario").addClass("alert-danger");
				$("#usuario").attr('placeholder',$error);
			}
			
			if ($("#password").val() == "") {
				$error = "Es obligatorio el campo password.";
				$("#password").addClass("alert-danger");
				$("#password").attr('placeholder',$error);
			}
			
			return $error;
    }
	
	$('#iniciar').click(function() {
		if (validarInicio() == "")
		{
			$.ajax({
				data:  {email:		$("#usuario").val(),
						pass:		$("#password").val(),
						accion:		'entrar'},
				url:   'ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						$("#load").html('<img src="imagenes/load13.gif" width="50" height="50" />');
				},
				success:  function (response) {
						
						if (response != '') {
							
							$("#errorI").removeClass("alert alert-danger");

							$("#errorI").addClass("alert alert-danger");
							$("#errorI").html('<strong>Error!</strong> '+response);
							$("#load").html('');

						} else {
							//url = "index.php";
							//$(location).attr('href',url);
							$("#dialogInicio").dialog("open");
						}
						
				}
			});
        }
	});//fin del inicio
	
	
	
	$('#registrar').click(function() {

		if (validarRegistro() == "")
		{
			$.ajax({
				data:  {email:			$("#usuarior").val(),
						password:		$("#passwordr").val(),
						direccion:		$("#direccion").val(),
						nombre:			$("#nombre").val(),
						apellido:		$("#apellido").val(),
						accion:		'registrar'},
				url:   'ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						$("#loadr").html('<img src="imagenes/load13.gif" width="50" height="50" />');
				},
				success:  function (response) {
						
						if (response != '') {
							
							$("#errorR").removeClass("alert alert-danger");

							$("#errorR").addClass("alert alert-danger");
							$("#errorR").html('<strong>Error!</strong> '+response);
							$("#loadr").html('');

						} else {
							//url = "index.php";
							//$(location).attr('href',url);
							$("#loadr").html('');
							$("#dialogRegistro").dialog("open");
						}
						
				}
			});
        }
	});//fin del registro
	
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


</body>

</html>