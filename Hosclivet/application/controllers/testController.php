<?php

/**
 * Clase TestController
 */
class TestController extends Controller
{
	/**
	 * Construimos este objeto heredando de la clase Controller.
	 */
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Este método controla lo que pasa y lo que el usuario ve cuando ocurre un error (404).
	 */
	function index()
	{
		$this->view->render('test/test');
	}
}
