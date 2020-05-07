<?php

require_once './controllers/PermisoController.php';
$objPermiso = new PermisoController();
$usuario_id = $_SESSION['id_usuario'];
$permisos = $objPermiso->obtenerPermisos($usuario_id);


require_once './controllers/CategoriaController.php';
$objCategoria = new CategoriaController();
$categorias = $objCategoria->obtenerCategorias();

?>

<main role="main" class="container">
	<div class="row">
		<!-- columna menu -->
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
		<!-- /columna menu -->
		<!-- columna contenido -->
		<div class="col-sm-9">
			<div class="card">
				<div class="card-header">Categoría</div>
				<div class="card-body">					
					<!-- tabla de registros -->
					<div id="tablaCategoria">
						<table class="table table-bordered">
							<thead class="thead-dark">
								<tr>
									<th scope="col">#Id</th>
									<th scope="col">Categoría</th>
									<th scope="col">Acciones</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if (!empty($categorias)) {
										foreach ($categorias as $r) { 
								?>
								<tr>
									<th scope="row"><?=$r['id_categoria'];?></th>
									<td><?=$r['categoria'];?></td>
									<td>
										<button data-toggle="modal" data-target="#editarRegistroModal" onclick="cargarFormUpdate(<?= $r['id_categoria']; ?>)" class="btn btn-info">Editar</button>
										<button data-toggle="modal" data-target="#eliminarRegistroModal" onclick="cargarFormDelete(<?= $r['id_categoria']; ?>)" class="btn btn-danger">Eliminar</button>
									</td>
								</tr>
								<?php } } ?>
							</tbody>
						</table>
					</div>

					<div class="text-left">
						<button class="btn btn-primary text-left" data-toggle="modal" data-target="#insertarRegistroModal">Insertar</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /columna contenido -->
	</div><!-- /.row -->
</main><!-- /.container -->

<!-- Modal Agregar -->
<div class="modal fade" id="insertarRegistroModal" tabindex="-1" role="dialog" aria-labelledby="insertarRegistroModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="insetarRegistroModal">Insertar nuevos registros</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" name="registroForm" id="registroForm" class="text-left">
				<div class="modal-body">
					<div id="mensajeInsertar"></div>
					<div class="form-group">
						<label for="categoria">Categoría</label>
						<input type="text" id="categoria" name="categoria" class="form-control" aria-describedby="nombreHelp">
						<small id="nombreHelp" class="form-text text-muted">Ingrese el nombre de la categoría.</small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnInsertar" name="btnInsertar" class="btn btn-primary">Insertar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="editarRegistroModal" tabindex="-1" role="dialog" aria-labelledby="editarRegistroModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editarRegistroModal">Editar registro</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="editarForm" class="text-left">
				<div class="modal-body">
					<input type="hidden" id="idU" name="idU">
					<div class="form-group">
						<label for="categoriaU">Categoría</label>
						<input type="text" id="categoriaU" name="categoriaU" class="form-control" aria-describedby="nombreHelp">
						<small id="nombreHelp" class="form-text text-muted">Ingrese el nombre completo de la categoría.</small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnEditar" name="btnEditar" class="btn btn-info">Editar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Eliminar -->
<div class="modal fade" id="eliminarRegistroModal" tabindex="-1" role="dialog" aria-labelledby="eliminarRegistroModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="eliminarRegistroModal">Eliminar registro</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="eliminarForm" class="text-left">
				<div class="modal-body">
					<input type="hidden" id="idD" name="idD">
					<div class="form-group">
						<label for="categoriaD">Categoría</label>
						<input type="text" id="categoriaD" name="categoriaD" class="form-control" aria-describedby="nombreHelp" disabled>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnEliminar" name="btnEliminar" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		//botón Insertar 
		$('#btnInsertar').click(function(){			
			datos=$('#registroForm').serialize();
			$.ajax({
				type: "POST",
				data: datos,
				url:  "index.php?page=categoria-insertar",
				success: function(r){
					//console.log(r);
					respuesta=jQuery.parseJSON(r);
					if (respuesta['codigo'] == 400) {
						$('#mensajeInsertar').html('<div class="alert alert-danger text-center" role="alert">'+respuesta['mensaje']+'</div>');
					} else{
						$('#mensajeInsertar').html('<div class="alert alert-success text-center" role="alert">'+respuesta['mensaje']+'</div>');
						$('#registroForm')[0].reset();
						$('#tablaCategoria').load(' #tablaCategoria');
					}
				}
			});
		});

		//botón Editar 
		$('#btnEditar').click(function(){			
			datos=$('#editarForm').serialize();
			$.ajax({
				type: "POST",
				data: datos,
				url:  "index.php?page=categoria-editar",
				success: function(r){
					$('#tablaCategoria').load(' #tablaCategoria');
				}
			});
		});

		//botón Eliminar 
		$('#btnEliminar').click(function(){
			datos=$('#eliminarForm').serialize();
			$.ajax({
				type: "POST",
				data: datos,
				url:  "index.php?page=categoria-eliminar",
				success: function(r){
					$('#tablaCategoria').load(' #tablaCategoria');
				}
			});
		});
		
		//llenado de tabla
		$('#tablaCategoria').load(' #tablaCategoria');

	});

	function cargarFormUpdate(id){
		$.ajax({
			method: "POST",
			data: "id=" + id,
			url:  "index.php?page=categoria-detalle",
			success: function(r){
				//console.log(r);
				datos=jQuery.parseJSON(r);
				$('#idU').val(datos['id_categoria']);
				$('#categoriaU').val(datos['categoria']);
			}
		});
	}

	function cargarFormDelete(id){
		$.ajax({
			method: "POST",
			data: "id=" + id,
			url:  "index.php?page=categoria-detalle",
			success: function(r){
				datos=jQuery.parseJSON(r);
				$('#idD').val(datos['id_categoria']);
				$('#categoriaD').val(datos['categoria']);
			}
		});
	}

</script>