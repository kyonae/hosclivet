<?php

function autoload($class) {
	// Si el fichero no existe  en el directorio LIBS_PATH (configurable en config/common_config.php)
	if (file_exists(LIBS_PATH . $class . ".php")) {
		require LIBS_PATH . $class . ".php";
	} else {
		require TEXTS;
		exit (str_replace('%fileName%', $class, $texts['file.missing.libs']));
	}
}

// spl_autoload_register defines the function that is called every time a file is missing. as we created this
// function above, every time a file is needed, autoload(THENEEDEDCLASS) is called
spl_autoload_register("autoload");
