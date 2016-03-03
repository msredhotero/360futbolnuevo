<?php

session_start();

if (!isset($_SESSION['usua_predio']))
{
	header('Location: ../../error.php');
} else {


include ('../../includes/funcionesUsuarios.php');
include ('../../includes/funciones.php');
include ('../../includes/funcionesHTML.php');
include ('../../includes/funcionesJugadores.php');
include ('../../includes/funcionesEquipos.php');
include ('../../includes/funcionesGrupos.php');
include ('../../includes/funcionesZonasEquipos.php');
include ('../../includes/generadorfixturefijo.php');

$serviciosUsuario 	= new ServiciosUsuarios();
$serviciosHTML 		= new ServiciosHTML();
$serviciosFunciones = new Servicios();
$serviciosJugadores = new ServiciosJ();
$serviciosEquipos	= new ServiciosE();
$serviciosGrupos	= new ServiciosG();
$serviciosZonasEquipos	= new ServiciosZonasEquipos();
$Generar = new GenerarFixture();

$fecha = date('Y-m-d');

//$resProductos = $serviciosProductos->traerProductosLimite(6);
$resMenu = $serviciosHTML->menu($_SESSION['nombre_predio'],"Fixture",$_SESSION['refroll_predio'],$_SESSION['torneo_predio']);





/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla 			= "dbfixture";

$lblCambio	 	= array("reftorneoge_a","resultado_a","reftorneoge_b","resultado_b","fechajuego","refFecha","cancha");
$lblreemplazo	= array("Zona-Equipo 1","Resultado 1","Zona-Equipo 2","Resultado 2","Fecha Juego","Fecha","Cancha");

$resZonasEquipos 	= $serviciosZonasEquipos->TraerEquiposZonasPorZonas($_GET['idzona']);

$cadRef = '';
while ($rowTT = mysql_fetch_array($resZonasEquipos)) {
	$cadRef = $cadRef.'<option value="'.$rowTT[0].'">'.$rowTT[1].' - '.$rowTT[2].'</option>';
	
}


$resFechas 	= $serviciosFunciones->TraerFecha();

$cadRef2 = '';
while ($rowZ = mysql_fetch_array($resFechas)) {
	$cadRef2 = $cadRef2.'<option value="'.$rowZ[0].'">'.$rowZ[1].'</option>';
	
}

$resCanchas 	= $serviciosFunciones->TraerCanchas();

$cadRef3 = '';
while ($rowC = mysql_fetch_array($resCanchas)) {
	$cadRef3 = $cadRef3.'<option value="'.$rowC[0].'">'.$rowC[1].'</option>';
	
}


$resHorarios 	= $serviciosFunciones->TraerHorarios($_SESSION['torneo_predio']);

$cadRef4 = '';
while ($rowH = mysql_fetch_array($resHorarios)) {
	$cadRef4 = $cadRef4.'<option value="'.$rowH[0].'">'.$rowH[1].'</option>';
	
}


$refdescripcion = array(0 => $cadRef,1=>$cadRef,2=>$cadRef2,3=>$cadRef3,4=>$cadRef4);
$refCampo	 	= array("reftorneoge_a","reftorneoge_b","refFecha","cancha","Hora"); 
//////////////////////////////////////////////  FIN de los opciones //////////////////////////




/////////////////////// Opciones para la creacion del view  /////////////////////
$cabeceras 		= "	<th>Equipo 1</th>
				<th>Resultado 1</th>
				<th>Resultado 2</th>
				<th>Equipo 2</th>
				<th>Zona</th>
				<th>Fecha Juego</th>
				<th>Fecha</th>
				<th>Hora</th>";

//////////////////////////////////////////////  FIN de los opciones //////////////////////////


$lstCargados 	= $serviciosFunciones->camposTablaView($cabeceras,$serviciosZonasEquipos->TraerTodoFixture(),8);

$fixtureGenerardo = $Generar->Generar($_GET['idtorneo'],$_GET['idzona']);

$cantFechas = mysql_num_rows($resZonasEquipos) - 1;
//die(var_dump($fixtureGenerardo));
?>

<!DOCTYPE HTML>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">



<title>Gesti&oacute;n: Tres Sesenta F&uacute;tbol</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<!--<link href="../../css/estiloDash.css" rel="stylesheet" type="text/css">-->
    

    
    <script type="text/javascript" src="../../js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" href="../../css/jquery-ui.css">

    <script src="../../js/jquery-ui.js"></script>
    
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"/>
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
	<!--<link rel="stylesheet" href="../../css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="../../css/bootstrap-timepicker.css">-->
    <script src="../../js/bootstrap-timepicker.min.js"></script>
	<style type="text/css">
		* {
		  margin:0;
		  padding:0;
		}
		
		body {
		
			background:url(../imagenes/bgdash.jpg) repeat;
		
		/*background:#FFF;*/
		}
		
		#content {
			margin-left:21%;
		}

		#header {
    background-image: -webkit-gradient(
	linear,
	left top,
	left bottom,
	color-stop(0, #454A4E),
	color-stop(1, #464F52)
);
background-image: -o-linear-gradient(bottom, #454A4E 0%, #464F52 100%);
background-image: -moz-linear-gradient(bottom, #454A4E 0%, #464F52 100%);
background-image: -webkit-linear-gradient(bottom, #454A4E 0%, #464F52 100%);
background-image: -ms-linear-gradient(bottom, #454A4E 0%, #464F52 100%);
background-image: linear-gradient(to bottom, #454A4E 0%, #464F52 100%);
	background-color:#454A4E;
	height:100px;
	margin:0;
	padding-left:100px;
}

.content {
    height: 100%;
    margin: 20px auto;
    padding: 16px;
    width: 1050px;
}

#navigation {
			height:100%;
			background-color: #f05537;
			padding-top:15px;
			overflow-y: auto;
			position: fixed;
			top: 0;
			width: 20%;
			z-index: 9999;
			overflow: hidden;
			
		}
		
		#navigation #mobile-header {
			text-align:center;
			color: #7A0000;
			font-size:2.0em;
			font-family:Bebas;	
		}
		
		#navigation #mobile-header p {
			color: #fff;
			font-size:1em;
			font-family:  "Courier New", Courier, monospace;
		}
		
		.nav {
			margin-top:-15px;
			/*border-bottom:1px solid #FFD2D2;*/
		}
		.nav ul {
			list-style:none;
		}
		.nav ul li {
			padding-top:15px;
			padding:8px 8px;
			height:44px;
			width:100%;
		}
		
		.nav ul li a {
			color:#FFF;
			font-family:Bebas;
			font-size:1.4em;
			text-decoration:none;
			width:100%;
		}
		
		.nav ul li:hover {
			background: #105c1f; /* Old browsers */
			text-indent:15px;
			-webkit-transition:all 1s ease;
		    -moz-transition:all 1s ease;
		    -o-transition:all 1s ease;
		    transition:all 1s ease;
			text-shadow:1px 1px 1px #006;
		}
		
		.nav .arriba {
			border-top:none;
		}
		.abajo {
			padding-top:-8px;
		}
		
		#infoMenu {
			margin-top:15px;
			padding:8px 2px 1px 10px;
			/*background-color:#7A0000;*/
			background-color: #248dc1; /* Old browsers */

			border-bottom:1px solid #d60000;
			border-top:1px solid #b20000;
		}
		
		#infoMenu p {	
			color: #000;
			font-family: "Coolvetica Rg";
			font-size:16px;
		}
		
		#infoDescrMenu {
			padding:8px;
		}
		
		#infoDescrMenu p {
			color:#FFF;
		}
		
		.icodashboard {
			background:url(../../imagenes/iconmenu/dashboard.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:9px;
			margin-top:-4px;
		}
		
		.icousuarios {
			background:url(../../imagenes/iconmenu/usuarios.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		
		.icochart {
			background:url(../../imagenes/iconmenu/chart.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		
		.icopagos {
			background:url(../../imagenes/iconmenu/pagos.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		
		.icosedes {
			background:url(../../imagenes/iconmenu/sedes.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		
		.icocanchas {
			background:url(../../imagenes/iconmenu/canchas.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		
		.icogoleadores {
			background:url(../../imagenes/iconmenu/gym15.png) no-repeat;
			background-position: center center;
			width:25px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		
		.icosuspendidos {
			background:url(../../imagenes/iconmenu/lightning38.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		.icojugadores {
			background:url(../../imagenes/iconmenu/user82.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		.icoamonestados {
			background:url(../../imagenes/iconmenu/user84.png) no-repeat;
			background-position: center center;
			width:25px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		.icoequipos {
			background:url(../../imagenes/iconmenu/users6.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		.icozonasequipos {
			background:url(../../imagenes/iconmenu/users7.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		.icotorneos {
			background:url(../../imagenes/iconmenu/verification5.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		
		.icozonas {
			background:url(../../imagenes/iconmenu/conceptos.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		
		.icofixture {
			background:url(../../imagenes/iconmenu/novedades.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		
		.icoplayoff {
			background:url(../../imagenes/iconmenu/playoff.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		
		.icofairplay {
			background:url(../../imagenes/iconmenu/exportar.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		/*
		gym15.png
		lightning38.png
		user82.png
		user84.png
		users6.png
		users7.png
		verification5.png
		*/
		.icoalquileres {
			background:url(../../imagenes/iconmenu/alquiler.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		
		.icoinmubles {
			background:url(../../imagenes/iconmenu/inmueble.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		
		.icoturnos {
			background:url(../../imagenes/iconmenu/turnos.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		
		.icoventas {
			background:url(../../imagenes/iconmenu/compras.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		
		.icoproductos {
			background:url(../../imagenes/iconmenu/barras.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		
		.icoreportes {
			background:url(../../imagenes/iconmenu/reportes.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		
		.icocontratos {
			background:url(../../imagenes/iconmenu/contratos.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}
		
		.icosalir {
			background:url(../../imagenes/iconmenu/salir.png) no-repeat;
			background-position: center center;
			width:40px;
			height:40px;
			float:left;
			margin-right:10px;
			margin-top:-4px;
		}










		.letraChica {
			font-size:12px;
		}
		
  
		
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

  $(function() {

 //Array para dar formato en español

  $.datepicker.regional['es'] =
  {
  closeText: 'Cerrar',
  prevText: 'Previo',
  nextText: 'Próximo',

  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
  'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
  'Jul','Ago','Sep','Oct','Nov','Dic'],
  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
  dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
  dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
  dateFormat: 'dd/mm/yy', firstDay: 0,
  initStatus: 'Selecciona la fecha', isRTL: false};

 $.datepicker.setDefaults($.datepicker.regional['es']);
 //miDate: fecha de comienzo D=días | M=mes | Y=año
 //maxDate: fecha tope D=días | M=mes | Y=año
    $( "#datepicker1" ).datepicker({ minDate: "", maxDate: "+2M +10D" });
	$( "#datepicker2" ).datepicker({ minDate: "", maxDate: "+3M +10D" });
	$( "#datepicker3" ).datepicker({ minDate: "", maxDate: "+4M +10D" });
	$( "#datepicker4" ).datepicker({ minDate: "", maxDate: "+5M +10D" });
	$( "#datepicker5" ).datepicker({ minDate: "", maxDate: "+6M +10D" });
	$( "#datepicker6" ).datepicker({ minDate: "", maxDate: "+7M +10D" });
	$( "#datepicker7" ).datepicker({ minDate: "", maxDate: "+8M +10D" });
	$( "#datepicker8" ).datepicker({ minDate: "", maxDate: "+9M +10D" });
	$( "#datepicker9" ).datepicker({ minDate: "", maxDate: "+10M +10D" });
	$( "#datepicker10" ).datepicker({ minDate: "", maxDate: "+11M +10D" });
	$( "#datepicker11" ).datepicker({ minDate: "", maxDate: "+12M +10D" });
	$( "#datepicker12" ).datepicker({ minDate: "", maxDate: "+13M +10D" });
	$( "#datepicker13" ).datepicker({ minDate: "", maxDate: "+14M +10D" });
	$( "#datepicker14" ).datepicker({ minDate: "", maxDate: "+15M +10D" });
	$( "#datepicker15" ).datepicker({ minDate: "", maxDate: "+16M +10D" });
	$( "#datepicker16" ).datepicker({ minDate: "", maxDate: "+17M +10D" });
	$( "#datepicker17" ).datepicker({ minDate: "", maxDate: "+18M +10D" });
	$( "#datepicker18" ).datepicker({ minDate: "", maxDate: "+19M +10D" });
	$( "#datepicker19" ).datepicker({ minDate: "", maxDate: "+20M +10D" });
	$( "#datepicker20" ).datepicker({ minDate: "", maxDate: "+21M +10D" });
  });
  </script>

</head>

<body>

 
<?php echo $resMenu; ?>

<div id="content">

<h3>Fixture</h3>

    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Carga del Fixture</p>
        	
        </div>
    	<div class="cuerpoBox">
    		<form class="form-inline formulario" role="form" method="post" action="finalizar.php">
            <div class="row" style="margin-left:5px; margin-right:5px; min-width:800px;">
            	<div class="form-group col-md-12">
                	<label class="control-label">Seleccione si el tipo de campeonato es Ida o Ida/Vuelta: </label>
                    <select id="idavuelta" name="idavuelta" class="form-control">
                    	<option value="0">Ida</option>
                        <option value="1">Ida - Vuelta
                    </select>
                    <bt>
                    <hr>
                </div>
    		<?php 
			//die(var_dump($fixtureGenerardo));
			$total = 1;
			if (count($fixtureGenerardo)>0) {
			for ($i=0;$i<$cantFechas;$i++) {
			echo '

						<h3>Fecha '.($i + 1).'</h3>

					  <div class="form-group col-md-4 col-sm-4" style="border:1px solid #121212;">
					  	<label>Equipo A</label>
					  </div>
					  <div class="form-group col-md-2 col-sm-2" style="border:1px solid #121212;">
					  	<label>Horario</label>
					  </div>
					  <div class="form-group col-md-2 col-sm-2" style="border:1px solid #121212;">
					  	<label>Cancha</label>
					  </div>
					  <div class="form-group col-md-4 col-sm-4" style="border:1px solid #121212;">
					  	<label>Equipo B</label>
					  </div>';
			foreach ($fixtureGenerardo as $item) {
				$lstEquipos = explode("***",$item[$i]);
				
				echo '
					  	<div class="form-group col-md-4 col-sm-4" style="border:1px solid #121212; padding:5px;">
						<select id="equipoa'.$total.'" name="equipoa'.$total.'" class="form-control letraChica">
                                
                                <option value="'.$lstEquipos[2].'">'.$lstEquipos[0].'</option>
                                '.$cadRef.'
                         </select>
						 </div>
						 
						 <div class="form-group col-md-2 col-sm-2" style="border:1px solid #121212; padding:5px;">
						<select id="horario'.$total.'" name="horario'.$total.'" class="form-control letraChica">
                                
                                '.$cadRef4.'    
                         </select>
						 </div>
						 
						 
						  <div class="form-group col-md-2 col-sm-2" style="border:1px solid #121212; padding:5px;">
						<select id="cancha'.$total.'" name="cancha'.$total.'" class="form-control letraChica">
                                '.$cadRef3.'
                         </select>
						 </div>
						 
						 
						 <div class="form-group col-md-4 col-sm-4" style="border:1px solid #121212; padding:5px;">
						<select id="equipob'.$total.'" name="equipob'.$total.'" class="form-control letraChica">
                                <option value="'.$lstEquipos[3].'">'.$lstEquipos[1].'</option>
                                '.$cadRef.' 
                         </select>
						 </div>';
						 $total += 1;
			}
			echo '
				
				
				Fecha Juego '.($i + 1).' <input type="text" class="form-control" id="datepicker'.($i + 1).'" name="datepicker'.($i + 1).'" value="'.date('d/m/Y').'" />
				
		
					';
				echo "<hr><br>";
			}
			echo '<input type="hidden" id="cantfechas" name="cantfechas" value="'.($i + 1).'" />';
			echo '<input type="hidden" id="total" name="total" value="'.$total.'" />';
			echo '<input type="hidden" id="idtorneo" name="idtorneo" value="'.$_GET['idtorneo'].'" />';
			echo '<input type="hidden" id="idzona" name="idzona" value="'.$_GET['idzona'].'" />';
	
			} else {
				echo '<h2>Ya fue Cargado el Fixture completo para este torneo';	
			}
			?>
            </div>
            
            <div class="row" style="margin-left:25px; margin-right:25px;">
                <div class="alert"> </div>
                <div id="load"> </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <ul class="list-inline" style="margin-top:15px;">
                    <li>
                    	<?php if (count($fixtureGenerardo)>0) { ?>
                        <button type="submit" class="btn btn-primary" id="cargar" style="margin-left:0px;">Guardar</button>
                        <?php } ?>
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
        	<p style="color: #fff; font-size:18px; height:16px;">Fixture Cargados</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<?php echo $lstCargados; ?>
    	</div>
    </div>
    
   
</div>


</div>
<div id="dialog2" title="Eliminar Fixture">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar el fixture?.<span id="proveedorEli"></span>
        </p>
        <p><strong>Importante: </strong>Si elimina el fixture se perderan todos los datos de este</p>
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>

<!--<script src="../../js/bootstrap-datetimepicker.min.js"></script>
<script src="../../js/bootstrap-datetimepicker.es.js"></script>-->



<script type="text/javascript">
$(document).ready(function(){
	$('#timepicker2').timepicker({
		minuteStep: 15,
		showSeconds: false,
		showMeridian: false,
		defaultTime: false
		});
	 <?php 
		echo $serviciosHTML->validacion($tabla);
	
	?>
	
	$('#chequearF').click( function() {
		url = "chequear.php";
		$(location).attr('href',url);
	});
	
	$('#volver').click( function() {
		url = "index.php";
		$(location).attr('href',url);
	});
	
	$('#conductaF').click( function() {
		url = "conductafixture.php";
		$(location).attr('href',url);
	});
	
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

	 $( "#dialog2" ).dialog({
		 	
			    autoOpen: false,
			 	resizable: false,
				width:600,
				height:240,
				modal: true,
				buttons: {
				    "Eliminar": function() {
	
						$.ajax({
									data:  {id: $('#idEliminar').val(), accion: 'eliminarFixture'},
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
	
	
	//al enviar el formulario
    $('#cargar2').click(function(){
		
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
                                            $(".alert").html('<strong>Ok!</strong> Se cargo exitosamente el <strong>Fixture</strong>. ');
											$(".alert").delay(3000).queue(function(){
												/*aca lo que quiero hacer 
												  después de los 2 segundos de retraso*/
												$(this).dequeue(); //continúo con el siguiente ítem en la cola
												
											});
											$("#load").html('');
											//url = "index.php";
											var a = $('#reftorneoge_a option:selected').html();
											var b = $('#reftorneoge_b option:selected').html();
											a = a.split(' - ');
											b = b.split(' - ');
											
											$('#resultados').prepend('<tr><td>' + a[1] + '</td><td></td><td></td><td>' + 
																		+ b[1] + '</td><td>' + 
																		a[0] + '</td><td>' + 
																		$('#fechajuego option:selected').html() + '</td><td>' + 
																		$('#reffecha option:selected').html() + '</td><td>' + 
																		$('#hora option:selected').html() + '</td><td style="color:#f00;">Nuevo</td></tr>').fadeIn(300);
											
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
