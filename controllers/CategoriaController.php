<?php

//reanudamos la sesion existente
session_start();

//si existe una sesion 'id usuario' y si una variable de sesion 'login' es 'ok'
if ( isset($_SESSION['id_usuario']) && $_SESSION['login'] == 'ok') {


	//llamamos al archivo PermisoController donde se encuentra
	//el metodo para verificar los permisos
	require_once 'PermisoController.php';

	//llamamos el modelo de la Categoría
	require_once './models/CategoriaModel.php';

	class CategoriaController extends PermisoController {

		public function obtenerNivel(){
			//para obtener el nivel buscamos el id del usuario
			$usuario_id = $_SESSION['id_usuario'];
	        //para obtener el nivel solo buscar 'categoria' sin el guión ej. [categoria-insertar]
	        $page = $_GET['page'];
	        //para usar el metodo obtnerNivel, solo nos interesa la palabra antes del guión de la variable 'page'
	        $contenido = explode('-', $page);
	        $nivel = $this->obtenerNivelPermiso($usuario_id, $contenido[0]);
	        return $nivel;
		}
	       	
		#estableciendo las vistas
		public function categoria() {
			$nivelAcceso = $this->obtenerNivel();
	        if ($nivelAcceso > 0){
	            require_once('./views/includes/cabecera.php');
	            require_once('./views/includes/navbar.php');
	            require_once('./views/paginas/categoria.php');
	            require_once('./views/includes/pie.php');
	        }else{
	            header('Location: index.php?page=error');
	            die();
	        }
		}
		public function categoriaDetalle() {
			$nivelAcceso = $this->obtenerNivel();
	        if ($nivelAcceso >= 1){
	            require_once('./views/paginas/categoria-detalle.php');
	        }else{
	            header('Location: index.php?page=error');
	            die();
	        }
		}
		public function categoriaInsertar() {
			$nivelAcceso = $this->obtenerNivel();
	        if ($nivelAcceso >= 2){
		        require_once('./views/paginas/categoria-insertar.php');
		    }else{
	            header('Location: index.php?page=error');
	            die();
	        }
		}
		public function categoriaEditar() {
			$nivelAcceso = $this->obtenerNivel();
	        if ($nivelAcceso >= 2){
		        require_once('./views/paginas/categoria-editar.php');
			}else{
	            header('Location: index.php?page=error');
	            die();
	        }
		}
		public function categoriaEliminar() {
			$nivelAcceso = $this->obtenerNivel();
	        if ($nivelAcceso >= 3){
		        require_once('./views/paginas/categoria-eliminar.php');
			}else{
	            header('Location: index.php?page=error');
	            die();
	        }
		}

		#métodos CRUD
		public function insertarCategoria($datos) {
			//si es necesario, se compara el registro recibido
			//con los registros de la BD		
			$compararCategorias = new CategoriaModel();
			$compararCategorias = $this->obtenerCategorias();

			$error = 0;

			foreach ($compararCategorias as $r) {
				//se compara el campo 'email' con todos los registros de la BD
				//si hay otro campo para comparar, ir adhiriendo "if"
			    if ($datos['categoria'] == $r['categoria']) {
					$error++;
					$respuesta['mensaje'] = "Categoría ya registrada";
					$respuesta['codigo'] = 400;
		    		echo json_encode($respuesta, JSON_PRETTY_PRINT);
					die();
				}
		    }
			//si 'error' es 0, $datos cumple con todo
			//se procederá a Insertar a la BD
		    if ($error == 0) {
		    	$categoria = new CategoriaModel();
				$categoria->insertarCategoria($datos);
		    	$respuesta['mensaje'] = "Registro insertado correctamente";
				$respuesta['codigo'] = 200;
		    	echo json_encode($respuesta, JSON_PRETTY_PRINT);
		    }
		}
		public function editarCategoria($id, $datos) {
			$categoria = new CategoriaModel();		
			$categoria->editarCategoria($id, $datos);
		}
		public function eliminarCategoria($id) {
			$categoria = new CategoriaModel();
			$categoria->eliminarCategoria($id);
		}
		public function obtenerCategorias() {
			$categorias = new CategoriaModel();
			return $categorias->obtenerCategorias();
		}
		public function obtenerCategoria($id) {
			$categoria = new CategoriaModel();
			return $categoria->obtenerCategoria($id);
		}

	}
		
//si no, redirigimos el foco al formulario de acceso
} else {
	header('Location: index.php?page=login');
    die();
}