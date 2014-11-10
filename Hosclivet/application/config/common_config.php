<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

if (!defined('DEFAULT_CONTROLLER')){
	define('DEFAULT_CONTROLLER','index');
	define('DEFAULT_ERROR_CONTROLLER','error');
	define('DEFAULT_ACTION','index');
	
	/**
	 * Directorio de librerias sin separador
	 */
	define('LIBS_DIR', APP_DIR . DS . 'libs');
	
	/**
	 * Path de las librerias con separador
	 */
	define('LIBS_PATH', LIBS_DIR . DS);
	
	/**
	 * Directorio de controladores sin separador
	 */
	define('CONTROLLERS_DIR', APP_DIR . DS .'controllers');
	
	/**
	 * Path de controladores con separador
	 */
	define('CONTROLLERS_PATH', CONTROLLERS_DIR . DS);
	
	/**
	 * Directorio de modelos sin separador
	 */
	define('MODELS_DIR', APP_DIR . DS .'models');
	
	/**
	 * Path de modelos con separador
	 */
	define('MODELS_PATH', MODELS_DIR . DS);
	
	/**
	 * Directorio de vistas sin separador
	 */
	define('VIEWS_DIR', APP_DIR . DS .'views');
	
	/**
	 * Path de vistas con separador
	 */
	define('VIEWS_PATH', VIEWS_DIR . DS);
	
}
