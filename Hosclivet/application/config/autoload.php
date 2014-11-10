<?php

function autoload($class) {
	// if file does not exist in LIBS_PATH folder [set it in config/config.php]
	if (file_exists(LIBS_PATH . $class . ".php")) {
		require LIBS_PATH . $class . ".php";
	} else {
		exit ('The file ' . $class . '.php is missing in the libs folder.');
	}
}

// spl_autoload_register defines the function that is called every time a file is missing. as we created this
// function above, every time a file is needed, autoload(THENEEDEDCLASS) is called
spl_autoload_register("autoload");