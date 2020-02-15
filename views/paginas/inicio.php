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
								<?php 
									if ($r['nivel'] > 0) {
								?>
									<a href="?page=insertar&id=" class="btn btn-secondary">Lista</a>
								<?php 
									}

									if ($r['nivel'] > 1) {
								?>
									<a href="?page=insertar&id=" class="btn btn-primary">Insertar</a>
									<a href="?page=editar&id=" class="btn btn-info">Editar</a>
								<?php 
									}

									if ($r['nivel'] > 2) {
								?>
									<a href="?page=eliminar&id=" class="btn btn-danger">Eliminar</a>
								<?php 
									}
								?>
							</td>
						</tr>
					<?php } } ?>
				</tbody>
			</table>
		</div>

	</main><!-- /.container -->
