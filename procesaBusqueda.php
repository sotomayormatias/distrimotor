<?php
	require "includes/conexion.php";
	
	$cat_id = $_GET["cat_id"];
	$prd_codigo = $_GET["prd_codigo"];
	$prd_nombre = $_GET["prd_nombre"];

	$where = "";
	$condition = array();

	if($cat_id != 0)
		$condition[] = " cat_id=". $cat_id;
	if($prd_codigo != "")
		$condition[] = " prd_codigo=". $prd_codigo;
	if($prd_nombre != "")
		$condition[] = " prd_nombre=". $prd_nombre;


	if(!empty($condition))
		$where = " WHERE". implode(" AND", $condition);


	$sql = "SELECT prd_codigo, prd_nombre, prd_descripcion, prd_stock, prd_precio_costo, prd_ganancia, cat_id
			FROM productos". $where;
	$resultado = mysqli_query($link, $sql) or die("error al insertar datos en la base - ". mysqli_error($link));
	mysqli_close($link);
	
	$rows = array();
	while($row = mysqli_fetch_assoc($resultado)){
		$rows[] = $row;
	}

	echo json_encode($rows);
?>