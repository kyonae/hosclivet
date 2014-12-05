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
				<li <?php if ($this->checkForActiveController($filename, "services")) { echo ' class="active" '; } ?> >
					<a href="<?php echo URL; ?>services"><i class='fa fa-stethoscope fa-fw'></i>&nbsp;<?php echo $texts['services']; ?></a>
				</li>
				<li <?php if ($this->checkForActiveController($filename, "personnel")) { echo ' class="active" '; } ?> >
					<a href="<?php echo URL; ?>personnel"><i class='fa fa-user-md fa-fw'></i>&nbsp;<?php echo $texts['personnel']; ?></a>
				</li>
				<li <?php if ($this->checkForActiveController($filename, "noticeBoard")) { echo ' class="active" '; } ?> >
					<a href="<?php echo URL; ?>noticeBoard"><i class='fa fa-list-alt fa-fw'></i>&nbsp;<?php echo $texts['notice.board']; ?></a>
					<ul class='sub-menu'>
						<li <?php if ($this->checkForActiveController($filename, "events")) { echo ' class="active" '; } ?> >
							<a href="<?php echo URL; ?>noticeBoard/ads"><?php echo $texts['ads']; ?></a>
						</li>
						<li <?php if ($this->checkForActiveController($filename, "events")) { echo ' class="active" '; } ?> >
							<a href="<?php echo URL; ?>noticeBoard/events"><?php echo $texts['events']; ?></a>
						</li>
						<li <?php if ($this->checkForActiveController($filename, "events")) { echo ' class="active" '; } ?> >
							<a href="<?php echo URL; ?>noticeBoard/articles"><?php echo $texts['articles']; ?></a>
						</li>
						<li <?php if ($this->checkForActiveController($filename, "events")) { echo ' class="active" '; } ?> >
							<a href="<?php echo URL; ?>noticeBoard/campaigns"><?php echo $texts['campaigns']; ?></a>
						</li>
						<li <?php if ($this->checkForActiveController($filename, "events")) { echo ' class="active" '; } ?> >
							<a href="<?php echo URL; ?>noticeBoard/vaccines"><?php echo $texts['vaccines']; ?></a>
						</li>
					</ul>
				</li>
				<li <?php if ($this->checkForActiveController($filename, "who")) { echo ' class="active" '; } ?> >
					<a href="<?php echo URL; ?>who"><i class='fa fa-group fa-fw'></i>&nbsp;<?php echo $texts['who.we.are']; ?></a>
				</li>
				<?php if (Session::get('user_logged_in') == true):?>
					<li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
						<a href="<?php echo URL; ?>login/showprofile"><i class='fa fa-user fa-fw'></i>&nbsp;<?php echo $texts['my.account']; if (Session::get('user_name')): echo ' (' . Session::get('user_name') . ')'; endif;?></a>
						<ul class="sub-menu">
							<?php if (Session::get('admin') == true): ?>
							<li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
								<a href="<?php echo URL; ?>login/changeaccounttype"><?php echo $texts['change.account']; ?></a>
							</li>
							<?php endif; ?>
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
