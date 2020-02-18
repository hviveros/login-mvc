<?php

//no hace falta conectar con algun Modelo, ya que no tendrá CRUD de peliculas
//require_once 'models/PeliculaModel.php';

require_once 'PermisoController.php';

class PeliculaController extends PermisoController {

	#estableciendo las vistas
	public function pelicula() {

        session_start();
        $usuario_id = $_SESSION['id_usuario'];
        $pagina = $_GET['page'];
        $nivel = $this->obtenerNivelPermiso($usuario_id, $pagina);

        if ($nivel > 0){
            require_once('./views/includes/cabecera.php');
            require_once('./views/includes/navbar.php');
            require_once('./views/paginas/pelicula.php');
            require_once('./views/includes/pie.php');
        }else{
            header('Location: index.php?page=error');
            die();
        }
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