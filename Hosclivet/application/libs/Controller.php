<?php

/**
 * Esta es la clase base de cada Controlador. Los demás controladores heredan de esta clase.
 * Cuando creamos un controlador también ejecutamos lo siguiente:
 * 1. Inicializamos una sesión
 * 2. Comprobamos si el usuario no está logeado
 * 3. Creamos una vista
 */
abstract class Controller
{
    function __construct()
    {
        Session::init();

        // Creamos una vista (que no hace nada pero nos permite utilizar su método render() ).
        $this->view = new View();
    }

    /**
     * Carga el modelo con el nombre deseado
     * @param $name Cadena con el nombre del modelo
     */
    public function loadModel($name)
    {
        $path = MODELS_PATH . strtolower($name) . 'Model.php';

        if (file_exists($path)) {
            require MODELS_PATH . strtolower($name) . 'Model.php';
            // Todos los modelos deben tener el nombre del controlador seguido por Model con M mayúscula,
            // como por ejemplo "LoginModel".
            $modelName = $name . 'Model';
            // Devuelve el modelo.
            return new $modelName();
        }
    }
}
