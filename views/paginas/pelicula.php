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
						<a href="?page=pelicula&action=insertar" class="btn btn-primary">Insertar</a>
						<a href="?page=pelicula&action=editar&id=<?= $r['id']; ?>" type="a" class="btn btn-info">Editar</a>
						<a href="?page=pelicula&action=eliminar&id=<?= $r['id']; ?>" type="a" class="btn btn-danger">Eliminar</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

</main><!-- /.container -->
