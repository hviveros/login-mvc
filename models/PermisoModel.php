<?php
require_once 'ModeloBase.php';

//Solo se CONSULTAN permisos, no se crean, editan ni eliminan de la BD

class PermisoModel extends ModeloBase {

	public function __construct() {
		parent::__construct();
	}

	public function obtenerPermisos($usuario_id) {
		$db = new ModeloBase();
		$query = "SELECT pag.id_contenido, pag.contenido, per.nivel
		FROM permiso AS per 
		INNER JOIN contenido AS pag ON per.contenido_id = pag.id_contenido 
		WHERE per.usuario_id = $usuario_id ORDER BY id_permiso";
		$resultado = $db->obtenerTodos($query);
		return $resultado;
	}

	public function obtenerPermisoId($id_permiso) {
		$db = new ModeloBase();
		$query = "SELECT * FROM permiso WHERE id_permiso = '".$id."'";
		$resultado = $db->obtenerTodos($query);
		return $resultado;
	}

	public function obtenerNivelPermiso($usuario_id, $contenido) {
		$db = new ModeloBase();
		$query = "SELECT per.nivel
		FROM permiso AS per 
		INNER JOIN contenido AS pag ON per.contenido_id = pag.id_contenido 
		WHERE per.usuario_id = $usuario_id AND pag.contenido = '".$contenido."'";
		$resultado = $db->obtenerTodos($query);
		return $resultado;
	}

}
