<?php session_start(); ?>
<!-- MENU -->
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<?php if(isset($_SESSION['login'])){ ?>
			<a class="navbar-brand" href="admin.php">Distrimotor</a>
		</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li id="menuProductos"><a href="productos.php">Productos</a></li>
					<li id="menuVentas"><a href="ventas.php">Ventas</a></li>
					<li id="menuClientes"><a href="clientes.php">Clientes</a></li>
					<li id="menuCategorias"><a href="categorias.php">Categorías</a></li>
					<li id="menuBuscador"><a href="buscador.php">Buscador</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li id="welcome">Bienvenido <?php echo $_SESSION['usu_nombre'] ?></li>
					<li><a href="logout.php">Salir</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		<?php } else { ?>
		<a class="navbar-brand" href="index.php">Distrimotor</a>
		</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="login.php">Ingresar</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		<?php } ?>
	</div><!-- /.container-fluid -->
</nav>
