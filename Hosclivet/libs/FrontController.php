<?php
class FrontController
{
    static function main()
    {
        //Incluimos algunas clases:
 
        require 'libs/Config.php'; //de configuracion
        require 'libs/SPDO.php'; //PDO con singleton
        require 'libs/View.php'; //Mini motor de plantillas
        require 'libs/Controller.php';
        require 'libs/Model.php';
 
        require 'config.php'; //Archivo con configuraciones.
 
        //Con el objetivo de no repetir nombre de clases, nuestros controladores
        //terminarán todos en Controller. Por ej, la clase controladora Items, será ItemsController
 
        $path = self::parse_path();
        //Formamos el nombre del Controlador o en su defecto, tomamos que es el IndexController
        if(! empty($path['call_parts'][0]))
              $controllerName = $path['call_parts'][0] . 'Controller';
        else
              $controllerName = "IndexController";
   
        //Lo mismo sucede con las acciones, si no hay acción, tomamos index como acción
        if(! empty($path['call_parts'][1]))
              $actionName = $path['call_parts'][1];
        else
              $actionName = "index";
 
        $controllerPath = $config->get('controllersFolder') . $controllerName . '.php';

        //Incluimos el fichero que contiene nuestra clase controladora solicitada
        if(is_file($controllerPath)){
			require $controllerPath;
    	}
        else
            die('El controlador no existe - 404 not found');

        //Si no existe la clase que buscamos y su acción, mostramos un error 404
        
        if (is_callable(array($controllerName, $actionName)) == false)
        {
        	die($controllerName . '->' . $actionName . ' no existe - 404 not found');
            trigger_error ($controllerName . '->' . $actionName . ' no existe', E_USER_NOTICE);
            return false;
        }
        //Si todo esta bien, creamos una instancia del controlador y llamamos a la acción
        $controller = new $controllerName();

        $controller->$actionName();
    }
    
    /**
     * Metodo para obtener las partes de la url y asi poder utilizar url's amigables.
     * @return multitype:string multitype:
     */
    static function parse_path() {
		$path = array();
		if (isset($_SERVER['REQUEST_URI'])) {
			$request_path = explode('?', $_SERVER['REQUEST_URI']);

			$path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
			$path['call_utf8'] = substr(urldecode($request_path[0]), strlen($path['base']) + 1);
			$path['call'] = utf8_decode($path['call_utf8']);
			if ($path['call'] == basename($_SERVER['PHP_SELF'])) {
				$path['call'] = '';
			}
			$path['call_parts'] = explode('/', $path['call']);
		}
		return $path;
	}
}
?>
