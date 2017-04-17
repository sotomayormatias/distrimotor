<?php 
	require "includes/conexion.php";
	$sqlProductos = "SELECT prd_codigo, prd_nombre, prd_descripcion, prd_stock, prd_precio_costo, prd_ganancia
					 FROM productos";
	$resultProductos = mysqli_query($link, $sqlProductos) or die(("error al traer datos de la base - ". mysqli_error($link)));

	$sqlCategorias = "SELECT cat_id, cat_nombre
					 FROM categorias";
	$resultCategorias = mysqli_query($link, $sqlCategorias) or die(("error al traer datos de la base - ". mysqli_error($link)));

	mysqli_close($link);

	include "includes/header.php";
?>
<script type="text/javascript">
	activarMenu();
	$(document).ready(function(){
		
	});

	function filtrarProductos(){
			cat_id = $("#cat_id").val();
			prd_codigo = $("#prd_codigo").val();
			prd_nombre = $("#prd_nombre").val();

			var jsonRequest = new XMLHttpRequest();
			var url = "procesaBusqueda.php?cat_id="+ cat_id +"&prd_codigo="+ prd_codigo +"&prd_nombre="+ prd_nombre;
			jsonRequest.open("GET", url, true);
			jsonRequest.send();
			jsonRequest.onreadystatechange = function() {
				if (jsonRequest.readyState == 4 && jsonRequest.status == 200){
					var jsonDoc = eval('(' + jsonRequest.responseText + ')');
					var tBody = document.querySelectorAll("tbody")[1];
					tBody.innerHTML = "";
					jsonDoc.forEach(function(item, index){
						tBody.innerHTML = tBody.innerHTML + "<tr><td>"+ item.prd_codigo +"</td><td>"+ item.prd_nombre +"</td><td>"+ item.prd_descripcion +"</td><td>"+ item.prd_stock +"</td><td>$"+ Number(Math.round(item.prd_precio_costo*item.prd_ganancia+'e3')+'e-3') +"</td></tr>";
					});
				}
			};
		};
</script>


<h1>Productos</h1>
<div class="formFiltro">
	<form class="form-inline">
		<div class="form-group filtro">
			<label>Categoría</label>
			<select class="form-control" onchange="filtrarProductos()" name="cat_id" id="cat_id">
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
			<input type="text" class="form-control" onkeyup="filtrarProductos()" name="prd_codigo" id="prd_codigo" placeholder="Código">
		</div>
		<div class="form-group filtro">
			<label>Nombre</label>
			<input type="text" class="form-control" onkeyup="filtrarProductos()" name="prd_nombre" id="prd_nombre" placeholder="Nombre">
		</div>

		<button type="button" class="btn btn-primary" id="btnFiltrar" onclick="filtrarProductos()">Filtrar</button>
	</form>
</div>
<?php if(mysqli_num_rows($resultProductos) > 0){ ?>
<div class="table-responsive">
	<table class="table table-striped" id="tablaProductos">
		<tr>
			<th>Código</th>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Stock</th>
			<th>Precio</th>
		</tr>
		<tbody>
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
				</tr>
		<?php
			};
		?>
		</tbody>
	</table>
</div>

<?php } else { ?>
	<h2>No existen productos</h2>
<?php } ?>

<?php  
	require "includes/footer.php";
?>