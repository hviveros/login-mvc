<?php

//no hace falta conectar con algun Modelo, ya que no tendra CRUD de peliculas
//require_once 'models/PeliculaModel.php';

class PeliculaController {

	#estableciendo las vistas
	public function pelicula() {
        require_once('./views/includes/cabecera.php');
        require_once('./views/includes/navbar.php');
        require_once('./views/paginas/pelicula.php');
        require_once('./views/includes/pie.php');
	}

	public function insertar() {
        require_once('./views/includes/cabecera.php');
        require_once('./views/includes/navbar.php');
        require_once('./views/paginas/pelicula-insertar.php');
        require_once('./views/includes/pie.php');
	}

	public function editar() {
        require_once('./views/includes/cabecera.php');
        require_once('./views/includes/navbar.php');
        require_once('./views/paginas/pelicula-editar.php');
        require_once('./views/includes/pie.php');
	}

	public function eliminar() {
        require_once('./views/includes/cabecera.php');
        require_once('./views/includes/navbar.php');
        require_once('./views/paginas/pelicula-eliminar.php');
        require_once('./views/includes/pie.php');
	}

}