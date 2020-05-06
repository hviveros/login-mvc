<?php

//reanudamos la sesion existente
session_start();

//si existe una sesion 'id usuario' y si una variable de sesion 'login' es 'ok'
if ( isset($_SESSION['id_usuario']) && $_SESSION['login'] == 'ok') {

	//llamamos al archivo PermisoController donde se encuentra
	//el metodo para verificar los permisos
	require_once 'PermisoController.php';

	class PeliculaController extends PermisoController {

		public function obtenerNivel(){
			//para obtener el nivel buscamos el id del usuario
			$usuario_id = $_SESSION['id_usuario'];
	        //para obtener el nivel solo buscar 'pelicula' sin el guión ej. [pelicula-insertar]
	        $page = $_GET['page'];
	        //para usar el metodo obtnerNivel, solo nos interesa la palabra antes del guión de la variable 'page'
	        $contenido = explode('-', $page);
	        $nivel = $this->obtenerNivelPermiso($usuario_id, $contenido[0]);
	        return $nivel;
		}
	       	
		#estableciendo las vistas
		public function pelicula() {
			$nivelAcceso = $this->obtenerNivel();
	        if ($nivelAcceso > 0){
	            require_once('./views/includes/cabecera.php');
	            require_once('./views/includes/navbar.php');
	            require_once('./views/paginas/pelicula.php');
	            require_once('./views/includes/pie.php');
	        }else{
	            header('Location: index.php?page=error');
	            die();
	        }
		}

		public function peliculaDetalle() {
			$nivelAcceso = $this->obtenerNivel();
	        if ($nivelAcceso >= 1){
	            require_once('./views/includes/cabecera.php');
	            require_once('./views/includes/navbar.php');
	            require_once('./views/paginas/pelicula-detalle.php');
	            require_once('./views/includes/pie.php');
	        }else{
	            header('Location: index.php?page=error');
	            die();
	        }
		}

		public function peliculaInsertar() {
			$nivelAcceso = $this->obtenerNivel();
	        if ($nivelAcceso >= 2){
		        require_once('./views/includes/cabecera.php');
		        require_once('./views/includes/navbar.php');
		        require_once('./views/paginas/pelicula-insertar.php');
		        require_once('./views/includes/pie.php');
		    }else{
	            header('Location: index.php?page=error');
	            die();
	        }
		}


		public function peliculaEditar() {
			$nivelAcceso = $this->obtenerNivel();
	        if ($nivelAcceso >= 2){
		        require_once('./views/includes/cabecera.php');
		        require_once('./views/includes/navbar.php');
		        require_once('./views/paginas/pelicula-editar.php');
		        require_once('./views/includes/pie.php');
			}else{
	            header('Location: index.php?page=error');
	            die();
	        }
		}

		public function peliculaEliminar() {
			$nivelAcceso = $this->obtenerNivel();
	        if ($nivelAcceso >= 3){
		        require_once('./views/includes/cabecera.php');
		        require_once('./views/includes/navbar.php');
		        require_once('./views/paginas/pelicula-eliminar.php');
		        require_once('./views/includes/pie.php');
			}else{
	            header('Location: index.php?page=error');
	            die();
	        }
		}

	}
		
//si no, redirigimos el foco al formulario de acceso
} else {
	header('Location: index.php?page=login');
    die();
}