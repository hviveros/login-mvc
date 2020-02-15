<?php

    // require_once 'controllers/ClienteController.php';
    // $objeto = new ClienteController();
    // $clientes = $objeto->obtenerClientes();

?>

	<main role="main" class="container">

		<div class="starter-template">
			<h1>Sistema Login con PHP - MVC - PDO</h1>
			<hr>
			<table class="table table-bordered">
				<p>
					<ul class="list-unstyled">
						<li>#id: <?php echo $_SESSION['id_usuario']; ?></li>
						<li>Nombre: <?php echo $_SESSION['nombre']; ?></li>
						<li>Usuario: <?php echo $_SESSION['nick']; ?></li>
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
