
<main role="main" class="container">

	<div class="starter-template">
		<h1>Sistema Login con PHP - MVC - PDO</h1>
		<h2>Pelicula</h2>
		<hr>
		<table class="table table-bordered">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#id</th>
					<th scope="col">Peliculas</th>
					<th scope="col">acciones</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">1</th>
					<td>Forrest Gump</td>
					<td>
						<a href="?page=pelicula-detalle&id=1" class="btn btn-secondary">Detalle</a>
						<a href="?page=pelicula-editar&id=1" class="btn btn-info">Editar</a>
						<a href="?page=pelicula-eliminar&id=1" class="btn btn-danger">Eliminar</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

</main><!-- /.container -->
