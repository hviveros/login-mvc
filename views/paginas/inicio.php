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
			<table class="table table-bordered">
				<p>
					<ul class="list-unstyled">
						<li>Nombre</li>
						<li>Usuario</li>
						<li>Contrasena</li>
					</ul>
				</p>
				<thead class="thead-dark">
					<tr>
						<th scope="col">#id</th>
						<th scope="col">Paginas</th>
						<th scope="col">acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						// if (!empty($clientes)) {
						// 	foreach ($clientes as $r) { 
					?>
						<tr>
							<th scope="row">1</th>
							<td>Pelicula</td>
							<td>
								<a href="?page=pelicula&action=insertar" class="btn btn-primary">Insertar</a>
								<a href="?page=pelicula&action=editar&id=<?= $r['id']; ?>" class="btn btn-info">Editar</a>
								<a href="?page=pelicula&action=eliminar&id=<?= $r['id']; ?>" class="btn btn-danger">Eliminar</a>
							</td>
						</tr>
					<?php // } } ?>
				</tbody>
			</table>
		</div>

	</main><!-- /.container -->