<?php

/**
 * @author www.intercambiosvirtuales.org
 * @copyright 2013
 */
date_default_timezone_set('America/Buenos_Aires');

class ServiciosContenido {
	
	/* PARA Secciones */

	function insertarSecciones($seccion) {
		$sql = "insert into tbsecciones(idseccion,seccion)
		values ('','".utf8_decode($seccion)."')";
		$res = $this->query($sql,1);
		return $res;
	}
	
	
	function modificarSecciones($id,$seccion) {
		$sql = "update tbsecciones
		set
		seccion = '".utf8_decode($seccion)."'
		where idseccion =".$id;
		$res = $this->query($sql,0);
		return $res;
	}
	
	
	function eliminarSecciones($id) {
		$sql = "delete from tbsecciones where idseccion =".$id;
		$res = $this->query($sql,0);
		return $res;
	}
	
	
	function traerSecciones() {
		$sql = "select idseccion,seccion from tbsecciones order by 1";
		$res = $this->query($sql,0);
		return $res;
	}
	
	
	function traerSeccionesPorId($id) {
		$sql = "select idseccion,seccion from tbsecciones where idseccion =".$id;
		$res = $this->query($sql,0);
		return $res;
	}
	
	/* Fin */
	
	
	
	/* PARA Contenido */

	function insertarContenido($texto,$refseccion) {
	$sql = "insert into tbcontenidos(idcontenido,texto,refseccion)
	values ('','".str_replace("'","''",$texto)."',".$refseccion.")";
	$res = $this->query($sql,1);
	return $res;
	}
	
	
	function modificarContenido($id,$texto,$refseccion) {
	$sql = "update tbcontenidos
	set
	texto = '".str_replace("'","''",$texto)."',refseccion = ".$refseccion."
	where idcontenido =".$id;
	$res = $this->query($sql,0);
	return $res;
	}
	
	
	function eliminarContenido($id) {
	$sql = "delete from tbcontenidos where idcontenido =".$id;
	$res = $this->query($sql,0);
	return $res;
	}
	
	
	function traerContenido() {
	$sql = "select 
				c.idcontenido,
				c.texto,
				s.seccion,
				c.refseccion
				from tbcontenidos c
				inner join tbsecciones s ON s.idseccion = c.refseccion
				order by 1";
	$res = $this->query($sql,0);
	return $res;
	}
	
	function TraerContenidoPorSeccion($idseccion){
	$sql = "select 
				c.idcontenido,
				c.texto,
				s.seccion,
				c.refseccion
				from tbcontenidos c
				inner join tbsecciones s ON s.idseccion = c.refseccion
				where c.refseccion = ".$idseccion."
				order by 1 desc";
	$res = $this->query($sql,0);
	return utf8_decode(mysql_result($res,0,1));
	}
	
	
	function traerContenidoPorId($id) {
	$sql = "select idcontenido,texto,refseccion from tbcontenidos where idcontenido =".$id;
	$res = $this->query($sql,0);
	return $res;
	}
	
	/* Fin */

	
	function query($sql,$accion) {
		
		require_once 'appconfig.php';

		$appconfig	= new appconfig();
		$datos		= $appconfig->conexion();
		$hostname	= $datos['hostname'];
		$database	= $datos['database'];
		$username	= $datos['username'];
		$password	= $datos['password'];
		
		
		$conex = mysql_connect($hostname,$username,$password) or die ("no se puede conectar".mysql_error());
		
		mysql_select_db($database);
		
		$result = mysql_query($sql,$conex);
		if ($accion && $result) {
			$result = mysql_insert_id();
		}
		mysql_close($conex);
		return $result;
		
	}
	
	
	
	
	} //fin de servicios


?>