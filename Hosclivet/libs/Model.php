<?php
abstract class Model{
	protected $db;

	public function __construct()
	{
		//Traemos la única instancia de PDO
		$this->db = SPDO::singleton();
	}
}