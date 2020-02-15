<?php

require_once 'models/PermisoModel.php';

class PermisoController {

	public function obtenerPermisos($usuario_id) {
		$permisos = new PermisoModel();
		return $permisos->obtenerPermisos($usuario_id);
	}

	public function obtenerPermiso($id) {
		$Permiso = new PermisoModel();
		return $cliente->obtenerCliente($id);
	}



}