<?php

    require_once 'controllers/PermisoController.php';
    $objeto = new PermisoController();
    $usuario_id = $_SESSION['id_usuario'];
    $permisos = $objeto->obtenerPermisos($usuario_id);

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
						<th scope="col">Nivel</th>
						<th scope="col">acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if (!empty($permisos)) {
							foreach ($permisos as $r) { 
					?>
						<tr>
							<th scope="row"><?=$r['id_permiso'];?></th>
							<td><?=$r['pagina'];?></td>
							<td><?=$r['nivel'];?></td>
							<td>
								<a href="?page=ver&id=" type="a" class="btn btn-primary">Ver</a>
								<a href="?page=editar&id=" type="a" class="btn btn-info">Editar</a>
								<a href="?page=eliminar&id=" type="a" class="btn btn-danger">Eliminar</a>
							</td>
						</tr>
					<?php } } ?>
				</tbody>
			</table>
		</div>

	</main><!-- /.container -->
