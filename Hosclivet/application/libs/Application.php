<?php

/**
 * Clase Aplicación
 * Es el corazón de nuestra aplicación web
 */
class Application
{
	/** @var null El controlador parte de la URL */
	private $url_controller;
	/** @var null El método del controlador parte de la URL */
	private $url_action;
	/** @var null Primer parámetro de la URL */
	private $url_parameter_1;
	/** @var null Segundo parámetro de la URL */
	private $url_parameter_2;
	/** @var null Tercer parámetro de la URL */
	/** @var null Parameter three of the URL */
	private $url_parameter_3;

	/**
	 * Inicia la Aplicación
	 * Coge las partes de la URL y saca el controlador, el método y sus parámetros correspondientes.
	 * TODO: Modificar los ifs anidados
	 */
	public function __construct()
	{
		$this->splitUrl();

			// Comprueba que el controlador exista
			if (file_exists(CONTROLLERS_PATH . $this->url_controller . '.php')) {
				
				// Si existe entonces carga el fichero y crea el controlador
				// Ejemplo: Si controlador fuese "coche", entonces esta linea se traduciría como $this->coche = new coche();
				require_once CONTROLLERS_PATH . $this->url_controller . '.php';
				$this->url_controller = new $this->url_controller();

				// Comprueba que el metodo exista dentro del controlador
					if (method_exists($this->url_controller, $this->url_action)) {

						// Puesto que si existe parametro 3 existen los anteriores, simplemente ejecutamos el metodo con todos los parametros.
						// y hacemos la comprobación para los demás parámetros en orden descendente.
						if (isset($this->url_parameter_3)) {
							$this->url_controller->{$this->url_action}($this->url_parameter_1, $this->url_parameter_2, $this->url_parameter_3);
						} elseif (isset($this->url_parameter_2)) {
							$this->url_controller->{$this->url_action}($this->url_parameter_1, $this->url_parameter_2);
						} elseif (isset($this->url_parameter_1)) {
							$this->url_controller->{$this->url_action}($this->url_parameter_1);
						} else {
							// Si no había parámetros entonces simplemente ejecutamos el método
							$this->url_controller->{$this->url_action}();
						}
					} else {
						// Si no existe el método redirigimos a la página de error
						header('location: ' . URL . DEFAULT_ERROR_CONTROLLER);
					}
			} else {
				// Si no existe el controlador redirigimos a la página de error para la cual existe un controlador específico
				header('location: ' . URL . DEFAULT_ERROR_CONTROLLER);
			}
		
	}

	/**
	 * Coge y divide la URL
	 */
	private function splitUrl()
	{
		if (isset($_GET['url'])) {
			// dividimos la URL
			$url = rtrim($_GET['url'], DS);
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode(DS, $url);
			
		}
		else{
			// Creamos una URL con el controlador por defecto
			$url = array(DEFAULT_CONTROLLER);
		}
		// Configuramos las partes de la URL como corresponda
		$this->url_controller = $url[0].'Controller';
		$this->url_action = (isset($url[1]) ? $url[1] : DEFAULT_ACTION);
		$this->url_parameter_1 = (isset($url[2]) ? $url[2] : null);
		$this->url_parameter_2 = (isset($url[3]) ? $url[3] : null);
		$this->url_parameter_3 = (isset($url[4]) ? $url[4] : null);
	}
}
