<?php

if (!defined('ROOT')){	
	/**
	 * Configuracion generica
	 * @var unknown
	 */
	define('ROOT', dirname(__FILE__));
	define('DS', DIRECTORY_SEPARATOR);
	define('PS', PATH_SEPARATOR);
	define('APP_DIR', ROOT . DS . 'application');
	define('CONFIG_DIR', APP_DIR . DS . 'config');
	define('VENDOR_DIR', ROOT . DS . 'vendor');
}

require_once CONFIG_DIR . DS . 'common_config.php';
require_once CONFIG_DIR . DS . 'specific_config.php';

if (!defined('I18N_DIR')){
	define('I18N_DIR', CONFIG_DIR . DS .'i18n');
	define('I18N_PATH', I18N_DIR . DS);
	if (!defined('LANG') || !file_exists(I18N_PATH . 'texts_' . LANG . '.php'))
		define('TEXTS', I18N_PATH . 'texts_EN.php');
	else
		define('TEXTS', I18N_PATH . 'texts_' . LANG . '.php');
	$url = rtrim($_SERVER['REQUEST_URI'], DS);
	$url = filter_var($url, FILTER_SANITIZE_URL);
	$url = explode(DS, $url);
	define('URL', DS . $url[1] . DS);
}


require_once CONFIG_DIR . DS . 'autoload.php';

/*
 * Iniciamos la aplicación
 */
$app = new Application();
