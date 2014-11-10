<?php
if (!defined('HOST')){
	/**
	 * Configuracion especifica de la aplicacion
	 * @var unknown
	 */
	define('LANG','ES');
	define('I18N_DIR', CONFIG_DIR . DS .'i18n');
	define('I18N_PATH', I18N_DIR . DS);
	if (!file_exists(I18N_PATH . 'texts_' . LANG . '.php'))
		define('TEXTS', I18N_PATH . 'texts_EN.php');
	else
		define('TEXTS', I18N_PATH . 'texts_' . LANG . '.php');
	
	define('APP_SHORT_NAME', 'Hosclivet');
	define('APP_LONG_NAME', 'Hospital Clínico Veterinario');
	define('URL', DS . APP_SHORT_NAME . DS);
	
	define('DB_TYPE', 'mysql');
	define('DB_HOST', '127.0.0.1');
	define('DB_NAME', 'login');
	define('DB_USER', 'root');
	define('DB_PASS', '');
}