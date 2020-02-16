<?php

require_once 'models/PermisoModel.php';

class PermisoController {

	public function obtenerPermisos($usuario_id) {
		$permisos = new PermisoModel();
		return $permisos->obtenerPermisos($usuario_id);
	}

	public function obtenerPermisoId($id) {
		$permiso = new PermisoModel();
		return $permiso->obtenerPermiso($id);
	}

	public function concederPermiso($usuario_id, $pagina) {
		$permiso = new PermisoModel();
		return $permiso->concederPermiso($usuario_id, $pagina);
	}

}