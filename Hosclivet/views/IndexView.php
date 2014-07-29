<?php
	require("config.php");
	
	require($config->get('templatesFolder') . "Header.php");
?>

<?php
	require($config->get('templatesFolder') . "Menu.php");
?>
	<div class='wrapper'>
		<p class="message">
			Bienvenido a la página web del Hospital Clínico Veterinario.
		</p>
	</div>
<?php
	require($config->get('templatesFolder') . "Footer.php");
?>