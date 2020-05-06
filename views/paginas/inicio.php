<?php

require_once 'controllers/PermisoController.php';
$objeto = new PermisoController();
$usuario_id = $_SESSION['id_usuario'];
$permisos = $objeto->obtenerPermisos($usuario_id);

?>

<main role="main" class="container">
	<div class="row">
		<div class="col-sm-3">
			<div class="card">
				<div class="card-header">Menú</div>
				<ul class="list-group list-group-flush">
					<?php
						if (!empty($permisos)) {
							foreach ($permisos as $r) {
							//si el nivel es 0, no muestra el contenido
							if ($r['nivel'] > 0) {
					?>
					<li class="list-group-item">
						<a href="?page=<?php echo $r['contenido'];?>"><?=$r['contenido'];?></a>
					</li>
					<?php	} } } ?>
				</ul>
			</div>
		</div>
		<div class="col-sm-9">
			<div class="card">
				<div class="card-header">Inicio</div>
				<div class="card-body">
					<h5 class="card-title">Catálogo de Productos</h5>
					<p class="card-text">Registro de Productos para inventario</p>
					<a href="#" class="btn btn-primary">Ver informe</a>
				</div>
			</div>
		</div>
	</div><!-- /.row -->
</main><!-- /.container -->
