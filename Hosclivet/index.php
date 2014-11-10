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

require_once CONFIG_DIR . DS . 'autoload.php';

require_once CONFIG_DIR . DS . 'specific_config.php';

$app = new Application();