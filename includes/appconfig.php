<?php

date_default_timezone_set('America/Buenos_Aires');

class appconfig {

function conexion() {
		
		$hostname = "localhost";
		$database = "360backup3";
		$username = "root";
		$password = "";
		
		/*
		$hostname = "localhost";
		$database = "wwwpredi_98nicolas";
		$username = "wwwpredi_98nico";
		$password = "nicolaspredio98";
		*/
		
		/*
		$hostname = "localhost";
		$database = "sportsco_tressesentafutbol";
		//password base de datos recupero360, usua: sportsco_pablo
		$username = "sportsco";
		$password = "fMp636/gh4";
		*/
		$conexion = array("hostname" => $hostname,
						  "database" => $database,
						  "username" => $username,
						  "password" => $password);
						  
		return $conexion;
}

}




?>