	<!-- Header -->
<!doctype html>
<html lang="us">
<head>
	<meta charset="utf-8">
	<title>Hospital Clínico Veterinario</title>	
	<link href="<?php echo $config->get('htmlRoute')?>css/footable.core.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $config->get('htmlRoute')?>css/footable.standalone.css" rel="stylesheet" type="text/css"/>	
	<script src="<?php echo $config->get('htmlRoute')?>js/jquery.min.js"></script>
	<script src="<?php echo $config->get('htmlRoute')?>js/jquery.dropotron.min.js"></script>	
	<script src="<?php echo $config->get('htmlRoute')?>js/footable.js"></script>	
  	<script src="<?php echo $config->get('htmlRoute')?>js/footable.sort.js" type="text/javascript"></script>
  	<script src="<?php echo $config->get('htmlRoute')?>js/footable.filter.js" type="text/javascript"></script>
  	<script src="<?php echo $config->get('htmlRoute')?>js/footable.paginate.js" type="text/javascript"></script>
	<script src="<?php echo $config->get('htmlRoute')?>js/skel.min.js"></script>
	<script src="<?php echo $config->get('htmlRoute')?>js/skel-panels.min.js"></script>
	<script src="<?php echo $config->get('htmlRoute')?>js/init.js"></script>		
	<noscript>
			<link rel="stylesheet" href="<?php echo $config->get('htmlRoute')?>css/skel-noscript.css" />
			<link rel="stylesheet" href="<?php echo $config->get('htmlRoute')?>css/style.css" />
			<link rel="stylesheet" href="<?php echo $config->get('htmlRoute')?>css/style-noscript.css" />
	</noscript>
	
</head>
<body>

<div class="container">

	<div class='row title'>
		<div class='4u biglogo'></div>
		<div class='-4u 3u'>
			<form class='login form' method='post' action=''>
				<div class='row'>
					<div class='6u'>Usuario:</div>
					<div class='6u'><input type='text' placeholder='usuario'/></div>
				</div>
				<div class='row'>
					<div class='6u'>Contraseña:</div>
					<div class='6u'><input type='password' placeholder='contraseña'/></div>
				</div>
				<input type='button' value='Login'/>
			</form>
		</div>
		
	</div>
	