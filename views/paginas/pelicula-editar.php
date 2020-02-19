<main role="main" class="container">

	<div class="starter-template">
		<h1>Sistema Acceso con PHP - MVC - PDO</h1>
		<h2>EDITAR Pelicula</h2>
		<hr>
		<div class="col-md-6 offset-3">
			<form action="" method="POST" name="editarForm" id="editarForm" class="text-left">
				<input type="hidden" name="id" value="">
				<div class="form-group">
					<label for="pelicula">Pelicula</label>
					<input type="text" id="pelicula" name="pelicula" class="form-control" aria-describedby="peliculaHelp" value="Forrest Gump">
					<small id="peliculaHelp" class="form-text text-muted"></small>
				</div>
				<button type="submit" name="editar" class="btn btn-info">Editar registro</button>
			</form>
		</div>
	</div>

</main><!-- /.container -->
	