<?php

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		include ('../includes/funcionesNoticias.php');
		include ('../includes/funcionesHTML.php');

		$serviciosNOTI = new ServiciosNOTI();

		$titulo = $_POST['titulo'];
		$parrafo = $_POST['parrafo'];
		$imagen = $_FILES['Filedata']['name'];

		$error = "";
			
			if ($titulo == "") {
				$error = "<h4>//Debe cargar un titulo</h4>";
			}
			
			if ($parrafo == "") {
				$error = "<h4>//Debe cargar el contenido de la noticia</h4>";
			}

			
			if ($error == "") {
				
			
				
			
		if ($imagen!= "") {
		 
		 
		if ($serviciosNOTI->BuscarImagenSubida($imagen) == 0) { 
		 
		$MAXIMUM_FILESIZE = 5 * 1024 * 1024;
		//  Valid file extensions (images, word, excel, powerpoint)
		$rEFileTypes =
		  "/^\.(jpg|jpeg|gif|png|doc|docx|txt|rtf|pdf|xls|xlsx|
		        ppt|pptx){1}$/i";
		$dir_base = "C:/wamp/www/showgol/imagenescargadas/";

		$isFile = is_uploaded_file($_FILES['Filedata']['tmp_name']);
		if ($isFile)    //  do we have a file?
		   {//  sanatize file name
		    //     - remove extra spaces/convert to _,
		    //     - remove non 0-9a-Z._- characters,
		    //     - remove leading/trailing spaces
		    //  check if under 5MB,
		    //  check file extension for legal file types
		    $safe_filename = preg_replace(
		                     array("/\s+/", "/[^-\.\w]+/"),
		                     array("_", ""),
		                     trim($_FILES['Filedata']['name']));
		    if ($_FILES['Filedata']['size'] <= $MAXIMUM_FILESIZE && preg_match($rEFileTypes, strrchr($safe_filename, '.')))
		      {$isMove = move_uploaded_file (
		                 $_FILES['Filedata']['tmp_name'],
		                 $dir_base.$safe_filename);
						 }
		             
		                 
		                 $imagen = $safe_filename;
		                 }
		                 $nuevaimagen = $serviciosNOTI->insertarImagen($imagen);
		     }
		    }         
		                 $insertar = $serviciosNOTI->insertarNoticia($titulo,$parrafo,$imagen);

$resNOTI = $serviciosNOTI->TraerNoticias();
$tabla = '<table id="itsthetable" width="860" cellpadding="0" cellspacing="0">
<caption>Noticias Cargadas</caption>
<thead>
<tr>
<th align="center">Titulo</th>
<th align="center">Contenido</th>
<th align="center">Imagen</th>

</tr>
</thead>
<tbody>'
?>

<?php 
if (mysql_num_rows($resNOTI) > 0) {
while ($row = mysql_fetch_array($resNOTI)) {
?>
<tr>
<td align="center"><? echo $row[1]; ?></td>
<td align="center"><? echo $row[3]; ?></td>
<td align="center"><? echo '<img src=imagenescargadas/'.$row[2].' width="60" height="60">'; ?></td>
</tr>
<? } ?>
<? }  else {?>
<tr>
<td align="center">No se cargaron noticias.</td>
</tr>
<? } ?>
</tbody>
</table>


<div id="agregarfilas">

</div>
<br />

</div>
</body>
</html>



<?
      
   } else {
		echo "<table width='600' border='0' ><tr><td>";
		echo $error;
		echo "</td></tr></table>";
	}

?>
	}

?>