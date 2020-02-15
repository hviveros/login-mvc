<?php
require_once 'ModeloBase.php';

//Solo se CONSULTAN paginas, no se crean, editan ni eliminan de la BD

class PaginaModel extends ModeloBase {

	public function __construct() {
		parent::__construct();
	}

	public function obtenerPaginas() {
		$db = new ModeloBase();
		$query = "SELECT * FROM pagina ORDER BY id_pagina";
		$resultado = $db->obtenerTodos($query);
		return $resultado;
	}

	public function obtenerPagina($id) {
		$db = new ModeloBase();
		$query = "SELECT * FROM pagina WHERE id_pagina = '".$id."'";
		$resultado = $db->obtenerTodos($query);
		return $resultado;
	}

}
