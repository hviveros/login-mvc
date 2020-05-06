<?php
require_once 'ModeloBase.php';

//Solo se CONSULTAN contenidos, no se crean, editan ni eliminan de la BD

class ContenidoModel extends ModeloBase {

	public function __construct() {
		parent::__construct();
	}

	public function obtenerContenidos() {
		$db = new ModeloBase();
		$query = "SELECT * FROM contenido ORDER BY id_contenido";
		$resultado = $db->obtenerTodos($query);
		return $resultado;
	}

	public function obtenerContenido($id) {
		$db = new ModeloBase();
		$query = "SELECT * FROM contenido WHERE id_contenido = '".$id."'";
		$resultado = $db->obtenerTodos($query);
		return $resultado;
	}

}
