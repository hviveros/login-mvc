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

	public function obtenerNivelPermiso($usuario_id, $contenido) {
		$permiso = new PermisoModel();
		$nivel = $permiso->obtenerNivelPermiso($usuario_id, $contenido);
		foreach ($nivel as $n ) {
			return $n['nivel'];
		}
	}

}