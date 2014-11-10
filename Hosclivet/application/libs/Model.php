<?php

/**
 * This is the "base model class". All other "real" models extend this class.
 * Whenever a model is created, we create a database connection
 */
abstract class Model{
	protected $db;

	public function __construct()
	{
		try {
			$this->db = Database::singleton();
		}
		catch (PDOException $e) {
			die('Database connection could not be established.');
		}
	}
}