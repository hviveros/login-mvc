<?php

    require_once 'controllers/PermisoController.php';
    $objeto = new PermisoController();
    $usuario_id = $_SESSION['id_usuario'];
    $permisos = $objeto->obtenerPermisos($usuario_id);

?>

<main role="main" class="container">

	<div class="starter-template">
		<h1>Sistema Acceso con PHP - MVC - PDO</h1>
		<hr>
		<table class="table table-bordered">
			<p>
				<ul class="list-unstyled">
					<li>Bienvenido: <?php echo $_SESSION['nombre']; ?> (<?php echo $_SESSION['nick']; ?>)</li>
				</ul>
			</p>
			<thead class="thead-dark">
				<tr>
					<th scope="col">Paginas</th>
					<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if (!empty($permisos)) {
						foreach ($permisos as $r) { 

							//si el nivel es 0, no muestra la página
							if ($r['nivel'] > 0) {
				?>
					<tr>							
						<td><?php echo $r['pagina'];?></td>
						<td>
							<?php //al ser el nivel > 0, está habilitado como mínimo para ver la pagina ?>
							<a href="?page=<?php echo $r['pagina'];?>" class="btn btn-secondary">Lista</a>
							<?php
								//al ser el nivel > 1, está habilitado para insertar/editar registros de la pagina
								if ($r['nivel'] > 1) {
							?>
								<a href="?page=<?php echo $r['pagina'];?>-insertar" class="btn btn-primary">Insertar</a>
								<a href="?page=<?php echo $r['pagina'];?>-editar" class="btn btn-info">Editar</a>
							<?php 
								}
								//al ser el nivel > 2, está habilitado hasta para eliminar registros de la pagina
								if ($r['nivel'] > 2) {
							?>
								<a href="?page=<?php echo $r['pagina'];?>-eliminar" class="btn btn-danger">Eliminar</a>
							<?php } ?>
						</td>
					</tr>
				<?php	} } } ?>
			</tbody>
		</table>
	</div>

</main><!-- /.container -->
