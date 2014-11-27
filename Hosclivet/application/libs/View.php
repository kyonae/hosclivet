<?php

/**
 * Clase Vista
 * 
 * Nos provee de todos los métodos que tendrán las vistas.
 */
class View
{
	/**
	 * Simplemente incluye (o muestra) la vista. Esto se hace desde el controlador. DENTRO DEL CONTROLADOR normalmente se invoca al
	 * método mediante $this->view->render('help/index'); para mostrar (en este ejemplo) la vista index.php en la carpeta help.
	 * Normalmente la clase y el método son iguales que la vista pero a veces necesitamos mostrar diferentes vistas.
	 * @param string $filename Path a la vista que debe ser visualizada, generalmente carpeta/archivo(.php).
	 * @param boolean $render_without_header_and_footer Opcional: Configura esto a true si no quieres incluir ni cabecera ni pie
	 */
	public function render($filename, $render_without_header_and_footer = false)
	{
		require TEXTS;
		// Página sin cabecera ni pie por cualquier motivo elegido por el desarrollador
		if ($render_without_header_and_footer == true) {
			require VIEWS_PATH . $filename . '.php';
		} else {
			require TEMPLATES_PATH . 'header.php';
			require VIEWS_PATH . $filename . '.php';
			require TEMPLATES_PATH . 'footer.php';
		}
	}

	/**
	 * Visualiza los mensajes de feedback en la vista
	 */
	public function renderFeedbackMessages()
	{
		// Muestra los mensajes de feedback (mensajes de error y éxito, etc) almacenados en $_SESSION['feedback_positive']
		// y $_SESSION['feedback_negative']
		require TEMPLATES_PATH . 'feedback.php';

		// Borramos los mensajes puesto que no los vamos a necesitar más y no queremos mostrarlos más de una vez
		Session::set('feedback_positive', null);
		Session::set('feedback_negative', null);
	}

	/**
	 * Comprueba si la cadena pasada es el controlador activo actualmente.
	 * Utilizado para manejar los enlaces de navegacion activos/no activos.
	 * @param string $filename
	 * @param string $navigation_controller
	 * @return bool Booleano que nos dice si el enlace corresponde al controlador activo
	 */
	private function checkForActiveController($filename, $navigation_controller)
	{
		$split_filename = explode(DS, $filename);
		$active_controller = $split_filename[0];

		if ($active_controller == $navigation_controller) {
			return true;
		}
		
		return false;
	}

	/**
	 * Comprueba si la cadena pasada es el método actualmente activo.
	 * Utilizado para manejar los enlaces de navegacion activos/no activos.
	 * @param string $filename
	 * @param string $navigation_action
	 * @return bool Muestra si el método es el que está siendo utilizado
	 */
	private function checkForActiveAction($filename, $navigation_action)
	{
		$split_filename = explode(DS, $filename);
		$active_action = $split_filename[1];

		if ($active_action == $navigation_action) {
			return true;
		}
		
		return false;
	}

	/**
	 * Comprueba si la cadena pasada es el controlador y su acción actualmente activas.
	 * Utilizado para manejar los enlaces de navegacion activos/no activos.
	 * @param string $filename
	 * @param string $navigation_controller_and_action
	 * @return bool
	 */
	private function checkForActiveControllerAndAction($filename, $navigation_controller_and_action)
	{
		$split_filename = explode(DS, $filename);
		$active_controller = $split_filename[0];
		$active_action = $split_filename[1];

		$split_filename = explode(DS, $navigation_controller_and_action);
		$navigation_controller = $split_filename[0];
		$navigation_action = $split_filename[1];

		if ($active_controller == $navigation_controller AND $active_action == $navigation_action) {
			return true;
		}
		
		return false;
	}
}
