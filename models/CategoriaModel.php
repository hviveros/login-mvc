<?php
require_once 'ModeloBase.php';

class CategoriaModel extends ModeloBase {

	public function __construct() {
		parent::__construct();
	}

	public function obtenerCategorias() {
		$db = new ModeloBase();
		$query = "SELECT * FROM categoria ORDER BY id_categoria";
		$resultado = $db->obtenerTodos($query);
		return $resultado;
	}

	public function obtenerCategoria($id) {
		$db = new ModeloBase();
		$query = "SELECT * FROM categoria WHERE id_categoria = '".$id."'";
		$resultado = $db->obtenerTodos($query);
		return $resultado;
	}

	public function insertarCategoria($datos) {
		$db = new ModeloBase();
		try {
			$insertar = $db->insertar('categoria', $datos);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function editarCategoria($id, $datos) {
		$db = new ModeloBase();
		try {
			$editar = $db->editar('categoria', $id, $datos);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function eliminarCategoria($id) {
		$db = new ModeloBase();
		try {
			$eliminar = $db->eliminar('categoria', $id);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

}
