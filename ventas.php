<?php 
	require "includes/conexion.php";
	$sqlProductos = "SELECT prd_codigo, prd_nombre, prd_descripcion, prd_stock, prd_precio_costo, prd_ganancia
					 FROM productos";
	$resultProductos = mysqli_query($link, $sqlProductos) or die(("error al traer datos de la base - ". mysqli_error($link)));

	$sqlCategorias = "SELECT cat_id, cat_nombre
					 FROM categorias";
	$resultCategorias = mysqli_query($link, $sqlCategorias) or die(("error al traer datos de la base - ". mysqli_error($link)));

	mysqli_close($link);

	require "includes/header.php";
?>
<script type="text/javascript">
	activarMenu(2);
</script>

<h1>Ventas</h1>
<div class="formFiltro">
	<form class="form-inline" action="ventas.php" method="POST">
		<div class="form-group filtro">
			<label>Categoría</label>
			<select class="form-control" name="cat_id" id="cat_id">
				<?php 
					echo "<option value='0'>Todas</option>";
					while ($categoria = mysqli_fetch_assoc($resultCategorias)) 
					{
				?>
					<option value="<?php echo $categoria['cat_id']; ?>"><?php echo $categoria['cat_nombre']; ?></option>
				<?php		
					}
				?>
			</select>
		</div>
		<div class="form-group filtro">
			<label>Código</label>
			<input type="text" class="form-control" name="prd_codigo" id="prd_codigo" placeholder="Código">
		</div>
		<div class="form-group filtro">
			<label>Nombre</label>
			<input type="text" class="form-control" name="prd_nombre" id="prd_nombre" placeholder="Nombre">
		</div>

		<button type="button" class="btn btn-primary" id="btnFiltrar">Filtrar</button>
	</form>
</div>
<?php if(mysqli_num_rows($resultProductos) > 0){ ?>
<div class="table-responsive" id="tablaProductos">
	<table class="table table-striped">
		<tr>
			<th>Código</th>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Stock</th>
			<th>Precio</th>
			<th colspan="2"><a href="agregarProducto.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></th>
		</tr>
		<?php 
			while ($registro = mysqli_fetch_assoc($resultProductos))
			{
				$prd_precio = $registro['prd_precio_costo'] * $registro['prd_ganancia'];
		?>
				<tr>
					<td><?php echo $registro['prd_codigo'] ?> </td>
					<td><?php echo $registro['prd_nombre'] ?> </td>
					<td><?php echo $registro['prd_descripcion'] ?> </td>
					<td><?php echo $registro['prd_stock'] ?> </td>
					<td>$<?php echo $prd_precio ?></td>
					<td><a href="editarProducto.php?prd_codigo=<?php echo $registro['prd_codigo'] ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
					<td><a href="eliminarProducto.php?prd_codigo=<?php echo $registro['prd_codigo'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
				</tr>
		<?php
			};
		?>
	</table>
</div>

<?php } else { ?>
	<h2>No existen productos</h2>
<?php } ?>

<?php  
	require "includes/footer.php";
?>