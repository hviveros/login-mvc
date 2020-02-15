<?php
require_once 'ModeloBase.php';

//Solo se CONSULTAN permisos, no se crean, editan ni eliminan de la BD

class PermisoModel extends ModeloBase {

	public function __construct() {
		parent::__construct();
	}

	public function obtenerPermisos() {
		$db = new ModeloBase();
		$query = "SELECT * FROM permiso ORDER BY id_permiso";
		$resultado = $db->obtenerTodos($query);
		return $resultado;
	}

	public function obtenerPermiso($id) {
		$db = new ModeloBase();
		$query = "SELECT * FROM permiso WHERE id_permiso = '".$id."'";
		$resultado = $db->obtenerTodos($query);
		return $resultado;
	}

}
