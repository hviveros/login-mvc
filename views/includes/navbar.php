<?php
    require_once 'controllers/UsuarioController.php';
    $usuario = new UsuarioController();

    if (isset($_POST['salir'])) {
        $usuario->cerrarSesion();
    }
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="#"><?php echo NOMBRE_SISTEMA; ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index.php?page=inicio">Inicio</a>
				</li>
			</ul>
			<ul class="navbar-nav text-right">
				<li class="nav-item"><a class="nav-link" href="#"><?php echo $_SESSION['nombre']; ?></a></li>
				<li class="nav-item">
					<form action="" method="POST" name="logoutForm" id="logoutForm">
						<button type="submit" class="btn btn-link nav-link" name="salir">Cerrar sesión</button>
					</form>
				</li>
			</ul>
		</div>
	</div>
</nav>
<div class="mb-5 pb-5"></div>