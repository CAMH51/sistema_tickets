<?php
class cnx{
	function connectDB(){
		$server = "localhost";
		$port = "5432";
		$user = "postgres";
		$pass = "ca850822";
		$bd = "DB_TICKET";
	
		$conexion = pg_connect("host=$server port=$port dbname=$bd user=$user password=$pass") or die('Wrong CONN_STRING');
		
		return $conexion;
	}
}
?>
