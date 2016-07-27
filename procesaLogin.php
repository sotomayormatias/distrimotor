<?php 
	$usu_nick = $_POST['usu_nick'];
	$usu_clave = $_POST['usu_clave'];
	require "includes/conexion.php";
	$sql = "SELECT usu_nombre FROM usuarios	
							  WHERE BINARY usu_nick ='".$usu_nick."' 
							  AND BINARY usu_clave ='".$usu_clave."'";
							  // BINARY para que discrimine mayusculas y minusculas

	$resultado = mysqli_query($link, $sql) or die(mysqli_error($link)); 
	$usuario = mysqli_fetch_assoc($resultado);
	$cantidad = mysqli_num_rows($resultado);
	mysqli_close($link);
	if ($cantidad == 0) {
		header("location:login.php?error=1");
	}
	else {
		// Rutina de Autenticacion
		session_start();
		$_SESSION['login'] = 1;
		$_SESSION['usu_nombre'] = $usuario["usu_nombre"];

		// Redireccion a Panel Principal
		header("location: index.php");

		// Buscar referer: para redireccionar a la pagina desde donde viene

	}

?>