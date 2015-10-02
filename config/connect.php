<?php
	include("config.php");
	// Create connection
	//$conn = new mysqli($host_db, $usuario_db, $password_db);
	$conn = mysql_connect($host_db, $usuario_db, $password_db);

	// Check connection
	if (!$conn) {
	    die("Connection failed: ");
	}else{
		//$conn->select_db("$nombre_db");
		mysql_select_db("$nombre_db");
	}


/*$mysql = mysql_connect("ejemplo.com", "usuario", "contraseña");
mysql_select_db("test");
$resultado = mysql_query("SELECT 'la extensión mysql para nuevos desarrollos.' AS _msg FROM DUAL", $mysql);
$fila = mysql_fetch_assoc($resultado);
echo $fila['_msg'];
*/
?>