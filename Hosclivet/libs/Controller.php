<?php
abstract class Controller{
	
	private $view;
	
	function __construct(){
		//Creamos una instancia de nuestro mini motor de plantillas
		$this->view = new View();
	}
	
	protected function render($name, $vars = array()){
		$this->view->render($name, $vars);
	}
}