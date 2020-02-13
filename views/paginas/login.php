<?php

    // require_once 'controllers/ClienteController.php';
    // $objeto = new ClienteController();
    // $clientes = $objeto->obtenerClientes();

?>

	<main role="main" class="container">

		<div class="starter-template">
			<h1>Sistema Login con PHP - MVC - PDO</h1>
			<div class="row">
				<div class="col-md-6 offset-3">
					<?php
						// if (isset($_GET['mensaje'])) {
						// 	echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
						// 			".$_GET['mensaje']."
						// 			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		    			//				<span aria-hidden='true'>&times;</span>
						// 			</button>
						// 		</div>";
						// }
					?>
				</div>
			</div>
			<hr>
			<div class="col-md-6 offset-3">
				<form action="" method="POST" name="loginForm" id="loginForm" class="text-left">
					<div class="form-group">
						<label for="usuario">Usuario</label>
						<input type="text" id="usuario" name="usuario" class="form-control" aria-describedby="usuarioHelp">
						<small id="usuarioHelp" class="form-text text-muted">Ingrese el usuario.</small>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" id="password" name="password" class="form-control" aria-describedby="passwordHelp">
						<small id="passwordHelp" class="form-text text-muted">Ingrese el password</small>
					</div>
					<button type="submit" name="login" class="btn btn-primary">Login</button>
				</form>
			</div>
		</div>

	</main><!-- /.container -->
