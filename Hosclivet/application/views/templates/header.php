<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo APP_NAME; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/reset.css" />
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css" />
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/font-awesome/css/font-awesome.css" />
	
	<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/modernizr.custom.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/fullPage.min.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/application.js"></script>
</head>
<body>

	<!-- BLOQUE CON LA INFORMACIÓN SOBRE EL DEBUG -->
	<div class="debug-helper-box">
		DEBUG HELPER: <?php echo str_replace('%viewName%', $filename, $texts['view.location']); ?>
	</div>
	<div id='header'>	
		<div class='title-box'>
			<a href="<?php echo URL; ?>"><?php echo APP_NAME; ?></a>
		</div>
		<span class="fa-stack fa-lg" id='menu_button'>
			<i class="fa fa-square-o fa-stack-2x fa-inverse"></i>
			<i class="fa fa-bars fa-stack-1x fa-inverse" style='top: -1px;'></i>
		</span>
	
		<div class="header" id='menu_navigation'>
			<div class="header_left_box">
			<ul id="menu">
				<li <?php if ($this->checkForActiveController($filename, "index")) { echo ' class="active" '; } ?> >
					<a href="<?php echo URL; ?>"><i class='fa fa-home fa-fw'></i>&nbsp;<?php echo $texts['index']; ?></a>
				</li>
				<li <?php if ($this->checkForActiveController($filename, "help")) { echo ' class="active" '; } ?> >
					<a href="<?php echo URL; ?>help"><i class='fa fa-info-circle fa-fw'></i>&nbsp;<?php echo $texts['help']; ?></a>
				</li>
				<li <?php if ($this->checkForActiveController($filename, "overview")) { echo ' class="active" '; } ?> >
					<a href="<?php echo URL; ?>overview"><i class='fa fa-eye fa-fw'></i>&nbsp;<?php echo $texts['overview']; ?></a>
				</li>
				<li <?php if ($this->checkForActiveController($filename, "test")) { echo ' class="active" '; } ?> >
					<a href="<?php echo URL; ?>test"><i class='fa fa-laptop fa-fw'></i>&nbsp;<?php echo $texts['test']; ?></a>
				</li>
				<?php if (Session::get('user_logged_in') == true):?>
					<li <?php if ($this->checkForActiveController($filename, "dashboard")) { echo ' class="active" '; } ?> >
						<a href="<?php echo URL; ?>dashboard"><i class='fa fa-list-all fa-fw'></i>&nbsp;<?php echo $texts['dashboard']; ?></a>
					</li>
					<li <?php if ($this->checkForActiveController($filename, "note")) { echo ' class="active" '; } ?> >
						<a href="<?php echo URL; ?>note"><i class='fa fa-file-text-o fa-fw'></i>&nbsp;<?php echo $texts['my.notes']; ?></a>
					</li>
					<li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
						<a href="<?php echo URL; ?>login/showprofile"><i class='fa fa-user fa-fw'></i>&nbsp;<?php echo $texts['my.account'] . ' (' . Session::get('user_name') . ')'; ?></a>
						<ul class="sub-menu">
							<li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
								<a href="<?php echo URL; ?>login/changeaccounttype"><?php echo $texts['change.account']; ?></a>
							</li>
							<li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
								<a href="<?php echo URL; ?>login/editusername"><?php echo $texts['edit.username']; ?></a>
							</li>
							<li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
								<a href="<?php echo URL; ?>login/edituseremail"><?php echo $texts['edit.email']; ?></a>
							</li>
							<li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
								<a href="<?php echo URL; ?>login/logout"><i class='fa fa-sign-out fa-fw'></i><?php echo $texts['logout']; ?></a>
							</li>
						</ul>
					</li>
				<?php else: ?>
	
				<!-- for not logged in users -->
					<li <?php if ($this->checkForActiveControllerAndAction($filename, "login/index")) { echo ' class="active" '; } ?> >
						<a href="<?php echo URL; ?>login/index"><i class='fa fa-sign-in fa-fw'></i>&nbsp;<?php echo $texts['login']; ?></a>
					</li>
				<?php endif; ?>
			</ul>
			</div>
	
			<div class="clear-both"></div>
		</div>
	</div>