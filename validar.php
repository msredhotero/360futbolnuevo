<?php



require 'includes/funcionesUsuarios.php';
include ('includes/funciones.php');

$serviciosUsuarios = new ServiciosUsuarios();
$servicios = new Servicios();

$resTipoTorneos = $servicios->traerTipoTorneo();

$email		=	$_POST['email'];
$pass		=	$_POST['pass'];
$torneo		=	$_POST['reftorneo'];
	
$resLogin = $serviciosUsuarios->login($email,$pass,$torneo);

if ($resLogin == '') {
	header('Location: dashboard/');
} else {
	
?>
<!DOCTYPE HTML>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />


<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">



<title>Acceso Restringido: Tres Sesenta F&uacute;tbol</title>



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
		
			$(document).ready(function(){
				
				
					$("#email").click(function(event) {
        			$("#email").removeClass("alert alert-danger");
					$("#email").attr('placeholder','Ingrese el email');
					$("#error").removeClass("alert alert-danger");
					$("#error").text('');
        			});

        			$("#email").change(function(event) {
        			$("#email").removeClass("alert alert-danger");
        			$("#email").attr('placeholder','Ingrese el email');
        			});
					
					
					$("#pass").click(function(event) {
        			$("#pass").removeClass("alert alert-danger");
					$("#pass").attr('placeholder','Ingrese el password');
        			});

        			$("#pass").change(function(event) {
        			$("#pass").removeClass("alert alert-danger");
        			$("#pass").attr('placeholder','Ingrese el password');
        			});
					
				
				function validador(){

        				$error = "";
		
        				if ($("#email").val() == "") {
        					$error = "Es obligatorio el campo E-Mail.";

        					$("#error").addClass("alert alert-danger");
        					$("#error").attr('placeholder',$error);
        				}
						
						if ($("#pass").val() == "") {
        					$error = "Es obligatorio el campo Password.";

        					$("#pass").addClass("alert alert-danger");
        					$("#pass").attr('placeholder',$error);
        				}
						

						
						
						var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
						
						if( !emailReg.test( $("#email").val() ) ) {
							$error = "El E-Mail ingresado es inv�lido.";

        					$("#error").addClass("alert alert-danger");
        					$("#error").text($error);
						  }

        				return $error;
        		}
				
				
				$("#login").click(function(event) {
        			
						if (validador() == "")
        				{
        						$.ajax({
                                data:  {email:		$("#email").val(),
										pass:		$("#pass").val(),
										reftorneo:	$('#reftorneo').val(),
										accion:		'login'},
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
											url = "dashboard/";
											//$(location).attr('href',url);
											$("#error").addClass("alert alert-danger");
                                            $("#error").html('<strong>Error!</strong> '+response);
										}
                                        
                                }
                        });
        				}
        		});
				
			});/* fin del document ready */
		
		</script>


        
        
</head>



<body>


<div class="content">

<div class="row" style="margin-top:10px; font-family:Verdana, Geneva, sans-serif;" align="center">
		
   
</div>


<div class="logueo" align="center">
<br>
<br>
<br><img src="images/login.png" width="327" height="91" alt=""/></br></br>
	<section style="width:700px; padding-top:10px; padding-top:60px; background-color:#333; border:1px solid #101010; padding:25px;box-shadow: 4px 4px 5px #464646;-webkit-box-shadow: 4px 4px 5px #464646;
  -moz-box-shadow: 4px 4px 5px #464646;">
			
			<div id="row" class="alert alert-danger">
            	Acceso incorrecto
            </div>
            
<div align="center">
		<div align="center"><p style="color:#E9E9E9; font-size:28px;">Acceso al panel de control</p></div>
        <br>
      </div>
			<form role="form" class="form-horizontal" method="post" action="validar.php">
              
             <!--
                <label for="usuario" class="col-md-2 control-label" style="color:#FFF">Usuario</label>
                <br>
                  <input type="text" name="usuario" maxlength="50" />
                <br>
              

              
                <label for="ejemplo_password_2" class="col-md-2 control-label" style="color:#FFF">Contrase�a</label>
                <br>
                  
                  <input type="password" name="password" maxlength="50" />
                <br>
              
             
              
                
                  <input type="submit" value="enviar">
                -->
              <div class="form-group">
                <label for="usuario" class="col-md-2 control-label" style="color:#FFF;text-align:left;">E-Mail</label>
                <div class="col-lg-7">
                  <input type="email" class="form-control" id="email" name="email" 
                         placeholder="E-Mail">
                </div>
              </div>

              <div class="form-group">
                <label for="ejemplo_password_2" class="col-md-2 control-label" style="color:#FFF;text-align:left;">Contrase&ntilde;a</label>
                <div class="col-lg-7">
                  <input type="password" class="form-control" id="pass" name="pass" 
                         placeholder="password">
                </div>
              </div>
              
              <div class="form-group">
                <label for="ejemplo_password_2" class="col-md-2 control-label" style="color:#FFF;text-align:left;">Torneo</label>
                <div class="col-lg-7">
                  <select class="form-control" id="reftorneo" name="reftorneo" >
                  	<?php while ($rowT = mysql_fetch_array($resTipoTorneos)) { ?>
						<option value="<?php echo $rowT[0]; ?>"><?php echo $rowT[1]; ?></option>	
					<?php } ?>
                  </select>
                </div>
              </div>
              
              <div class="form-group">
              	<label for="olvido" class="control-label" style="color:#FFF">�Has olvidado tu contrase�a?. <a href="recuperarpassword.php">Recuperar.</a></label>
              </div>
             
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button type="submit" class="btn btn-default" id="login">Login</button>
                </div>
              </div>
				
                <div id="load">
                
                </div>

            </form>

     </section>
     <br>
     <br>
     <br>
</div><!-- fin del content -->

<footer>

<div class="row">
	<div class="col-md-12" align="center">
    	<p style="text-shadow: 1px 1px #8A4302;"><strong>� 2015. Tres Sesenta F�tbol</strong></p>

    </div>
</div>

</footer>

<script type="text/javascript">
$( document ).ready(function() {
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

<? } ?>