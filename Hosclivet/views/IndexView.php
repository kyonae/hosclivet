<?php
	require("config.php");
	
	require($config->get('templatesFolder') . "Header.php");
?>

<?php
	require($config->get('templatesFolder') . "Menu.php");
?>
	<div class='wrapper'>
		<H1>Bienvenido al ERP de Viveros Peñitas. Pulse en alguna opción del menú para continuar.</H1>
	</div>
<?php
	require($config->get('templatesFolder') . "Footer.php");
?>