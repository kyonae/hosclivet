<?php

/**
 * Clase IndexController
 * El controlador por defecto
 */
class IndexController extends Controller
{
	/**
	 * Construimos este objeto heredando de la clase padre Controller.
	 */
	function __construct()
	{
			parent::__construct();
	}

	/**
	 * Maneja lo que ocurre cuando un usuario navega a la URL/index/index, que es lo mismo que URL/index o 
	 * incluso URL (sin controlador ni método) puesto que son el controlador y el método por defecto cuando el usuario
	 * no introduce nada.
	 */
	function index()
	{
			$this->view->render('index/index');
	}
}
