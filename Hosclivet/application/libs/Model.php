<?php

/**
 * Esta es la clase Modelo de la que heredarán todos los modelos.
 * Cuando creamos un modelo también creamos una conexión con la base de datos.
 */
abstract class Model{
	protected $db;

	public function __construct()
	{
		try {
			$this->db = Database::singleton();
		}
		catch (PDOException $e) {
			require_once TEXTS;
			die($texts['db.connection.not.established']);
		}
	}
}