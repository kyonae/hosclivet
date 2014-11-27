<?php

/**
 * Clase Database
 * Crea una conexión PDO a la base de datos. Esta conexión la tendrá cada modelo como un patrón singleton para prevenir múltiples conexiones
 * a la vez.
 */
class Database extends PDO
{
	/** @var null Instancia singleton de la clase.
	private static $instance = null;
	
	/**
	 * Construímos nuestro objeto heredando de la clase PDO que proviene del motor de PHP.
	 */
	public function __construct()
	{
		/*
		 * Configura valores opcionales para la conexión PDO. En este caso estamos configurando el modo de fetch a objetos, lo que significa
		 * que los resultados serán objetos como estos: $result->user_name.
		 * Si lo cambiásemos a FETCH_ASSOC por ejemplo, esto devolvería resultados como estos: $result["user_name"].
		 * @see http://www.php.net/manual/en/pdostatement.fetch.php
		 */
		$options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

		/*
		 * Generamos una conexión a la base de datos usando el conector PDO:
		 * @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
		 * 
		 * También es importante incluir el juego de caracteres puesto que dejarlos puede ser un problema de seguridad:
		 * @see http://wiki.hashphp.org/PDO_Tutorial_for_MySQL_Developers#Connecting_to_MySQL says:
		 * "Adding the charset to the DSN is very important for security reasons,
		 * most examples you'll see around leave it out. MAKE SURE TO INCLUDE THE CHARSET!"
		 */
		parent::__construct(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS, $options);
	}
	
	/**
	 * Metodo para obtener la instancia única que define el patrón singleton.
	 * @return Database
	 */
	public static function singleton()
	{
		if( self::$instance == null )
		{
			self::$instance = new self();
		}
		return self::$instance;
	}
}
