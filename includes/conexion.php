<?php 
	const SERVER = "localhost";
	const USUARIO = "root";
	const CLAVE = "vamolarenga";
	const BASE = "distrimotor"; 

	$link = mysqli_connect(SERVER, USUARIO, CLAVE, BASE);
	mysqli_set_charset($link, "utf8");
?>