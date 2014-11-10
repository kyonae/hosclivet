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

define('I18N_DIR', CONFIG_DIR . DS .'i18n');
define('I18N_PATH', I18N_DIR . DS);
if (!file_exists(I18N_PATH . 'texts_' . LANG . '.php'))
	define('TEXTS', I18N_PATH . 'texts_EN.php');
else
	define('TEXTS', I18N_PATH . 'texts_' . LANG . '.php');
define('URL', $_SERVER['REQUEST_URI']);

$app = new Application();
