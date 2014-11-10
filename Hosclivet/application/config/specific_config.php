<?php
if (!defined('HOST')){
	/**
	 * Configuracion especifica de la aplicacion
	 * @var unknown
	 */
	define('APP_SHORT_NAME', 'Hosclivet');
	define('APP_LONG_NAME', 'Hospital Clínico Veterinario');
	define('URL', DS . APP_SHORT_NAME . DS);
	
	define('DB_TYPE', 'mysql');
	define('DB_HOST', '127.0.0.1');
	define('DB_NAME', 'login');
	define('DB_USER', 'root');
	define('DB_PASS', '');
}