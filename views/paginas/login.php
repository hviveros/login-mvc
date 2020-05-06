<?php
    require_once 'controllers/UsuarioController.php';
    $usuario = new UsuarioController();
    $usuario->login();

    if (isset($_POST['acceder'])) {
        $datos = array(
            'nick'    => $_POST['nick'],
            'password' => md5($_POST['password'])
        );
        $respuesta = $usuario->accesoUsuario($datos);
    }
?>

	<main role="main" class="container">

		<div class="starter-template">
			<h1>Catálogo de Productos</h1>
			<hr>
			<div class="row">
				<div class="col-md-6 offset-3">
					<?php
						if (isset($_GET['mensaje'])) {
							echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
								".$_GET['mensaje']."
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	    							<span aria-hidden='true'>&times;</span>
								</button>
							</div>";
						}
					?>
				</div>
			</div>
			<div class="col-md-6 offset-3">
				<form action="index.php?page=login" method="POST" name="loginForm" id="loginForm" class="text-left">
					<div class="form-group">
						<label for="nick">Usuario</label>
						<input type="text" id="nick" name="nick" class="form-control" aria-describedby="nickHelp">
						<small id="nickHelp" class="form-text text-muted">Ingrese el usuario.</small>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" id="password" name="password" class="form-control" aria-describedby="passwordHelp">
						<small id="passwordHelp" class="form-text text-muted">Ingrese el password</small>
					</div>
					<button type="submit" name="acceder" class="btn btn-primary">Login</button>
				</form>
			</div>
		</div>

	</main><!-- /.container -->
